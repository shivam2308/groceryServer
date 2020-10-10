<?php

namespace App\LoginPbModule;

use App\Interfaces\IUpdator;
use App\EntityPbModule\EntityUpdator;
use App\CustomerModule\CustomerUpdator;

use App\BaseCode\Strings;
use App\TimePbModule\TimeUpdator;

class LoginUpdator implements IUpdator
{

    private $m_entityUpdator;
    private $m_customerUpdator;
    private $m_timeUpdator;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_customerUpdator = new CustomerUpdator();
        $this->m_timeUpdator = new TimeUpdator();
    }

    public function update($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $array = array_merge($array, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
        if (Strings::notEmpty($pb->getCustomerRef()->getId())) {
            $array = array_merge($array, $this->m_customerUpdator->refUpdate($pb->getCustomerRef()));
        }
        $array = array_merge($array, $this->m_timeUpdator->update($pb->getTime()));
        return $array;
    }

    public function refUpdate($pb)
    {
        $array = array();
        return $array;
    }
}
