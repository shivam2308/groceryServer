<?php

namespace App\PushNotificationPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class PushNotificationIndexers extends Enum
{
    const TOKEN = 'TOKEN';
    const PUSH_NOTIFICATION_REF_ID = 'PUSH_NOTIFICATION_REF_ID';
    const PUSH_NOTIFICATION_REF = 'PUSH_NOTIFICATION_REF';

    public static function getTOKEN()
    {
        return Enums::value(PushNotificationIndexers::fromValue(PushNotificationIndexers::TOKEN));
    }

    public static function getPUSH_NOTIFICATION_REF_ID()
    {
        return Enums::value(PushNotificationIndexers::fromValue(PushNotificationIndexers::PUSH_NOTIFICATION_REF_ID));
    }
    public static function getPUSH_NOTIFICATION_REF()
    {
        return Enums::value(PushNotificationIndexers::fromValue(PushNotificationIndexers::PUSH_NOTIFICATION_REF));
    }
}
