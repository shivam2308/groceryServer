<?php

namespace App\ImagePbModule;

use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\CustomerModule\CustomerIndexers;
use App\EntityPbModule\EntityConvertor;
use App\Interfaces\IConvertor;
use App\Protobuff\ImageExtensionTypeEnum;
use App\Protobuff\ImagePb;
use App\Protobuff\ImageRefPb;
use App\Protobuff\ImageTypeEnum;
use App\Protobuff\PrivilegeTypeEnum;

class ImageConvertor implements IConvertor
{
    private $m_entityConvertor;
    private $m_refConvertor;

    public function __construct()
    {
        $this->m_entityConvertor = new EntityConvertor();
        $this->m_refConvertor = new BaseRefConvertorAndUpdator();
    }

    public function convert($array)
    {
        $imagePb = new ImagePb();
        $imagePb->setDbInfo($this->m_entityConvertor . $this->convert($array));
        $imagePb->setId($array[ImageIndexers::getID()]);
        $imagePb->setUrl($array[ImageIndexers::getURL()]);
        $imagePb->setImageType(ImageTypeEnum::value($array[ImageIndexers::getIMAGE_TYPE()]));
        $imagePb->setExtension(ImageExtensionTypeEnum::value($array[ImageIndexers::getIMAGE_EXTENSION()]));
        return $imagePb;
    }
    public function refConvert($array)
    {
        $imageRef = new ImageRefPb();
        return $this->m_refConvertor->convert($array[ImageIndexers::getIMAGE_REF()], $imageRef);
    }
}
