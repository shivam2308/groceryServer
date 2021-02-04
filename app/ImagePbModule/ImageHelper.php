<?php


namespace App\ImagePbModule;



class ImageHelper
{
    private $imageDefaultPbProvider;

    public function __construct()
    {
        $this->imageDefaultPbProvider = new ImageDefaultPbProvider();
    }

    public function getImageRef($imagePb)
    {
        $imageRefPb = $this->imageDefaultPbProvider->getDefaultRefPb();
        $imageRefPb->setId($imagePb->getDbInfo()->getId());
        $imageRefPb->setImageId($imagePb->getId());
        return $imageRefPb;
    }

}
