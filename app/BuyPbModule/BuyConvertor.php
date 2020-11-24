<?php

namespace App\BuyPbModule;

use App\DeliveryManPbModule\DeliveryManConvertor;
use App\Interfaces\IConvertor;
use App\BuyPbModule\BuyIndexers;
use App\Protobuff\BuyPb;
use App\EntityPbModule\EntityConvertor;
use App\TimePbModule\TimeConvertor;
use App\CustomerModule\CustomerConvertor;
use App\ItemPbModule\ItemConvertor;
use App\Protobuff\BuyPbRef;
use App\Protobuff\DeliveryStatusEnum;
use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;


class BuyConvertor implements IConvertor {

    private $m_entityConvertor;
    private $m_customerRefConvertor;
    private $m_itemRefConvertor;
    private $m_refConvertor;
    private $m_timeConvertor;
    private $m_deliveryManConvert;

    public function __construct(){
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_customerRefConvertor = new CustomerConvertor();
        $this->m_itemRefConvertor = new ItemConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
        $this->m_timeConvertor = new TimeConvertor();
        $this->m_deliveryManConvert = new DeliveryManConvertor();
    }

    public function convert($array){
        $buyPb = new BuyPb();
        $buyPb->setDbInfo($this->m_entityConvertor->convert($array));
        $buyPb->setOrderId($array[BuyIndexers::getORDER_ID()]);
        $buyPb->setCustomerRef($this->m_customerRefConvertor->refConvert($array));
        $buyPb->setItemRef($this->m_itemRefConvertor->refConvert($array));
        $buyPb->setQuantity($array[BuyIndexers::getQUANTITY()]);
        $buyPb->setPrice($array[BuyIndexers::getPRICE()]);
        $buyPb->setDeliveryStatus(DeliveryStatusEnum::value($array[BuyIndexers::getDELIVERY_STATUS()]));
        $buyPb->setTime($this->m_timeConvertor->convert($array));
        $buyPb->setDeliveryManRef($this->m_deliveryManConvert->refConvert($array));
        return $buyPb;
    }

    public function refConvert($array)
    {
        $buyRef = new BuyPbRef();
        return $this->m_refConvertor->convert($array[BuyIndexers::getBUY_REF()], $buyRef);
    }
}
?>
