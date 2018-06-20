<?php

namespace Indglobal\Enquiry\Model;

/**
 * Enquiry Model
 *
 * @method \Indglobal\Enquiry\Model\Resource\Page _getResource()
 * @method \Indglobal\Enquiry\Model\Resource\Page getResource()
 */
class Enquiry extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Indglobal\Enquiry\Model\ResourceModel\Enquiry');
    }

}
