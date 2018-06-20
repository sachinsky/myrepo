<?php

namespace Indglobal\Enquiry\Controller\Index;


class savefranchise extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
        ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();
        $themeTable = $this->_resources->getTableName('indglobal_enquiry');
        $sql = "INSERT INTO " . $themeTable . "(title, author, email, subject, content) VALUES ('".$_POST['name']."', '".$_POST['contact']."', '".$_POST['email']."','".$_POST['subject']."','".$_POST['msg']."')";
        $connection->query($sql);
        $this->messageManager->addSuccess(__('Thank you for submit your query. we will contact you soon.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
    }
}
