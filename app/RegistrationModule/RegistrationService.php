<?php


namespace App\RegistrationModule;


use App\BaseCode\JsonConvertor\JsonConvertor;
use App\BaseCode\Strings;
use App\CustomerModule\CustomerService;
use App\EmailModule\SendEmailService;
use App\LoginPbModule\LoginService;
use App\SendPushNotification\SendPushNotificationService;

class RegistrationService
{
    private $m_customerService;
    private $m_loginService;
    private $m_registrationHelper;
    private $m_registrtionProvider;
    private $m_sendPushNotificationService;
    private $m_sendEmailService;

    public function __construct()
    {
        $this->m_customerService = new CustomerService();
        $this->m_loginService = new LoginService();
        $this->m_registrationHelper = new RegistrationHelper();
        $this->m_registrtionProvider = new RegistrationDefaultPbProvider();
        $this->m_sendPushNotificationService = new SendPushNotificationService();
        $this->m_sendEmailService = new SendEmailService();
    }

    public function create($registrationPb)
    {
        $customer = $this->m_customerService->create($registrationPb->getCustomer());
        if (Strings::notEmpty($customer->getDbInfo()->getId())) {
            $login = $this->m_loginService->create($this->m_registrationHelper->getLoginPb($customer));
            if (Strings::notEmpty($login->getDbInfo()->getId())) {
                $pb = $this->m_registrtionProvider->getDefaultPb();
                $pb->setCustomer($customer);
                $pb->setLogin($login);
                return $pb;
            } else {

            }
            $this->m_sendEmailService->send($this->m_registrationHelper->getEmailContent($customer));
        } else {

        }

    }
}
