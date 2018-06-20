<?php

namespace Indglobal\Enquiry\Controller\Index;


class test5 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
         $a = $_POST['id']; 
         $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
         $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
         $store_id = $storeManager->getStore()->getStoreId();
         $CustomerModel = $objectManager->create('Magento\Customer\Model\Customer');
         $CustomerModel->setWebsiteId($store_id); 
         $CustomerModel->loadByEmail($a);
         if($CustomerModel->getId()){
               $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
               $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
               $result1 = $connection->query("select * from indglobal_seller where email='".$a."'");
               $row  = $result1->fetchAll();
               if(!empty($row)){
                echo "2";
               }else{
           echo "1";
       }
         }else{
           echo "0";
         }
    }
}
