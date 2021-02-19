<?php


namespace App\LoginPbModule;


use App\BaseCache\ACache;
use App\GPBMetadata\LoginPb;

class LoginCache extends ACache
{
    public function __construct()
    {
        parent::__construct(new LoginService(), new LoginPb());
    }
}
