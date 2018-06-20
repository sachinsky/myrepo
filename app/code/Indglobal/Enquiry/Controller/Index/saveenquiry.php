<?php

namespace Indglobal\Enquiry\Controller\Index;


class saveenquiry extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
        ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();
        $themeTable = $this->_resources->getTableName('indglobal_enquiry');
       // $sql = "INSERT INTO " . $themeTable . "(title, author, email, subject, content) VALUES ('".$_POST['name']."', '".$_POST['contact']."', '".$_POST['email']."','".$_POST['subject']."','".$_POST['msg']."')";
        $sql = "INSERT INTO " . $themeTable . "(title, author, content) VALUES ('".$_POST['name']."', '".$_POST['contact']."','".$_POST['msg']."')";
        $connection->query($sql);

        mail('sachinkumar.yadav@embitel.com', 'Enquiry', 'Enquiry message to be here!!!!');

        $this->messageManager->addSuccess(__('Thank you for submit your query. we will contact you soon.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
    }
}
