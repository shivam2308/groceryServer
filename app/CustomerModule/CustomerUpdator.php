<?php

namespace App\CustomerModule;

use App\Interfaces\IUpdator;
use App\EntityPbModule\EntityUpdator;
use App\NamePbModule\NameUpdator;
use App\AddressPbModule\AddressUpdator;
use App\ContactDetailPbModule\ContactDetailUpdator;
use App\ImagePbModule\ImageUpdator;
use App\TimePbModule\TimeUpdator;
use App\GenderPbModule\GenderIndexers;
use App\Protobuff\PrivilegeTypeEnum;
use App\Protobuff\GenderEnum;
use App\BaseCode\Strings;

class CustomerUpdator implements IUpdator
{

    private $m_entityUpdator;
    private $m_nameUpdator;
    private $m_addressUpdator;
    private $m_contactDeatilsUpdator;
    private $m_imageUpdator;
    private $m_timeUpdator;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_nameUpdator = new NameUpdator();
        $this->m_addressUpdator = new AddressUpdator();
        $this->m_contactDeatilsUpdator = new ContactDetailUpdator();
        $this->m_imageUpdator = new ImageUpdator();
        $this->m_timeUpdator = new TimeUpdator();
    }

    public function update($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $array = array_merge($array, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
        $array = array_merge($array, $this->m_nameUpdator->update($pb->getName()));
        $array = array_merge($array, $this->m_addressUpdator->update($pb->getAddress()));
        $array = array_merge($array, $this->m_contactDeatilsUpdator->update($pb->getContact()));
        if ($pb->getGender() == GenderEnum::UNKNOWN_GENDER) {
        } else {
            $array[GenderIndexers::getGENDER()] = GenderEnum::name($pb->getGender());
        }
        if ($pb->getPrivilege() == PrivilegeTypeEnum::UNKNOWN_PREVILAGE) {
            $array[CustomerIndexers::getPRIVILEGE()] = PrivilegeTypeEnum::name(PrivilegeTypeEnum::NORMAL);
        } else {
            $array[CustomerIndexers::getPRIVILEGE()] = PrivilegeTypeEnum::name($pb->getPrivilege());
        }
        $array = array_merge($array, $this->m_imageUpdator->update($pb->getProfileImage()));
        $array = array_merge($array, $this->m_timeUpdator->update($pb->getTime()));
        return $array;
    }

    public function refUpdate($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getId())) {
            $array[CustomerIndexers::getCUSTOMER_REF_ID()] = $pb->getId();
        }
        $array = array_merge($array, $this->m_nameUpdator->update($pb->getName()));
        $array = array_merge($array, $this->m_contactDeatilsUpdator->update($pb->getContact()));
        return $array;
    }
}
