<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Block\Adminhtml;

class Category extends \Magento\Backend\Block\Widget\Grid\Container
{
    public function _construct()
    {
        $this->_blockGroup = 'Pbmage_AttributeManager';
        $this->_controller = 'adminhtml_category';
        $this->_headerText = __('Category Attribute');
        $this->_addButtonLabel = __('Add New Attribute');
        parent::_construct();
    }
}
