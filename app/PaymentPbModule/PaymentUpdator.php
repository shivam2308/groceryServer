<?php

namespace App\PaymentPbModule;


use App\BaseCode\Strings;
use App\CustomerModule\CustomerUpdator;
use App\EntityPbModule\EntityUpdator;
use App\Interfaces\IUpdator;
use App\Protobuff\PaymentPb;

class PaymentUpdator implements IUpdator{

    private $entityUpdator;
    private $customerUpdator;

    public function __construct()
    {
        $this->entityUpdator = new EntityUpdator();
        $this->customerUpdator = new CustomerUpdator();

    }

    public function update($pb)
    {
       $pb = new PaymentPb();
       $array = array();
        if (Strings::notEmpty($pb->getDbInfo()->getId())) {
            $array = array_merge($array, $this->m_entityUpdator->update($pb->getDbInfo()));
        }
    }

    public function refUpdate($pb)
    {
        // TODO: Implement refUpdate() method.
    }
}

?>
