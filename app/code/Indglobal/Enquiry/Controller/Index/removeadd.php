<?php

namespace Indglobal\Enquiry\Controller\Index;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class removeadd extends Action
{
	protected $_addressRepository;
    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        \Magento\Customer\Api\AddressRepositoryInterface $addressRepository
 
    ) 
    {
        $this->_addressRepository = $addressRepository;
        parent::__construct($context);
    }
    public function execute()
    {
        
    	echo "hello";
    }
}
