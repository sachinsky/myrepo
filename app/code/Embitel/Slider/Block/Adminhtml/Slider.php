<?php
/**
 * Adminhtml slider list block
 *
 */
namespace Embitel\Slider\Block\Adminhtml;

class Slider extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_slider';
        $this->_blockGroup = 'Embitel_Slider';
        $this->_headerText = __('Slider');
        $this->_addButtonLabel = __('Add New Slider');
        parent::_construct();
        if ($this->_isAllowedAction('Embitel_Slider::save')) {
            $this->buttonList->update('add', 'label', __('Add New Slider'));
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
