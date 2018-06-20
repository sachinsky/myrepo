<?php
/**
 * Adminhtml bannerslide list block
 *
 */
namespace Embitel\Bannerslide\Block\Adminhtml;

class Bannerslide extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_bannerslide';
        $this->_blockGroup = 'Embitel_Bannerslide';
        $this->_headerText = __('Bannerslide');
        $this->_addButtonLabel = __('Add New Bannerslide');
        parent::_construct();
        if ($this->_isAllowedAction('Embitel_Bannerslide::save')) {
            $this->buttonList->update('add', 'label', __('Add New Bannerslide'));
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
