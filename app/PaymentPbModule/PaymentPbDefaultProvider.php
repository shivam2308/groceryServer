<?php

namespace App\PaymentPbModule;


use App\CustomerModule\CustomerPbDefaultProvider;
use App\Interfaces\IDefaultPbProvider;
use App\Protobuff\PaymentPb;
use App\Protobuff\PaymentPbRef;
use App\Protobuff\TimePb;

class PaymentPbDefaultProvider implements IDefaultPbProvider
{

    private $customerDefulatPbProvider;

    public function __construct()
    {
        $this->customerDefulatPbProvider = new CustomerPbDefaultProvider();
    }

    public function getDefaultPb()
    {
        $paymentPb = new PaymentPb();
        $paymentPb->setCustomerRef($this->customerDefulatPbProvider->getDefaultRefPb());
        $paymentPb->setTime(new TimePb());
        return $paymentPb;
    }

    public function getDefaultRefPb()
    {
        $paymentRef = new PaymentPbRef();
        return $paymentRef;
    }
}

?>
