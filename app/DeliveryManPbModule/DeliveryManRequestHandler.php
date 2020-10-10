<?php

namespace App\DeliveryManPbModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class DeliveryManRequestHandler extends RequestHandler{

    public function __construct(){
        parent::__construct(new DeliveryManService(),new DeliveryManPbDefaultProvider(),new DeliveryManSearchRequestPbDefaultProvider());
    }
}

?>