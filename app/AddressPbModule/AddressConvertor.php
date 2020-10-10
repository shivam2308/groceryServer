<?php

namespace App\AddressPbModule;

use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\AddressPbModule\AddressIndexers;
use App\Protobuff\AddressPb;
use App\Protobuff\CityEnum;
use App\Protobuff\StateEnum;

class AddressConvertor implements IConvertor
{

    public function convert($array)
    {
        $addressPb = new AddressPb();
        $addressPb->setHomeNo($array[AddressIndexers::getHOMENO()]);
        $addressPb->setStreet($array[AddressIndexers::getSTREET()]);
        $addressPb->setLandMark($array[AddressIndexers::getLANDMARK()]);
        if (Strings::notEmpty($array[AddressIndexers::getCITY()])) {
            $addressPb->setCity(CityEnum::value($array[AddressIndexers::getCITY()]));
        } else {
            //$addressPb->setCity(CityEnum::value(CityEnum::UNKNOWN_CITY));
        }
        if (Strings::notEmpty($array[AddressIndexers::getSTATE()])) {
            $addressPb->setState(StateEnum::value($array[AddressIndexers::getSTATE()]));
        } else {
            //$addressPb->setState(StateEnum::value(StateEnum::UNKNOWN_STATE));
        }
        $addressPb->setPincode($array[AddressIndexers::getPINCODE()]);
        return $addressPb;
    }
}
