<?php

/**
 * Enquiry Resource Collection
 */
namespace Indglobal\Enquiry\Model\ResourceModel\Enquiry;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Indglobal\Enquiry\Model\Enquiry', 'Indglobal\Enquiry\Model\ResourceModel\Enquiry');
    }
}
