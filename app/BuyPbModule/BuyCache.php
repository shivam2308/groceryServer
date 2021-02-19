<?php


namespace App\BuyPbModule;


use App\BaseCache\ACache;
use App\Protobuff\BuyPb;

class BuyCache extends ACache
{
    public function __construct()
    {
        parent::__construct(new BuyService(), new BuyPb());
    }
}
