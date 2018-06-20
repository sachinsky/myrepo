<?php

namespace Embitel\Bannerslide\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

interface BannerslideLoaderInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return \Embitel\Bannerslide\Model\Bannerslide
     */
    public function load(RequestInterface $request, ResponseInterface $response);
}
