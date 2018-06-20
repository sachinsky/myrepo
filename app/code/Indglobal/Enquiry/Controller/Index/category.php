<?php

namespace Indglobal\Enquiry\Controller\Index;


class category extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
      $categoryId = $_POST['id'];
      $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      $category = $_objectManager->create('Magento\Catalog\Model\Category')
      ->load($categoryId);
      echo $category->getUrl();
    }
}
