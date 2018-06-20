<?php

namespace Indglobal\Enquiry\Controller\Index;


class test1 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
       $a = $_POST['id'];
       $b = explode("?", $a);
      // echo $b[1];
       $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
       $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
       $result1 = $connection->fetchAll("SELECT * FROM otp where mobile='".$b[1]."' AND otp='".$b[0]."'");
       if(empty($result1)){
        echo "0";
       }else{
        $result1 = $connection->query("DELETE FROM otp where mobile='".$b[1]."' AND otp='".$b[0]."'");
        echo "1";
       }
    }
}
