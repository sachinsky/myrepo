<?php

namespace Embitel\Slider\Controller\AbstractController;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;

class SliderLoader implements SliderLoaderInterface
{
    /**
     * @var \Embitel\Slider\Model\SliderFactory
     */
    protected $sliderFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * @param \Embitel\Slider\Model\SliderFactory $sliderFactory
     * @param OrderViewAuthorizationInterface $orderAuthorization
     * @param Registry $registry
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        \Embitel\Slider\Model\SliderFactory $sliderFactory,
        Registry $registry,
        \Magento\Framework\UrlInterface $url
    ) {
        $this->sliderFactory = $sliderFactory;
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

        $slider = $this->sliderFactory->create()->load($id);
        $this->registry->register('current_slider', $slider);
        return true;
    }
}
