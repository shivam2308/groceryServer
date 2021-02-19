<?php


namespace App\RegistrationModule;


use App\BaseCode\Strings;
use App\CustomerModule\CustomerHelper;
use App\LoginPbModule\LoginPbDefaultProvider;
use App\Protobuff\CustomerPb;
use App\Protobuff\EmailBuilderPb;
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

    public function getEmailContent($customer)
    {
        $customer = new CustomerPb();
        $emailBuilder = new EmailBuilderPb();
        $emailBuilder->setTo(Strings::getEmail($customer->getContact()->getEmail()));
        $emailBuilder->setReciverName(Strings::getName($customer->getName()));
        $emailBuilder->setSubject("Welcome To Our Shop");
        $emailBuilder->setBody($this->getContent(Strings::getName($customer->getName())));
        return $emailBuilder;
    }

    private function getContent($name)
    {
        return "Hello ".$name ;
    }

}
