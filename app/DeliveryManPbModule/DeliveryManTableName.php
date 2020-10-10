<?php

namespace App\DeliveryManPbModule;

use App\Interfaces\ITableName;

class DeliveryManTableName implements ITableName{

    public static function getTableName(){
        return "DELIVERY_MAN";
    }
}

?>