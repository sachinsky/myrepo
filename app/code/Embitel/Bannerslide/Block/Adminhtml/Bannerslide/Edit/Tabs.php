<?php
namespace Embitel\Bannerslide\Block\Adminhtml\Bannerslide\Edit;

/**
 * Admin bannerslide left menu
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
        $this->setTitle(__('Bannerslide Information'));
    }
}
