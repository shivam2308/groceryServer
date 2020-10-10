<?php

namespace App\DeliveryManPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\DeliveryManSearchRequestPb;


class DeliveryManSearchRequestPbDefaultProvider implements IDefaultPbProvider{
    
    public function getDefaultPb(){
        $searchReq =  new DeliveryManSearchRequestPb();
        return $searchReq;
    }
}

?>