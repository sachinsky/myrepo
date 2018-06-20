define([
    'jquery',
    'jquery/ui'
], function ($) {
    'use strict';

    alert('kk');
    $.widget('mage.checkoutAutocomplete', {
        initContainer: function () {
            $('#checkout').on('keyup', this.keyUpHandler)
        },

        keyUpHandler: function (e) {
            if (e.target.getAttribute('type') === 'text') {
                // Do something with event target
            }
        }
    });

    return $.mage.checkoutAutocomplete;
});