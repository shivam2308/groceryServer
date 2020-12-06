<?php

namespace App\ItemPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\ItemSearchRequestPb;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;
use App\Protobuff\TimeQueryRangePb;

class ItemSearchRequestPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        $pb = new ItemSearchRequestPb();
        $pb->setItemType(ItemTypeEnum::UNKNOWN_ITEM_TYPE);
        $pb->setAvailabilityStatus(AvailabilityStatusEnum::UNKNOWN_AVAILABILITY_STATUS);
        $pb->setTimeQuery(new TimeQueryRangePb());
        return $pb;
    }
    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}

?>
