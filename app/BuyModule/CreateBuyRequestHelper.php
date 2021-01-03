<?php


namespace App\BuyModule;


use App\BuyPbModule\BuyPbDefaultProvider;
use App\CustomerModule\CustomerHelper;
use App\ItemPbModule\ItemHelper;
use App\PaymentPbModule\PaymentHelper;
use App\Protobuff\BuyPb;

class CreateBuyRequestHelper
{
    private $customerHelper;
    private $itemHelper;
    private $paymentHelper;
    private $buyPbDefaultProvider;

    public function __construct()
    {
        $this->customerHelper = new CustomerHelper();
        $this->itemHelper = new ItemHelper();
        $this->paymentHelper = new PaymentHelper();
        $this->buyPbDefaultProvider = new BuyPbDefaultProvider();
    }


    public function getBuyRequestPb($customer, $item,$quantity,$payment)
    {
        $buyPb = $this->buyPbDefaultProvider->getDefaultPb();
        $buyPb->setCustomerRef($this->customerHelper->getCustomerRef($customer));
        $buyPb->setItemRef($this->itemHelper->getItemRef($item));
        $buyPb->setPaymentRef($this->paymentHelper->getPaymentRef($payment));
        $buyPb->setQuantity((int)$quantity);
        return $buyPb;
    }
}
