<?php


namespace App\ItemPbModule;


use App\BaseCache\ACache;
use App\Protobuff\ItemPb;

class ItemCache extends ACache
{
    public function __construct()
    {
        parent::__construct(new ItemService(), new ItemPb());
    }
}
