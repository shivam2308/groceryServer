<?php

namespace App\ImagePbModule;

use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\BaseCode\Strings;
use App\CustomerModule\CustomerIndexers;
use App\EntityPbModule\EntityUpdator;
use App\Interfaces\IUpdator;
use App\Protobuff\ImageExtensionTypeEnum;
use App\Protobuff\ImageTypeEnum;
use PHPUnit\Framework\Exception;

class ImageUpdator implements IUpdator
{
    private $m_entityUpdator;
    private $m_refUpdator;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_refUpdator = new BaseRefConvertorAndUpdator();
    }

    public function update($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $pbArray = array_merge($pbArray, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
        if (Strings::notEmpty($pb->getId())) {
            $pbArray[ImageIndexers::getID()] = $pb->getId();
        } else {
            throw new Exception("Image Id cannot be Empty");
        }
        if (Strings::notEmpty($pb->getUrl())) {
            $pbArray[ImageIndexers::getURL()] = $pb->getUrl();
        } else {
            throw new Exception("Image Url cannot be Empty");
        }
        if ($pb->getImageType() == ImageTypeEnum::UNKNOWN_IMAGE_TYPE) {
            throw new Exception("Image Type cannot be UNKNOWN_IMAGE_TYPE");
        } else {
            $pbArray[ImageIndexers::getIMAGE_TYPE()] = ImageTypeEnum::name($pb->getImageType());
        }
        if ($pb->getExtension() == ImageExtensionTypeEnum::UNKNOWN_EXTENSION_TYPE) {
            throw new Exception("Image Type cannot be UNKNOWN_EXTENSION_TYPE");
        } else {
            $pbArray[ImageIndexers::getIMAGE_EXTENSION()] = ImageExtensionTypeEnum::name($pb->getExtension());
        }
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        $array = array();
        if (Strings::notEmpty($pb->getId())) {
            $array[ImageIndexers::getIMAGE_ID()] = $pb->getId();
            $array[ImageIndexers::getIMAGE_REF()] = $this->m_refUpdator->update($pb);
        }
        return $array;
    }
}
