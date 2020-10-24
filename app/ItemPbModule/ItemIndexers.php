<?php

namespace App\ItemPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class ItemIndexers extends Enum
{
    const QUANTITY = 'QUANTITY';
    const PRICE = 'PRICE';
    const ITEMTYPE = 'ITEMTYPE';
    const AVAILABILITYSTATUS = 'AVAILABILITYSTATUS';
    const ITEM_QYANTITY_TYPE = 'ITEM_QYANTITY_TYPE';


    public static function getQUANTITY()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::QUANTITY));
    }
    public static function getPRICE()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::PRICE));
    }
    public static function getITEMTYPE()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::ITEMTYPE));
    }
    public static function getAVAILABILITYSTATUS()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::AVAILABILITYSTATUS));
    }
    public static function getITEM_QYANTITY_TYPE()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::ITEM_QYANTITY_TYPE));
    }
}
