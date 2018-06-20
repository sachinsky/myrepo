<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Block\Adminhtml;

class Customer extends \Magento\Backend\Block\Widget\Grid\Container
{
    public function _construct()
    {
        $this->_blockGroup = 'Pbmage_AttributeManager';
        $this->_controller = 'adminhtml_customer';
        $this->_headerText = __('Customer Attribute');
        $this->_addButtonLabel = __('Add New Attribute');
        parent::_construct();
    }
}
