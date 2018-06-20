define(
    [
		'ko',
        'Embitel_Testimonial/js/view/checkout/summary/freeforyou',
		'Magento_Checkout/js/model/quote',
		'Magento_Catalog/js/price-utils',
		'Magento_Checkout/js/model/totals'
    ],
    function (ko, Component,quote,priceUtils, totals) {
        'use strict';

		var custom_fee_amount = 0;

		if (totals.getSegment('freeforyou'))
		{
			custom_fee_amount=totals.getSegment('freeforyou').value
		}

		var freeforyou_label = window.checkoutConfig.freeforyou_label;

        return Component.extend({

			getFormattedPrice: ko.observable(priceUtils.formatPrice(custom_fee_amount, quote.getPriceFormat())),
			getFeeLabelFreeforyou:ko.observable(freeforyou_label),
            isDisplayed: function () {
                return this.isFullMode() && this.getPureValue() != 0;
            }
        });
    }
);