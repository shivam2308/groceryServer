<?php

namespace App\PushNotificationPbModule;

use App\BaseCode\JsonConvertor\JsonConvertor;
use App\BaseCode\Strings;
use App\CustomerModule\CustomerIndexers;
use App\Interfaces\ISearcher;
use App\Protobuff\PushNotificationSearchRequestPb;

class PushNotificationSearcher implements ISearcher
{

    public function search($pb)
    {
        $searchArray = array();
        if (Strings::notEmpty($pb->getCustomerRefId())) {
            $searchArray[CustomerIndexers::getCUSTOMER_REF_ID()] = $pb->getCustomerRefId();
        }
        return $searchArray;
    }
}

?>
