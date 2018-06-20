<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Category;

class NewAction extends \Pbmage\AttributeManager\Controller\Adminhtml\Category
{
    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('edit');
    }
}
