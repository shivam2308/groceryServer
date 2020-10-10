<?php

namespace App\LoginPbModule;

use App\Interfaces\ITableName;

class LoginTableName implements ITableName
{

    public static function getTableName()
    {
        return "LOGIN";
    }
}
