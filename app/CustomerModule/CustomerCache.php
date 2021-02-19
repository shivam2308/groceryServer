<?php


namespace App\CustomerModule;


use App\BaseCache\ACache;
use App\Protobuff\CustomerPb;

class CustomerCache extends ACache
{
        public function __construct()
        {
            parent::__construct(new CustomerService(), new CustomerPb());
        }
}
