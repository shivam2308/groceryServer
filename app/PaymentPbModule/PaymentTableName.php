<?php

namespace App\PaymentPbModule;


use App\BaseCode\BaseIndexer;
use App\CustomerModule\CustomerIndexers;
use App\EntityPbModule\EntityIndexers;
use App\Interfaces\ITableName;
use App\TimePbModule\TimeIndexers;

class PaymentTableName implements  ITableName{

    public static function getTableName()
    {
       return "PAYMENT";
    }

    public static function getcolumnIndexes()
    {
        $indexes = array();
        $indexes[EntityIndexers::getDBID()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getLIFETIME()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getTRANSACTION_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getRESPONSE_CODE()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getTRANSACTION_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getPAYMENT_STATUS()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getTRANSACTION_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getTRANSACTION_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getCUSTOMER_REF_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getCUSTOMER_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getPAYMENT_MODE()] = BaseIndexer::get_Value_STRING();
        $indexes[PaymentIndexers::getAMOUNT()] = BaseIndexer::get_Value_FLOAT();
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
