<?php

namespace App\LoginPbModule;


use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class LoginIndexers extends Enum
{
    const MOBILENO = 'MOBILENO';
    public static function getMOBILENO()
    {
        return Enums::value(LoginIndexers::fromValue(LoginIndexers::MOBILENO));
    }
}
