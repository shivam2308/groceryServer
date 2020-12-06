<?php

namespace App\ItemPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\ImageRefPb;
use App\Protobuff\ItemPbRef;
use App\Protobuff\ItemPb;
use App\Protobuff\EntityPb;
use App\Protobuff\NamePb;
use App\Protobuff\ImagePb;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;
use App\Protobuff\TimePb;

class ItemPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        $pb = new ItemPb();
        $pb->setDbInfo(new EntityPb());
        $pb->setTime(new TimePb());
        $pb->setItemName(new NamePb());
        $pb->setItemImage(new ImageRefPb());
        $pb->setItemType(ItemTypeEnum::UNKNOWN_ITEM_TYPE);
        $pb->setAvailabilityStatus(AvailabilityStatusEnum::UNKNOWN_AVAILABILITY_STATUS);
        return $pb;
    }

    public function getDefaultRefPb()
    {
        $itemPbRef = new ItemPbRef();
        $itemPbRef->setItemName(new NamePb());
        return $itemPbRef;
    }
}

?>
