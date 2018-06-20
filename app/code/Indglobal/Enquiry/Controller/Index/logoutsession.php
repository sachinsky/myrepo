<?php

namespace Indglobal\Enquiry\Controller\Index;


class logoutsession extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        
    	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$customerSession = $objectManager->create('Magento\Customer\Model\Session');
        $customerSession->logout();
        $this->messageManager->addSuccess(__('You are successfully logged out.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('/');
        return $resultRedirect;

    }
}
