<?php

namespace App\BaseCode\BaseModule;

use App\EntityPbModule\EntityIndexers;
use App\Protobuff\StatusEnum;

class BaseSearcher {

   public function addExpression($array){
       $arr = array();
       $arr[EntityIndexers::getLIFETIME()] = StatusEnum::name(StatusEnum::ACTIVE);
       $array = array_merge($array,$arr);
       return $array;
   }
}

?>
