<?php

namespace App\CustomerModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\CustomerPb;
use App\Protobuff\EntityPb;
use App\Protobuff\LocalePb;
use App\Protobuff\PrivilegeTypeEnum;

class CustomerPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        $pb = new CustomerPb();
        $pb->setDbInfo(new EntityPb());
        $pb->getDbInfo()->setLocale(new LocalePb());
        $pb->setPrivilege(PrivilegeTypeEnum::UNKNOWN_PREVILAGE);
        return $pb;
    }

}

?>