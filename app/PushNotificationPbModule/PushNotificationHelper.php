<?php


namespace App\PushNotificationPbModule;


use App\Protobuff\PushNotificationPbRef;

class PushNotificationHelper
{
    private $defaultPbProvider;

    public function __construct()
    {
        $this->defaultPbProvider = new PushNotificationDefaultProvider();
    }

    public function getPushNotificationRef($pushNotificationPb)
    {
        $pushNotificationRef = $this->defaultPbProvider->getDefaultRefPb();
        $pushNotificationRef->setId($pushNotificationPb->getDbInfo()->getId());
        return $pushNotificationRef;
    }
}
