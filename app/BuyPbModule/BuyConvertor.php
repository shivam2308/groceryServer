<?php

namespace App\BuyPbModule;

use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\CustomerModule\CustomerConvertor;
use App\DeliveryManPbModule\DeliveryManConvertor;
use App\EntityPbModule\EntityConvertor;
use App\Interfaces\IConvertor;
use App\ItemPbModule\ItemConvertor;
use App\PaymentPbModule\PaymentConvertor;
use App\Protobuff\BuyPb;
use App\Protobuff\BuyPbRef;
use App\Protobuff\DeliveryStatusEnum;
use App\TimePbModule\TimeConvertor;


class BuyConvertor implements IConvertor
{

    private $m_entityConvertor;
    private $m_customerRefConvertor;
    private $m_itemRefConvertor;
    private $m_refConvertor;
    private $m_timeConvertor;
    private $m_deliveryManConvert;
    private $m_paymentConvertor;
    private $buyPbDefaultProvider;

    public function __construct()
    {
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_customerRefConvertor = new CustomerConvertor();
        $this->m_itemRefConvertor = new ItemConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
        $this->m_timeConvertor = new TimeConvertor();
        $this->m_deliveryManConvert = new DeliveryManConvertor();
        $this->m_paymentConvertor = new PaymentConvertor();
        $this->buyPbDefaultProvider = new BuyPbDefaultProvider();
    }

    public function convert($array)
    {
        $buyPb = $this->buyPbDefaultProvider->getDefaultPb();
        $buyPb->setDbInfo($this->m_entityConvertor->convert($array));
        $buyPb->setOrderId($array[BuyIndexers::getORDER_ID()]);
        $buyPb->setCustomerRef($this->m_customerRefConvertor->refConvert($array));
        $buyPb->setItemRef($this->m_itemRefConvertor->refConvert($array));
        $buyPb->setQuantity($array[BuyIndexers::getQUANTITY()]);
        $buyPb->setPrice($array[BuyIndexers::getPRICE()]);
        $buyPb->setDeliveryStatus(DeliveryStatusEnum::value($array[BuyIndexers::getDELIVERY_STATUS()]));
        $buyPb->setTime($this->m_timeConvertor->convert($array));
        $buyPb->setDeliveryManRef($this->m_deliveryManConvert->refConvert($array));
        $buyPb->setPaymentRef($this->m_paymentConvertor->refConvert($array));
        $buyPb->setParentOrderId($array[BuyIndexers::getPARENT_ORDER_ID()]);
        if (DeliveryStatusEnum::value($array[BuyIndexers::getDELIVERY_STATUS()]) == DeliveryStatusEnum::DELIVERED) {
            $buyPb->getDeliverytime()->setDate($array[BuyIndexers::getDELIVERY_DATE()]);
            $buyPb->getDeliverytime()->setMonth($array[BuyIndexers::getDELIVERY_MONTH()]);
            $buyPb->getDeliverytime()->setYear($array[BuyIndexers::getDELIVERY_YEAR()]);
            $buyPb->getDeliverytime()->setMilliseconds($array[BuyIndexers::getDELIVERY_MILLISECONDS()]);
            $buyPb->getDeliverytime()->setFormattedDate($array[BuyIndexers::getDELIVERY_FORMATTED_DATE()]);
        }
        return $buyPb;
    }

    public function refConvert($array)
    {
        $buyRef = new BuyPbRef();
        return $this->m_refConvertor->convert($array[BuyIndexers::getBUY_REF()], $buyRef);
    }
}

?>
