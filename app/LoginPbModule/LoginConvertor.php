<?php

namespace App\LoginPbModule;

use App\Interfaces\IConvertor;
use App\EntityPbModule\EntityConvertor;
use App\BaseCode\Strings;

use App\CustomerModule\CustomerConvertor;
use App\Protobuff\LoginPb;
use App\TimePbModule\TimeConvertor;

class LoginConvertor implements IConvertor
{

    private $m_entityConvertor;
    private $m_customerConvertor;
    private $m_timeConvertor;


    public function __construct()
    {
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_customerConvertor = new CustomerConvertor();
        $this->m_timeConvertor = new TimeConvertor();
    }

    public function convert($array)
    {
        $loginPb = new LoginPb();
        $loginPb->setDbInfo($this->m_entityConvertor->convert($array));
        $loginPb->setCustomerRef($this->m_customerConvertor->refConvert($array));
        $loginPb->setTime($this->m_timeConvertor->convert($array));
        return $loginPb;
    }

    public function refConvert($array)
    {
        return NULL;
    }
}
