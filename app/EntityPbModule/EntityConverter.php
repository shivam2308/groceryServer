<?php 

namespace App\EntityPbModule;

use App\Interfaces\IConverter;
use App\BaseCode\Strings;
use App\EntityPbModule\EntityIndexers;
use App\Protobuff\EntityPb;
use App\Protobuff\StatusEnum;
use App\Protobuff\TimeZoneEnum;

class EntityConvertor implements IConvertor {

    public function convert($array){
        $entityPb = new EntityPb();
        if(Strings::notEmpty($array[EntityIndexers::getDBID()])){
            $entityPb->setId($array[EntityIndexers::getDBID()]);
        }
        $entityPb->setLifeTime(StatusEnum::value($array[EntityIndexers::getLIFETIME()]));
        $entityPb->setLocale()->setDefaultTimeZone(TimeZoneEnum::value($array[EntityIndexers::getDEFAULT_TIMEZONE()]));
        return $entityPb;
    }
}
?>