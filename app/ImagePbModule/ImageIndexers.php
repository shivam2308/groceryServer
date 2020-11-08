<?php

namespace App\ImagePbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class ImageIndexers extends Enum
{
    const URL = 'URL';
    const ID = 'ID';
    const IMAGE_TYPE = 'IMAGE_TYPE';
    const IMAGE_EXTENSION = 'IMAGE_EXTENSION';
    const IMAGE_ID = 'IMAGE_ID';
    const IMAGE_REF = 'IMAGE_REF';


    public static function getURL()
    {
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::URL));
    }

    public static function getID()
    {
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::ID));
    }

    public static function getIMAGE_TYPE()
    {
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::IMAGE_TYPE));
    }

    public static function getIMAGE_EXTENSION()
    {
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::IMAGE_EXTENSION));
    }

    public static function getIMAGE_ID()
    {
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::IMAGE_ID));
    }

    public static function getIMAGE_REF()
    {
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::IMAGE_REF));
    }

}

?>
