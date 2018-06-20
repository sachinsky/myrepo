<?php

namespace Excellence\Hello\Controller\Hello;


class myform extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
      $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
      ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();
      // $themeTable = $this->_resources->getTableName('pincode');
      //  echo "hello your pin is " . $_POST['pincode'];
       // exit();
        //$sql = "INSERT INTO " . $themeTable . "(title, author, email, subject, content) VALUES ('".$_POST['name']."', '".$_POST['contact']."', '".$_POST['email']."','".$_POST['subject']."','".$_POST['msg']."')";
       // $sql = "INSERT INTO " . $themeTable . "(title, author, content) VALUES ('".$_POST['name']."', '".$_POST['contact']."','".$_POST['msg']."')";
         $sql = "select * from pincode where pincode='".$_POST['pincode']."'";
         $result = $connection->fetchAll($sql);
         //print_r($result);
         foreach ($result as $key) {
           $abc = $key['pincode'];
           //echo $abc;

           }
    
         // exit();
       if(empty($abc))
         {
        
        $this->messageManager->addError(__('Sorry it seems pincode not available for delivery.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
         }

      else
          {
              $this->messageManager->addSuccess(__('Pincode is availbale for delivery!!!.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
          }
        
    }
}
