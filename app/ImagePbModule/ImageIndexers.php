<?php

namespace App\ImagePbModule;

use BenSampo\Enum\Enum;

class ImageIndexers extends Enum{
    const URL = 'URL';


    public static function getURL(){
        return ImageIndexers::fromValue(ImageIndexers::URL);
    }

}

?>