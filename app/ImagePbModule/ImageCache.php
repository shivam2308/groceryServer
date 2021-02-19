<?php


namespace App\ImagePbModule;


use App\BaseCache\ACache;
use App\Protobuff\ImagePb;

class ImageCache extends ACache
{
    public function __construct()
    {
        parent::__construct(new ImageService(), new ImagePb());
    }
}
