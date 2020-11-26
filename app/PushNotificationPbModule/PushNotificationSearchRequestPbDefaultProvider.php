<?php

namespace App\PushNotificationPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\PushNotificationSearchRequestPb;

class PushNotificationSearchRequestPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        //$pb = new PushNotificationSearchRequestPb();
       // $pb->setPrivilege(PrivilegeTypeEnum::UNKNOWN_PREVILAGE);
       // return $pb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}

?>
