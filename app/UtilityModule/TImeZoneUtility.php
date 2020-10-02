<?php

namespace App\UtilityModule;

use Exception;
use App\Protobuff\TimeZoneEnum;

class TimeZoneUtility {

    public function getTimeZome($timeZoneEnum){
        var_dump($timeZoneEnum);
        switch ($timeZoneEnum) {
            case TimeZoneEnum::IST:
                return 'Asia/Kolkata';
            default:
                return new Exception('Unknown Timezone');
        }
    }

}

?>