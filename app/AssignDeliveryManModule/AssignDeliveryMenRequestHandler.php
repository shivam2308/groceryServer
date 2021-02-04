<?php


namespace App\AssignDeliveryManModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

//use only get function
class AssignDeliveryMenRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new AssignDeliveryMenService(), null, null);
    }
}
