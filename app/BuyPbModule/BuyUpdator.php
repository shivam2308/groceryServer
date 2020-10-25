<?php

namespace App\BuyPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\BuyPbModule\BuyIndexers;
use App\EntityPbModule\EntityUpdator;
use App\CustomerModule\CustomerUpdator;
use App\ItemPbModule\ItemUpdator;
use App\Protobuff\DeliveryStatusEnum;


class BuyUpdator implements IUpdator {
    
    private $m_entityUpdator;
    private $m_customerUpdator;
    private $m_itemUpdator;

    public function __construct(){
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_customerUpdator = new CustomerUpdator();
        $this->m_itemUpdator = new ItemUpdator();
    }

    public function update($pb){
        $pbArray = array();
        if(Strings::notEmpty($pb->getDbInfo()->getId())){
            $pbArray = array_merge($pbArray,$this->m_entityUpdator->update($pb->getDbInfo()));
        }
        if(Strings::notEmpty($pb->getOrder_id())){
            $pbArray[BuyIndexers::getORDER_ID()] = $pb->getOrder_id();
        }
        $pbArray = array_merge($pbArray, $this->m_customerUpdator->update($pb->getCustomerRef()));
        $pbArray = array_merge($pbArray,$this->m_itemUpdator->update($pb->getItemRef()));
        if(($pb->getQuantity()) < 0){
            throw new Exception("Buy Quantity cannot be empty");
        }else{
            $pbArray[BuyIndexers::getQUANTITY()] = $pb->getQuantity();
        }
        if(($pb->getPrice()) == 0){
            throw new Exception("Buy Price cannot be empty");
        }else{
            $pbArray[BuyIndexers::getPRICE()] = $pb->getPrice();
        }
        
        if ($pb->getDeliveryStatus() == DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS) {
            throw new Exception("DeliveryStatusEnum cannot be Unknown");        
        } else {
            $pbArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name($pb->getDeliveryStatus());
        }
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getId())) {
            $pbArray[BuyIndexers::getBUY_REF_ID()] = $pb->getId();
        }
        $pbArray[BuyIndexers::getQUANTITY()] = $pb->getQuantity();
        $pbArray[BuyIndexers::getPRICE()] = $pb->getPrice();
        return $pbArray;
    }
}

?>