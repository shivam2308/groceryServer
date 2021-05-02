<?php


namespace App\ImagePbModule;


use App\BaseCode\BaseIndexer;
use App\EntityPbModule\EntityIndexers;
use App\Interfaces\ITableName;
use App\TimePbModule\TimeIndexers;

class ImageTableName implements ITableName
{

    public static function getTableName()
    {
        return "IMAGE_GROUP";
    }

    public static function getcolumnIndexes()
    {
        $indexes = array();
        $indexes[EntityIndexers::getDBID()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getLIFETIME()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getID()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getURL()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_TYPE()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_EXTENSION()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMILLISECONDS()] = BaseIndexer::get_Value_STRING();
        return $indexes;
    }
}
