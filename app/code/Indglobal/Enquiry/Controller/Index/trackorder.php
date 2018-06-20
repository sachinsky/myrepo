<?php

namespace Indglobal\Enquiry\Controller\Index;


class trackorder extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$a = $_POST['id'];
$b = explode("?", $a);
$order = $objectManager->create('\Magento\Sales\Model\Order')->loadByIncrementId($b[0]);
if($order->getId()){
	if($order->getCustomerEmail()==$b[1]){
		if($order->getStatus()=="pending"){
			echo "1"."?".$order->getId()."?".$order->getCreatedAt();
		}
		if($order->getStatus()=="processing"){
			echo "2"."?".$order->getId()."?".$order->getCreatedAt();
		}
		if($order->getStatus()=="complete"){
			echo "3"."?".$order->getId()."?".$order->getCreatedAt();
		}
    }else{
    	echo "0"."?".""."?";
    }
}else{
	echo "4"."?".""."?";
}
    }
}
