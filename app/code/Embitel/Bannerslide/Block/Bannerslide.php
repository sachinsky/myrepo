<?php

namespace Embitel\Bannerslide\Block;

/**
 * Bannerslide content block
 */
class Bannerslide extends \Magento\Framework\View\Element\Template
{
    /**
     * Bannerslide collection
     *
     * @var Embitel\Bannerslide\Model\ResourceModel\Bannerslide\Collection
     */
    protected $_bannerslideCollection = null;
    
    /**
     * Bannerslide factory
     *
     * @var \Embitel\Bannerslide\Model\BannerslideFactory
     */
    protected $_bannerslideCollectionFactory;
    
    /** @var \Embitel\Bannerslide\Helper\Data */
    protected $_dataHelper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Embitel\Bannerslide\Model\ResourceModel\Bannerslide\CollectionFactory $bannerslideCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Embitel\Bannerslide\Model\ResourceModel\Bannerslide\CollectionFactory $bannerslideCollectionFactory,
        \Embitel\Bannerslide\Helper\Data $dataHelper,
        array $data = []
    ) {
        $this->_bannerslideCollectionFactory = $bannerslideCollectionFactory;
        $this->_dataHelper = $dataHelper;
        parent::__construct(
            $context,
            $data
        );
    }
    
    /**
     * Retrieve bannerslide collection
     *
     * @return Embitel\Bannerslide\Model\ResourceModel\Bannerslide\Collection
     */
    protected function _getCollection()
    {
        $collection = $this->_bannerslideCollectionFactory->create();
        return $collection;
    }
    
    /**
     * Retrieve prepared bannerslide collection
     *
     * @return Embitel\Bannerslide\Model\ResourceModel\Bannerslide\Collection
     */
    public function getCollection()
    {
        if (is_null($this->_bannerslideCollection)) {
            $this->_bannerslideCollection = $this->_getCollection();
            $this->_bannerslideCollection->setCurPage($this->getCurrentPage());
            $this->_bannerslideCollection->setPageSize($this->_dataHelper->getBannerslidePerPage());
            $this->_bannerslideCollection->setOrder('published_at','asc');
        }

        return $this->_bannerslideCollection;
    }
    
    /**
     * Fetch the current page for the bannerslide list
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
     * @param Embitel\Bannerslide\Model\Bannerslide $bannerslideItem
     * @return string
     */
    public function getItemUrl($bannerslideItem)
    {
        return $this->getUrl('*/*/view', array('id' => $bannerslideItem->getId()));
    }
    
    /**
     * Return URL for resized Bannerslide Item image
     *
     * @param Embitel\Bannerslide\Model\Bannerslide $item
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
        $pager = $this->getChildBlock('bannerslide_list_pager');
        if ($pager instanceof \Magento\Framework\Object) {
            $bannerslidePerPage = $this->_dataHelper->getBannerslidePerPage();

            $pager->setAvailableLimit([$bannerslidePerPage => $bannerslidePerPage]);
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
