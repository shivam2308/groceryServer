<?php

namespace App\AddressPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\AddressPbModule\AddressIndexers;

class AddressUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();

        $pbArray[AddressIndexers::getHOMENO()] = $pb->getHomeNo();

        $pbArray[AddressIndexers::getSTREET()] = $pb->getStreet();

        $pbArray[AddressIndexers::getLANDMARK()] = $pb->getLandMark();

        $pbArray[AddressIndexers::getCITY()] = $pb->getCity();

        $pbArray[AddressIndexers::getSTATE()] = $pb->getState();

        $pbArray[AddressIndexers::getPINCODE()] = $pb->getPincode();

    }
}

?>