<?php

namespace App\ContactDetailPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\ContactDetailPbModule\ContactDetailIndexers;

class ContactDetailUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();
        $pbArray[ContactDetailIndexers::getLOCALPART()] = $pb->getEmail()->getLocalPart();
        $pbArray[ContactDetailIndexers::getDOMAINPART()] = $pb->getEmail()->getDomainPart();
        $pbArray[ContactDetailIndexers::getMOBILENO()] = $pb->getMobile()->getMobileNo();
    }
}

?>