<?php


namespace App\SendPushNotification;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class SendPushNotificationRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new SendPushNotificationService(), new SendPushNotificationDefaultPbProvider(), null);
    }
}
