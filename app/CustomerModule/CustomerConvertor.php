<?php

namespace App\CustomerModule;

use App\Interfaces\IConvertor;
use App\EntityPbModule\EntityConvertor;
use App\Protobuff\PrivilegeTypeEnum;
use App\CustomerModule\CustomerIndexers;
use App\Protobuff\CustomerPb;

class CustomerConvertor implements IConvertor{

    private $m_entityConvertor;

    public function __construct(){
        $this->m_entityConvertor = new EntityConvertor();
    }

    public function convert($array){
        $customerPb = new CustomerPb();
        $customerPb->setDbInfo($this->m_entityConvertor->convert($array));
        $customerPb->setPrivilege(PrivilegeTypeEnum::value($array[CustomerIndexers::getPRIVILEGE()]));
        return $customerPb;
    }

}

?>