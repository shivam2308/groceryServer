<?php

namespace App\NamePbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\NamePbModule\NameIndexers;

class NameUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();
        $pbArray[NameIndexers::getFIRSTNAME()] = $pb->getFirstName();
        $pbArray[NameIndexers::getLASTNAME()] = $pb->getLastName();
        $pbArray[NameIndexers::getCANONICAL_NAME()] = $pb->getCanonicalName();
    }
}

?>