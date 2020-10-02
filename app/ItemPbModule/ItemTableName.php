<?php

namespace App\ItemPbModule;

use App\Interfaces\ITableName;

class ItemTableName implements ITableName{

    public static function getTableName(){
        return "ITEM";
    }

}

?>