<?php

namespace App\CustomerModule;

use App\Interfaces\IUpdator;
use App\EntityPbModule\EntityUpdator;
use App\Protobuff\PrivilegeTypeEnum;
use App\BaseCode\Strings;

class CustomerUpdator implements IUpdator{

    private $m_entityUpdator;

    public function __construct(){
        $this->m_entityUpdator = new EntityUpdator();
    }

    public function update($pb){
        $array = array();
        if(Strings::notEmpty($pb->getDbInfo()->getId())){
            $array = array_merge($array,$this->m_entityUpdator->update($pb->getDbInfo()));
        }
        if($pb->getPrivilege()==PrivilegeTypeEnum::UNKNOWN_PREVILAGE){
            $array[CustomerIndexers::getPRIVILEGE()] = PrivilegeTypeEnum::name(PrivilegeTypeEnum::NORMAL);
        }else{
            $array[CustomerIndexers::getPRIVILEGE()] = PrivilegeTypeEnum::name($pb->getPrivilege());
        }
        return $array;
    }

}

?>