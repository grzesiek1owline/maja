!(function(jQuery){

	jQuery(document).ready(function($) {
		// do something...
        var coupon_toggle = jQuery(".dtwpb-woocommerce-checkout .woocommerce-form-coupon-toggle");
    	var coupon_form = jQuery(".dtwpb-woocommerce-checkout form.woocommerce-form-coupon");
    	jQuery(".dtwpb_woocommerce_checkout_coupon_form").append(coupon_toggle),coupon_toggle.show(),coupon_form.insertAfter(coupon_toggle);
        
	});
	
})(jQuery);
