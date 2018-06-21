<?php

namespace Indglobal\Enquiry\Controller\Index;


class category extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
      $categoryId = 42;
      $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      $category = $_objectManager->create('Magento\Catalog\Model\Category')
      ->load($categoryId);
      echo $category->getUrl();
       echo $category->getName();
    }
}
