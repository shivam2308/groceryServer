<?php

namespace App\BuyPbModule;

use App\BaseCode\Strings;
use App\CustomerModule\CustomerIndexers;
use App\DeliveryManPbModule\DeliveryManIndexers;
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
        if (Strings::notEmpty($pb->getDeliveryManRefId())) {
            $searchArray[DeliveryManIndexers::getDELIVERY_MAN_REF_ID()] = $pb->getDeliveryManRefId();
        }
        return $searchArray;
    }
}

?>
