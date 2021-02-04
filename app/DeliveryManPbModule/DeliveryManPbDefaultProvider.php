<?php

namespace App\DeliveryManPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\DeliveryManPb;
use App\Protobuff\DeliveryManRefPb;
use App\Protobuff\EntityPb;
use App\Protobuff\ImageRefPb;
use App\Protobuff\LocalePb;
use App\Protobuff\NamePb;
use App\Protobuff\EmailPb;
use App\Protobuff\MobilePb;
use App\Protobuff\ImagePb;
use App\Protobuff\TimePb;
use App\Protobuff\ContactDetailPb;



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
        $pb->setProfileImage(new ImageRefPb());
        $pb->setTime(new TimePb());
        return $pb;
    }
    public function getDefaultRefPb()
    {
        $deliveryManRefPb = new DeliveryManRefPb();
        $deliveryManRefPb->setName(new NamePb());
        $deliveryManRefPb->setContact(new ContactDetailPb());
        $deliveryManRefPb->getContact()->setEmail(new EmailPb());
        $deliveryManRefPb->getContact()->setMobile(new MobilePb());
        return $deliveryManRefPb;
    }
}
