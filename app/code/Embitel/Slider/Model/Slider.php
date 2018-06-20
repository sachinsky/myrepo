<?php

namespace Embitel\Slider\Model;

/**
 * Slider Model
 *
 * @method \Embitel\Slider\Model\Resource\Page _getResource()
 * @method \Embitel\Slider\Model\Resource\Page getResource()
 */
class Slider extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Embitel\Slider\Model\ResourceModel\Slider');
    }

}
