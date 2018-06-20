<?php

namespace Embitel\Slider\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

interface SliderLoaderInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return \Embitel\Slider\Model\Slider
     */
    public function load(RequestInterface $request, ResponseInterface $response);
}
