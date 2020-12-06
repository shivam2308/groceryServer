<?php

namespace App\TimePbModule;


use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class TimeIndexers  extends Enum{
    const DATE = 'DATE';
    const MONTH = 'MONTH';
    const YEAR = 'YEAR';
    const MILLISECONDS = 'MILLISECONDS';
    const FORMATTED_DATE = 'FORMATTED_DATE';
    const TIMEZONE = 'TIMEZONE';

    //use for search only
    const START_MILLIS = 'START_MIIILIS';
    const END_MILLIS = 'END_MILLIS';

    public static function getDATE(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::DATE));
    }

    public static function getMONTH(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::MONTH));
    }

    public static function getYEAR(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::YEAR));
    }

    public static function getFORMATTED_DATE(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::FORMATTED_DATE));
    }

    public static function getMILLISECONDS(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::MILLISECONDS));
    }

    public static function getTIMEZONE(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::TIMEZONE));
    }
    public static function getSTART_MILLIS(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::START_MILLIS));
    }
    public static function getEND_MILLIS(){
        return Enums::value(TimeIndexers::fromValue(TimeIndexers::END_MILLIS));
    }
}

?>
