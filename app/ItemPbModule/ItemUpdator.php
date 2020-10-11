<?php

namespace App\ItemPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\ItemPbModule\ItemIndexers;
use App\EntityPbModule\EntityUpdator;
use App\NamePbModule\NameUpdator;
use App\ImagePbModule\ImageUpdator;
use App\TimePbModule\TimeUpdator;
use App\Protobuff\AvailabilityStatusEnum;
use App\Protobuff\ItemTypeEnum;

class ItemUpdator implements IUpdator{

    private $m_entityUpdator;
    private $m_nameUpdator;
    private $m_imageUpdator;
    private $m_timeUpdator;

    public function __construct(){
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_nameUpdator = new NameUpdator();
        $this->m_imageUpdator = new ImageUpdator();
        $this->m_timeUpdator = new TimeUpdator();
    }

    public function update($pb){
        $pbArray = array();
        if(Strings::notEmpty($pb->getDbInfo()->getId())){
            $pbArray = array_merge($pbArray,$this->m_entityUpdator->update($pb->getDbInfo()));
        }
        $pbArray = array_merge($pbArray, $this->m_timeUpdator->update($pb->getTime()));
        $pbArray = array_merge($pbArray,$this->m_nameUpdator->update($pb->getItemName()));
        if(Strings::notEmpty($pb->getItemUrl()->getUrl())){
            $pbArray = array_merge($pbArray,$this->m_imageUpdator->update($pb->getItemUrl()));
        }
        if(($pb->getQuantity()) < 0){
            throw new Exception("Item Quantity cannot be empty");
        }else{
            $pbArray[ItemIndexers::getQUANTITY()] = $pb->getQuantity();
        }
        if(($pb->getPrice()) == 0){
            throw new Exception("Item Price cannot be empty");
        }else{
            $pbArray[ItemIndexers::getPRICE()] = $pb->getPrice();
        }
        if ($pb->getAvailabilityStatus() == AvailabilityStatusEnum::UNKNOWN_AVAILABILITY_STATUS) {
            if(($pb->getQuantity()) > 0){
                $pbArray[ItemIndexers::getAVAILABILITYSTATUS()] = AvailabilityStatusEnum::name(AvailabilityStatusEnum::AVAILABLE);
            }
            else{
                $pbArray[ItemIndexers::getAVAILABILITYSTATUS()] = AvailabilityStatusEnum::name(AvailabilityStatusEnum::NOT_AVAILABLE);
            }
            
        } else {
            $pbArray[ItemIndexers::getAVAILABILITYSTATUS()] = AvailabilityStatusEnum::name($pb->getAvailabilityStatus());
        }
        if ($pb->getItemType() == ItemTypeEnum::UNKNOWN_ITEM_TYPE) {
            throw new Exception("Item Type cannot be Unknown");        
        } else {
            $pbArray[ItemIndexers::getITEMTYPE()] = ItemTypeEnum::name($pb->getItemType());
        }
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getId())) {
            $pbArray[ItemIndexers::getITEM_REF_ID()] = $pb->getId();
        }
        $pbArray = array_merge($pbArray, $this->m_nameUpdator->update($pb->getName()));
        $pbArray[ItemIndexers::getPRICE()] = $pb->getPrice();
        return $pbArray;
    }
}

?>