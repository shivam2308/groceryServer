<?php

namespace App\CustomerModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\CustomerPb;
use App\Protobuff\CustomerPbRef;
use App\Protobuff\EntityPb;
use App\Protobuff\ImageRefPb;
use App\Protobuff\LocalePb;
use App\Protobuff\NamePb;
use App\Protobuff\AddressPb;
use App\Protobuff\EmailPb;
use App\Protobuff\MobilePb;
use App\Protobuff\ImagePb;
use App\Protobuff\GenderEnum;
use App\Protobuff\TimePb;
use App\Protobuff\ContactDetailPb;
use App\Protobuff\PrivilegeTypeEnum;

class CustomerPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new CustomerPb();
        $pb->setDbInfo(new EntityPb());
        $pb->getDbInfo()->setLocale(new LocalePb());
        $pb->setName(new NamePb());
        $pb->setAddress(new AddressPb());
        $pb->setContact(new ContactDetailPb());
        $pb->getContact()->setEmail(new EmailPb());
        $pb->getContact()->setMobile(new MobilePb());
        $pb->setGender(GenderEnum::UNKNOWN_GENDER);
        $pb->setProfileImage(new ImageRefPb());
        $pb->setTime(new TimePb());
        $pb->setPrivilege(PrivilegeTypeEnum::UNKNOWN_PREVILAGE);
        return $pb;
    }

    public function getDefaultRefPb()
    {
        $customerPbRef = new CustomerPbRef();
        $customerPbRef->setName(new NamePb());
        $customerPbRef->setContact(new ContactDetailPb());
        $customerPbRef->getContact()->setEmail(new EmailPb());
        $customerPbRef->getContact()->setMobile(new MobilePb());
        return $customerPbRef;
    }
}

?>
