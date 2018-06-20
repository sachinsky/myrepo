<?php

namespace Indglobal\Enquiry\Controller\Index;


class test2 extends \Magento\Framework\App\Action\Action
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
           echo "1";
         }else{
           echo "0";
         }
    }
}
