<?php

namespace App\LoginPbModule;

use App\BaseCode\Strings;
use App\ContactDetailPbModule\ContactDetailIndexers;
use Exception;
use App\Interfaces\ISearcher;

class LoginSearcher implements ISearcher
{

    public function search($pb)
    {
        $searchArray = array();
        if (Strings::notEmpty($pb->getMobileNo())) {
            $searchArray[ContactDetailIndexers::getMOBILENO()] = $pb->getMobileNo();
        } else {
            throw new Exception("Mobile NO cannot be Empty");
        }
        return $searchArray;
    }
}
