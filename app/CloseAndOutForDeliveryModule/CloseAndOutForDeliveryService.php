<?php


namespace App\CloseAndOutForDeliveryModule;


use App\BuyPbModule\BuyService;
use App\Protobuff\BuyPb;
use App\Protobuff\BuySearchRequestPb;
use App\Protobuff\BuySearchResponsePb;
use App\Protobuff\DeliveryStatusEnum;

class CloseAndOutForDeliveryService
{
    private $buyService;

    public function __construct()
    {
        $this->buyService = new BuyService();
    }

    public function get($id)
    {
        $idSplit = explode("!", $id);
        $buySearchReq = new BuySearchRequestPb();
        $buySearchReq->setParentOrderId($idSplit[0]);
        $buySearchResp = new BuySearchResponsePb();
        //$buySearchResp = $this->buyService->search($buySearchReq);
        $statusTo = DeliveryStatusEnum::value($idSplit[1]);
        foreach ($buySearchResp->getResults() as $buyPb) {
            $buyPb = new BuyPb();
            $buyPb->setDeliveryStatus($statusTo);
            $this->buyService->update($buyPb->getDbInfo()->getId(), $buyPb);
        }
        return $this->buyService->search($buySearchReq);
    }

}
