<?php

namespace App\TimePbModule;

use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\TimePbModule\TimeIndexers;
use App\Protobuff\TimeZoneEnum;
use App\Protobuff\TimePb;

class TimeConvertor implements IConvertor
{

    public function convert($array)
    {
        $timePb = new TimePb();
        $timePb->setDate($array[TimeIndexers::getDATE()]);
        $timePb->setMonth($array[TimeIndexers::getMONTH()]);
        $timePb->setYear($array[TimeIndexers::getYEAR()]);
        $timePb->setMilliseconds($array[TimeIndexers::getMILLISECONDS()]);
        $timePb->setFormattedDate($array[TimeIndexers::getFORMATTED_DATE()]);
        if (Strings::notEmpty($array[TimeIndexers::getTIMEZONE()])) {
            $timePb->setTimezone(TimeZoneEnum::value($array[TimeIndexers::getTIMEZONE()]));
        } else {
            // $timePb->setTimezone(TimeZoneEnum::value(TimeZoneEnum::UNKNOWN_TIME_ZONE));
        }
        return $timePb;
    }
    public function refConvert($array)
    {
        return NULL;
    }
}
