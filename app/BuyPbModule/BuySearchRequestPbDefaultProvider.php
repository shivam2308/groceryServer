<?php

namespace App\BuyPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\BuySearchRequestPb;
use App\Protobuff\DeliveryStatusEnum;

class BuySearchRequestPbDefaultProvider implements IDefaultPbProvider{
    
    public function getDefaultPb(){
        $pb = new BuySearchRequestPb();
        //$pb->setDeliveryStatus(DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS);
        return $pb;
    }
    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}

?>