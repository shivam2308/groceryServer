<?php

namespace App\UtilityModule;

use Exception;
use App\Protobuff\TimeZoneEnum;

class TimeZoneUtility
{

    public function getTimeZome($timeZoneEnum){
        switch ($timeZoneEnum) {
            case TimeZoneEnum::IST:
                return 'Asia/Kolkata';
            default:
                return new Exception('Unknown Timezone');
        }
    }
}
