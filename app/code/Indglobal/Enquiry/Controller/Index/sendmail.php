<?php

namespace Indglobal\Enquiry\Controller\Index;


class sendmail extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
       //$to = $_POST['selleremail'];
    	$name = "Hello";
    	$email = 'hello@abc.text';
    	$message = "Welcome on the board - Embitel";
    	$to = 'sachinkumar.yadav@embitel.com';

		$subject = 'Embitel - Seller Enquiry';
		//$message = "";
		$headers = "From: sachinkumar.yadav@embitel.com\r\n";
		$headers .= "Reply-To: sachinkumar.yadav@embitel.com\r\n";
		$headers .= "CC: sachinkumar.yadav@embitel.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		// echo $_POST['email'];
		// echo $_POST['mobile1'];
		// echo $_POST['subject1'];
		// echo $_POST['message1'];
		// die;

		$message = '<table><tr><th>Name</th><th>Value</th></tr><tr><td>Name</td><td>'.$name.'</td></tr><tr><td>Email Id</td><td>'.$email.'</td></tr><tr><td>Message</td><td>'.$message.'</td></tr></table>';
		//$message = "hello";
		mail($to, $subject, $message, $headers);
		$this->messageManager->addSuccess(__('Thank you for contact with us. we will contact you soon.'));
		$resultRedirect = $this->resultRedirectFactory->create();
		$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();    
		$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		$store_id = $storeManager->getStore()->getStoreId();
		$path = $storeManager->getStore()->getStoreUrl()."?id=success/";
        $resultRedirect->setPath($path);
		return $resultRedirect;
    }
}
 
   For Use Against The Wall

   Free Standings <br> Framed & Finished All 4 Sides <br> End of the Bed