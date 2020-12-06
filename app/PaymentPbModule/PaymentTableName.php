<?php

namespace App\PaymentPbModule;


use App\Interfaces\ITableName;

class PaymentTableName implements  ITableName{

    public static function getTableName()
    {
       return "PAYMENT";
    }

    public static function getcolumnIndexes()
    {
        // TODO: Implement getcolumnIndexes() method.
    }
}

?>
