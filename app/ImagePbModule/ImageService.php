<?php


namespace App\ImagePbModule;


use App\BaseCode\BaseModule\BaseService;
use App\Protobuff\ItemSearchResponsePb;

class ImageService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new ImageUpdator(), new ImageConvertor(), new ImageSearcher(), new ItemSearchResponsePb(), ImageTableName::getTableName());
    }
}
