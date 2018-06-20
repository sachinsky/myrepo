<?php

namespace Indglobal\Enquiry\Controller\Index;


class deletecustom extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        

        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
        ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();
        $themeTable = $this->_resources->getTableName('custombranding');
        $sql = "delete from " . $themeTable . " where id='".$_REQUEST['id']."'";
        $connection->query($sql);
        $this->messageManager->addSuccess(__('Custom Branding is image is deleted successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
    }
}
