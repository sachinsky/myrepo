<?php
/**
 * Adminhtml enquiry list block
 *
 */
namespace Indglobal\Enquiry\Block\Adminhtml;

class Enquiry extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_enquiry';
        $this->_blockGroup = 'Indglobal_Enquiry';
        $this->_headerText = __('Enquiry');
        $this->_addButtonLabel = __('Add New Enquiry');
        parent::_construct();
        if ($this->_isAllowedAction('Indglobal_Enquiry::save')) {
            $this->buttonList->update('add', 'label', __('Add New Enquiry'));
        } else {
            $this->buttonList->remove('add');
        }
    }
    
    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
