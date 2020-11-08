<?php

namespace App\CustomerModule;

use App\Interfaces\ITableName;

class CustomerTableName implements ITableName
{

    public static function getTableName()
    {
        return "CUSTOMER";
    }
}
