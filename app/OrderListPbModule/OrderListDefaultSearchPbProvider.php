<?php


namespace App\OrderListPbModule;


use App\Protobuff\OrderedListSearchReqPb;

class OrderListDefaultSearchPbProvider implements \App\Interfaces\IDefaultPbProvider
{

    public function getDefaultPb()
    {
        $req = new OrderedListSearchReqPb();
        return $req;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
