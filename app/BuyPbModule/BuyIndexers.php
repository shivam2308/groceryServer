<?php

namespace App\BuyPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class BuyIndexers extends Enum{
    const ORDER_ID = 'ORDER_ID';
    const QUANTITY = 'QUANTITY';
    CONST PRICE = 'PRICE';
    CONST DELIVERY_STATUS = 'DELIVERY_STATUS';
    const BUY_REF_ID = 'BUY_REF_ID';


    public static function getORDER_ID(){
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::ORDER_ID));
    }
    public static function getQUANTITY(){
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::QUANTITY));
    }
    public static function getPRICE(){
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::PRICE));
    }
    public static function getDELIVERY_STATUS(){
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::DELIVERY_STATUS));
    }
    public static function getBUY_REF_ID()
    {
        return Enums::value(BuyIndexers::fromValue(BuyIndexers::BUY_REF_ID));
    }
}

?>