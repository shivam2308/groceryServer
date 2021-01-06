<?php


namespace App\OrderListPbModule;


use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\DeliveryStatusEnum;
use App\Protobuff\OrderedListPb;
use App\Protobuff\PaymentPbRef;
use App\Protobuff\TimePb;

class OrderedListDefaultPbProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $orderedPb = new OrderedListPb();
        $orderedPb->setTime(new TimePb());
        $orderedPb->setPaymentRef(new PaymentPbRef());
        $orderedPb->setDeliveryStatus(DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS);
        return $orderedPb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
