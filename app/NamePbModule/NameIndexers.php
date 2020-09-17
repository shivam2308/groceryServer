<?php

namespace App\NamePbModule;

use BenSampo\Enum\Enum;

class NameIndexers extends Enum{
    const FIRSTNAME = 'FIRSTNAME';
    const LASTNAME = 'LASTNAME';
    const CANONICAL_NAME = 'CANONICAL_NAME';

    public static function getFIRSTNAME(){
        return NameIndexers::fromValue(NameIndexers::FIRSTNAME);
    }
    public static function getLASTNAME(){
        return NameIndexers::fromValue(NameIndexers::LASTNAME);
    }
    public static function getCANONICAL_NAME(){
        return NameIndexers::fromValue(NameIndexers::CANONICAL_NAME);
    }
}

?>