<?php

namespace App\AddressPbModule;

use App\BaseCode\Strings;
use App\Interfaces\IUpdator;
use App\Protobuff\CityEnum;
use App\Protobuff\StateEnum;

class AddressUpdator implements IUpdator
{

    public function update($pb)
    {
        $pbArray = array();

        if (Strings::notEmpty($pb->getHomeNo())) {
            $pbArray[AddressIndexers::getHOMENO()] = $pb->getHomeNo();
        }
        if (Strings::notEmpty($pb->getStreet())) {
            $pbArray[AddressIndexers::getSTREET()] = $pb->getStreet();
        }
        if (Strings::notEmpty($pb->getLandMark())) {
            $pbArray[AddressIndexers::getLANDMARK()] = $pb->getLandMark();
        }
        if ($pb->getCity() == CityEnum::UNKNOWN_CITY) {
            //nothing
        } else {
            $pbArray[AddressIndexers::getCITY()] = CityEnum::name($pb->getCity());
        }
        if ($pb->getState() == StateEnum::UNKNOWN_STATE) {
            //nothing
        } else {
            $pbArray[AddressIndexers::getSTATE()] = StateEnum::name($pb->getState());
        }
        if (Strings::notEmpty($pb->getPincode())) {
            $pbArray[AddressIndexers::getPINCODE()] = $pb->getPincode();
        }
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        return NULL;
    }
}
