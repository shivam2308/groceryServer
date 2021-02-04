<?php


namespace App\ConfirmOrderDeliveryModule;


use App\BaseCode\EncryptorAndDecryptor;
use App\BaseCode\JsonConvertor\JsonConvertor;
use App\BaseCode\Strings;
use App\BuyPbModule\BuyPbDefaultProvider;
use App\BuyPbModule\BuyService;
use App\Protobuff\BuyPb;
use App\Protobuff\ConfirmOrderDeliveryPb;
use App\Protobuff\DeliveryStatusEnum;
use App\Protobuff\IsOrderedPlacedEnum;
use App\Protobuff\TimePb;

class ConfirmOrderDeliveryService
{
    private $buyService;
    private $buyPbDefaultProvider;
    private $helper;
    private $isOrderDelivered = true;

    public function __construct()
    {
        $this->buyService = new BuyService();
        $this->helper = new ConfirmOrderDeliveryHelper();
        $this->buyPbDefaultProvider = new BuyPbDefaultProvider();
    }

    public function create($confirmDeliveryPb)
    {
        $this->isOrderDelivered = true;
        $confirmOrder = new ConfirmOrderDeliveryPb();
        $dycryptedString = EncryptorAndDecryptor::decrypt($this->helper->getEncryptedString($confirmDeliveryPb));
        $firstSplit = explode("&", $dycryptedString);
        $secondSplit = explode("|", $firstSplit[2]);
        $orderArray = array();
        foreach ($secondSplit as $value) {
            if (Strings::notEmpty($value)) {
                $buyPb = $this->buyPbDefaultProvider->getDefaultPb();
                $buyPb->mergeFrom($this->buyService->get($value));
                $buyPb->getDeliverytime()->setMilliseconds($firstSplit[4]);
                $buyPb->setDeliveryStatus(DeliveryStatusEnum::DELIVERED);
                $this->buyService->update($buyPb->getDbInfo()->getId(), $buyPb);
                array_push($orderArray, $this->buyService->update($buyPb->getDbInfo()->getId(), $buyPb));
            } else {
                //nothing
            }
        }
        $confirmOrder->setCustomerId($firstSplit[0]);
        $confirmOrder->setParentOrderId($firstSplit[1]);
        $confirmOrder->setOrderList($orderArray);
        $confirmOrder->setTime(new TimePb());
        $confirmOrder->getTime()->setDate($orderArray[0]->getDeliverytime()->getDate());
        $confirmOrder->getTime()->setMonth($orderArray[0]->getDeliverytime()->getMonth());
        $confirmOrder->getTime()->setYear($orderArray[0]->getDeliverytime()->getYear());
        $confirmOrder->getTime()->setMilliseconds($orderArray[0]->getDeliverytime()->getMilliseconds());
        $confirmOrder->getTime()->setFormattedDate($orderArray[0]->getDeliverytime()->getFormattedDate());
        $confirmOrder->getTime()->setTimezone($orderArray[0]->getDbInfo()->getLocale()->getDefaultTimeZone());

        foreach ($orderArray as $pb) {
            if ($pb->getDeliveryStatus() != DeliveryStatusEnum::DELIVERED) {
                $this->isOrderDelivered = false;
            }
        }
        if ($this->isOrderDelivered) {
            $confirmOrder->setStatus(IsOrderedPlacedEnum::ORDER_SUCCESS);
        } else {
            $confirmOrder->setStatus(IsOrderedPlacedEnum::ORDER_FAILED);
        }
        return $confirmOrder;
    }
}
