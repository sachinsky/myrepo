<?php

/**
 * Bannerslide Resource Collection
 */
namespace Embitel\Bannerslide\Model\ResourceModel\Bannerslide;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Embitel\Bannerslide\Model\Bannerslide', 'Embitel\Bannerslide\Model\ResourceModel\Bannerslide');
    }
}
