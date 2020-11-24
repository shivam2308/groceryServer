<?php


namespace App\RegistrationModule;


use App\CustomerModule\CustomerHelper;
use App\LoginPbModule\LoginPbDefaultProvider;
use App\Protobuff\LoginPb;

class RegistrationHelper
{

    private $customerHelper;
    private $m_loginDefaultPbProvider;

    public function __construct()
    {
        $this->customerHelper = new CustomerHelper();
        $this->m_loginDefaultPbProvider = new LoginPbDefaultProvider();
    }

    public function getLoginPb($pb)
    {
        $loginPb = $this->m_loginDefaultPbProvider->getDefaultPb();
        $loginPb->setCustomerRef($this->customerHelper->getCustomerRef($pb));
        return $loginPb;
    }

}
