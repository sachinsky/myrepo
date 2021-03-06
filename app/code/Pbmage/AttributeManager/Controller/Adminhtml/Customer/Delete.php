<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Customer;

class Delete extends \Pbmage\AttributeManager\Controller\Adminhtml\Customer
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('attribute_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $model = $this->customerAttribute;
            $model->load($id);
            
            if ($model->getEntityTypeId() != $this->getEntityTypeId()) {
                $this->messageManager->addError(__('We can\'t delete the attribute.'));
                return $resultRedirect->setPath('pbmage_attribute_manager/*/');
            }

            try {
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the customer attribute.'));
                return $resultRedirect->setPath('pbmage_attribute_manager/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath(
                    'pbmage_attribute_manager/*/edit',
                    ['attribute_id' => $this->getRequest()->getParam('attribute_id')]
                );
            }
        }
        $this->messageManager->addError(__('We can\'t find an attribute to delete.'));
        return $resultRedirect->setPath('pbmage_attribute_manager/*/');
    }
}
