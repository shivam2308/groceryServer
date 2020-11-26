<?php


namespace App\SendPushNotification;


use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\SendPushNotificationPb;

class SendPushNotificationDefaultPbProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $sendPushNotification = new SendPushNotificationPb();
        return $sendPushNotification;
    }

    public function getDefaultRefPb()
    {

    }
}
