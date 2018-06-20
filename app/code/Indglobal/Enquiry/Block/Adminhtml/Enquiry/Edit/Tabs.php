<?php
namespace Indglobal\Enquiry\Block\Adminhtml\Enquiry\Edit;

/**
 * Admin enquiry left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('page_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Enquiry Information'));
    }
}
