<?php

namespace Indglobal\Enquiry\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;

class EnquiryLoader implements EnquiryLoaderInterface
{
    /**
     * @var \Indglobal\Enquiry\Model\EnquiryFactory
     */
    protected $enquiryFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * @param \Indglobal\Enquiry\Model\EnquiryFactory $enquiryFactory
     * @param OrderViewAuthorizationInterface $orderAuthorization
     * @param Registry $registry
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        \Indglobal\Enquiry\Model\EnquiryFactory $enquiryFactory,
        Registry $registry,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->enquiryFactory = $enquiryFactory;
        $this->registry = $registry;
        $this->url = $url;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    public function load(RequestInterface $request, ResponseInterface $response)
    {
        $id = (int)$request->getParam('id');
        if (!$id) {
            $request->initForward();
            $request->setActionName('noroute');
            $request->setDispatched(false);
            return false;
        }

        $enquiry = $this->enquiryFactory->create()->load($id);
        $this->registry->register('current_enquiry', $enquiry);
        return true;
    }
}
