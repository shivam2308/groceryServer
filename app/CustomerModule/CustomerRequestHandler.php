<?php

namespace App\CustomerModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class CustomerRequestHandler extends RequestHandler{

    public function __construct(){
        parent::__construct(new CustomerService(),new CustomerPbDefaultProvider(),new CustomerSearchRequestPbDefaultProvider());
    }
}

?>