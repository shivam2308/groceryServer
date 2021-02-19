<?php


namespace App\CloseAndOutForDeliveryModule;


use App\BaseCode\JsonConvertor\JsonConvertor;
use App\BaseCode\Strings;
use App\BuyPbModule\BuyService;
use App\CustomerModule\CustomerCache;
use App\Protobuff\BuySearchRequestPb;
use App\Protobuff\DeliveryStatusEnum;
use App\Protobuff\PushNotificationPb;
use App\Protobuff\PushNotificationSearchRequestPb;
use App\Protobuff\PushNotificationSearchResponsePb;
use App\Protobuff\SendNotificationTypeEnum;
use App\Protobuff\SendPushNotificationPb;
use App\PushNotificationPbModule\PushNotificationService;
use App\SendPushNotification\SendPushNotificationService;

class CloseAndOutForDeliveryService
{
    private $buyService;
    //private $customerCache;
    private $customerId;
    private $pushNotificationService;
    private $sendPushNotificationService;

    public function __construct()
    {
        $this->buyService = new BuyService();
       // $this->customerCache = new CustomerCache();
        $this->pushNotificationService = new PushNotificationService();
        $this->sendPushNotificationService = new SendPushNotificationService();
    }

    public function get($id)
    {
        $idSplit = explode("!", $id);
        $buySearchReq = new BuySearchRequestPb();
        $buySearchReq->setParentOrderId($idSplit[0]);
        $buySearchResp = $this->buyService->search($buySearchReq);
        $statusTo = DeliveryStatusEnum::value($idSplit[1]);
        foreach ($buySearchResp->getResults() as $buyPb) {
            $this->customerId = $buyPb->getCustomerRef()->getId();
            $buyPb->setDeliveryStatus($statusTo);
            $this->buyService->update($buyPb->getDbInfo()->getId(), $buyPb);
        }
        if (Strings::notEmpty($this->customerId)) {
            $searchReq = new PushNotificationSearchRequestPb();
            $searchReq->setCustomerRefId($this->customerId);
            $searchResp = $this->pushNotificationService->search($searchReq);
            if ($searchResp->getResults()->count() > 0) {
                if ($statusTo == DeliveryStatusEnum::CLOSED) {
                    $pushNotificationPb = $searchResp->getResults()->getIterator()->current();
                    $this->sendPushNotificationService->create($this->getSendNotificationPb($pushNotificationPb->getToken(), $statusTo, $idSplit[0]));
                } elseif ($statusTo == DeliveryStatusEnum::OUT_FOR_DELIVERY) {
                    $pushNotificationPb = $searchResp->getResults()->getIterator()->current();
                    $this->sendPushNotificationService->create($this->getSendNotificationPb($pushNotificationPb->getToken(), $statusTo, $idSplit[0]));
                } else {
                    //nothing
                }
            } else {
                //nothing
            }
        }
        return $this->buyService->search($buySearchReq);
    }

    private function getSendNotificationPb($token, $deliveryStatusEnm, $id)
    {
        $sendPushNotification = new SendPushNotificationPb();
        $sendPushNotification->setRegistrationId($token);
        $sendPushNotification->setSendType(SendNotificationTypeEnum::SINGLE);
        if ($deliveryStatusEnm == DeliveryStatusEnum::CLOSED) {
            $sendPushNotification->setSubject("Your Order Is Succcesfully Closed");
            $sendPushNotification->setBody("Your Order " . $id . " is Successfully Closed. CheckOut App for Futher Information.");
        } else {
            $sendPushNotification->setSubject("Your Order Is Out For Delivery");
            $sendPushNotification->setBody("Your Order " . $id . " is Successfully Out for Delivery. We will reach you shortly");
        }
        return $sendPushNotification;

    }

}
