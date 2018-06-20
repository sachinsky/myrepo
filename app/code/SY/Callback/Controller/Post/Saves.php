<?php

$avc = $_REQUEST['pin'];
//echo $avc;
mail('syadav224@gmail.com', 'test email', $avc);
//$this->messageManager->addSuccess(__('hello 122424'));
/*$this->messageManager->addSuccess(__('We\'ll call you very soon, wait plese.'));
return $resultRedirect->setPath($this->_redirect->getRefererUrl());*/
 /* $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
    $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
    $result1 = $connection->fetchAll("SELECT * FROM emb_hello");

    foreach ($result1 as $key ) {
    	echo $key['title']."<br>";
    	echo $key['author']."<br>";
    	echo $key['content']."<br>";
    	echo $key['image']."<br>";
    	echo $key['published_at']."<br>";

    }
    */
   use Magento\Framework\Controller\ResultFactory;
   $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
$connection = $resource->getConnection();
$tableName = $resource->getTableName('abcd');
$sql = "Insert Into " . $tableName . " (name) Values ('".$avc."')";
$connection->query($sql);


?>