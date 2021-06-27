<?php
namespace App\ImagePbModule;

use App\BaseCode\Strings;
use App\Interfaces\ISearcher;
use App\PaymentPbModule\PaymentIndexers;
use App\Protobuff\ImageSearchRequestPb;
use App\Protobuff\PaymentStatusEnum;
use App\Protobuff\ImageTypeEnum;

class ImageSearcher implements ISearcher
{

    public function search($pb)
    {
        $searchArray = array();
        if (Strings::notEmpty($pb->getImageId())) {
            $searchArray[ImageIndexers::getID()] = $pb->getImageId();
        }
        if ($pb->getImageType() != ImageTypeEnum::UNKNOWN_IMAGE_TYPE) {
            $searchArray[ImageIndexers::getIMAGE_TYPE()] = ImageTypeEnum::name($pb->getImageType());
        }
        return $searchArray;
    }
}
