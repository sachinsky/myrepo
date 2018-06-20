<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Block\Customer\Address;

class Attribute extends \Magento\Framework\View\Element\Template
{
    public $collectionFactory;
    public $pbmageHelper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Address\Attribute\CollectionFactory $collectionFactory,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->collectionFactory = $collectionFactory;
        $this->pbmageHelper = $pbmageHelper;
    }

    public function getCollection()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('is_user_defined', 1);
        $collection->addFieldToFilter('is_visible', 1);
        $collection->setOrder('sort_order', 'ASC');

        if (!empty($collection)) {
            $customer = $this->getCustomerData();
            foreach ($collection as $key => $attribute) {
                $attribute_id = $attribute->getAttributeId();
                $used_in_forms = $this->getUsedInForms($attribute_id);

                if ($customer === null) {
                    if (!in_array('customer_register_address', $used_in_forms)) {
                        $collection->removeItemByKey($key);
                    }
                } elseif ($customer !== null) {
                    if (!in_array('customer_address_edit', $used_in_forms)) {
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
        $address_id = $this->getRequest()->getParam('id');
        if (is_numeric($address_id)) {
            return $this->pbmageHelper->getCustomerData('customer_address', $address_id);
        } else {
            return null;
        }
    }

    public function getUsedInForms($attribute_id)
    {
        return $this->pbmageHelper->getUsedInForms($attribute_id, $this->getEntityTypeId());
    }

    public function getEntityTypeId()
    {
        $entity_type = \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS;
        return $this->pbmageHelper->getEntityTypeId($entity_type);
    }

    public function getYesNo()
    {
        return $this->pbmageHelper->getYesNo();
    }
}
