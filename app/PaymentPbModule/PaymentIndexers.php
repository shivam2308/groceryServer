<?php

namespace App\PaymentPbModule;

use App\BaseCode\Enums;
use BenSampo\Enum\Enum;

class PaymentIndexers extends enum
{
    const TRANSACTION_ID = 'TRANSACTION_ID';
    const RESPONSE_CODE = 'RESPONSE_CODE';
    const PAYMENT_STATUS = 'PAYMENT_STATUS';
    const TRANSACTION_REF = 'TRANSACTION_REF';
    const PAYMENT_MODE = 'PAYMENT_MODE';
    const PAYMENT_REF_ID = 'PAYMENT_REF_ID';
    const PAYMENT_REF = 'PAYMENT_REF';
    const AMOUNT = 'AMOUNT';


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

    public static function getPAYMENT_REF_ID()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::PAYMENT_REF_ID));
    }

    public static function getPAYMENT_REF()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::PAYMENT_REF));
    }

    public static function getAMOUNT()
    {
        return Enums::value(PaymentIndexers::fromValue(PaymentIndexers::AMOUNT));
    }

}

?>
