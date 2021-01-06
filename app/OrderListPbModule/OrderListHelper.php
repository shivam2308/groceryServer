<?php


namespace App\OrderListPbModule;


use App\Protobuff\BuySearchRequestPb;
use App\Protobuff\BuySearchResponsePb;
use App\Protobuff\OrderedListPb;
use App\Protobuff\OrderedListSearchRespPb;
use App\Protobuff\SummaryPb;

class OrderListHelper
{

    public function getBuySearchRequest($OrderParentId)
    {
        $buySaerchReq = new BuySearchRequestPb();
        $buySaerchReq->setParentOrderId($OrderParentId);
        return $buySaerchReq;
    }

    public function getBuySearchRequestUsingCustomerId($customerId)
    {
        $buySaerchReq = new BuySearchRequestPb();
        $buySaerchReq->setCustomerId($customerId);
        return $buySaerchReq;
    }

    public function getOrderlistResp($resp)
    {
        $results = array();
        $ids = array();
        $response = new OrderedListSearchRespPb();
        $count=0;
        $response->setSummary(new SummaryPb());
        foreach ($resp->getResults() as $result) {
            $orderlistPb = new OrderedListPb();
            $orderlistPb->setParentOrderId($result->getParentOrderId());
            $orderlistPb->setPaymentRef($result->getPaymentRef());
            $orderlistPb->setTime($result->getTime());
            $orderlistPb->setDeliveryStatus($result->getDeliveryStatus());
            if(!in_array($result->getParentOrderId(),$ids)){
                $count+=1;
                array_push($ids,$result->getParentOrderId());
                array_push($results, $orderlistPb);
            }

        }
        $response->getSummary()->setResultCount($count);
        $response->setOrderListresults($results);
        return $response;
    }

    public function getOrderlistResponse($resp)
    {
        $results = array();
        $response = new OrderedListSearchRespPb();
        $response->setSummary($resp->getSummary());
        foreach ($resp->getResults() as $result) {
            array_push($results, $result);
        }
        $response->setBuyListresults($results);
        return $response;
    }
}
