<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Model\Plugin;

class AccountManagement
{
    public $customerAttributeCollection;
    public $customerAddressAttributeCollection;
    public $pbmageHelper;

    public function __construct(
        \Magento\Customer\Model\ResourceModel\Attribute\CollectionFactory $customerAttributeCollection,
        \Magento\Customer\Model\ResourceModel\Address\Attribute\CollectionFactory $customerAddressAttributeCollection,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper
    ) {
        $this->customerAttributeCollection = $customerAttributeCollection;
        $this->customerAddressAttributeCollection = $customerAddressAttributeCollection;
        $this->pbmageHelper = $pbmageHelper;
    }

    public function beforeCreateAccount($subject, $customer, $password, $redirectUrl)
    {
        //customer
        $collection = $this->customerAttributeCollection->create();
        $collection->addFieldToFilter('is_user_defined', 1);
        $collection->addFieldToFilter('is_required', 1);
        if (!empty($collection)) {
            foreach ($collection as $key => $attribute) {
                $attribute_id = $attribute->getAttributeId();
                $used_in_forms = $this->getUsedInForms($attribute_id);

                if (!in_array('customer_account_create', $used_in_forms)) {
                    $attribute_code = $attribute->getAttributeCode();
                    $default_value = $attribute->getDefaultValue();
                    if ($default_value) {
                        $customer->setCustomAttribute($attribute_code, $default_value);
                    } else {
                        if ($attribute->getFrontendInput() == 'date') {
                            $customer->setCustomAttribute($attribute_code, date("m/d/Y"));
                        } else {
                            $customer->setCustomAttribute($attribute_code, 'NULL');
                        }
                    }
                }
            }
        }

        //customer address
        $addressCollection = $this->customerAddressAttributeCollection->create();
        $addressCollection->addFieldToFilter('is_user_defined', 1);
        $addressCollection->addFieldToFilter('is_required', 1);
        foreach ($customer->getAddresses() as $address) {
            if (!empty($addressCollection)) {
                foreach ($addressCollection as $key => $attribute) {
                    $attribute_id = $attribute->getAttributeId();
                    $used_in_forms = $this->getUsedInForms($attribute_id);

                    if (!in_array('customer_register_address', $used_in_forms)) {
                        $attribute_code = $attribute->getAttributeCode();
                        $default_value = $attribute->getDefaultValue();
                        if ($default_value) {
                            $address->setCustomAttribute($attribute_code, $default_value);
                        } else {
                            if ($attribute->getFrontendInput() == 'date') {
                                $address->setCustomAttribute($attribute_code, date("m/d/Y"));
                            } else {
                                $address->setCustomAttribute($attribute_code, 'NULL');
                            }
                        }
                    }
                }
            }
        }

        return [$customer, $password, $redirectUrl];
    }

    public function getUsedInForms($attribute_id)
    {
        return $this->pbmageHelper->getUsedInForms($attribute_id, $this->getEntityTypeId());
    }

    public function getEntityTypeId()
    {
        return $this->pbmageHelper->getEntityTypeId(\Magento\Customer\Model\Customer::ENTITY);
    }
}
