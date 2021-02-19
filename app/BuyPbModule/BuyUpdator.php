<?php

namespace App\BuyPbModule;

use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\BaseCode\JsonConvertor\JsonConvertor;
use App\BaseCode\Strings;
use App\CustomerModule\CustomerUpdator;
use App\DeliveryManPbModule\DeliveryManUpdator;
use App\EntityPbModule\EntityUpdator;
use App\Interfaces\IUpdator;
use App\ItemPbModule\ItemUpdator;
use App\PaymentPbModule\PaymentUpdator;
use App\Protobuff\BuyPb;
use App\Protobuff\DeliveryStatusEnum;
use App\TimePbModule\TimeUpdator;
use App\UtilityModule\TimeUtility;
use Exception;


class BuyUpdator implements IUpdator
{

    private $m_entityUpdator;
    private $m_customerUpdator;
    private $m_itemUpdator;
    private $m_refUpdator;
    private $m_timeUpdator;
    private $m_createOrderId;
    private $m_devliveryManUpdator;
    private $m_paymentUpdator;
    private $m_timeUtility;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_customerUpdator = new CustomerUpdator();
        $this->m_itemUpdator = new ItemUpdator();
        $this->m_refUpdator = new BaseRefConvertorAndUpdator();
        $this->m_timeUpdator = new TimeUpdator();
        $this->m_createOrderId = new BuyHelper();
        $this->m_devliveryManUpdator = new DeliveryManUpdator();
        $this->m_paymentUpdator = new PaymentUpdator();
        $this->m_timeUtility = new TimeUtility();
    }

    public function update($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $pbArray = array_merge($pbArray, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
        $pbArray = array_merge($pbArray, $this->m_customerUpdator->refUpdate($pb->getCustomerRef()));

        $pbArray = array_merge($pbArray, $this->m_itemUpdator->refUpdate($pb->getItemRef()));
        $pbArray = array_merge($pbArray, $this->m_paymentUpdator->refUpdate($pb->getPaymentRef()));
        if (Strings::notEmpty($pb->getOrderId())) {
            $pbArray[BuyIndexers::getORDER_ID()] = $pb->getOrderId();
        } else {
            $pbArray[BuyIndexers::getORDER_ID()] = $this->m_createOrderId->createOrderId($pb->getCustomerRef()->getId(), $pb->getItemRef()->getId());
        }
        if (($pb->getQuantity()) < 0) {
            throw new Exception("Buy Quantity cannot be empty");
        } else {
            $pbArray[BuyIndexers::getQUANTITY()] = $pb->getQuantity();
        }
        if (($pb->getPrice()) == 0) {
            //echo("this is my price" + var_dump($pb->getItemRef()->getprice()) );
            $pbArray[BuyIndexers::getPRICE()] = $pb->getQuantity() * $pb->getItemRef()->getprice();
        } else {
            $pbArray[BuyIndexers::getPRICE()] = $pb->getPrice();
        }

        if ($pb->getDeliveryStatus() == DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS) {
            $pbArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name(DeliveryStatusEnum::PENDING);
        } else {
            $pbArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name($pb->getDeliveryStatus());
        }
        $pbArray = array_merge($pbArray, $this->m_timeUpdator->update($pb->getTime()));
        if (Strings::notEmpty($pb->getParentOrderId())) {
            $pbArray[BuyIndexers::getPARENT_ORDER_ID()] = $pb->getParentOrderId();
        } else {
            $pbArray[BuyIndexers::getPARENT_ORDER_ID()] = $this->m_createOrderId->createParentOrderId($pb->getCustomerRef()->getId(), $pb->getPaymentRef()->getId());
        }
        if (Strings::notEmpty($pb->getDeliverytime()->getFormattedDate())) {
            $pbArray[BuyIndexers::getDELIVERY_DATE()] = $pb->getDeliverytime()->getDate();
            $pbArray[BuyIndexers::getDELIVERY_MONTH()] = $pb->getDeliverytime()->getMonth();
            $pbArray[BuyIndexers::getDELIVERY_YEAR()] = $pb->getDeliverytime()->getYear();
            $pbArray[BuyIndexers::getDELIVERY_MILLISECONDS()] = $pb->getDeliverytime()->getMilliseconds();
            $pbArray[BuyIndexers::getDELIVERY_FORMATTED_DATE()] = $pb->getDeliverytime()->getFormattedDate();
        } elseif ($pb->getDeliveryStatus() == DeliveryStatusEnum::DELIVERED) {
            if ($pb->getDeliverytime()->getMilliseconds() != 0) {
                $pbArray[BuyIndexers::getDELIVERY_MILLISECONDS()] = $pb->getDeliverytime()->getMilliseconds();
                $pbArray[BuyIndexers::getDELIVERY_DATE()] = $this->m_timeUtility->getDate($pb->getDeliverytime()->getMilliseconds(), $pb->getDbInfo()->getLocale()->getDefaultTimeZone());
                $pbArray[BuyIndexers::getDELIVERY_MONTH()] = $this->m_timeUtility->getMonth($pb->getDeliverytime()->getMilliseconds(), $pb->getDbInfo()->getLocale()->getDefaultTimeZone());
                $pbArray[BuyIndexers::getDELIVERY_YEAR()] = $this->m_timeUtility->getYear($pb->getDeliverytime()->getMilliseconds(), $pb->getDbInfo()->getLocale()->getDefaultTimeZone());
                $pbArray[BuyIndexers::getDELIVERY_FORMATTED_DATE()] = $this->m_timeUtility->getFormattedDate($pb->getDeliverytime()->getMilliseconds(), $pb->getDbInfo()->getLocale()->getDefaultTimeZone());
            } else {
                throw new Exception("Without milliseconds You cannot set status Deliverd");
            }
        }
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getId())) {
            $pbArray[BuyIndexers::getBUY_REF_ID()] = $pb->getId();
            $pbArray[BuyIndexers::getBUY_REF()] = $this->m_refUpdator->update($pb);
        }
        return $pbArray;
    }
}

?>
