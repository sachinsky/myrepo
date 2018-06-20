<?php

namespace Embitel\Testimonial\Model\Invoice\Total;

use Magento\Sales\Model\Order\Invoice\Total\AbstractTotal;

class Freeforyou extends AbstractTotal {

	public function collect(\Magento\Sales\Model\Order\Invoice $invoice) {

		$order = $invoice -> getOrder();

		$percent = $invoice -> getSubtotal() / $order -> getSubtotal();

		$invoice -> setFreeforyou(0);
		$invoice -> setBaseFreeforyou(0);

		$amount = $invoice -> getOrder() -> getFreeforyou() * $percent;

		$baseAmount = $invoice -> getOrder() -> getBaseFreeforyou() * $percent;

		$invoice -> setFreeforyou($amount);

		$invoice -> setBaseFreeforyou($baseAmount);

		$invoice -> setGrandTotal($invoice -> getGrandTotal() + $amount);
		$invoice -> setBaseGrandTotal($invoice -> getBaseGrandTotal() + $invoice -> getBaseFreeforyou() * $baseAmount);

		return $this;
	} 
} 