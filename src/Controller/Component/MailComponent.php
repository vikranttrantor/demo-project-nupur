<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
class MailComponent extends Component
{
	public function sendSmtpMail($email)
    {
       // echo "hii";die;
        $to = "nupursethi1507@gmail.com";
        $subject = "test mail";
        $txt = "This is the mail for testing purpose";
        $headers = "From: nupur@example.com" . "\r\n" .
        "CC: nupur1234@example.com";

       $status = mail($to,$subject,$txt,$headers);
       if($status==1)
       {
            echo "yes";die;
       }
       else
       {
            echo "no";die;
       }

    }
}