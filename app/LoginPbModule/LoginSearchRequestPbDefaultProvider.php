<?php

namespace App\LoginPbModule;

use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\LoginSearchRequestPb;

class LoginSearchRequestPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new LoginSearchRequestPb();
        return $pb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
