<?php
/**
 * DT WooCommerce Page Builder Template Hooks
 *
 * Action/filter hooks used for functions/templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
 * Product loop add action
 */

add_action('dtwpb_woocommerce_before_checkout_form', 'dtwpb_before_checkout_form', 20);
add_action('dtwpb_woocommerce_after_checkout_form', 'dtwpb_after_checkout_form', 99);

add_action('vc_before_init', 'dtwpb_vc_before_init');
add_action('vc_after_init', 'dtwpb_vc_after_init');
