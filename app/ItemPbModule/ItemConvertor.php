<?php

namespace App\ItemPbModule;

use App\Interfaces\IConvertor;
use App\ItemPbModule\ItemIndexers;
use App\Protobuff\ItemPb;
use App\EntityPbModule\EntityConvertor;
use App\NamePbModule\NameConvertor;
use App\ImagePbModule\ImageConvertor;
use App\Protobuff\AvailabilityStatusEnum;
use App\Protobuff\ItemQuantityTypeEnum;
use App\Protobuff\ItemTypeEnum;
use App\TimePbModule\TimeConvertor;
use App\Protobuff\ItemPbRef;
use App\BaseCode\Strings;
use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;


class ItemConvertor implements IConvertor
{

    private $m_entityConvertor;
    private $m_nameConvertor;
    private $m_imageConvertor;
    private $m_timeConvertor;
    private $m_refConvertor;

    public function __construct()
    {
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_nameConvertor = new NameConvertor();
        $this->m_imageConvertor = new ImageConvertor();
        $this->m_timeConvertor = new TimeConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
    }

    public function convert($array)
    {
        $itemPb = new ItemPb();
        $itemPb->setDbInfo($this->m_entityConvertor->convert($array));
        $itemPb->setTime($this->m_timeConvertor->convert($array));
        $itemPb->setItemName($this->m_nameConvertor->convert($array));
        $itemPb->setItemImage($this->m_imageConvertor->refConvert($array));
        $itemPb->setQuantity($array[ItemIndexers::getQUANTITY()]);
        $itemPb->setPrice($array[ItemIndexers::getPRICE()]);
        if (Strings::notEmpty($array[ItemIndexers::getITEM_QYANTITY_TYPE()])) {
            $itemPb->setItemQuantityType(ItemQuantityTypeEnum::value($array[ItemIndexers::getITEM_QYANTITY_TYPE()]));
        }
        if (Strings::notEmpty($array[ItemIndexers::getITEMTYPE()])) {
            $itemPb->setItemType(ItemTypeEnum::value($array[ItemIndexers::getITEMTYPE()]));
        }
        if (Strings::notEmpty($array[ItemIndexers::getAVAILABILITYSTATUS()])) {
            $itemPb->setAvailabilityStatus(AvailabilityStatusEnum::value($array[ItemIndexers::getAVAILABILITYSTATUS()]));
        }
        return $itemPb;
    }

    public function refConvert($array)
    {
        $itemRef = new ItemPbRef();
        return $this->m_refConvertor->convert($array[ItemIndexers::getITEM_REF()], $itemRef);
    }
}
