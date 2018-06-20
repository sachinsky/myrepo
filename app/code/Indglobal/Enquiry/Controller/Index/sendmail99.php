<?php

namespace Indglobal\Enquiry\Controller\Index;


class sendmail99 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
       $to = "halalglobalhub@gmail.com";

		$subject = 'Halal Global Hub - Seller Enquiry';
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

		$message = '<table><tr><th>Name</th><th>Value</th></tr><tr><td>Seller Email Id</td><td>'.$_POST['selleremail'].'</td></tr><tr><td>Subject</td><td>'.$_POST['subject'].'</td></tr><tr><td>Message</td><td>'.$_POST['msg'].'</td></tr></table>';
		//$message = "hello";
		mail($to, $subject, $message, $headers);
		$this->messageManager->addSuccess(__('Thank you for contact with us. we will contact you soon.'));
		$resultRedirect = $this->resultRedirectFactory->create();
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();    
		$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		$store_id = $storeManager->getStore()->getStoreId();
		$path = $storeManager->getStore()->getStoreUrl()."customer/account?id=success";
        $resultRedirect->setPath($path);
		return $resultRedirect;
    }
}
