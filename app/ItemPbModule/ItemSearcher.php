<?php

namespace App\ItemPbModule;

use Exception;
use App\Interfaces\ISearcher;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;
use App\ItemPbModule\ItemIndexers;

class ItemSearcher implements ISearcher{

    public function search($pb){
        $searchArray = array();
        if($pb->getItemType() != ItemTypeEnum::UNKNOWN_ITEM_TYPE){
            $searchArray[ItemIndexers::getItemType()] = ItemTypeEnum::name($pb->getItemType());
        }else{
            return new Exception("ItemTypeEnum cannot be UNKNOWN_PREVILAGE");
        }
        if($pb->getAvailabilityStatus() != AvailabilityStatusEnum::UNKNOWN_AVAILABILITY_STATUS){
            $searchArray[ItemIndexers::getAvailabilityStatus()] = AvailabilityStatusEnum::name($pb->getAvailabilityStatus());
        }else{
            return new Exception("AvailabilityStatusEnum cannot be UNKNOWN_PREVILAGE");
        }
        return $searchArray;
    }
}

?>