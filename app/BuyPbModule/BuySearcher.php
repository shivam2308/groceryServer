<?php

namespace App\BuyPbModule;

use Exception;
use App\Interfaces\ISearcher;
use App\Protobuff\DeliveryStatusEnum;
use App\BuyPbModule\BuyIndexers;

class BuySearcher implements ISearcher{

    public function search($pb){
        $searchArray = array();
        if($pb->getDeliveryStatus() != DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS){
            $searchArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name($pb->getDeliveryStatus());
        }else{
            return new Exception("DeliveryStatusEnum cannot be UNKNOWN_DELIVERY_STATUS");
        }
        return $searchArray;
    }
}

?>