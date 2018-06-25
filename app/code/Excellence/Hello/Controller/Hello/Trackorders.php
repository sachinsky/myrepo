<?php
namespace Excellence\Hello\Controller\Hello;
 
 
class Trackorders extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;       
        return parent::__construct($context);
    }
     
    public function execute()
    {

        //echo $_POST['orderid'] . $_POST['email'];
        $orderid = $_POST['orderid'];
 
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$order = $objectManager->create('Magento\Sales\Api\Data\OrderInterface')->loadByIncrementId($orderid);
$email = $order->getCustomerEmail();
//$state = $order->getState();
$status = $order->getStatus();
$cname = $order->getShippingAddress()->getName();
if($email == $_POST['email'])
{
    echo  "<h3>Dear Mr. " . $cname . " your order #" . $orderid ." is in " . $status . " you will be get notified once order is updated - Thank You </h3>";
}
else
{
    echo "It seems your have entered incorrect OrderID or Email please try again - Thank you!!!";
}
 // return $this->resultPageFactory->create(); 
    } 
}