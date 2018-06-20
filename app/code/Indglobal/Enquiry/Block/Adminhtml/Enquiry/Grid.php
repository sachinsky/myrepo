<?php
namespace Indglobal\Enquiry\Block\Adminhtml\Enquiry;

/**
 * Adminhtml Enquiry grid
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Indglobal\Enquiry\Model\ResourceModel\Enquiry\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var \Indglobal\Enquiry\Model\Enquiry
     */
    protected $_enquiry;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Indglobal\Enquiry\Model\Enquiry $enquiryPage
     * @param \Indglobal\Enquiry\Model\ResourceModel\Enquiry\CollectionFactory $collectionFactory
     * @param \Magento\Core\Model\PageLayout\Config\Builder $pageLayoutBuilder
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Indglobal\Enquiry\Model\Enquiry $enquiry,
        \Indglobal\Enquiry\Model\ResourceModel\Enquiry\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_enquiry = $enquiry;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('enquiryGrid');
        $this->setDefaultSort('enquiry_id');
        $this->setDefaultDir('DESC');
        $this->setUseAjax(true);
        $this->setSaveParametersInSession(true);
    }

    /**
     * Prepare collection
     *
     * @return \Magento\Backend\Block\Widget\Grid
     */
    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        /* @var $collection \Indglobal\Enquiry\Model\ResourceModel\Enquiry\Collection */
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * @return \Magento\Backend\Block\Widget\Grid\Extended
     */
    protected function _prepareColumns()
    {
        $this->addColumn('enquiry_id', [
            'header'    => __('ID'),
            'index'     => 'enquiry_id',
        ]);
        
        $this->addColumn('title', ['header' => __('Name'), 'index' => 'title']);
        $this->addColumn('author', ['header' => __('Contact Number'), 'index' => 'author']);
        $this->addColumn('email', ['header' => __('Email Id'), 'index' => 'email']);
        $this->addColumn('subject', ['header' => __('Subject'), 'index' => 'subject']);
        
        // $this->addColumn(
        //     'published_at',
        //     [
        //         'header' => __('Published On'),
        //         'index' => 'published_at',
        //         'type' => 'date',
        //         'header_css_class' => 'col-date',
        //         'column_css_class' => 'col-date'
        //     ]
        // );
        
        // $this->addColumn(
        //     'created_at',
        //     [
        //         'header' => __('Created'),
        //         'index' => 'created_at',
        //         'type' => 'datetime',
        //         'header_css_class' => 'col-date',
        //         'column_css_class' => 'col-date'
        //     ]
        // );
        
        $this->addColumn(
            'action',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit',
                            'params' => ['store' => $this->getRequest()->getParam('store')]
                        ],
                        'field' => 'enquiry_id'
                    ]
                ],
                'sortable' => false,
                'filter' => false,
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @param \Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['enquiry_id' => $row->getId()]);
    }

    /**
     * Get grid url
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}
