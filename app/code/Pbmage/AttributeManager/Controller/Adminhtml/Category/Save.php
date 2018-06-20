<?php
/**
 * Copyright © 2018 PBMAGE. All rights reserved.
 */
namespace Pbmage\AttributeManager\Controller\Adminhtml\Category;

class Save extends \Pbmage\AttributeManager\Controller\Adminhtml\Category
{
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $data = $this->pbmageHelper->modifySelectOptionValues($data);
            $edit_url = 'pbmage_attribute_manager/*/edit';
            $redirectBack = $this->getRequest()->getParam('back', false);

            $model = $this->categoryAttribute;
            $attributeId = $this->getRequest()->getParam('attribute_id');
            $attributeCode = $this->getRequest()->getParam('attribute_code');
            $frontendLabel = $this->getRequest()->getParam('frontend_label');

            if ($attributeCode != '' && !preg_match("/^[a-z][a-z_0-9]{0,30}$/", $attributeCode)) {
                $this->messageManager->addError(
                    __(
                        'Attribute code "%1" is invalid. Please use only letters (a-z), ' .
                        'numbers (0-9) or underscore(_) in this field, first character should be a letter.',
                        $attributeCode
                    )
                );
                return $resultRedirect->setPath($edit_url, ['attribute_id' => $attributeId, '_current' => true]);
            }
            $data['attribute_code'] = $attributeCode;

            $inputType = $this->pbmageHelper->getValidatorFactory()->create();
            if (isset($data['frontend_input']) && !$inputType->isValid($data['frontend_input'])) {
                $msg = __('Input type "'.$data['frontend_input'].'" not found in the input types list.');
                $this->messageManager->addError($msg);
                return $resultRedirect->setPath($edit_url, ['attribute_id' => $attributeId, '_current' => true]);
            }

            if ($attributeId) {
                $model->load($attributeId);

                $data['attribute_code'] = $model->getAttributeCode();
                $data['is_user_defined'] = $model->getIsUserDefined();
                $data['frontend_input'] = $model->getFrontendInput();
            } else {
                $data['source_model'] = $this->pbmageHelper->getProductHelper()->getAttributeSourceModelByInputType(
                    $data['frontend_input']
                );

                if ($data['frontend_input'] == 'multiselect') {
                    $data['source_model'] = 'Magento\Eav\Model\Entity\Attribute\Source\Table';
                }

                $data['backend_model'] = $this->pbmageHelper->getProductHelper()->getAttributeBackendModelByInputType(
                    $data['frontend_input']
                );

                $model->setEntityTypeId($this->getEntityTypeId());
                $model->setIsUserDefined(1);

                $attr_set_id = $this->pbmageHelper->getCategoryModel()->getDefaultAttributeSetId();
                $model->setAttributeSetId($attr_set_id);

                $attr_group_id = $this->pbmageHelper->getDefaultAttributeGroupId($attr_set_id);
                $model->setAttributeGroupId($attr_group_id);
            }

            $data['backend_type'] = $model->getBackendTypeByInput($data['frontend_input']);

            $defaultValueField = $model->getDefaultValueByInput($data['frontend_input']);
            if ($defaultValueField) {
                $data['default_value'] = $this->getRequest()->getParam($defaultValueField);
            } else {
                $data['default_value'] = $this->getRequest()->getParam('default_value_yesno');
            }

            $model->addData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the category attribute.'));

                if (!$attributeId && $data['frontend_input'] == 'boolean') {
                    $model->setData('frontend_input', 'select');
                    $model->save();
                }
                $attributeId = $model->getId();

                //write xml file for admin category form
                $this->eventManager->dispatch('pbmage_category_attribute_add_update_after');

                $this->_session->setAttributeData(false);
                if ($redirectBack) {
                    $resultRedirect->setPath($edit_url, ['attribute_id' => $attributeId, '_current' => true]);
                } else {
                    $resultRedirect->setPath('pbmage_attribute_manager/*/');
                }
                return $resultRedirect;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_session->setAttributeData($data);
                return $resultRedirect->setPath($edit_url, ['attribute_id' => $attributeId, '_current' => true]);
            }
        }
    }
}
