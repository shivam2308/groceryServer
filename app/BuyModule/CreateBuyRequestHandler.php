<?php


namespace App\BuyModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class CreateBuyRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new CreateBuyRequestService(), new CreateBuyRequestDefaultPbProvider(), null);
    }
}
