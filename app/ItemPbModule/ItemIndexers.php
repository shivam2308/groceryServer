<?php

namespace App\ItemPbModule;

use BenSampo\Enum\Enum;

class ItemIndexers extends Enum{
    const QUANTITY = 'QUANTITY';
    const PRICE = 'PRICE';

    public static function getQUANTITY(){
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::QUANTITY));
    }
    public static function getPRICE(){
        return Enums::value(ItemIndexers::fromValue(ItemIndexers::PRICE));
    }

}

?>