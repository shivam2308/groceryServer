<?php

namespace App\BuyPbModule;

use App\DeliveryManPbModule\DeliveryManUpdator;
use Exception;
use App\Interfaces\IUpdator;
use App\BaseCode\Strings;
use App\BuyPbModule\BuyIndexers;
use App\BuyPbModule\BuyHelper;
use App\EntityPbModule\EntityUpdator;
use App\CustomerModule\CustomerUpdator;
use App\ItemPbModule\ItemUpdator;
use App\Protobuff\DeliveryStatusEnum;
use App\BaseCode\BaseModule\BaseRefConvertorAndUpdator;
use App\TimePbModule\TimeUpdator;


class BuyUpdator implements IUpdator
{

    private $m_entityUpdator;
    private $m_customerUpdator;
    private $m_itemUpdator;
    private $m_refUpdator;
    private $m_timeUpdator;
    private $m_createOrderId;
    private $m_devliveryManUpdator;

    public function __construct()
    {
        $this->m_entityUpdator = new EntityUpdator();
        $this->m_customerUpdator = new CustomerUpdator();
        $this->m_itemUpdator = new ItemUpdator();
        $this->m_refUpdator = new BaseRefConvertorAndUpdator();
        $this->m_timeUpdator = new TimeUpdator();
        $this->m_createOrderId = new BuyHelper();
        $this->m_devliveryManUpdator = new DeliveryManUpdator();
    }

    public function update($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $pbArray = array_merge($pbArray, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
        $pbArray = array_merge($pbArray, $this->m_customerUpdator->refUpdate($pb->getCustomerRef()));

        $pbArray = array_merge($pbArray, $this->m_itemUpdator->refUpdate($pb->getItemRef()));
        if (Strings::notEmpty($pb->getOrderId())) {
            $pbArray[BuyIndexers::getORDER_ID()] = $pb->getOrderId();
        } else {
            $pbArray[BuyIndexers::getORDER_ID()] = $this->m_createOrderId->createOrderId($pb->getCustomerRef()->getId(), $pb->getItemRef()->getId());
        }
        if (($pb->getQuantity()) < 0) {
            throw new Exception("Buy Quantity cannot be empty");
        } else {
            $pbArray[BuyIndexers::getQUANTITY()] = $pb->getQuantity();
        }
        if (($pb->getPrice()) == 0) {
            //echo("this is my price" + var_dump($pb->getItemRef()->getprice()) );
            $pbArray[BuyIndexers::getPRICE()] = $pb->getQuantity() * $pb->getItemRef()->getprice();
        } else {
            $pbArray[BuyIndexers::getPRICE()] = $pb->getPrice();
        }

        if ($pb->getDeliveryStatus() == DeliveryStatusEnum::UNKNOWN_DELIVERY_STATUS) {
            $pbArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name(DeliveryStatusEnum::PENDING);
        } else {
            $pbArray[BuyIndexers::getDELIVERY_STATUS()] = DeliveryStatusEnum::name($pb->getDeliveryStatus());
        }
        $pbArray = array_merge($pbArray, $this->m_timeUpdator->update($pb->getTime()));
        
        $pbArray = array_merge($pbArray, $this->m_devliveryManUpdator->refUpdate($pb->getDeliveryManRef()));
        return $pbArray;
    }

    public function refUpdate($pb)
    {
        $pbArray = array();
        if (Strings::notEmpty($pb->getId())) {
            $pbArray[BuyIndexers::getBUY_REF_ID()] = $pb->getId();
            $pbArray[BuyIndexers::getBUY_REF()] = $this->m_refUpdator->update($pb);
        }
        return $pbArray;
    }
}

?>
