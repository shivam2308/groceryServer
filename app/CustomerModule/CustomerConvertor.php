<?php

namespace App\CustomerModule;

use App\Interfaces\IConvertor;
use App\EntityPbModule\EntityConvertor;
use App\NamePbModule\NameConvertor;
use App\AddressPbModule\AddressConvertor;
use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\BaseCode\Strings;
use App\ContactDetailPbModule\ContactDetailConvertor;
use App\ImagePbModule\ImageConvertor;
use App\TimePbModule\TimeConvertor;
use App\Protobuff\PrivilegeTypeEnum;
use App\CustomerModule\CustomerIndexers;
use App\GenderPbModule\GenderIndexers;
use App\Protobuff\GenderEnum;
use App\Protobuff\CustomerPb;
use App\Protobuff\CustomerPbRef;

class CustomerConvertor implements IConvertor
{

    private $m_entityConvertor;
    private $m_nameConvertor;
    private $m_addressConvertor;
    private $m_contactConvertor;
    private $m_imageConvertor;
    private $m_timeConvertor;
    private $m_refConvertor;


    public function __construct()
    {
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_nameConvertor = new NameConvertor();
        $this->m_addressConvertor = new AddressConvertor();
        $this->m_contactConvertor = new ContactDetailConvertor();
        $this->m_imageConvertor = new ImageConvertor();
        $this->m_timeConvertor = new TimeConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
    }

    public function convert($array)
    {
        $customerPb = new CustomerPb();
        $customerPb->setDbInfo($this->m_entityConvertor->convert($array));
        $customerPb->setPrivilege(PrivilegeTypeEnum::value($array[CustomerIndexers::getPRIVILEGE()]));
        $customerPb->setName($this->m_nameConvertor->convert($array));
        $customerPb->setAddress($this->m_addressConvertor->convert($array));
        $customerPb->setContact($this->m_contactConvertor->convert($array));
        $customerPb->setProfileImage($this->m_imageConvertor->convert($array));
        $customerPb->setTime($this->m_timeConvertor->convert($array));
        if (Strings::notEmpty($array[GenderIndexers::getGENDER()])) {
            $customerPb->setGender(GenderEnum::value($array[GenderIndexers::getGENDER()]));
        }
        return $customerPb;
    }

    public function refConvert($array)
    {
        $customerRef = new CustomerPbRef();
        return $this->m_refConvertor->convert($array[CustomerIndexers::getCUSTOMER_REF()], $customerRef);
    }
}
