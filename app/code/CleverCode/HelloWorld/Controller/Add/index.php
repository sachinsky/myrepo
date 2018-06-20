<?php
namespace CleverCode\HelloWorld\Controller\Add;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
	{
            use Magento\Framework\Controller\ResultFactory;
   $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
   $avc = $_REQUEST['pin'];
$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
$connection = $resource->getConnection();
$tableName = $resource->getTableName('abcd');
$sql = "Insert Into " . $tableName . " (name) Values ('".$avc."')";
$connection->query($sql);
            $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $redirect->setUrl($this->_redirect->getRefererUrl());
            return $redirect;
	}
}