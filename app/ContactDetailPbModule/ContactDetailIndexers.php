<?php

namespace App\ContactDetailPbModule;

use BenSampo\Enum\Enum;

class ContactDetailIndexers extends Enum{
    const LOCALPART = 'LOCALPART';
    const DOMAINPART = 'DOMAINPART';
    const MOBILENO = 'MOBILENO';

    public static function getLOCALPART(){
        return ContactDetailIndexers::fromValue(ContactDetailIndexers::LOCALPART);
    }
    public static function getDOMAINPART(){
        return ContactDetailIndexers::fromValue(ContactDetailIndexers::DOMAINPART);
    }
    public static function getMOBILENO(){
        return ContactDetailIndexers::fromValue(ContactDetailIndexers::MOBILENO);
    }
}

?>