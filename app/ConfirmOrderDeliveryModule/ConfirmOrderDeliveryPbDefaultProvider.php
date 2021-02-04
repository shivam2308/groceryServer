<?php


namespace App\ConfirmOrderDeliveryModule;


use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\ConfirmOrderDeliveryPb;
use App\Protobuff\TimePb;

class ConfirmOrderDeliveryPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $confirmOrderDeliveryPb = new ConfirmOrderDeliveryPb();
        $confirmOrderDeliveryPb->setTime(new TimePb());
        return $confirmOrderDeliveryPb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
