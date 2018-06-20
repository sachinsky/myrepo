<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Customer;

class Index extends \Pbmage\AttributeManager\Controller\Adminhtml\Customer
{
    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Customer Attribute'));
        $this->_view->renderLayout();
    }
}
