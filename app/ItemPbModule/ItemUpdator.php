<?php

namespace App\ItemPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\ItemPbModule\ItemIndexers;
use App\EntityPbModule\EntityUpdator;
use App\NamePbModule\NameUpdator;
use App\ImagePbModule\ImageUpdator;

class ItemUpdator implements IUpdator{

    private $m_entityUpdator;
    private $m_nameUpdator;
    private $m_imageUpdator;

    public function __construct(){
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_nameUpdator = new NameUpdator();
        $this->m_imageUpdator = new ImageUpdator();
    }

    public function update($pb){
        $pbArray = array();
        if(Strings::notEmpty($pb->getDbInfo()->getId())){
            $pbArray = array_merge($pbArray,$this->m_entityUpdator->update($pb->getDbInfo()));
        }
        if(Strings::notEmpty($pb->getItemName()->getFirstName())){
            $pbArray = array_merge($pbArray,$this->m_nameUpdator->update($pb->getItemName()));
        }
        if(Strings::notEmpty($pb->getItemUrl()->getUrl())){
            $pbArray = array_merge($pbArray,$this->m_imageUpdator->update($pb->getItemUrl()));
        }
        if(Strings::isEmpty($pb->getQuantity())){
            return new Exception("Item Quantity cannot be empty");
        }else{
            $pbArray[ItemIndexers::getQUANTITY()] = $pb->getQuantity();
        }
        if(Strings::isEmpty($pb->getPrice())){
            return new Exception("Item Price cannot be empty");
        }else{
            $pbArray[ItemIndexers::getPRICE()] = $pb->getPrice();
        }
        return $pbArray;
    }
}

?>