<?php
/**
 * Callback
 * 
 * @author 
 */
namespace SY\Callback\Controller\Post;
use Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;
class Save extends \Magento\Framework\App\Action\Action {
	protected $_resultPageFactory;
	public function __construct(Context $context, PageFactory $resultPageFactory){
		$this->_resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}
	public function execute(){
		$resultRedirect = $this->resultRedirectFactory->create();
		$model = $this->_objectManager->create('SY\\Callback\\Model\\Request');
		$params = $this->getRequest()->getPostValue();
		if($this->getRequest()->getParam('is_product') != "1"){
			unset($params['product_id']);
		}
		$model->setData($params);
		$params = $this->getRequest()->getPostValue();
		$aa = $params['firstname'];
		$bb = $params['lastname'];
		$cc = $params['telephone'];
		$dd = $params['comment'];
		$message = '<h3> First Name: '.$aa.'<br> Last Name: '.$bb.'<br> Contact no. '.$cc.'<br> Message: '.$dd.'</h3>';

$to       = 'sachinkumar.yadav@embitel.com';
$subject  = "Order Confirmation";
$headers  = 'From: TvliftCabinet <sachinkumar.yadav@embitel.com>' . "\r\n";
$headers .= 'Bcc: sachinkumar.yadav@embitel.com' . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";

$sent   = @mail($to,$subject,$message,$headers); 
	//	exit();
		try {
			$model->save();
			$this->messageManager->addSuccess(__('We\'ll call you very soon, wait please - Local.'));
		} catch (\Exception $e) {
			$this->messageManager->addException($e, __('Something went wrong.'));
		}
		return $resultRedirect->setPath($this->_redirect->getRefererUrl());
	}
}