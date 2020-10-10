<?php

namespace App\NamePbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\NamePbModule\NameIndexers;

class NameUpdator implements IUpdator
{

    public function update($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getFirstName())) {
            $pbArray[NameIndexers::getFIRSTNAME()] = strtolower($pb->getFirstName());
        }
        if (Strings::notEmpty($pb->getLastName())) {
            $pbArray[NameIndexers::getLASTNAME()] = strtolower($pb->getLastName());
        }
        if (Strings::notEmpty($pb->getCanonicalName())) {
            $pbArray[NameIndexers::getCANONICAL_NAME()] = strtolower($pb->getCanonicalName());
        }
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        return NULL;
    }
}
