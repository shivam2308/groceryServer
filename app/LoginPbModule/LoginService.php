<?php

namespace App\LoginPbModule;

use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\LoginSearchResponsePb;

class LoginService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new LoginUpdator(), new LoginConvertor(), new LoginSearcher(), new LoginSearchResponsePb(), LoginTableName::getTableName());
    }
}
