<?php

namespace App\NamePbModule;

use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\NamePbModule\NameIndexers;
use App\Protobuff\NamePb;

class NameConvertor implements IConvertor
{

    public function convert($array)
    {
        $namePb = new NamePb();
        $namePb->setFirstName($array[NameIndexers::getFIRSTNAME()]);
        $namePb->setLastName($array[NameIndexers::getLASTNAME()]);
        $namePb->setCanonicalName($array[NameIndexers::getCANONICAL_NAME()]);
        return $namePb;
    }
    public function refConvert($array)
    {
        return NULL;
    }
}
