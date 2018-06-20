<?php

namespace Indglobal\Enquiry\Controller\Index;


class test8 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
         $a = $_POST['id']; 
         $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
         $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
         $store_id = $storeManager->getStore()->getStoreId();
         $productFactory = $objectManager->get('\Magento\Catalog\Model\ProductFactory');
         $product4 = $productFactory->create()->setStoreId(2)->load($a);
         if($product4){
            echo $product4->getProductUrl();
         }else{
          echo "0";
         }
    }
}
