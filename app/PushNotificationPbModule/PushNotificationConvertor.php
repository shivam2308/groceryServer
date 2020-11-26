<?php

namespace App\PushNotificationPbModule;

use App\Interfaces\IConvertor;
use App\EntityPbModule\EntityConvertor;
use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\TimePbModule\TimeConvertor;
use App\PushNotificationPbModule\PushNotificationIndexers;
use App\Protobuff\PushNotificationPb;
use App\Protobuff\pushNotificationPbRef;

class PushNotificationConvertor implements IConvertor
{

    private $m_entityConvertor;
    private $m_timeConvertor;
    private $m_refConvertor;


    public function __construct()
    {
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_timeConvertor = new TimeConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
    }

    public function convert($array)
    {
        $pushNotificationPb = new PushNotificationPb();
        $pushNotificationPb->setDbInfo($this->m_entityConvertor->convert($array));
        $pushNotificationPb->setToken($array[PushNotificationIndexers::getToken()]);
        $pushNotificationPb->setTime($this->m_timeConvertor->convert($array));
        return $pushNotificationPb;
    }

    public function refConvert($array)
    {
        $pushNotificationPbRef = new PushNotificationPbRef();
        return $this->m_refConvertor->convert($array[PushNotificationIndexers::getPUSHNOTIFICATION_REF()], $pushNotificationPbRef);
    }
}
