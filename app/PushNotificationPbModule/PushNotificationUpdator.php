<?php

namespace App\PushNotificationPbModule;
use Exception;
use App\Interfaces\IUpdator;
use App\EntityPbModule\EntityUpdator;
use App\NamePbModule\NameUpdator;
use App\AddressPbModule\AddressUpdator;
use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\ContactDetailPbModule\ContactDetailUpdator;
use App\ImagePbModule\ImageUpdator;
use App\TimePbModule\TimeUpdator;
use App\GenderPbModule\GenderIndexers;
use App\Protobuff\PrivilegeTypeEnum;
use App\Protobuff\GenderEnum;
use App\BaseCode\Strings;
use App\CustomerModule\CustomerUpdator;

class PushNotificationUpdator implements IUpdator
{

    private $m_entityUpdator;
    private $m_customerUpdator;
    private $m_timeUpdator;
    private $m_refUpdator;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_customerUpdator = new CustomerUpdator();
        $this->m_timeUpdator = new TimeUpdator();
        $this->m_refUpdator = new BaseRefConvertorAndUpdator();
    }

    public function update($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $array = array_merge($array, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
        $array = array_merge($array, $this->m_customerUpdator->refUpdate($pb->getCustomerRef()));
        if (Strings::notEmpty($pb->getToken())) {
            $array[PushNotificationIndexers::getTOKEN()] = $pb->getToken();
        } else {
            throw new Exception("Token cannot be empty");
        }
        $array = array_merge($array, $this->m_timeUpdator->update($pb->getTime()));
        return $array;
    }

    public function refUpdate($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getId())) {
            $array[PushNotificationIndexers::getPUSH_NOTIFICATION_REF_ID()] = $pb->getId();
            $array[PushNotificationIndexers::getPUSH_NOTIFICATION_REF()] = $this->m_refUpdator->update($pb);
        }
        return $array;
    }
}
