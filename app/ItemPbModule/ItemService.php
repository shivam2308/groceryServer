<?php

namespace App\ItemPbModule;

use App\BaseCode\BaseModule\BaseService;
use App\ItemPbModule\ItemConvertor;
use App\ItemPbModule\ItemUpdator;
use App\ItemPbModule\ItemTableName;
use App\ItemPbModule\ItemSearcher;
use App\Protobuff\ItemPb;
use App\Protobuff\ItemSearchResponsePb;

class ItemService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new ItemPb(),new ItemUpdator(), new ItemConvertor(), new ItemSearcher(), new ItemSearchResponsePb(), ItemTableName::getTableName());
    }
}

?>
