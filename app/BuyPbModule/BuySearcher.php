<?php

namespace App\BuyPbModule;

use App\BaseCode\Strings;
use App\CustomerModule\CustomerIndexers;
use App\Interfaces\ISearcher;
use App\Protobuff\BuySearchRequestPb;


class BuySearcher implements ISearcher
{

    public function search($pb)
    {
        $searchArray = array();
        /*if($pb->getDeliveryStatus() != DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS){
            $searchArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name($pb->getDeliveryStatus());
        }else{
            return new Exception("DeliveryStatusEnum cannot be UNKNOWN_DELIVERY_STATUS");
        }*/
        if (Strings::notEmpty($pb->getParentOrderId())) {
            $searchArray[BuyIndexers::getPARENT_ORDER_ID()] = $pb->getParentOrderId();
        }
        if (Strings::notEmpty($pb->getCustomerId())) {
            $searchArray[CustomerIndexers::getCUSTOMER_REF_ID()] = $pb->getCustomerId();
        }
        return $searchArray;
    }
}

?>
