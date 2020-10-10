<?php

namespace App\DeliveryManPbModule;

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
use App\Protobuff\PrivilegeTypeEnum;
use App\Protobuff\DeliveryManPb;

class DeliveryManPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new DeliveryManPb();
        $pb->setDbInfo(new EntityPb());
        $pb->getDbInfo()->setLocale(new LocalePb());
        $pb->setName(new NamePb());
        $pb->setContact(new ContactDetailPb());
        $pb->getContact()->setEmail(new EmailPb());
        $pb->getContact()->setMobile(new MobilePb());
        $pb->setProfileImage(new ImagePb());
        $pb->setTime(new TimePb());
        return $pb;
    }
}
