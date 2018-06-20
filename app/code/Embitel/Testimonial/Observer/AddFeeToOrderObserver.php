<?php

namespace Embitel\Testimonial\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class AddFeeToOrderObserver implements ObserverInterface
{

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $quote = $observer->getQuote();
		$order = $observer->getOrder();

		
        $CustomFeeFreeforyou = $quote->getFreeforyou();
        $CustomFeeBaseFreeforyou = $quote->getBaseFreeforyou();

        if ($CustomFeeFreeforyou&&$CustomFeeBaseFreeforyou) {

			$order->setData('freeforyou', $CustomFeeFreeforyou);
			$order->setData('base_freeforyou', $CustomFeeBaseFreeforyou);

        }


        return $this;

    }
}
