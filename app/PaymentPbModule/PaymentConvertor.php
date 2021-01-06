<?php

namespace App\PaymentPbModule;


use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\BuyPbModule\BuyIndexers;
use App\CustomerModule\CustomerConvertor;
use App\EntityPbModule\EntityConvertor;
use App\Interfaces\IConvertor;
use App\Protobuff\BuyPbRef;
use App\Protobuff\PaymentModeEnum;
use App\Protobuff\PaymentPb;
use App\Protobuff\PaymentPbRef;
use App\Protobuff\PaymentStatusEnum;
use App\TimePbModule\TimeConvertor;

class PaymentConvertor implements IConvertor
{

    private $entityConvertor;
    private $customerConvertor;
    private $timeConvertor;
    private $m_refConvertor;

    public function __construct()
    {
        $this->customerConvertor = new CustomerConvertor();
        $this->entityConvertor = new EntityConvertor();
        $this->timeConvertor = new TimeConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
    }


    public function convert($array)
    {
        $paymentPb = new PaymentPb();
        $paymentPb->setDbInfo($this->entityConvertor->convert($array));
        $paymentPb->setTxnId($array[PaymentIndexers::getTRANSACTION_ID()]);
        $paymentPb->setResponseCode($array[PaymentIndexers::getRESPONSE_CODE()]);
        $paymentPb->setStatus(PaymentStatusEnum::value($array[PaymentIndexers::getPAYMENT_STATUS()]));
        $paymentPb->setTxnRef($array[PaymentIndexers::getTRANSACTION_REF()]);
        $paymentPb->setCustomerRef($this->customerConvertor->refConvert($array));
        $paymentPb->setMode(PaymentModeEnum::value($array[PaymentIndexers::getPAYMENT_MODE()]));
        $paymentPb->setAmount($array[PaymentIndexers::getAMOUNT()]);
        $paymentPb->setTime($this->timeConvertor->convert($array));
        return $paymentPb;
    }

    public function refConvert($array)
    {
        $paymentRef = new PaymentPbRef();
        return $this->m_refConvertor->convert($array[PaymentIndexers::getPAYMENT_REF()], $paymentRef);
    }
}

?>
