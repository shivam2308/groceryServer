<?php


namespace App\PaymentPbModule;



use App\Protobuff\PaymentPb;

class PaymentHelper
{
    private $defaultPbProvider;

    public function __construct()
    {
        $this->defaultPbProvider = new PaymentPbDefaultProvider();
    }

    public function getPaymentRef($paymentPb)
    {
        $paymentRef = $this->defaultPbProvider->getDefaultRefPb();
        $paymentRef->setId($paymentPb->getDbInfo()->getId());
        $paymentRef->setAmount($paymentPb->getAmount());
        $paymentRef->setMode($paymentPb->getMode());
        $paymentRef->setStatus($paymentPb->getStatus());
        return $paymentRef;
    }
}
