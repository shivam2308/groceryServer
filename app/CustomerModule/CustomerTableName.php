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
        $indexes[EntityIndexers::getDEFAULT_TIMEZONE()] = EntityIndexers::getDEFAULT_TIMEZONE();
        $indexes[BaseIndexer::get_Value_STRING()] = EntityIndexers::getLIFETIME();
        $indexes[BaseIndexer::get_Value_STRING()] = CustomerIndexers::getPRIVILEGE();
        $indexes[BaseIndexer::get_Value_STRING()] = NameIndexers::getFIRSTNAME();
        $indexes[BaseIndexer::get_Value_STRING()] = NameIndexers::getLASTNAME();
        $indexes[BaseIndexer::get_Value_STRING()] = NameIndexers::getCANONICAL_NAME();
        $indexes[BaseIndexer::get_Value_STRING()] = AddressIndexers::getCITY();
        $indexes[BaseIndexer::get_Value_STRING()] = AddressIndexers::getHOMENO();
        $indexes[BaseIndexer::get_Value_STRING()] = AddressIndexers::getLANDMARK();
        $indexes[BaseIndexer::get_Value_STRING()] = AddressIndexers::getSTREET();
        $indexes[BaseIndexer::get_Value_STRING()] = AddressIndexers::getSTATE();
        $indexes[BaseIndexer::get_Value_INT()] = AddressIndexers::getPINCODE();
        $indexes[BaseIndexer::get_Value_STRING()] = ContactDetailIndexers::getLOCALPART();
        $indexes[BaseIndexer::get_Value_STRING()] = ContactDetailIndexers::getDOMAINPART();
        $indexes[BaseIndexer::get_Value_STRING()] = ContactDetailIndexers::getMOBILENO();
        $indexes[BaseIndexer::get_Value_STRING()] = GenderIndexers::getGENDER();
        $indexes[BaseIndexer::get_Value_STRING()] = ImageIndexers::getIMAGE_ID();
        $indexes[BaseIndexer::get_Value_STRING()] = ImageIndexers::getIMAGE_REF();
        $indexes[BaseIndexer::get_Value_STRING()] = TimeIndexers::getDATE();
        $indexes[BaseIndexer::get_Value_STRING()] = TimeIndexers::getMONTH();
        $indexes[BaseIndexer::get_Value_STRING()] = TimeIndexers::getYEAR();
        $indexes[BaseIndexer::get_Value_STRING()] = TimeIndexers::getFORMATTED_DATE();
        $indexes[BaseIndexer::get_Value_STRING()] = TimeIndexers::getMILLISECONDS();
        $indexes[BaseIndexer::get_Value_STRING()] = TimeIndexers::getTIMEZONE();
        return $indexes;
    }
}
