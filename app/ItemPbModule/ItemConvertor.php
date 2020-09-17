<?php 

namespace App\ItemPbModule;

use App\Interfaces\IConverter;
use App\BaseCode\Strings;
use App\ItemPbModule\ItemIndexers;
use App\Protobuff\ItemPb;


class ItemConvertor implements IConvertor {

    public function convert($array){
        $itemPb = new ItemPb();
        $itemPb->setQuantity($array[ItemIndexers::getQUANTITY()]);
        $itemPb->setPrice($array[ItemIndexers::getPRICE()]);
        return $itemPb;
    }
}
?>