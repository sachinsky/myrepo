<?php

namespace Indglobal\Enquiry\Controller\Index;


class test4 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
       $a = $_POST['id'];
      // echo $b[1];
       $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
       $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $result1 = $connection->query("DELETE FROM otp where mobile='".$a."'");
        echo "1";
    }
}
