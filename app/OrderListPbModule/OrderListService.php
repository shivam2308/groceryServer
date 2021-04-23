<?php


namespace App\OrderListPbModule;


use App\BaseCode\Strings;
use App\BuyPbModule\BuyService;
use App\CustomerModule\CustomerService;
use App\Protobuff\BuySearchRequestPb;
use App\Protobuff\CustomerPb;
use App\Protobuff\OrderedListSearchReqPb;
use App\Protobuff\PrivilegeTypeEnum;

class OrderListService
{

    private $orderedHelper;
    private $buyService;
    private $customerService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
        $this->orderedHelper = new OrderListHelper();
        $this->buyService = new BuyService();
    }

    public function search($orderSearchRequest)
    {
        if (Strings::notEmpty($orderSearchRequest->getCustomerId())) {
            $customerPb = $this->customerService->get($orderSearchRequest->getCustomerId());
            if ($customerPb->getPrivilege() == PrivilegeTypeEnum::ADMIN) {
                $resp = $this->buyService->search(new BuySearchRequestPb());
                return $this->orderedHelper->getOrderlistResp($resp);
            } elseif ($customerPb->getPrivilege() == PrivilegeTypeEnum::DELIVERY_MAN) {
                $resp = $this->buyService->search($this->orderedHelper->getBuySearchRequestUsingDeliveryManRefId($orderSearchRequest->getCustomerId()));
                return $this->orderedHelper->getOrderlistResp($resp);
            } else {
                $resp = $this->buyService->search($this->orderedHelper->getBuySearchRequestUsingCustomerId($orderSearchRequest->getCustomerId()));
                return $this->orderedHelper->getOrderlistResp($resp);
            }
        } elseif (Strings::notEmpty($orderSearchRequest->getOrderParentId())) {
            $resp = $this->buyService->search($this->orderedHelper->getBuySearchRequest($orderSearchRequest->getOrderParentId()));
            return $this->orderedHelper->getOrderlistResponse($resp);
        }

    }
}
