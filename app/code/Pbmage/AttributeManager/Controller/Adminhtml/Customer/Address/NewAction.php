<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Customer\Address;

class NewAction extends \Pbmage\AttributeManager\Controller\Adminhtml\Customer\Address
{
    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('edit');
    }
}
