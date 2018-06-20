<?php

namespace Embitel\Slider\Controller\AbstractController;

use Magento\Framework\App\Action;
use Magento\Framework\View\Result\PageFactory;

abstract class View extends Action\Action
{
    /**
     * @var \Embitel\Slider\Controller\AbstractController\SliderLoaderInterface
     */
    protected $sliderLoader;
	
	/**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
	 * @param PageFactory $resultPageFactory
     */
    public function __construct(Action\Context $context, SliderLoaderInterface $sliderLoader, PageFactory $resultPageFactory)
    {
        $this->sliderLoader = $sliderLoader;
		$this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Slider view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->sliderLoader->load($this->_request, $this->_response)) {
            return;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
		return $resultPage;
    }
}
