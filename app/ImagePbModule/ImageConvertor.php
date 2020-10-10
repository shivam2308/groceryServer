<?php

namespace App\ImagePbModule;

use App\Interfaces\IConvertor;
use App\BaseCode\Strings;
use App\ImagePbModule\ImageIndexers;
use App\Protobuff\ImagePb;

class ImageConvertor implements IConvertor
{

    public function convert($array)
    {
        $imagePb = new ImagePb();
        $imagePb->setUrl($array[ImageIndexers::getURL()]);
        return $imagePb;
    }
    public function refConvert($array)
    {
        return NULL;
    }
}
