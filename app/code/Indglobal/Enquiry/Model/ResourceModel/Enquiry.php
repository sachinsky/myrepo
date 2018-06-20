<?php

namespace Indglobal\Enquiry\Model\ResourceModel;

/**
 * Enquiry Resource Model
 */
class Enquiry extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('indglobal_enquiry', 'enquiry_id');
    }
}
