<?php
namespace App\BuyPbModule;

use App\UtilityModule\TimeUtility;
use App\BaseCode\IntegerToAlphaConvertor;
use App\CustomerModule\CustomerUpdator;
use App\ItemPbModule\ItemUpdator;

class BuyHelper {

    private $timeUtility;
    private $m_alphaToIntegerConvertor;

    public function __construct()
    {
        $this->timeUtility = new TimeUtility();
        $this->m_alphaToIntegerConvertor = new IntegerToAlphaConvertor();
    }

    public function createOrderId($customerId, $itemId){

        $custId = $this->m_alphaToIntegerConvertor->toNum($customerId);
        $itemId = $this->m_alphaToIntegerConvertor->toNum($itemId);
        $currentmilli = $this->timeUtility->getMilliseconds();
        $orderId = $custId . "@" . $itemId . "#" . $currentmilli;
        return $orderId;
    }

}