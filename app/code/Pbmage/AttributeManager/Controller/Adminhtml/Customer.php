<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml;

abstract class Customer extends \Magento\Backend\App\Action
{
    public $resultForwardFactory;
    public $customerAttribute;
    public $pbmageHelper;
    public $backendSession;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Customer\Model\Attribute $customerAttribute,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper
    ) {
        parent::__construct($context);

        $this->resultForwardFactory = $resultForwardFactory;
        $this->customerAttribute = $customerAttribute;
        $this->pbmageHelper = $pbmageHelper;
        $this->backendSession = $context->getSession();
    }

    public function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Pbmage_AttributeManager::customer_attribute'
        );
        return $this;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pbmage_AttributeManager::customer_attribute');
    }

    public function getEntityTypeId()
    {
        return $this->pbmageHelper->getEntityTypeId(\Magento\Customer\Model\Customer::ENTITY);
    }
}
