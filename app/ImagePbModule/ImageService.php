<?php


namespace App\ImagePbModule;


use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\ImagePb;
use App\Protobuff\ImageSearchResponsePb;

class ImageService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new ImagePb(),new ImageUpdator(), new ImageConvertor(), new ImageSearcher(), new ImageSearchResponsePb(), ImageTableName::getTableName());
    }
}
