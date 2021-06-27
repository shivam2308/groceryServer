<?php

namespace App\CustomerModule;

use PHPUnit\Framework\Exception;
use App\Interfaces\ISearcher;
use App\Protobuff\PrivilegeTypeEnum;
use App\CustomerModule\CustomerIndexers;

class CustomerSearcher implements ISearcher{

    public function search($pb){
        $searchArray = array();
        if($pb->getPrivilege() != PrivilegeTypeEnum::UNKNOWN_PREVILAGE){
            $searchArray[CustomerIndexers::getPRIVILEGE()] = PrivilegeTypeEnum::name($pb->getPrivilege());
        }else{
            throw new Exception("PrivilegeTypeEnum cannot be UNKNOWN_PREVILAGE");
        }
        return $searchArray;
    }
}

?>
