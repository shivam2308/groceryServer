<?php

namespace App\PaymentPbModule;

use App\BaseCode\Enums;
use BenSampo\Enum\Enum;

class PaymentIndexers extends enum{
    const TRANSACTION_ID = 'TRANSACTION_ID';
    const RESPONSE_CODE = 'RESPONSE_CODE';
    const PAYMENT_STATUS = 'PAYMENT_STATUS';
    const TRANSACTION_REF = 'TRANSACTION_REF';
    const PAYMENT_MODE = 'PAYMENT_MODE';


    public static function getTRANSACTION_ID()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::TRANSACTION_ID));
    }
    public static function getRESPONSE_CODE()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::RESPONSE_CODE));
    }
    public static function getPAYMENT_STATUS()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::PAYMENT_STATUS));
    }
    public static function getTRANSACTION_REF()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::TRANSACTION_REF));
    }
    public static function getPAYMENT_MODE()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::PAYMENT_MODE));
    }

}

?>
