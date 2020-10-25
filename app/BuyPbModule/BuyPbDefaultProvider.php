<?php

namespace App\BuyPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\BuyPb;
use App\Protobuff\NamePb;
use App\Protobuff\EntityPb;
use App\Protobuff\CustomerPbRef;
use App\Protobuff\ItemPbRef;
use App\Protobuff\DeliveryStatusEnum;
use App\Protobuff\EmailPb;
use App\Protobuff\MobilePb;
use App\Protobuff\ContactDetailPb;


class BuyPbDefaultProvider implements IDefaultPbProvider{

    public function getDefaultPb(){
        $pb = new BuyPb();
        $pb->setDbInfo(new EntityPb());
        $pb->setCustomerRef(new CustomerPbRef());
        $pb->getCustomerRef()->setName(new NamePb());
        $pb->getCustomerRef()->setContact(new ContactDetailPb());
        $pb->getCustomerRef()->getContact()->setEmail(new EmailPb());
        $pb->getCustomerRef()->getContact()->setMobile(new MobilePb());
        $pb->setItemRef(new ItemPbRef());
        $pb->getItemRef()->setItemName(new NamePb());
     
        $pb->setDeliveryStatus(DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS);
        return $pb;
    }

}

?>