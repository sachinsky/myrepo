<?php

namespace Indglobal\Enquiry\Controller\Index;


class test9 extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
            $a = $_POST['id'];
            //$a = "iphone"; 
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
            $productRepository = $objectManager->get('\Magento\Catalog\Model\ProductRepository');
            $product = $productRepository->get($a);
            //echo $productObj->getId();
            // $cats = $product->getCategoryIds();
            // foreach ($cats as $category_id) {
            //     $_cat = Mage::getModel('catalog/category')->load($category_id) ;
            //     $b = $b . $_cat->getId();
            //     $b = $b . ",";
            // } 
            $allRelatedProductIds = $product->getRelatedProductIds();
            foreach ($allRelatedProductIds as $id12) {
                $c = $c . $id12;
                $c = $c . ",";
            }
            $a = $product->getName();
            $a = $a . "?";
            $a = $a . $product->getDescription();
            $a = $a . "?";
            $a = $a . $product->getShortDescription();
            $a = $a . "?";
            $a = $a . $product->getSku();
            $a = $a . "?";
            $a = $a . $product->getBankOffer();
            $a = $a . "?";
            $a = $a . $product->getReplacementPolicy();
            $a = $a . "?";
            $a = $a . $product->getWarranty();
            $a = $a . "?";
            $a = $a . $product->getWeight();
            $a = $a . "?";
            $a = $a . $product->getMetaTitle();
            $a = $a . "?";
            $a = $a . $product->getMetaKeyword();
            $a = $a . "?";
            $a = $a . $product->getMetaDescription();
            $a = $a . "?";
            $a = $a . $product->getRetailerMinQty();
            echo $a;
    }
}
