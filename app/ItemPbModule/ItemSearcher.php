<?php

namespace App\ItemPbModule;

use App\TimePbModule\TimeSeacher;
use App\Interfaces\ISearcher;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;
use App\ItemPbModule\ItemIndexers;

class ItemSearcher implements ISearcher
{
    private $timeSearcher;

    public function __construct()
    {
        $this->timeSearcher = new TimeSeacher();
    }

    public function search($pb)
    {
        $searchArray = array();
        if ($pb->getItemType() != ItemTypeEnum::UNKNOWN_ITEM_TYPE) {
            $searchArray[ItemIndexers::getItemType()] = ItemTypeEnum::name($pb->getItemType());
        } else {
          //  throw new Exception("ItemTypeEnum cannot be UNKNOWN_ITEM_TYPE");
        }
        if ($pb->getAvailabilityStatus() != AvailabilityStatusEnum::UNKNOWN_AVAILABILITY_STATUS) {
            $searchArray[ItemIndexers::getAvailabilityStatus()] = AvailabilityStatusEnum::name($pb->getAvailabilityStatus());
        } else {
          //  throw new Exception("AvailabilityStatusEnum cannot be UNKNOWN_AVAILABILITY_STATUS");
        }
        $searchArray = array_merge($searchArray, $this->timeSearcher->search($pb->getTimeQuery()));
        return $searchArray;
    }
}
