<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Model\Plugin\Validator\Attribute;

class Data
{
    public $customerAddressAttributeCollection;
    public $pbmageHelper;

    public function __construct(
        \Magento\Customer\Model\ResourceModel\Address\Attribute\CollectionFactory $customerAddressAttributeCollection,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper
    ) {
        $this->customerAddressAttributeCollection = $customerAddressAttributeCollection;
        $this->pbmageHelper = $pbmageHelper;
    }

    public function beforeIsValid($subject, $entity)
    {
        $class = get_class($entity->getDataModel());

        //customer address
        if ($class == 'Magento\Customer\Model\Data\Address') {
            $addressCollection = $this->customerAddressAttributeCollection->create();
            $addressCollection->addFieldToFilter('is_user_defined', 1);
            $addressCollection->addFieldToFilter('is_required', 1);
            if (!empty($addressCollection)) {
                foreach ($addressCollection as $key => $attribute) {
                    $attribute_id = $attribute->getAttributeId();
                    $used_in_forms = $this->getUsedInForms($attribute_id);

                    if (!in_array('customer_register_address', $used_in_forms) || !in_array('customer_address_edit', $used_in_forms)) {
                        $attribute_code = $attribute->getAttributeCode();
                        if (!$entity->getData($attribute_code)) {
                            $default_value = $attribute->getDefaultValue();
                            if ($default_value) {
                                $entity->setData($attribute_code, $default_value);
                            } else {
                                if ($attribute->getFrontendInput() == 'date') {
                                    $entity->setData($attribute_code, date("m/d/Y"));
                                } else {
                                    $entity->setData($attribute_code, 'NULL');
                                }
                            }
                        }
                    }
                }
            }
        }

        return [$entity];
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
