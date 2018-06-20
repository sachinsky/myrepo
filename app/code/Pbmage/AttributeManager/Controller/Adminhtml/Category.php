<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml;

abstract class Category extends \Magento\Backend\App\Action
{
    public $resultForwardFactory;
    public $categoryAttribute;
    public $pbmageHelper;
    public $eventManager;
    public $backendSession;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Catalog\Model\ResourceModel\Eav\Attribute $categoryAttribute,
        \Pbmage\AttributeManager\Helper\Data $pbmageHelper
    ) {
        parent::__construct($context);

        $this->resultForwardFactory = $resultForwardFactory;
        $this->categoryAttribute = $categoryAttribute;
        $this->pbmageHelper = $pbmageHelper;
        $this->eventManager = $context->getEventManager();
        $this->backendSession = $context->getSession();
    }

    public function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'Pbmage_AttributeManager::category_attribute'
        );
        return $this;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pbmage_AttributeManager::category_attribute');
    }

    public function getEntityTypeId()
    {
        return $this->pbmageHelper->getEntityTypeId(\Magento\Catalog\Model\Category::ENTITY);
    }
}
