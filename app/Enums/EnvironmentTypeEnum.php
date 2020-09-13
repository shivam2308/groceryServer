<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class EnvironmentTypeEnum extends Enum{
    const DEVEL = 'DEVEL';
    const PROD = 'PROD';


    public static function getDevel(){
        return EnvironmentTypeEnum::fromValue(EnvironmentTypeEnum::DEVEL);
    }

    public static function getProd(){
        return EnvironmentTypeEnum::fromValue(EnvironmentTypeEnum::PROD);
    }
}

?>