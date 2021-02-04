<?php

namespace App\BuyPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class BuyIndexers extends Enum
{
    const ORDER_ID = 'ORDER_ID';
    const QUANTITY = 'QUANTITY';
    const PRICE = 'PRICE';
    const DELIVERY_STATUS = 'DELIVERY_STATUS';
    const BUY_REF_ID = 'BUY_REF_ID';
    const BUY_REF = 'BUY_REF';
    const PARENT_ORDER_ID = 'PARENT_ORDER_ID';
    const DELIVERY_DATE = 'DELIVERY_DATE';
    const DELIVERY_MONTH = 'DELIVERY_MONTH';
    const DELIVERY_YEAR = 'DELIVERY_YEAR';
    const DELIVERY_MILLISECONDS = 'DELIVERY_MILLISECONDS';
    const DELIVERY_FORMATTED_DATE = 'DELIVERY_FORMATTED_DATE';


    public static function getORDER_ID()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::ORDER_ID));
    }

    public static function getQUANTITY()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::QUANTITY));
    }

    public static function getPRICE()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::PRICE));
    }

    public static function getDELIVERY_STATUS()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_STATUS));
    }

    public static function getBUY_REF_ID()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::BUY_REF_ID));
    }

    public static function getBUY_REF()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::BUY_REF));
    }

    public static function getPARENT_ORDER_ID()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::PARENT_ORDER_ID));
    }

    public static function getDELIVERY_DATE()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_DATE));
    }

    public static function getDELIVERY_MONTH()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_MONTH));
    }

    public static function getDELIVERY_YEAR()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_YEAR));
    }

    public static function getDELIVERY_MILLISECONDS()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_MILLISECONDS));
    }

    public static function getDELIVERY_FORMATTED_DATE()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_FORMATTED_DATE));
    }
}

?>
