<?php

namespace Indglobal\Enquiry\Controller\Index;


class gotobuyersignin extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        
    	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$customerSession = $objectManager->create('Magento\Customer\Model\Session');
        $customerSession->logout();
        $this->messageManager->addSuccess(__('You are successfully logged out as a Seller.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/create');
        return $resultRedirect;

    }
}
