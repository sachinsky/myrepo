<?php

namespace Embitel\Slider\Block;

/**
 * Slider content block
 */
class Slider extends \Magento\Framework\View\Element\Template
{
    /**
     * Slider collection
     *
     * @var Embitel\Slider\Model\ResourceModel\Slider\Collection
     */
    protected $_sliderCollection = null;
    
    /**
     * Slider factory
     *
     * @var \Embitel\Slider\Model\SliderFactory
     */
    protected $_sliderCollectionFactory;
    
    /** @var \Embitel\Slider\Helper\Data */
    protected $_dataHelper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Embitel\Slider\Model\ResourceModel\Slider\CollectionFactory $sliderCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Embitel\Slider\Model\ResourceModel\Slider\CollectionFactory $sliderCollectionFactory,
        \Embitel\Slider\Helper\Data $dataHelper,
        array $data = []
    ) {
        $this->_sliderCollectionFactory = $sliderCollectionFactory;
        $this->_dataHelper = $dataHelper;
        parent::__construct(
            $context,
            $data
        );
    }
    
    /**
     * Retrieve slider collection
     *
     * @return Embitel\Slider\Model\ResourceModel\Slider\Collection
     */
    protected function _getCollection()
    {
        $collection = $this->_sliderCollectionFactory->create();
        return $collection;
    }
    
    /**
     * Retrieve prepared slider collection
     *
     * @return Embitel\Slider\Model\ResourceModel\Slider\Collection
     */
    public function getCollection()
    {
        if (is_null($this->_sliderCollection)) {
            $this->_sliderCollection = $this->_getCollection();
            $this->_sliderCollection->setCurPage($this->getCurrentPage());
            $this->_sliderCollection->setPageSize($this->_dataHelper->getSliderPerPage());
            $this->_sliderCollection->setOrder('published_at','asc');
        }

        return $this->_sliderCollection;
    }
    
    /**
     * Fetch the current page for the slider list
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getData('current_page') ? $this->getData('current_page') : 1;
    }
    
    /**
     * Return URL to item's view page
     *
     * @param Embitel\Slider\Model\Slider $sliderItem
     * @return string
     */
    public function getItemUrl($sliderItem)
    {
        return $this->getUrl('*/*/view', array('id' => $sliderItem->getId()));
    }
    
    /**
     * Return URL for resized Slider Item image
     *
     * @param Embitel\Slider\Model\Slider $item
     * @param integer $width
     * @return string|false
     */
    public function getImageUrl($item, $width)
    {
        return $this->_dataHelper->resize($item, $width);
    }
    
    /**
     * Get a pager
     *
     * @return string|null
     */
    public function getPager()
    {
        $pager = $this->getChildBlock('slider_list_pager');
        if ($pager instanceof \Magento\Framework\Object) {
            $sliderPerPage = $this->_dataHelper->getSliderPerPage();

            $pager->setAvailableLimit([$sliderPerPage => $sliderPerPage]);
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(TRUE);
            $pager->setFrameLength(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )->setJump(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame_skip',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            );

            return $pager->toHtml();
        }

        return NULL;
    }
}
