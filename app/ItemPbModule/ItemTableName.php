<?php

namespace App\ItemPbModule;

use App\BaseCode\BaseIndexer;
use App\EntityPbModule\EntityIndexers;
use App\ImagePbModule\ImageIndexers;
use App\Interfaces\ITableName;
use App\NamePbModule\NameIndexers;
use App\TimePbModule\TimeIndexers;
use App\ItemPbModule\ItemIndexers;

class ItemTableName implements ITableName{

    public static function getTableName(){
        return "ITEM";
    }

    public static function getcolumnIndexes()
    {
        $indexes = array();
        $indexes[EntityIndexers::getDBID()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getLIFETIME()] = BaseIndexer::get_Value_STRING();
        $indexes[NameIndexers::getFIRSTNAME()] = BaseIndexer::get_Value_STRING();
        $indexes[NameIndexers::getLASTNAME()] = BaseIndexer::get_Value_STRING();
        $indexes[NameIndexers::getCANONICAL_NAME()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[ItemIndexers::getQUANTITY()] = BaseIndexer::get_Value_INT();
        $indexes[ItemIndexers::getPRICE()] = BaseIndexer::get_Value_FLOAT();
        $indexes[ItemIndexers::getITEMTYPE()] = BaseIndexer::get_Value_STRING();
        $indexes[ItemIndexers::getAVAILABILITYSTATUS()] = BaseIndexer::get_Value_STRING();
        $indexes[ItemIndexers::getITEM_QYANTITY_TYPE()] = BaseIndexer::get_Value_STRING();
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
