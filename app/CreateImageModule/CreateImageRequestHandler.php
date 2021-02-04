<?php


namespace App\CreateImageModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;
use App\ImagePbModule\ImageDefaultPbProvider;

class CreateImageRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new CreateImageService(), new ImageDefaultPbProvider(), null);
    }
}
