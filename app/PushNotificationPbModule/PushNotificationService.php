<?php

namespace App\PushNotificationPbModule;

use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\PushNotificationPb;
use App\PushNotificationPbModule\PushNotificationConvertor;
use App\PushNotificationPbModule\PushNotificationUpdator;
use App\PushNotificationPbModule\PushNotificationTableName;
use App\PushNotificationPbModule\PushNotificationSearcher;
use App\Protobuff\PushNotificationSearchResponsePb;

class PushNotificationService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new PushNotificationPb(),new PushNotificationUpdator(), new PushNotificationConvertor(), new PushNotificationSearcher(), new PushNotificationSearchResponsePb(), PushNotificationTableName::getTableName());
    }
}

?>
