<?php

namespace App\DeliveryManPbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\EntityPbModule\EntityUpdator;
use App\NamePbModule\NameUpdator;
use App\ContactDetailPbModule\ContactDetailUpdator;
use App\ImagePbModule\ImageUpdator;
use App\TimePbModule\TimeUpdator;
use App\BaseCode\Strings;

class DeliveryManUpdator implements IUpdator
{

    private $m_entityUpdator;
    private $m_nameUpdator;
    private $m_contactDeatilsUpdator;
    private $m_imageUpdator;
    private $m_timeUpdator;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_nameUpdator = new NameUpdator();
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
        $array = array_merge($array, $this->m_contactDeatilsUpdator->update($pb->getContact()));
        if (Strings::notEmpty($pb->getAdharNo())) {
            $array[DeliveryManIndexers::getADHAR_NO()] = $pb->getAdharNo();
        } else {
            throw new Exception("Adhar no is Empty");
        }
        $array = array_merge($array, $this->m_imageUpdator->update($pb->getProfileImage()));
        $array = array_merge($array, $this->m_timeUpdator->update($pb->getTime()));
        return $array;
    }
}
