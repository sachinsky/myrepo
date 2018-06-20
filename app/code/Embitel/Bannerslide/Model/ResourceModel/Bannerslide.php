<?php

namespace Embitel\Bannerslide\Model\ResourceModel;

/**
 * Bannerslide Resource Model
 */
class Bannerslide extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('embitel_bannerslide', 'bannerslide_id');
    }
}
