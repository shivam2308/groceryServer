<?php

namespace App\PaymentPbModule;

use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\TimePbModule\TimeUpdator;
use Exception;
use App\BaseCode\Strings;
use App\CustomerModule\CustomerUpdator;
use App\EntityPbModule\EntityUpdator;
use App\Interfaces\IUpdator;
use App\Protobuff\PaymentModeEnum;
use App\Protobuff\PaymentStatusEnum;

class PaymentUpdator implements IUpdator
{

    private $entityUpdator;
    private $customerUpdator;
    private $timeUpdator;
    private $m_refUpdator;

    public function __construct()
    {
        $this->entityUpdator = new EntityUpdator();
        $this->customerUpdator = new CustomerUpdator();
        $this->timeUpdator = new TimeUpdator();
        $this->m_refUpdator = new BaseRefConvertorAndUpdator();
    }

    public function update($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $array = array_merge($array, $this->entityUpdator->update($pb->getDbInfo()));
        }
        if($pb->getMode() == PaymentModeEnum::GOOGLE_PAY) {
            if (Strings::notEmpty($pb->getTxnId()) && $pb->getMode() == PaymentModeEnum::GOOGLE_PAY) {
                $array[PaymentIndexers::getTRANSACTION_ID()] = $pb->getTxnId();
            } else {
                throw new Exception("without trancestion id Payment not cretaed");
            }
            if (Strings::notEmpty($pb->getResponseCode()) && $pb->getMode() == PaymentModeEnum::GOOGLE_PAY) {
                $array[PaymentIndexers::getRESPONSE_CODE()] = $pb->getResponseCode();
            } else {
                throw new Exception("without Response Code  Payment not cretaed");
            }
            if (Strings::notEmpty($pb->getTxnRef()) && $pb->getMode() == PaymentModeEnum::GOOGLE_PAY) {
                $array[PaymentIndexers::getTRANSACTION_REF()] = $pb->getTxnRef();
            } else {
                throw new Exception("TxnRef cannot be empty");
            }
        }
        if ($pb->getStatus() != PaymentStatusEnum::UNKNOWN_PAYMENT_STATUS) {
            $array[PaymentIndexers::getPAYMENT_STATUS()] = PaymentStatusEnum::name($pb->getStatus());
        } else {
            $array[PaymentIndexers::getPAYMENT_STATUS()] = PaymentStatusEnum::name(PaymentStatusEnum::PENDING_OR_NOT_DONE_YET);
        }
        $array = array_merge($array, $this->customerUpdator->refUpdate($pb->getCustomerRef()));
        if ($pb->getMode() != PaymentModeEnum::UNKNOWN_MODE) {
            $array[PaymentIndexers::getPAYMENT_MODE()] = PaymentModeEnum::name($pb->getMode());
        } else {
            throw new Exception("PaymentStatus cannot be unknown");
        }
        $array[PaymentIndexers::getAMOUNT()] = $pb->getAmount();
        $array = array_merge($array, $this->timeUpdator->update($pb->getTime()));
        return $array;
    }

    public function refUpdate($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getId())) {
            $pbArray[PaymentIndexers::getPAYMENT_REF_ID()] = $pb->getId();
            $pbArray[PaymentIndexers::getPAYMENT_REF()] = $this->m_refUpdator->update($pb);
        }
        return $pbArray;
    }
}

?>
