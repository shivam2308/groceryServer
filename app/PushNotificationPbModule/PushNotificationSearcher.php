<?php

namespace App\PushNotificationPbModule;

use Exception;
use App\Interfaces\ISearcher;
use App\PushNotificationPbModule\PushNotificationIndexers;

class PushNotificationSearcher implements ISearcher{

    public function search($pb){
        // $searchArray = array();
        // if($pb->getPrivilege() != PrivilegeTypeEnum::UNKNOWN_PREVILAGE){
        //     $searchArray[CustomerIndexers::getPRIVILEGE()] = PrivilegeTypeEnum::name($pb->getPrivilege());
        // }else{
        //     return new Exception("PrivilegeTypeEnum cannot be UNKNOWN_PREVILAGE");
        // }
        // return $searchArray;
    }
}

?>