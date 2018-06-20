<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Model\Config\Source;

class UsedCustomerAddressForms implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'customer_register_address', 'label' => __('Customer Address Register')],
            ['value' => 'customer_address_edit', 'label' => __('Customer Account Address')]
        ];
    }
}
