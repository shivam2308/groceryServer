<?php

namespace App\BuyPbModule;

use App\UtilityModule\TimeUtility;
use App\BaseCode\IntegerToAlphaConvertor;
use App\CustomerModule\CustomerUpdator;
use App\ItemPbModule\ItemUpdator;

class BuyHelper
{

    private $timeUtility;
    private $m_alphaToIntegerConvertor;

    public function __construct()
    {
        $this->timeUtility = new TimeUtility();
        $this->m_alphaToIntegerConvertor = new IntegerToAlphaConvertor();
    }
    public function orderIdEncoder($Ids){
        $id = explode("@",$Ids);
        $res = $this->m_alphaToIntegerConvertor->toNum($id[1]);
        return $id[0] . "@" . $res;
    }
    public function createOrderId($customerId, $itemId)
    {
        $custId = $this->orderIdEncoder($customerId);
        $itemId = $this->orderIdEncoder($itemId);
        $currentmilli = $this->timeUtility->getMilliseconds();
        $orderId = $custId . "!" . $itemId . "#" . $currentmilli;
        error_log($orderId);
        return $orderId;
    }

    public function createParentOrderId(string $customerId, string $paymentId)
    {
        $custId = $this->orderIdEncoder($customerId);
        $pId = $this->orderIdEncoder($paymentId);
        return $custId . "!" . $pId;
    }

}
