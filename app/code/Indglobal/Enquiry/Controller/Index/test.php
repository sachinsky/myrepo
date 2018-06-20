<?php

namespace Indglobal\Enquiry\Controller\Index;


class test extends \Magento\Framework\App\Action\Action
{
	
    public function execute()
    {
        $otp = mt_rand(100000, 999999);
        $receipientno = $_POST['id'];
        $ch = curl_init();
        $user="halalglobalhub@gmail.com";
        $senderID="HGHIND";
        $msgtxt= $otp;
        curl_setopt($ch,CURLOPT_URL,  "https://control.msg91.com/api/sendhttp.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "authkey=198174ANYYST4j4ck5a842299&mobiles=$receipientno&message=$msgtxt&sender=HGHIND&route=4&country=0");
        $buffer = curl_exec($ch);
        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
        ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();
        $themeTable = $this->_resources->getTableName('otp');
        $sql = "INSERT INTO " . $themeTable . "(mobile, otp) VALUES ('".$_POST['id']."', '".$otp."')";
        $connection->query($sql);
      //  $block->getCatalogSession()->setMyotp($otp);
        if(empty ($buffer))
        { //echo " buffer is empty "; 
        }
        else
        { echo $buffer;
         }
        curl_close($ch);
    }
}
