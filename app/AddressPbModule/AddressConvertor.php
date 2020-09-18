<?php 

namespace App\AddressPbModule;

use App\Interfaces\IConverter;
use App\BaseCode\Strings;
use App\AddressPbModule\AddressIndexers;
use App\Protobuff\AddressPb;

class AddressConvertor implements IConvertor {

    public function convert($array){
        $addressPb = new AddressPb();
        $addressPb->setHomeNo($array[AddressIndexers::getHOMENO()]);
        $addressPb->setStreet($array[AddressIndexers::getSTREET()]);
        $addressPb->setLandMark($array[AddressIndexers::getLANDMARK()]);
        $addressPb->setCity($array[AddressIndexers::getCITY()]);
        $addressPb->setState($array[AddressIndexers::getSTATE()]);
        $addressPb->setPincode($array[AddressIndexers::getPINCODE()]);
        return $addressPb;
    }
}
?>