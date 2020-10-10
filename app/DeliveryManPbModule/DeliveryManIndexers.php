<?php

namespace App\DeliveryManPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class DeliveryManIndexers extends Enum{
    const ADHAR_NO = 'ADHAR_NO';

    public static function getADHAR_NO(){
        return Enums::value(DeliveryManIndexers::fromValue(DeliveryManIndexers::ADHAR_NO));
    }

}

?>