<?php

namespace App\PushNotificationPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\PushNotificationPb;
use App\Protobuff\PushNotificationPbRef;
use App\Protobuff\EntityPb;
use App\Protobuff\EmailPb;
use App\Protobuff\MobilePb;
use App\Protobuff\TimePb;
use App\Protobuff\ContactDetailPb;
use App\Protobuff\NamePb;
use App\Protobuff\CustomerPbRef;


class PushNotificationDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new PushNotificationPb();
        $pb->setDbInfo(new EntityPb());
        $pb->setTime(new TimePb());
        $pb->setCustomerRef(new CustomerPbRef());
        $pb->getCustomerRef()->setName(new NamePb());
        $pb->getCustomerRef()->setContact(new ContactDetailPb());
        $pb->getCustomerRef()->getContact()->setEmail(new EmailPb());
        $pb->getCustomerRef()->getContact()->setMobile(new MobilePb());
        return $pb;
    }

    public function getDefaultRefPb()
    {
        $pushNotificationPbRef = new PushNotificationPbRef();
        return $pushNotificationPbRef;
    }
}

?>
