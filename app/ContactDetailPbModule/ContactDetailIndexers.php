<?php

namespace App\ContactDetailPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class ContactDetailIndexers extends Enum{
    const LOCALPART = 'LOCALPART';
    const DOMAINPART = 'DOMAINPART';
    const MOBILENO = 'MOBILENO';

    public static function getLOCALPART(){
        return Enums::value(ContactDetailIndexers::fromValue(ContactDetailIndexers::LOCALPART));
    }
    public static function getDOMAINPART(){
        return Enums::value(ContactDetailIndexers::fromValue(ContactDetailIndexers::DOMAINPART));
    }
    public static function getMOBILENO(){
        return Enums::value(ContactDetailIndexers::fromValue(ContactDetailIndexers::MOBILENO));
    }
}

?>