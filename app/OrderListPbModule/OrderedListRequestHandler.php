<?php


namespace App\OrderListPbModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class OrderedListRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new OrderListService(), new OrderedListDefaultPbProvider(), new OrderListDefaultSearchPbProvider());
    }
}
