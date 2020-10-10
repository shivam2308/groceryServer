<?php

namespace App\UtilityModule;

use DateTime;
use DateTimeZone;
use Illuminate\Support\Str;
use App\UtilityModule\TimeZoneUtility;

class TimeUtility {

    private $timeZoneUtility;

    public function __construct(){
        $this->timeZoneUtility = new TimeZoneUtility();
    }

    public function getMilliseconds(){
        return round(microtime(true) * 1000);
    }

    public function getFormattedDate($millis,$timezone){
        $unixtime = intval($millis / 1000);
        $dt = new DateTime("@$unixtime");  
        $dt->setTimezone(new DateTimeZone($this->timeZoneUtility->getTimeZome($timezone)));
        return $dt->format('d-m-Y H:i:s'); 
    }

    public function getDate($millis,$timezone){
        $formattedDate = $this->getFormattedDate($millis,$timezone);
        $arr = explode(" ",$formattedDate);
        //list($date,$month,$year) = split('[/.-]', $arr[0]);
        $str = explode("-",$arr[0]);
        return $str[0];
    }
    public function getMonth($millis,$timezone){
        $formattedDate = $this->getFormattedDate($millis,$timezone);
        $arr = explode(" ",$formattedDate);
        $str = explode("-",$arr[0]);
        return $str[1];
    }
    public function getYear($millis,$timezone){
        $formattedDate = $this->getFormattedDate($millis,$timezone);
        $arr = explode(" ",$formattedDate);
        $str = explode("-",$arr[0]);
        return $str[2];
    }



}

?>