<?php

namespace App\NamePbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class NameIndexers extends Enum{
    const FIRSTNAME = 'FIRSTNAME';
    const LASTNAME = 'LASTNAME';
    const CANONICAL_NAME = 'CANONICAL_NAME';

    public static function getFIRSTNAME(){
        return Enums::value(NameIndexers::fromValue(NameIndexers::FIRSTNAME));
    }
    public static function getLASTNAME(){
        return Enums::value(NameIndexers::fromValue(NameIndexers::LASTNAME));
    }
    public static function getCANONICAL_NAME(){
        return Enums::value(NameIndexers::fromValue(NameIndexers::CANONICAL_NAME));
    }
}

?>