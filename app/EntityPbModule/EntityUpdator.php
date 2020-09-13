<?php

namespace App\EntityPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\EntityPbModule\EntityIndexers;

class EntityUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();
        if(Strings::isEnpty($pb->getId())){
            return new Exception("Entity id cannot be empty");
        }else{
            $pbArray[EntityIndexers::getDBID()] = $pb->getId();
        }
        if($pb->getLifeTime()==StatusEnum::UNKNOWN_STATUS){
            $pbArray[EntityIndexers::getLIFETIME()] = StatusEnum::ACTIVE;
        }
    }
}

?>