<?php

namespace App\DeliveryManPbModule;

use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\DeliveryManSearchResponsePb;

class DeliveryManService extends BaseService{
    
    public function __construct(){
        parent::__construct(new DeliveryManUpdator(),new DeliveryManConvertor(),new DeliveryManSearcher(),new DeliveryManSearchResponsePb(),DeliveryManTableName::getTableName());
    }
}

?>