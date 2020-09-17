<?php

namespace App\EntityPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class EntityIndexers extends Enum{
    const DBID = 'DBID';
    const LIFETIME = 'LIFETIME';
    const DEFAULT_TIMEZONE = 'DEFAULT_TIMEZONE';

    public static function getDBID(){
        return Enums::value(EntityIndexers::fromValue(EntityIndexers::DBID));
       
    }
    public static function getLIFETIME(){
        return Enums::value(EntityIndexers::fromValue(EntityIndexers::LIFETIME));
        
    }
    public static function getDEFAULT_TIMEZONE(){
        return Enums::value(EntityIndexers::fromValue(EntityIndexers::DEFAULT_TIMEZONE));
        
    }

    /*private function getValue($key){
        return $key["value"];
    }*/

}

?>