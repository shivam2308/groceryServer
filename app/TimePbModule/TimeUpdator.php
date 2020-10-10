<?php

namespace App\TimePbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\Protobuff\TimeZoneEnum;
use App\UtilityModule\TimeUtility;
use App\TimePbModule\TimeIndexers;

class TimeUpdator implements IUpdator{

    private $m_timeUtility;

    public function __construct(){
        $this->m_timeUtility = new TimeUtility();
    }

    public function update($pb){
        $pbArray = array();
        if($pb->getTimezone()==TimeZoneEnum::UNKNOWN_TIME_ZONE){
           throw new Exception('Time zone cannot be UNKNOWN');
        }else{
            $pbArray[TimeIndexers::getTIMEZONE()] = TimeZoneEnum::name($pb->getTimezone());
        }
        $timeZone = $pb->getTimezone();
        $milliseconds = $this->m_timeUtility->getMilliseconds();
        if(Strings::isEmpty($pb->getDate())){
            $pbArray[TimeIndexers::getDATE()] = $this->m_timeUtility->getDate($milliseconds,$timeZone);
        }else{
            $pbArray[TimeIndexers::getDATE()] = $pb->getDate();
        }
        if(Strings::isEmpty($pb->getMonth())){
            $pbArray[TimeIndexers::getMONTH()] = $this->m_timeUtility->getMonth($milliseconds,$timeZone);
        }else{
            $pbArray[TimeIndexers::getMONTH()] = $pb->getMonth();
        }
        if(Strings::isEmpty($pb->getYear())){
            $pbArray[TimeIndexers::getYEAR()] = $this->m_timeUtility->getYear($milliseconds,$timeZone);
        }else{
            $pbArray[TimeIndexers::getYEAR()] = $pb->getYear();
        }
        if(Strings::isEmpty($pb->getYear())){
            $pbArray[TimeIndexers::getFORMATTED_DATE()] = $this->m_timeUtility->getFormattedDate($milliseconds,$timeZone);
        }else{
            $pbArray[TimeIndexers::getFORMATTED_DATE()] = $pb->getFormattedDate();
        }
        if($pb->getMilliseconds()==0){
            $pbArray[TimeIndexers::getMILLISECONDS()] = $milliseconds;
        }else{
            $pbArray[TimeIndexers::getMILLISECONDS()] = $pb->getMilliseconds();
        }
        return $pbArray;
    }
}
