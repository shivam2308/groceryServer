<?php


namespace App\ImagePbModule;



use App\Protobuff\ImagePb;

class ImageHelper
{
    private $imageDefaultPbProvider;
    private $imageDefaultSearchPbProvider;

    public function __construct()
    {
        $this->imageDefaultPbProvider = new ImageDefaultPbProvider();
        $this->imageDefaultSearchPbProvider = new ImageSearchRequestPbDefaultProvider();
    }

    public function getImageRef($imagePb)
    {
        $imageRefPb = $this->imageDefaultPbProvider->getDefaultRefPb();
        $imageRefPb->setId($imagePb->getDbInfo()->getId());
        $imageRefPb->setImageId($imagePb->getId());
        return $imageRefPb;
    }

    public function getImageSearchReq($imagePb)
    {
        $imageSearchRefPb = $this->imageDefaultSearchPbProvider->getDefaultPb();
        $imageSearchRefPb->setImageId($imagePb->getId());
        return $imageSearchRefPb;
    }



}
