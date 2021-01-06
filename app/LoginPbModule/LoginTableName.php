<?php

namespace App\LoginPbModule;

use App\BaseCode\BaseIndexer;
use App\CustomerModule\CustomerIndexers;
use App\EntityPbModule\EntityIndexers;
use App\Interfaces\ITableName;
use App\TimePbModule\TimeIndexers;

class LoginTableName implements ITableName
{

    public static function getTableName()
    {
        return "LOGIN";
    }


    public static function getcolumnIndexes()
    {
        $indexes = array();
        $indexes[EntityIndexers::getDBID()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getLIFETIME()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getCUSTOMER_REF_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getCUSTOMER_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getDATE()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMONTH()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getYEAR()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMILLISECONDS()] = BaseIndexer::get_Value_BIG_INT();
        $indexes[TimeIndexers::getFORMATTED_DATE()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getTIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[LoginIndexers::getMOBILENO()] = BaseIndexer::get_Value_STRING();
        return $indexes;
    }
}
