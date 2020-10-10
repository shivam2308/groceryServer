<?php

namespace App\ServerConfig;

use App\Enums\EnvironmentTypeEnum;

class ServerListner
{

    static $m_evironment;

    function __construct()
    {
        $this::$m_evironment = EnvironmentTypeEnum::DEVEL;
    }

    function getEnvironment()
    {
        return $this::$m_evironment;
    }
}
