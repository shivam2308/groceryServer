<?php

namespace App\ItemPbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class ItemIndexers extends Enum
{
    const QUANTITY = 'QUANTITY';
    const PRICE = 'PRICE';
    CONST ITEMTYPE = 'ITEMTYPE';
    CONST AVAILABILITYSTATUS = 'AVAILABILITYSTATUS';
    const ITEM_REF_ID = 'ITEM_REF_ID';
    const ITEM_REF = 'ITEM_REF';
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
    public static function getITEM_REF_ID()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::ITEM_REF_ID));
    }
    public static function getITEM_REF()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::ITEM_REF));
    }
    public static function getITEM_QYANTITY_TYPE()
    {
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::ITEM_QYANTITY_TYPE));
    }
}
