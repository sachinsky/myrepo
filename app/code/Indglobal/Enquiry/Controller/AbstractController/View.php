<?php

namespace Indglobal\Enquiry\Controller\AbstractController;

use Magento\Framework\App\Action;
use Magento\Framework\View\Result\PageFactory;

abstract class View extends Action\Action
{
    /**
     * @var \Indglobal\Enquiry\Controller\AbstractController\EnquiryLoaderInterface
     */
    protected $enquiryLoader;
	
	/**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
	 * @param PageFactory $resultPageFactory
     */
    public function __construct(Action\Context $context, EnquiryLoaderInterface $enquiryLoader, PageFactory $resultPageFactory)
    {
        $this->enquiryLoader = $enquiryLoader;
		$this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Enquiry view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->enquiryLoader->load($this->_request, $this->_response)) {
            return;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		return $resultPage;
    }
}
