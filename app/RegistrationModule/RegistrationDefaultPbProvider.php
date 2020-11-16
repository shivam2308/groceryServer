<?php


namespace App\RegistrationModule;


use App\CustomerModule\CustomerPbDefaultProvider;
use App\Interfaces\IDefaultPbProvider;
use App\LoginPbModule\LoginPbDefaultProvider;
use App\Protobuff\RegistrationPb;

class RegistrationDefaultPbProvider implements IDefaultPbProvider
{
    private $customerDefaultProvider;
    private $loginDefaultProvider;

    public function __construct()
    {
        $this->customerDefaultProvider = new CustomerPbDefaultProvider();
        $this->loginDefaultProvider = new LoginPbDefaultProvider();
    }

    public function getDefaultPb()
    {
        $registrationPb = new RegistrationPb();
        $registrationPb->setCustomer($this->customerDefaultProvider->getDefaultPb());
        $registrationPb->setLogin($this->loginDefaultProvider->getDefaultPb());
        return $registrationPb;
    }

    public function getDefaultRefPb()
    {
        // TODO: Implement getDefaultRefPb() method.
    }
}
