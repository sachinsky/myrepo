<?php

/**
 * Slider Resource Collection
 */
namespace Embitel\Slider\Model\ResourceModel\Slider;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Embitel\Slider\Model\Slider', 'Embitel\Slider\Model\ResourceModel\Slider');
    }
}
