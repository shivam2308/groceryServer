<?php

namespace App\BuyPbModule;

use App\BaseCode\BaseModule\BaseService;
use App\BuyPbModule\BuyConvertor;
use App\BuyPbModule\BuyUpdator;
use App\BuyPbModule\BuyTableName;
use App\BuyPbModule\BuySearcher;
use App\Protobuff\BuyPb;
use App\Protobuff\BuySearchResponsePb;

class BuyService extends BaseService
{

    public function __construct()
    {
        parent::__construct(new BuyPb(),new BuyUpdator(), new BuyConvertor(), new BuySearcher(), new BuySearchResponsePb(), BuyTableName::getTableName());
    }
}

?>
