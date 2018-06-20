<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Block\Customer;

class Attribute extends \Magento\Framework\View\Element\Template
{
    public $customerAttributeCollection;
    public $pbmageHelper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Attribute\CollectionFactory $customerAttributeCollection,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->customerAttributeCollection = $customerAttributeCollection;
        $this->pbmageHelper = $pbmageHelper;
    }

    public function getCollection()
    {
        $collection = $this->customerAttributeCollection->create();
        $collection->addFieldToFilter('is_user_defined', 1);
        $collection->addFieldToFilter('is_visible', 1);
        $collection->setOrder('sort_order', 'ASC');

        if (!empty($collection)) {
            $customer = $this->getCustomerData();
            foreach ($collection as $key => $attribute) {
                $attribute_id = $attribute->getAttributeId();
                $used_in_forms = $this->getUsedInForms($attribute_id);

                if ($customer === null) {
                    if (!in_array('customer_account_create', $used_in_forms)) {
                        $collection->removeItemByKey($key);
                    }
                } elseif ($customer !== null) {
                    if (!in_array('customer_account_edit', $used_in_forms)) {
                        $collection->removeItemByKey($key);
                    }
                }
            }
        }

        return $collection;
    }

    public function getSelectOptionValues($attribute_id)
    {
        return $this->pbmageHelper->getSelectOptionValues($attribute_id, $this->getEntityTypeId());
    }

    public function getCustomerData()
    {
        return $this->pbmageHelper->getCustomerData('customer');
    }

    public function getUsedInForms($attribute_id)
    {
        return $this->pbmageHelper->getUsedInForms($attribute_id, $this->getEntityTypeId());
    }

    public function getEntityTypeId()
    {
        return $this->pbmageHelper->getEntityTypeId(\Magento\Customer\Model\Customer::ENTITY);
    }

    public function getYesNo()
    {
        return $this->pbmageHelper->getYesNo();
    }
}
