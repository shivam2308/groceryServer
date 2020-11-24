<?php

namespace App\PushNotificationPbModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class PushNotificationRequestHandler extends RequestHandler{

    public function __construct(){
        parent::__construct(new PushNotificationService(),new PushNotificationDefaultProvider(),new PushNotificationSearchRequestPbDefaultProvider());
    }
}

?>