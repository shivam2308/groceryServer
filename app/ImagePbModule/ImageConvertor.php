<?php 

namespace App\ImagePbModule;

use App\Interfaces\IConverter;
use App\BaseCode\Strings;
use App\ImagePbModule\ImageIndexers;
use App\Protobuff\ImagePb;

class ImageConvertor implements IConvertor {

    public function convert($array){
        $imagePb = new ImagePb();
        $imagePb->setUrl($array[ImageIndexers::getURL()]);
        return $imagePb;
    }
}
?>