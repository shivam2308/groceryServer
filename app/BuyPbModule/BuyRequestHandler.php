<?php

namespace App\BuyPbModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class BuyRequestHandler extends RequestHandler{

    public function __construct(){
        parent::__construct(new BuyService(),new BuyPbDefaultProvider(),new BuySearchRequestPbDefaultProvider());
    }
}

?>