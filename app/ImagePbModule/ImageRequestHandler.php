<?php


namespace App\ImagePbModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class ImageRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new ImageService(), new ImageDefaultPbProvider(), new ImageSearchRequestPbDefaultProvider());
    }
}
