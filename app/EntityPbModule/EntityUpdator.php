<?php

namespace App\EntityPbModule;

use PHPUnit\Framework\Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\EntityPbModule\EntityIndexers;
use App\Protobuff\StatusEnum;
use App\Protobuff\TimeZoneEnum;
use App\Protobuff\LocalePb;

class EntityUpdator implements IUpdator
{

    public function update($pb)
    {
        $pbArray = array();
        if (Strings::isEmpty($pb->getId())) {
            return new Exception("Entity id cannot be empty");
        } else {
            $pbArray[EntityIndexers::getDBID()] = $pb->getId();
        }
        if ($pb->getLifeTime() == StatusEnum::UNKNOWN_STATUS) {
            $pbArray[EntityIndexers::getLIFETIME()] = StatusEnum::name(StatusEnum::ACTIVE);
        } else {
            $pbArray[EntityIndexers::getLIFETIME()] = StatusEnum::name($pb->getLifeTime());
        }
        if ($pb->getLocale() == NULL) {
            $pb->setlocale(new LocalePb());
        }
        if ($pb->getLocale()->getDefaultTimeZone() == TimeZoneEnum::UNKNOWN_TIME_ZONE) {
            $pbArray[EntityIndexers::getDEFAULT_TIMEZONE()] = TimeZoneEnum::name(TimeZoneEnum::IST);
        } else {
            $pbArray[EntityIndexers::getDEFAULT_TIMEZONE()] = TimeZoneEnum::name($pb->getLocale()->getDefaultTimeZone());
        }

        return $pbArray;
    }

    public function refUpdate($pb)
    {
        return NULL;
    }
}
