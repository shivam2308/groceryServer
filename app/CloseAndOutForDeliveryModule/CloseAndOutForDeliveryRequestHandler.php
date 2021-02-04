<?php


namespace App\CloseAndOutForDeliveryModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class CloseAndOutForDeliveryRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new CloseAndOutForDeliveryService(), null, null);
    }
}
