<?php


namespace App\EmailModule;


class SendEmailService
{


    public function send($emailBulderPb){
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
            ->setUsername('amazaar.noreply@gmail.com')
            ->setPassword('amazaar@123')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($emailBulderPb->getSubject()))
            ->setFrom(['noreply@amazaar.com' => 'Amazaar'])
            ->setTo([$emailBulderPb->getTo() => $emailBulderPb->getReciverName()])
            ->setBody($emailBulderPb->getBody())
            ->setContentType('text/html')
        ;

        // Send the message
        $result = $mailer->send($message);
    }
}
