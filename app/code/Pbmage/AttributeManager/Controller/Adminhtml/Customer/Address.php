<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Customer;

abstract class Address extends \Magento\Backend\App\Action
{
    public $resultForwardFactory;
    public $customerAddressAttribute;
    public $pbmageHelper;
    public $backendSession;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Customer\Model\Attribute $customerAddressAttribute,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper
    ) {
        parent::__construct($context);
        
        $this->resultForwardFactory = $resultForwardFactory;
        $this->customerAddressAttribute = $customerAddressAttribute;
        $this->pbmageHelper = $pbmageHelper;
        $this->backendSession = $context->getSession();
    }

    public function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Pbmage_AttributeManager::customer_address_attribute'
        );
        return $this;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pbmage_AttributeManager::customer_address_attribute');
    }

    public function getEntityTypeId()
    {
        $entity_type = \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS;
        return $this->pbmageHelper->getEntityTypeId($entity_type);
    }
}
