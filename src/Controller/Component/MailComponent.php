<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
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

     $adminData = $this->getAdminData();
     $instituteName = $adminData[0]->Institutename;
     $adminEmail = $adminData[0]->adminemailId;
       $email = new Email('default');
        $email->setTemplate('emailTemplate')
            ->setEmailFormat('html')
            ->setViewVars(['name' =>$name,"email"=>$email,"password"=>$password,"courseName"=>$courseName,"duration"=>$duration,"courseFee"=>$courseFee,"instituteName"=>$instituteName,"adminEmail"=>$adminEmail])
            //->from(['me@example.com' => 'My Site'])
             ->from([$adminEmail =>  $instituteName])
            ->setTo($emailId)
            ->setSubject('You are successfully registered.')
            ->send('My message');
           // die("here");

    }

    public function getAdminData()
    {

      $trUsers = TableRegistry::get('Settings');
      $adminData = $trUsers->find('all');
      return $adminData->toArray();
    }

    public function sendMailToStudent($emailId, $name, $subject, $message)
    { 
       $adminData = $this->getAdminData();
       $instituteName = $adminData[0]->Institutename;
       $adminEmail = $adminData[0]->adminemailId;
        $email = new Email('default');
      $sent=$email->setTemplate('email')
            ->setEmailFormat('html')
            ->setViewVars(['message' =>$message, "instituteName"=>$instituteName,"adminEmail"=>$adminEmail, "name"=>$name])
            ->from(['me@example.com' => $instituteName])
            ->setTo($emailId)
            ->setSubject($subject)
            ->send('My message');
           

    }
}