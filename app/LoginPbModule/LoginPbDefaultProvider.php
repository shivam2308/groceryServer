<?php

namespace App\LoginPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\CustomerPb;
use App\Protobuff\EntityPb;
use App\Protobuff\LocalePb;
use App\Protobuff\NamePb;
use App\Protobuff\AddressPb;
use App\Protobuff\EmailPb;
use App\Protobuff\MobilePb;
use App\Protobuff\ImagePb;
use App\Protobuff\GenderEnum;
use App\Protobuff\TimePb;
use App\Protobuff\ContactDetailPb;
use App\Protobuff\CustomerPbRef;
use App\Protobuff\LoginPb;
use App\Protobuff\PrivilegeTypeEnum;

class LoginPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new LoginPb();
        $pb->setDbInfo(new EntityPb());
        $pb->getDbInfo()->setLocale(new LocalePb());
        $pb->setCustomerRef(new CustomerPbRef());
        $pb->getCustomerRef()->setName(new NamePb());
        $pb->getCustomerRef()->setContact(new ContactDetailPb());
        $pb->getCustomerRef()->getContact()->setEmail(new EmailPb());
        $pb->getCustomerRef()->getContact()->setMobile(new MobilePb());
        $pb->setTime(new TimePb());
        return $pb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
