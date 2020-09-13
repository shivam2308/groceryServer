<?php

namespace App\EntityPbModule;

use BenSampo\Enum\Enum;

class EntityIndexers extends Enum{
    const DBID = 'DBID';
    const LIFETIME = 'LIFETIME';
    const DEFAULT_TIMEZONE = 'DEFAULT_TIMEZONE';

    public static function getDBID(){
        return EntityIndexers::fromValue(EntityIndexers::DBID);
    }
    public static function getLIFETIME(){
        return EntityIndexers::fromValue(EntityIndexers::LIFETIME);
    }
    public static function getDEFAULT_TIMEZONE(){
        return EntityIndexers::fromValue(EntityIndexers::DEFAULT_TIMEZONE);
    }

}

?>