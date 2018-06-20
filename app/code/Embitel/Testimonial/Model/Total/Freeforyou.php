<?php

namespace Embitel\Testimonial\Model\Total;

use Magento\Store\Model\ScopeInterface;

class Freeforyou extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    protected $helperData;

    protected $quoteValidator = null;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator,
		\Embitel\Testimonial\Helper\Data $helperData)
    {
        $this->quoteValidator = $quoteValidator;
        $this->helperData = $helperData;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    )
    {
        parent::collect($quote, $shippingAssignment, $total);
        if (!count($shippingAssignment->getItems())) {
            return $this;
        }

        $enabled = $this->helperData->isModuleEnabledFreeforyou();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmountFreeforyou();
        $subtotal = $total->getTotalAmount('subtotal');
        if ($enabled && $minimumOrderAmount <= $subtotal) {
            $freeforyou = $quote->getFreeforyou();
            $total->setTotalAmount('freeforyou', $freeforyou);
            $total->setBaseTotalAmount('freeforyou', $freeforyou);
            $total->setFreeforyou($freeforyou);
            $total->setBaseFreeforyou($freeforyou);
            $quote->setFreeforyou($freeforyou);
            $quote->setBaseFreeforyou($freeforyou);
            $total->setGrandTotal($total->getGrandTotal() + $freeforyou);
            $total->setBaseGrandTotal($total->getBaseGrandTotal() + $freeforyou);
        }
        return $this;
    }

    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {

        $enabled = $this->helperData->isModuleEnabledFreeforyou();
        $minimumOrderAmount = $this->helperData->getMinimumOrderAmountFreeforyou();
        $subtotal = $quote->getSubtotal();
        $freeforyou = $quote->getFreeforyou();
        if ($enabled && $minimumOrderAmount <= $subtotal && $freeforyou) {
            return [
                'code' => 'freeforyou',
                'title' => 'Offer',
                'value' => $freeforyou
            ];
        } else {
            return array();
        }
    }

    public function getLabel()
    {
        return __('Offer');
    }

    protected function clearValues(\Magento\Quote\Model\Quote\Address\Total $total)
    {
        $total->setTotalAmount('subtotal', 0);
        $total->setBaseTotalAmount('subtotal', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax(0);
        $total->setBaseSubtotalInclTax(0);

    }
}