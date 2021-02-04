<?php


namespace App\ImagePbModule;


use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\ImageSearchRequestPb;

class ImageSearchRequestPbDefaultProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $pb = new ImageSearchRequestPb();
        return $pb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
