<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Customer;

class NewAction extends \Pbmage\AttributeManager\Controller\Adminhtml\Customer
{
    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('edit');
    }
}
