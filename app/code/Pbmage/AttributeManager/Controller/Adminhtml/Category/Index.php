<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Category;

class Index extends \Pbmage\AttributeManager\Controller\Adminhtml\Category
{
    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Category Attribute'));
        $this->_view->renderLayout();
    }
}
