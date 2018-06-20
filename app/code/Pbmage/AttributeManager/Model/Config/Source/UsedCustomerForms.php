<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Model\Config\Source;

class UsedCustomerForms implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'customer_account_create', 'label' => __('Customer Register')],
            ['value' => 'customer_account_edit', 'label' => __('Customer Account Edit')]
        ];
    }
}
