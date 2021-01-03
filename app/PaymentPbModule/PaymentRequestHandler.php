<?php

namespace App\PaymentPbModule;

use App\BaseCode\HttpRequestHandler\RequestHandler;

class PaymentRequestHandler extends RequestHandler
{
    public function __construct()
    {
        parent::__construct(new PaymentService(), new PaymentPbDefaultProvider(), new PaymentSearchRequestPbDefaultProvider());
    }
}

?>
