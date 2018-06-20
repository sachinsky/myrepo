<?php

namespace Indglobal\Enquiry\Controller\Index;


class test7 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
         // $a = $_POST['id']; 
         // $b = explode("?", $a);
         //    setcookie ("member_login",$b[0]);
         //    setcookie ("member_password",$b[1],time()+ (10 * 365 * 24 * 60 * 60));
    	//----------------------------tier price ---------------------------------------------
    	// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
     //    $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
     //    $store_id = $storeManager->getStore()->getStoreId();
     //    $productFactory = $objectManager->get('\Magento\Catalog\Model\ProductFactory');
     //    $product1 = $objectManager->create('Magento\Catalog\Model\Product')->load(130);
     //    echo $product1->getName();
     //    $tierPrice[0] = array('website_id' => 2,'cust_group' => 32000, 'price_qty' => 10 , 'price' => 80 );
     //    $product1->setTierPrice($tierPrice);
     //    $product1->save();   
        //------------------------------------tier price----------------------------------------
  //       $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
		 
		// $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		// $currency = $objectManager->get('\Magento\Directory\Model\Currency');
		 
		// $store = $storeManager->getStore();
		 
		// echo $currency->getCurrencySymbol() . '<br />';
		// echo $store->getCurrentCurrencyCode() . '<br />';
		// echo $store->getBaseCurrencyCode() . '<br />';
		// echo $store->getDefaultCurrencyCode() . '<br />';
		// echo $store->getCurrentCurrencyRate() . '<br />';
		 
		// $ab = $store->getAvailableCurrencyCodes();
		// $productId = 130;
		// $product = $objectManager->create('Magento\Catalog\Model\Product')->load(130);
		// $price = $product->getFinalPrice();
		// $currency = $objectManager->create('Magento\Directory\Model\Currency')->load('INR');
		// echo $currency->convert($price,'USD');
		//print_r($store->getAllowedCurrencies()) . '<br />';
    }
}
