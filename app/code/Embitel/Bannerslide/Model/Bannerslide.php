<?php

namespace Embitel\Bannerslide\Model;

/**
 * Bannerslide Model
 *
 * @method \Embitel\Bannerslide\Model\Resource\Page _getResource()
 * @method \Embitel\Bannerslide\Model\Resource\Page getResource()
 */
class Bannerslide extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Embitel\Bannerslide\Model\ResourceModel\Bannerslide');
    }

}
