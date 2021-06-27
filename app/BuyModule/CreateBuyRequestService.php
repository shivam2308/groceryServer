<?php


namespace App\BuyModule;


use App\BaseCode\Strings;
use App\BuyPbModule\BuyService;
use App\CustomerModule\CustomerService;
use App\ItemPbModule\ItemService;
use App\PaymentPbModule\PaymentService;
use App\Protobuff\CreateBuyRequestPb;
use App\Protobuff\IsOrderedPlacedEnum;
use PHPUnit\Framework\Exception;

class CreateBuyRequestService
{
    private $buyService;
    private $customerService;
    private $itemService;
    private $paymentService;
    private $buyHelper;
    private $createBuyRequestDefaultProvider;

    public function __construct()
    {
        $this->buyService = new BuyService();
        $this->customerService = new CustomerService();
        $this->itemService = new ItemService();
        $this->buyHelper = new CreateBuyRequestHelper();
        $this->paymentService = new PaymentService();
        $this->createBuyRequestDefaultProvider = new CreateBuyRequestDefaultPbProvider();
    }

    public function create($createBuyRequest){
        if(Strings::isEmpty($createBuyRequest->getCustomerId())){
            throw new Exception("Customer Id is Empty ");
        }
        if($createBuyRequest->getItemIdAndQuantity()->count()==0){
            throw new Exception( "Item list Cannot be zero");
        }
        if(Strings::isEmpty($createBuyRequest->getPaymentRefId())){
            throw new Exception("Payment Ref is is Empty");
        }
        $customer = $this->customerService->get($createBuyRequest->getCustomerId());
        $payment = $this->paymentService->get($createBuyRequest->getPaymentRefId());
        foreach ($createBuyRequest->getItemIdAndQuantity() as $value) {
            $val = explode("@",$value);
            $item = $this->itemService->get($val[0]);
            $quantity = $val[1];
            $buyPb=$this->buyHelper->getBuyRequestPb($customer,$item,$quantity,$payment);
            $this->buyService->create($buyPb);
        }
        $respPb = $this->createBuyRequestDefaultProvider->getDefaultPb();
        $respPb->setIsOrderPlaced(IsOrderedPlacedEnum::ORDER_SUCCESS);
        return $respPb;
    }

}
