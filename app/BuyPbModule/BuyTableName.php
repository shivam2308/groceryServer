<?php

namespace App\BuyPbModule;

use App\Interfaces\ITableName;
use App\EntityPbModule\EntityIndexers;
use App\CustomerModule\CustomerIndexers;
use App\DeliveryManPbModule\DeliveryManIndexers;
use App\ItemPbModule\ItemIndexers;
use App\BuyPbModule\BuyIndexers;
use App\TimePbModule\TimeIndexers;
use App\BaseCode\BaseIndexer;

class BuyTableName implements ITableName
{
    public static function getTableName(){
        return "BUY";
    }

    public static function getcolumnIndexes()
    {
        $indexes = array();
        $indexes[EntityIndexers::getDBID()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getLIFETIME()] = BaseIndexer::get_Value_STRING();
        $indexes[BuyIndexers::getORDER_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getCUSTOMER_REF_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getCUSTOMER_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[DeliveryManIndexers::getDELIVERY_MAN_REF_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[DeliveryManIndexers::getDELIVERY_MAN_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[ItemIndexers::getITEM_REF_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[ItemIndexers::getITEM_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[BuyIndexers::getQUANTITY()] = BaseIndexer::get_Value_INT();
        $indexes[BuyIndexers::getPRICE()] = BaseIndexer::get_Value_FLOAT();
        $indexes[BuyIndexers::getDELIVERY_STATUS()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getDATE()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMONTH()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getYEAR()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getFORMATTED_DATE()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMILLISECONDS()] = BaseIndexer::get_Value_BIG_INT();
        $indexes[TimeIndexers::getTIMEZONE()] = BaseIndexer::get_Value_STRING();
        return $indexes;
    }

}

?>
