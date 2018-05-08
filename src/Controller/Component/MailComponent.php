<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
class MailComponent extends Component
{
	public function sendSmtpMail($name,$emailId,$password,$courseName,$duration,$courseFee)
    { //echo $courseName;die;
       // echo "hii";die;
       //  $to = "nupursethi1507@gmail.com";
       //  $subject = "test mail";
       //  $txt = "This is the mail for testing purpose";
       //  $headers = "From: nupur@example.com" . "\r\n" .
       //  "CC: nupur1234@example.com";

       // $status = mail($to,$subject,$txt,$headers);
       // if($status == 1)
       // {
       //      echo "yes";die;
       // }
       // else
       // {
       //      echo "no";die;
       // }

       $email = new Email('default');
        $email->setTemplate('emailTemplate')
            ->setEmailFormat('html')
            ->setViewVars(['name' =>$name,"email"=>$email,"password"=>$password,"courseName"=>$courseName,"duration"=>$duration,"courseFee"=>$courseFee])
            ->from(['me@example.com' => 'ABC Institute'])
            ->setTo($emailId)
            ->setSubject('You are successfully registered.')
            ->send('My message');
           // die("here");

    }
}