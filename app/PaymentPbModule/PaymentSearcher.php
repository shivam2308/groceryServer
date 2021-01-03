<?php

namespace App\PaymentPbModule;

use App\BaseCode\Strings;
use App\CustomerModule\CustomerIndexers;
use App\Interfaces\ISearcher;
use App\ItemPbModule\ItemIndexers;
use App\PaymentPbModule;
use App\PaymentPbModule\PaymentIndexers;
use App\Protobuff\AvailabilityStatusEnum;
use App\Protobuff\ItemTypeEnum;
use App\Protobuff\PaymentModeEnum;
use App\Protobuff\PaymentStatusEnum;

class PaymentSearcher implements ISearcher
{

    public function search($pb)
    {
        $pb = new \App\Protobuff\PaymentSearchRequestPb();
        $searchArray = array();
        if ($pb->getStatus() != PaymentStatusEnum::UNKNOWN_PAYMENT_STATUS) {
            $searchArray[PaymentIndexers::getPAYMENT_STATUS()] = PaymentStatusEnum::name($pb->getStatus());
        } else {
            //  throw new Exception("ItemTypeEnum cannot be UNKNOWN_ITEM_TYPE");
        }
        if ($pb->getMode() != PaymentModeEnum::UNKNOWN_MODE) {
            $searchArray[PaymentIndexers::getPAYMENT_MODE()] = PaymentModeEnum::name($pb->getMode());
        } else {
            //  throw new Exception("AvailabilityStatusEnum cannot be UNKNOWN_AVAILABILITY_STATUS");
        }
        if (Strings::notEmpty($pb->getCustomerRef())) {
            $searchArray[CustomerIndexers::getCUSTOMER_REF_ID()] = $pb->getCustomerRef();
        }
        //$searchArray = array_merge($searchArray, $this->timeSearcher->search($pb->getTimeQuery()));
        return $searchArray;
    }
}

?>
