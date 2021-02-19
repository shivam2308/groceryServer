<?php

namespace App\PushNotificationPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\PushNotificationSearchRequestPb;

class PushNotificationSearchRequestPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new PushNotificationSearchRequestPb();
        return $pb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}

?>
