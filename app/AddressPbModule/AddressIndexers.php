<?php

namespace App\AddressPbModule;

use BenSampo\Enum\Enum;

class AddressIndexers extends Enum{
    const HOMENO = 'HOMENO';
    const STREET = 'STREET';
    const LANDMARK = 'LANDMARK';
    const CITY = 'CITY';
    const STATE = 'STATE';
    const PINCODE = 'PINCODE';

    public static function getHOMENO(){
        return AddressIndexers::fromValue(AddressIndexers::HOMENO);
    }
    public static function getSTREET(){
        return AddressIndexers::fromValue(AddressIndexers::STREET);
    }
    public static function getLANDMARK(){
        return AddressIndexers::fromValue(AddressIndexers::LANDMARK);
    }
    public static function getCITY(){
        return AddressIndexers::fromValue(AddressIndexers::CITY);
    }
    public static function getSTATE(){
        return AddressIndexers::fromValue(AddressIndexers::STATE);
    }
    public static function getPINCODE(){
        return AddressIndexers::fromValue(AddressIndexers::PINCODE);
    }

}

?>