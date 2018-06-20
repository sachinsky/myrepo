<?php

namespace Embitel\Bannerslide\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;

class BannerslideLoader implements BannerslideLoaderInterface
{
    /**
     * @var \Embitel\Bannerslide\Model\BannerslideFactory
     */
    protected $bannerslideFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * @param \Embitel\Bannerslide\Model\BannerslideFactory $bannerslideFactory
     * @param OrderViewAuthorizationInterface $orderAuthorization
     * @param Registry $registry
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        \Embitel\Bannerslide\Model\BannerslideFactory $bannerslideFactory,
        Registry $registry,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->bannerslideFactory = $bannerslideFactory;
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

        $bannerslide = $this->bannerslideFactory->create()->load($id);
        $this->registry->register('current_bannerslide', $bannerslide);
        return true;
    }
}
