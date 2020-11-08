<?php


namespace App\ImagePbModule;


use App\Interfaces\ITableName;

class ImageTableName implements ITableName
{

    public static function getTableName()
    {
        return "IMAGE_GROUP";
    }
}
