<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Address;

class Edit extends \Magento\Framework\App\Action\Action
{
    public $viewContext;
    public $jsonFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Element\Context $viewContext,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->viewContext = $viewContext;
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $html = $this->viewContext
                ->getLayout()
                ->createBlock('Pbmage\AttributeManager\Block\Customer\Address\Attribute')
                ->setTemplate('Pbmage_AttributeManager::additionalinfocustomeraddress.phtml')
                ->toHtml();
        
        return $resultJson->setData([
            'html_data' => $html
        ]);
    }
}
