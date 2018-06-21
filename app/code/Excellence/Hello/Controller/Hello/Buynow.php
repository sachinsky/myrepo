<?php
namespace Excellence\Hello\Controller\Hello;
    use Magento\Framework\App\Action\Context;
    use Magento\Framework\View\Result\PageFactory;

    class Buynow extends \Magento\Customer\Controller\AbstractAccount
    {
       protected $formKey;  
protected $cart;
protected $product;
 
public function __construct(
\Magento\Framework\App\Action\Context $context,
\Magento\Framework\Data\Form\FormKey $formKey,
\Magento\Checkout\Model\Cart $cart,
\Magento\Catalog\Model\Product $product,
array $data = []) {
    $this->formKey = $formKey;
    $this->cart = $cart;
    $this->product = $product;      
    parent::__construct($context);
}
 
public function execute()
 {
  $productId =1;     // Your Product Id
  $params = array(
                'form_key' => $this->formKey->getFormKey(),
                'product' => $productId,                
             'qty'   =>1     //quantity of product              
            ); 
            
    //Load the product based on productID  
    $_product = $this->product->load($productId);       
    $this->cart->addProduct($_product, $params);
    $this->cart->save();
    }

}