<?php

namespace App\LoginPbModule;

use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\LoginPb;
use App\Protobuff\LoginSearchResponsePb;

class LoginService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new LoginPb(),new LoginUpdator(), new LoginConvertor(), new LoginSearcher(), new LoginSearchResponsePb(), LoginTableName::getTableName());
    }
}
