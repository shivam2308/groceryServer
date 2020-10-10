<?php

namespace App\AddressPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class AddressIndexers extends Enum{
    const HOMENO = 'HOMENO';
    const STREET = 'STREET';
    const LANDMARK = 'LANDMARK';
    const CITY = 'CITY';
    const STATE = 'STATE';
    const PINCODE = 'PINCODE';

    public static function getHOMENO(){
        return Enums::value(AddressIndexers::fromValue(AddressIndexers::HOMENO));
    }
    public static function getSTREET(){
        return Enums::value(AddressIndexers::fromValue(AddressIndexers::STREET));
    }
    public static function getLANDMARK(){
        return Enums::value(AddressIndexers::fromValue(AddressIndexers::LANDMARK));
    }
    public static function getCITY(){
        return Enums::value(AddressIndexers::fromValue(AddressIndexers::CITY));
    }
    public static function getSTATE(){
        return Enums::value(AddressIndexers::fromValue(AddressIndexers::STATE));
    }
    public static function getPINCODE(){
        return Enums::value(AddressIndexers::fromValue(AddressIndexers::PINCODE));
    }

}

?>