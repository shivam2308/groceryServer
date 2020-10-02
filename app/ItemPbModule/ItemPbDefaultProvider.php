<?php

namespace App\ItemPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\ItemPb;
use App\Protobuff\EntityPb;
use App\Protobuff\NamePb;
use App\Protobuff\ImagePb;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\AvailabilityStatusEnum;

class ItemPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        $pb = new ItemPb();
        $pb->setDbInfo(new EntityPb());
        $pb->setItemName(new NamePb());
        $pb->setItemUrl(new ImagePb());
        $pb->setItemType(ItemTypeEnum::UNKNOWN_ITEM_TYPE);
        $pb->setAvailabilityStatus(AvailabilityStatusEnum::UNKNOWN_AVAILABILITY_STATUS);
        return $pb;
    }

}

?>