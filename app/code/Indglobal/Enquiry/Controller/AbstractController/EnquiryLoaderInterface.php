<?php

namespace Indglobal\Enquiry\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

interface EnquiryLoaderInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return \Indglobal\Enquiry\Model\Enquiry
     */
    public function load(RequestInterface $request, ResponseInterface $response);
}
