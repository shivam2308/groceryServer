<?php

namespace App\EntityPbModule;
use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\EntityPbModule\EntityIndexers;
use App\Protobuff\EntityPb;
use App\Protobuff\StatusEnum;
use App\Protobuff\TimeZoneEnum;
use App\Protobuff\LocalePb;

class EntityConvertor implements IConvertor{

    public function convert($array){
        $entityPb = new EntityPb();
        $entityPb->setLocale(new LocalePb());
        if(Strings::notEmpty($array[EntityIndexers::getDBID()])){
            $entityPb->setId($array[EntityIndexers::getDBID()]);
        }
        $entityPb->setLifeTime(StatusEnum::value($array[EntityIndexers::getLIFETIME()]));
        $entityPb->getLocale()->setDefaultTimeZone(TimeZoneEnum::value($array[EntityIndexers::getDEFAULT_TIMEZONE()]));
        return $entityPb;
    }
}

?>