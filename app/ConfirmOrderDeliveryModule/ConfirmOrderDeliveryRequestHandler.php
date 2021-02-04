<?php


namespace App\ConfirmOrderDeliveryModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class ConfirmOrderDeliveryRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new ConfirmOrderDeliveryService(), new ConfirmOrderDeliveryPbDefaultProvider(), null);
    }
}
