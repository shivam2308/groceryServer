<?php

namespace App\ImagePbModule;

use BenSampo\Enum\Enum;
use App\BaseCode\Enums;

class ImageIndexers extends Enum{
    const URL = 'URL';


    public static function getURL(){
        return Enums::value(ImageIndexers::fromValue(ImageIndexers::URL));
    }

}

?>