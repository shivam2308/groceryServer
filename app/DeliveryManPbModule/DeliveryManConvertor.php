<?php

namespace App\DeliveryManPbModule;


use App\Interfaces\IConvertor;
use App\EntityPbModule\EntityConvertor;
use App\NamePbModule\NameConvertor;
use App\ContactDetailPbModule\ContactDetailConvertor;
use App\ImagePbModule\ImageConvertor;
use App\Protobuff\DeliveryManRefPb;
use App\TimePbModule\TimeConvertor;
use App\Protobuff\DeliveryManPb;

class DeliveryManConvertor implements IConvertor{

    private $m_entityConvertor;
    private $m_nameConvertor;
    private $m_contactConvertor;
    private $m_imageConvertor;
    private $m_timeConvertor;
    private $m_refConvertor;


    public function __construct(){
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_nameConvertor = new NameConvertor();
        $this->m_contactConvertor = new ContactDetailConvertor();
        $this->m_imageConvertor = new ImageConvertor();
        $this->m_timeConvertor = new TimeConvertor();
    }

    public function convert($array){
        $deliveryManPb = new DeliveryManPb();
        $deliveryManPb->setDbInfo($this->m_entityConvertor->convert($array));
        $deliveryManPb->setName($this->m_nameConvertor->convert($array));
        $deliveryManPb->setContact($this->m_contactConvertor->convert($array));
        $deliveryManPb->setProfileImage($this->m_imageConvertor->convert($array));
        $deliveryManPb->setTime($this->m_timeConvertor->convert($array));
        $deliveryManPb->setAdharNo($array[DeliveryManIndexers::getADHAR_NO()]);
        return $deliveryManPb;
    }

    public function refConvert($array)
    {
        $deliveryManRef = new DeliveryManRefPb();
        return $this->m_refConvertor->convert($array[DeliveryManIndexers::getDELIVERY_MAN_REF()], $deliveryManRef);
    }
}

?>
