<?php

namespace App\BuyPbModule;

use App\Interfaces\ITableName;

class BuyTableName implements ITableName{

    public static function getTableName(){
        return "BUY";
    }

}

?>