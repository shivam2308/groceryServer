<?php


namespace App\EmailModule;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendEmailService
{


    public function send($emailBulderPb){
       /* $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
            ->setUsername('amazaar.noreply@gmail.com')
            ->setPassword('amazaar@123')
        ;*/

        $transport = (new Swift_SmtpTransport('smtp.hostinger.in', 587,'tls'))
            ->setUsername('no-reply@amazaar.in')
            ->setPassword('Shiv@2308')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($emailBulderPb->getSubject()))
            ->setFrom(['no-reply@amazaar.in' => 'Amazaar'])
            ->setTo([$emailBulderPb->getTo() => $emailBulderPb->getReciverName()])
            ->setBody($emailBulderPb->getBody())
            ->setContentType('text/html')
        ;

        // Send the message
        $result = $mailer->send($message);
    }
}
