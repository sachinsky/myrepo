<?php

namespace Indglobal\Enquiry\Controller\Index;


class custombranding extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $directory = $objectManager->get('\Magento\Framework\Filesystem\DirectoryList');
        $rootPath  =  $directory->getRoot();
        $rootPath1 = $rootPath."/pub/media/custombranding/";
        $file_tmp1 =$_FILES['file']['tmp_name'];
        $file_name1 = $_FILES['file']['name'];
        move_uploaded_file($file_tmp1,$rootPath1.$file_name1);

        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
        ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();
        $themeTable = $this->_resources->getTableName('custombranding');
        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $result1 = $connection->fetchAll("SELECT * FROM custombranding where quote_id='".$_POST['quote_id']."' AND product_id='".$_POST['pro_id']."'");
        if(empty($result1)){
        $sql = "INSERT INTO " . $themeTable . "(quote_id, product_id, imagename, order_id) VALUES ('".$_POST['quote_id']."', '".$_POST['pro_id']."', '".$file_name1."','')";
        $connection->query($sql);
       }else{
         $sql = "update " . $themeTable . " set imagename='".$file_name1."' where quote_id='".$_POST['quote_id']."' AND product_id= '".$_POST['pro_id']."'";
         $connection->query($sql);
       }
        echo "Custom Branding image is added successfully.";
    }
}
