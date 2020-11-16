<?php


namespace App\CustomerModule;


use App\Protobuff\CustomerPbRef;

class CustomerHelper
{
    private $defaultPbProvider;

    public function __construct()
    {
        $this->defaultPbProvider = new CustomerPbDefaultProvider();
    }

    public function getCustomerRef($customerPb)
    {
        $customerRef = $this->defaultPbProvider->getDefaultRefPb();
        $customerRef->setId($customerPb->getDbInfo()->getId());
        $customerRef->setName($customerPb->getName());
        $customerRef->setContact($customerPb->getContact());
        return $customerRef;
    }
}
