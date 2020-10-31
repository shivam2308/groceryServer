<?php 

namespace App\BuyPbModule;

use App\Interfaces\IConvertor;
use App\BuyPbModule\BuyIndexers;
use App\Protobuff\BuyPb;
use App\EntityPbModule\EntityConvertor;
use App\CustomerModule\CustomerConvertor;
use App\ItemPbModule\ItemConvertor;
use App\Protobuff\BuyPbRef;
use App\Protobuff\DeliveryStatusEnum;


class BuyConvertor implements IConvertor {

    private $m_entityConvertor;
    private $m_customerRefConvertor;
    private $m_itemRefConvertor;

    public function __construct(){
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_customerRefConvertor = new CustomerConvertor();
        $this->m_itemRefConvertor = new ItemConvertor();
    }

    public function convert($array){
        $buyPb = new BuyPb();
        $buyPb->setDbInfo($this->m_entityConvertor->convert($array));
        $buyPb->setOrderId($array[BuyIndexers::getORDER_ID()]);
        $buyPb->setCustomerRef($this->m_customerRefConvertor->convert($array));
        $buyPb->setItemRef($this->m_itemRefConvertor->convert($array));
        $buyPb->setQuantity($array[BuyIndexers::getQUANTITY()]);
        $buyPb->setPrice($array[BuyIndexers::getPRICE()]);
        $buyPb->setDeliveryStatus(DeliveryStatusEnum::value($array[BuyIndexers::getDELIVERY_STATUS()]));
        return $buyPb;
    }

    public function refConvert($array)
    {
        $buyRef = new BuyPbRef();
        $buyRef->setId($array[BuyIndexers::getBUY_REF_ID()]);
        $buyRef->setOrderId($array[BuyIndexers::getORDER_ID()]);
        $buyRef->setPrice($array[BuyIndexers::getPRICE()]);
        return $buyRef;
    }
}
?>