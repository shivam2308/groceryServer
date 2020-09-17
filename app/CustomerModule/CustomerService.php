<?php

namespace App\CustomerModule;

use App\BaseCode\BaseModule\BaseService;
use App\CustomerModule\CustomerConvertor;
use App\CustomerModule\CustomerUpdator;
use App\CustomerModule\CustomerTableName;
use App\CustomerModule\CustomerSearcher;
use App\Protobuff\CustomerSearchResponsePb;

class CustomerService extends BaseService{
    
    public function __construct(){
        parent::__construct(new CustomerUpdator(),new CustomerConvertor(),new CustomerSearcher(),new CustomerSearchResponsePb(),CustomerTableName::getTableName());
    }
}

?>