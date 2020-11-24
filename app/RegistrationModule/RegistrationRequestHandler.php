<?php


namespace App\RegistrationModule;


use App\BaseCode\HttpRequestHandler\RequestHandler;

class RegistrationRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new RegistrationService(), new RegistrationDefaultPbProvider(), null);
    }
}
