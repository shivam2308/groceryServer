<?php

namespace App\BuyPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\BuyPb;
use App\Protobuff\EntityPb;
use App\Protobuff\CustomerPbRef;
use App\Protobuff\ItemPbRef;
use App\Protobuff\DeliveryStatusEnum;


class BuyPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        $pb = new BuyPb();
        $pb->setDbInfo(new EntityPb());
        $pb->setOrderId(BuyIndexers::value(null));
        $pb->setCustomerRef(new CustomerPbRef());
        $pb->setItemRef(new ItemPbRef());
        $pb->setQuantity(BuyIndexers::value(0));
        $pb->setPrice(BuyIndexers::value(0.0));
        $pb->setDeliveryStatus(DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS);
        return $pb;
    }

}

?>