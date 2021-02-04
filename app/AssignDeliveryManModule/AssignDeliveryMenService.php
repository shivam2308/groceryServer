<?php


namespace App\AssignDeliveryManModule;


use App\BuyPbModule\BuySearchRequestPbDefaultProvider;
use App\BuyPbModule\BuyService;
use App\CustomerModule\CustomerService;
use App\DeliveryManPbModule\DeliveryManPbDefaultProvider;
use App\Protobuff\BuySearchResponsePb;

class AssignDeliveryMenService
{
    private $buyService;
    private $customerService;
    private $defaultSearchPbProvider;
    private $deliveryMandefaultRefPbProvider;

    public function __construct()
    {
        $this->buyService = new BuyService();
        $this->customerService = new CustomerService();
        $this->defaultSearchPbProvider = new BuySearchRequestPbDefaultProvider();
        $this->deliveryMandefaultRefPbProvider = new DeliveryManPbDefaultProvider();
    }

    public function get($id)
    {
        $orderIdAndDeliveryManRefId = explode("!", $id);
        $buySearchRequest = $this->defaultSearchPbProvider->getDefaultPb();
        $buySearchRequest->setParentOrderId($orderIdAndDeliveryManRefId[0]);
        $searchResp = $this->buyService->search($buySearchRequest);
        $customerPb = $this->customerService->get($orderIdAndDeliveryManRefId[1]);
        foreach ($searchResp->getResults() as $buyPb) {
            $buyPb->setDeliveryManRef($this->getDeliveryMenRefPb($customerPb));
            $this->buyService->update($buyPb->getDbInfo()->getId(), $buyPb);
        }
        return $this->buyService->search($buySearchRequest);
    }

    private function getDeliveryMenRefPb($customerPb)
    {
        $deliveryMan = $this->deliveryMandefaultRefPbProvider->getDefaultRefPb();
        $deliveryMan->setId($customerPb->getDbInfo()->getId());
        $deliveryMan->setName($customerPb->getName());
        $deliveryMan->setContact($customerPb->getContact());
        return $deliveryMan;
    }

}
