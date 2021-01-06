<?php


namespace App\BuyModule;


use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\CreateBuyRequestPb;

class CreateBuyRequestDefaultPbProvider implements IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $createDefaultPbProvider = new CreateBuyRequestPb();
        return $createDefaultPbProvider;
    }

    public function getDefaultRefPb()
    {

    }
}
