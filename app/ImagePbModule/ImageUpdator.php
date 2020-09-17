<?php

namespace App\ImagePbModule;

use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\ImagePbModule\ImageIndexers;

class ImageUpdator implements IUpdator{

    public function update($pb){
        $pbArray = array();
        $pbArray[ImageIndexers::getURL()] = $pb->getUrl();
    }
}

?>