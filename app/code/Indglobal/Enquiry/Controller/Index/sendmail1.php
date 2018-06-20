<?php

namespace Indglobal\Enquiry\Controller\Index;


class sendmail1 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
       $to = "halalglobalhub@gmail.com";

		$subject = 'Halal Global Hub - Quick Help';
		//$message = "";
		$headers = "From: enquiry@halal.com\r\n";
		$headers .= "Reply-To: enquiry@halal.com\r\n";
		$headers .= "CC: halalglobalhub@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		// echo $_POST['email'];
		// echo $_POST['mobile1'];
		// echo $_POST['subject1'];
		// echo $_POST['message1'];
		// die;
		$a = $_POST['id'];
		$b = explode("?", $a);
		$message = '<table><tr><th>Name</th><th>Value</th></tr><tr><td>Name</td><td>'.$b[0].'</td></tr><tr><td>Email Id</td><td>'.$b[1].'</td></tr><tr><td>Subject</td><td>'.$b[2].'</td></tr><tr><td>Message</td><td>'.$b[3].'</td></tr></table>';
		//$message = "hello";
		mail($to, $subject, $message, $headers);
		echo 'Thank you for contact with us. we will contact you soon.';
    }
}
