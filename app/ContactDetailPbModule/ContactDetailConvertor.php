<?php

namespace App\ContactDetailPbModule;

use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\ContactDetailPbModule\ContactDetailIndexers;
use App\Protobuff\ContactDetailPb;
use App\Protobuff\EmailPb;
use App\Protobuff\MobilePb;

class ContactDetailConvertor implements IConvertor
{

    public function convert($array)
    {
        $contactdetailPb = new ContactDetailPb();
        $contactdetailPb->setEmail(new EmailPb());
        $contactdetailPb->setMobile(new MobilePb());
        $contactdetailPb->getEmail()->setLocalPart($array[ContactDetailIndexers::getLOCALPART()]);
        $contactdetailPb->getEmail()->setDomainPart($array[ContactDetailIndexers::getDOMAINPART()]);
        if (Strings::notEmpty($array[ContactDetailIndexers::getMOBILENO()])) {
            $contactdetailPb->getMobile()->setMobileNo($array[ContactDetailIndexers::getMOBILENO()]);
        }
        return $contactdetailPb;
    }
    public function refConvert($array)
    {
        return NULL;
    }
}
