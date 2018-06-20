<?php

namespace Embitel\Testimonial\Model\Creditmemo\Total;

use Magento\Sales\Model\Order\Creditmemo\Total\AbstractTotal;

class Freeforyou extends AbstractTotal {

	public function collect(\Magento\Sales\Model\Order\Creditmemo $creditmemo) {

		$order = $creditmemo -> getOrder();

		$percent = $creditmemo -> getSubtotal() / $order -> getSubtotal();

		$creditmemo -> setFreeforyou(0);
		$creditmemo -> setBaseFreeforyou(0);

		$amount = $creditmemo -> getOrder() -> getFreeforyou() * $percent;
		$baseAmount = $creditmemo -> getOrder() -> getBaseFreeforyou() * $percent;

		$creditmemo -> setFreeforyou($amount);

		$creditmemo -> setBaseFreeforyou($baseAmount);

		$creditmemo -> setGrandTotal($creditmemo -> getGrandTotal() + $amount);
		$creditmemo -> setBaseGrandTotal($creditmemo -> getBaseGrandTotal() + $baseAmount);

		return $this;
	} 
} 