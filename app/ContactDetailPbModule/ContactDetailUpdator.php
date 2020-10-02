<?php

namespace App\ContactDetailPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\ContactDetailPbModule\ContactDetailIndexers;

class ContactDetailUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();
        if(Strings::notEmpty($pb->getEmail()->getLocalPart())){
            $pbArray[ContactDetailIndexers::getLOCALPART()] = strtolower($pb->getEmail()->getLocalPart());
        }else{
            return new Exception("Email Local Part is missing");
        }
        if(Strings::notEmpty($pb->getEmail()->getDomainPart())){
            $pbArray[ContactDetailIndexers::getDOMAINPART()] = strtolower($pb->getEmail()->getDomainPart());
        }else{
            return new Exception("Email Domain Part is missing");
        }
        if(Strings::notEmpty($pb->getMobile()->getMobileNo())){
            $pbArray[ContactDetailIndexers::getMOBILENO()] = strtolower($pb->getMobile()->getMobileNo());
        }
        return $pbArray;
    }
}

?>