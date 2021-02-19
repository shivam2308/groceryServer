<?php


namespace App\SendPushNotification;


use App\BaseCode\BaseModule\FirebaseModule;
use App\BaseCode\Strings;
use App\Protobuff\SendNotificationTypeEnum;
use App\Protobuff\SendPushNotificationPb;

class SendPushNotificationService
{
    private $m_firebaseModule;

    public function __construct()
    {
        $this->m_firebaseModule = new FirebaseModule();
    }

    public function create($sendPushNotifiacationPb)
    {
        if ($sendPushNotifiacationPb->getSendType() == SendNotificationTypeEnum::SINGLE) {
            if (Strings::notEmpty($sendPushNotifiacationPb->getRegistrationId())) {
                //$this->m_firebaseModule->sendPushNotificationToDevice($sendPushNotifiacationPb->getRegistrationId(), $sendPushNotifiacationPb->getSubject(), $sendPushNotifiacationPb->getBody());
                $arrNotification = array();
                $arrNotification["body"] = $sendPushNotifiacationPb->getBody();
                $arrNotification["title"] = $sendPushNotifiacationPb->getSubject();
                $arrNotification["sound"] = "default";
                $arrNotification["type"] = 1;
                $this->m_firebaseModule->send_notification($sendPushNotifiacationPb->getRegistrationId(), $arrNotification);
            }
        } else if ($sendPushNotifiacationPb->getSendType() == SendNotificationTypeEnum::MULTIPLE) {
            if (sizeof($sendPushNotifiacationPb->getRegistrationIds()) > 0) {
                $this->m_firebaseModule->sendPushNotificationToMultipleDevice($sendPushNotifiacationPb->getRegistrationIds(), $sendPushNotifiacationPb->getSubject(), $sendPushNotifiacationPb->getBody());
            }
        }
    }
}
