<?php

namespace App\LoginPbModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class LoginRequestHandler extends RequestHandler
{

    public function __construct()
    {
        parent::__construct(new LoginService(), new LoginPbDefaultProvider(), new LoginSearchRequestPbDefaultProvider());
    }
}
