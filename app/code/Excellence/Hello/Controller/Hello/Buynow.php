<?php
namespace Excellence\Hello\Controller\Hello;
 
 
class Buynow extends \Magento\Framework\App\Action\Action
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
        //return $this->resultPageFactory->create(); 
        $productId = 2;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$product = $objectManager->create('\Magento\Catalog\Model\Product')->load($productId);
$cart = $objectManager->create('Magento\Checkout\Model\Cart');  
$formKey = $objectManager->create('\Magento\Framework\Data\Form\FormKey')->getFormKey();  
//$option = array('469'=>459);

$params = array(
                    'form_key' => $formKey,
                    'product' => $productId, //product Id
                    'qty'   =>1, //quantity of product                
                    
                    );
$cart->addProduct($product, $params);
$cart->save();
$this->messageManager->addSuccess(__('Item added to the cart successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setRefererOrBaseUrl();
        return $resultRedirect;
    } 
}