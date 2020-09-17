<?php

namespace App\CustomerModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\CustomerSearchRequestPb;
use App\Protobuff\PrivilegeTypeEnum;

class CustomerSearchRequestPbDefaultProvider implements IDefaultPbProvider{
    
    public function getDefaultPb(){
        $pb = new CustomerSearchRequestPb();
        $pb->setPrivilege(PrivilegeTypeEnum::UNKNOWN_PREVILAGE);
        return $pb;
    }
}

?>