<?php

namespace App\GenderPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class GenderIndexers extends Enum{
    const GENDER = 'GENDER';

    public static function getGENDER(){
        return Enums::value(GenderIndexers::fromValue(GenderIndexers::GENDER));
    }
}

?>