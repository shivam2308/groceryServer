<?php

namespace App\ItemPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\ItemPbModule\ItemIndexers;

class ItemUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();
        $pbArray[ItemIndexers::getQUANTITY()] = $pb->getQuantity();
        $pbArray[ItemIndexers::getPRICE()] = $pb->getPrice();
    }
}

?>