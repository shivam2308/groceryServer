<?php


namespace App\PushNotificationPbModule;


use App\BaseCache\ACache;
use App\Protobuff\PushNotificationPb;

class PushNotificationCache extends ACache
{
    public function __construct()
    {
        parent::__construct(new PushNotificationService(), new PushNotificationPb());
    }
}
