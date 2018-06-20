<?php

namespace Indglobal\Enquiry\Block;

/**
 * Enquiry content block
 */
class Enquiry extends \Magento\Framework\View\Element\Template
{
    /**
     * Enquiry collection
     *
     * @var Indglobal\Enquiry\Model\ResourceModel\Enquiry\Collection
     */
    protected $_enquiryCollection = null;
    
    /**
     * Enquiry factory
     *
     * @var \Indglobal\Enquiry\Model\EnquiryFactory
     */
    protected $_enquiryCollectionFactory;
    
    /** @var \Indglobal\Enquiry\Helper\Data */
    protected $_dataHelper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Indglobal\Enquiry\Model\ResourceModel\Enquiry\CollectionFactory $enquiryCollectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Indglobal\Enquiry\Model\ResourceModel\Enquiry\CollectionFactory $enquiryCollectionFactory,
        \Indglobal\Enquiry\Helper\Data $dataHelper,
        array $data = []
    ) {
        $this->_enquiryCollectionFactory = $enquiryCollectionFactory;
        $this->_dataHelper = $dataHelper;
        parent::__construct(
            $context,
            $data
        );
    }
    
    /**
     * Retrieve enquiry collection
     *
     * @return Indglobal\Enquiry\Model\ResourceModel\Enquiry\Collection
     */
    protected function _getCollection()
    {
        $collection = $this->_enquiryCollectionFactory->create();
        return $collection;
    }
    
    /**
     * Retrieve prepared enquiry collection
     *
     * @return Indglobal\Enquiry\Model\ResourceModel\Enquiry\Collection
     */
    public function getCollection()
    {
        if (is_null($this->_enquiryCollection)) {
            $this->_enquiryCollection = $this->_getCollection();
            $this->_enquiryCollection->setCurPage($this->getCurrentPage());
            $this->_enquiryCollection->setPageSize($this->_dataHelper->getEnquiryPerPage());
            $this->_enquiryCollection->setOrder('published_at','asc');
        }

        return $this->_enquiryCollection;
    }
    
    /**
     * Fetch the current page for the enquiry list
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
     * @param Indglobal\Enquiry\Model\Enquiry $enquiryItem
     * @return string
     */
    public function getItemUrl($enquiryItem)
    {
        return $this->getUrl('*/*/view', array('id' => $enquiryItem->getId()));
    }
    
    /**
     * Return URL for resized Enquiry Item image
     *
     * @param Indglobal\Enquiry\Model\Enquiry $item
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
        $pager = $this->getChildBlock('enquiry_list_pager');
        if ($pager instanceof \Magento\Framework\Object) {
            $enquiryPerPage = $this->_dataHelper->getEnquiryPerPage();

            $pager->setAvailableLimit([$enquiryPerPage => $enquiryPerPage]);
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
