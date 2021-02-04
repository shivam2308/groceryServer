<?php


namespace App\ImagePbModule;


use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\EntityPb;
use App\Protobuff\ImageExtensionTypeEnum;
use App\Protobuff\ImagePb;
use App\Protobuff\ImageRefPb;
use App\Protobuff\ImageTypeEnum;

class ImageDefaultPbProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new ImagePb();
        $pb->setDbInfo(new EntityPb());
        $pb->setImageType(ImageTypeEnum::UNKNOWN_IMAGE_TYPE);
        $pb->setExtension(ImageExtensionTypeEnum::UNKNOWN_EXTENSION_TYPE);
        return $pb;
    }

    public function getDefaultRefPb()
    {
        $imageRef = new ImageRefPb();
        return $imageRef;
    }
}
