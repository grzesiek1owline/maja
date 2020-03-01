<?php
/**
 * DT WooCommerce Page Builder Template functions
 *
 * Functions for the templating system.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function dtwpb_vc_before_init(){
	if (function_exists('vc_set_default_editor_post_types')) {
		vc_set_default_editor_post_types(array('page', 'post', 'dtwpb_product_tpl', 'dtwpb_cat_tpl', 'dtwooaccountdetails'));
	}
}

function dtwpb_vc_after_init(){
	
	global $pagenow; 
	if ('post.php' == $pagenow ){
		$post_type = isset($_GET['post']) ? get_post_type($_GET['post']) : '';
		
		$product_shortcodes = DTWPB_Shorcodes::single_product_shortcodes();
		$archive_shortcodes = DTWPB_Shorcodes::archive_shortcodes();
		$cart_shortcodes = DTWPB_Shorcodes::cart_shortcodes();
		$checkout_shortcodes = DTWPB_Shorcodes::checkout_shortcodes();
		$thankyou_shortcodes = DTWPB_Shorcodes::thankyou_shortcodes();
		$myaccount_shortcodes = DTWPB_Shorcodes::myaccount_shortcodes();
		
		if( $post_type !== 'page' && $post_type !== 'dtwpb_product_tpl'){
			foreach ($product_shortcodes as $element => $shortcode){
				vc_remove_element($element);
			}
		}
		
		if( $post_type !== 'page' && $post_type !== 'dtwpb_cat_tpl'){
			foreach ($archive_shortcodes as $element => $shortcode){
				vc_remove_element($element);
			}
		}
		
		if ( $post_type == 'dtwpb_cat_tpl' ){
			vc_remove_element('product_category');
		}
		
		if ( $post_type == 'page' ){
			
			$dtwpb_product_tpl_type_page = dtwpb_get_option('dtwpb_product_tpl_type_page', 'dtwpb_product_tpl');

			if( $dtwpb_product_tpl_type_page == 'dtwpb_product_tpl' ){
				foreach ($product_shortcodes as $element => $shortcode){
					vc_remove_element($element);
				}
			}

			$dtwpb_cat_tpl_type_page = dtwpb_get_option('dtwpb_cat_tpl_type_page', 'dtwpb_cat_tpl');
			if( $dtwpb_cat_tpl_type_page == 'dtwpb_cat_tpl' ){
				foreach ($archive_shortcodes as $element => $shortcode){
					vc_remove_element($element);
				}
			}
			
		}
		
		if ( $post_type !== 'dtwpb_cart' ){
			foreach ($cart_shortcodes as $element => $shortcode){
				vc_remove_element($element);
			}
		}
		
		if ( $post_type !== 'dtwpb_checkout' ){
			foreach ($checkout_shortcodes as $element => $shortcode){
				vc_remove_element($element);
			}
		}
		
		if ( $post_type !== 'dtwpb_thankyou' ){
			foreach ($thankyou_shortcodes as $element => $shortcode){
				vc_remove_element($element);
			}
		}
		
		if ( $post_type !== 'dtwpb_myaccount' ){
			foreach ($myaccount_shortcodes as $element => $shortcode){
				vc_remove_element($element);
			}
		}
	}
}

/**
 * Show the checkout.
 */
function dtwpb_before_checkout_form(){
	// Show non-cart errors.
	do_action( 'woocommerce_before_checkout_form_cart_notices' );
	
	// Check cart has contents.
	if ( WC()->cart->is_empty() && ! is_customize_preview() && apply_filters( 'woocommerce_checkout_redirect_empty_cart', true ) ) {
		return;
	}
	
	// Check cart contents for errors
	do_action( 'woocommerce_check_cart_items' );
	
	// Calc totals
	WC()->cart->calculate_totals();
	
	// Get checkout object
	$checkout = WC()->checkout();
	
	if ( empty( $_POST ) && wc_notice_count( 'error' ) > 0 ) { // WPCS: input var ok, CSRF ok.
	
		wc_get_template( 'checkout/cart-errors.php', array( 'checkout' => $checkout ) );
	
	}else{
		
		$non_js_checkout = ! empty( $_POST['woocommerce_checkout_update_totals'] ); // WPCS: input var ok, CSRF ok.
		
		if ( wc_notice_count( 'error' ) === 0 && $non_js_checkout ) {
				wc_add_notice( __( 'The order totals have been updated. Please confirm your order by pressing the "Place order" button at the bottom of the page.', 'dt_woocommerce_page_builder' ) );
		}
		
		wc_get_template( 'checkout/before-form-checkout.php', array( 'checkout' => $checkout, 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
	}
}

function dtwpb_after_checkout_form(){
	$checkout = WC()->checkout();
	wc_get_template( 'checkout/after-form-checkout.php', array( 'checkout' => $checkout, 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
}
