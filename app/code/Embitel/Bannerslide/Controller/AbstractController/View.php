<?php

namespace Embitel\Bannerslide\Controller\AbstractController;

use Magento\Framework\App\Action;
use Magento\Framework\View\Result\PageFactory;

abstract class View extends Action\Action
{
    /**
     * @var \Embitel\Bannerslide\Controller\AbstractController\BannerslideLoaderInterface
     */
    protected $bannerslideLoader;
	
	/**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
	 * @param PageFactory $resultPageFactory
     */
    public function __construct(Action\Context $context, BannerslideLoaderInterface $bannerslideLoader, PageFactory $resultPageFactory)
    {
        $this->bannerslideLoader = $bannerslideLoader;
		$this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Bannerslide view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->bannerslideLoader->load($this->_request, $this->_response)) {
            return;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		return $resultPage;
    }
}
