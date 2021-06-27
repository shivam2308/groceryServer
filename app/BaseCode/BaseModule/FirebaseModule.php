<?php


namespace App\BaseCode\BaseModule;

use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;



class FirebaseModule
{
    private ServiceAccount $serviceAccount;
    private Messaging $firebaseCloudMessaging;
    private $serverKey = "AAAAuWJy2vc:APA91bEptg1i3y-gMLbFgyxafYNGWV1Q7fmLJheK1cmmt9dLvavBQef_eRqtUXMkzTbgiTzbVI3KDzpq2mtAI0058CyCrh_ky82FMQz6zjKyejLlcbkgz7tWkwodrtVAUapcDWdk5RNA";

    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromValue(__DIR__ . '/amazaargrocery-firebase-adminsdk-76ctx-1a7876aa27.json');
        $this->firebaseCloudMessaging = (new Factory())
            ->withServiceAccount($this->serviceAccount)
            ->createMessaging();
    }

    public function send_notification($registatoin_ids, $notification) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $message = array(
            'to' => $registatoin_ids,
            'data' => array(
                "message" => "Hello",
                "id" => "123",
            ),
            'notification' => array(
                "body" => $notification['body'],
                "title" =>$notification['title'],
            )
        );

        // Firebase API Key
        $headers = array('Authorization:key='.$this->serverKey,'Content-Type:application/json');
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
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
