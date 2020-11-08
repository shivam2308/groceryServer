<?php

namespace App\DeliveryManPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class DeliveryManIndexers extends Enum
{
    const ADHAR_NO = 'ADHAR_NO';
    const DELIVERY_MAN_REF_ID = 'DELIVERY_MAN_REF_ID';
    const DELIVERY_MAN_REF = 'DELIVERY_MAN_REF';

    public static function getADHAR_NO()
    {
        return Enums::value(DeliveryManIndexers::fromValue(DeliveryManIndexers::ADHAR_NO));
    }

    public static function getDELIVERY_MAN_REF_ID()
    {
        return Enums::value(DeliveryManIndexers::fromValue(DeliveryManIndexers::DELIVERY_MAN_REF_ID));
    }

    public static function getDELIVERY_MAN_REF()
    {
        return Enums::value(DeliveryManIndexers::fromValue(DeliveryManIndexers::DELIVERY_MAN_REF));
    }

}

?>
