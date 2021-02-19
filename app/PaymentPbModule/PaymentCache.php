<?php


namespace App\PaymentPbModule;


use App\BaseCache\ACache;
use App\Protobuff\PaymentPb;

class PaymentCache extends ACache
{
    public function __construct()
    {
        parent::__construct(new PaymentService(), new PaymentPb());
    }
}
