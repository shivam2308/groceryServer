<?php

namespace App\DeliveryManPbModule;

use App\BaseCode\BaseIndexer;
use App\ContactDetailPbModule\ContactDetailIndexers;
use App\DeliveryManPbModule\DeliveryManIndexers;
use App\EntityPbModule\EntityIndexers;
use App\ImagePbModule\ImageIndexers;
use App\Interfaces\ITableName;
use App\NamePbModule\NameIndexers;
use App\TimePbModule\TimeIndexers;

class DeliveryManTableName implements ITableName{

    public static function getTableName(){
        return "DELIVERY_MAN";
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
        $indexes[ContactDetailIndexers::getLOCALPART()] = BaseIndexer::get_Value_STRING();
        $indexes[ContactDetailIndexers::getDOMAINPART()] = BaseIndexer::get_Value_STRING();
        $indexes[ContactDetailIndexers::getMOBILENO()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[DeliveryManIndexers::getADHAR_NO()] = BaseIndexer::get_Value_STRING();
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
