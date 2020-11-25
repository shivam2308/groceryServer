<?php


namespace App\BaseCode\BaseModule;


use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\ServiceAccount;

class FirebaseModule
{
    private ServiceAccount $serviceAccount;
    private \Kreait\Firebase\Messaging $firebaseCloudMessaging;

    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromValue(__DIR__ . '/amazaargrocery-firebase-adminsdk-76ctx-1a7876aa27.json');
        $this->firebaseCloudMessaging = (new Factory)
            ->withServiceAccount($this->serviceAccount)
            ->createMessaging();
    }

    public function sendPushNotificationToDevice($deviceToken, $title, $body)
    {
        $message = CloudMessage::withTarget('token', $deviceToken)
            ->withNotification(Notification::create($title, $body));
        try {
            $this->firebaseCloudMessaging->send($message);
        } catch (MessagingException $e) {
        } catch (FirebaseException $e) {
        }
    }

    public function sendPushNotificationToMultipleDevice($deviceTokens, $title, $body)
    {
        $message = CloudMessage::new()->withNotification(Notification::create($title, $body));
        try {
            $this->firebaseCloudMessaging->sendMulticast($message, $deviceTokens);
        } catch (MessagingException $e) {
        } catch (FirebaseException $e) {
        }
    }
}
