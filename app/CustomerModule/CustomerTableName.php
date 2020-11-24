<?php

namespace App\CustomerModule;

use App\AddressPbModule\AddressIndexers;
use App\BaseCode\BaseIndexer;
use App\ContactDetailPbModule\ContactDetailIndexers;
use App\EntityPbModule\EntityIndexers;
use App\GenderPbModule\GenderIndexers;
use App\ImagePbModule\ImageIndexers;
use App\Interfaces\ITableName;
use App\NamePbModule\NameIndexers;
use App\TimePbModule\TimeIndexers;
use Faker\Provider\Base;

class CustomerTableName implements ITableName
{

    public static function getTableName()
    {
        return "CUSTOMER";
    }

    public static function getcolumnIndexes()
    {
        $indexes = array();
        $indexes[EntityIndexers::getDBID()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = BaseIndexer::get_Value_STRING();
        $indexes[EntityIndexers::getLIFETIME()] = BaseIndexer::get_Value_STRING();
        $indexes[CustomerIndexers::getPRIVILEGE()] = BaseIndexer::get_Value_STRING();
        $indexes[NameIndexers::getFIRSTNAME()] = BaseIndexer::get_Value_STRING();
        $indexes[NameIndexers::getLASTNAME()] = BaseIndexer::get_Value_STRING();
        $indexes[NameIndexers::getCANONICAL_NAME()] = BaseIndexer::get_Value_STRING();
        $indexes[AddressIndexers::getCITY()] = BaseIndexer::get_Value_STRING();
        $indexes[AddressIndexers::getHOMENO()] = BaseIndexer::get_Value_STRING();
        $indexes[AddressIndexers::getLANDMARK()] = BaseIndexer::get_Value_STRING();
        $indexes[AddressIndexers::getSTREET()] = BaseIndexer::get_Value_STRING();
        $indexes[AddressIndexers::getSTATE()] = BaseIndexer::get_Value_STRING();
        $indexes[AddressIndexers::getPINCODE()] = BaseIndexer::get_Value_INT();
        $indexes[ContactDetailIndexers::getLOCALPART()] = BaseIndexer::get_Value_STRING();
        $indexes[ContactDetailIndexers::getDOMAINPART()] = BaseIndexer::get_Value_STRING();
        $indexes[ContactDetailIndexers::getMOBILENO()] = BaseIndexer::get_Value_STRING();
        $indexes[GenderIndexers::getGENDER()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_ID()] = BaseIndexer::get_Value_STRING();
        $indexes[ImageIndexers::getIMAGE_REF()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getDATE()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMONTH()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getYEAR()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getFORMATTED_DATE()] = BaseIndexer::get_Value_STRING();
        $indexes[TimeIndexers::getMILLISECONDS()] = BaseIndexer::get_Value_BIG_INT();
        $indexes[TimeIndexers::getTIMEZONE()] = BaseIndexer::get_Value_STRING();
        return $indexes;
    }
}
