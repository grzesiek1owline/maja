<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if accessed directly
}

class DTWPB_Woo_Extra_Account_Fields_Public {

	public function __construct() {
		add_action('wp_enqueue_scripts', array(&$this, 'public_enqueue_styles'));
		add_action('wp_enqueue_scripts', array(&$this, 'public_enqueue_scripts'));
	}
	
	public function public_enqueue_styles(){
		wp_enqueue_style('jquery_ui', DT_WOO_PAGE_BUILDER_URL. 'assets/css/jquery-ui.css');
		wp_enqueue_style('dtwpb-woo-extra-account', DT_WOO_PAGE_BUILDER_URL. 'assets/css/woocommerce-extra-public.css');
	}
	
	public function public_enqueue_scripts(){
		wp_enqueue_script('dtwpb-woo-extra-account-fields', DT_WOO_PAGE_BUILDER_URL. 'assets/js/front-custom.js',
			array(
			'jquery',
			'jquery-ui-core',
			'jquery-ui-datepicker'
			)
		);
	}
	
	/**
	 * @param $id_name
	 *
	 * @return mixed
	 * Generate the name for the fields from the id_name passed
	 */
	public static function generate_name( $id_name ){
		// make sure first is the string is in lowercase
		$id_name = strtolower( $id_name );
		$name  = preg_replace( '/\s+/', '_', $id_name ); #replace spaces with underscores
		
		return $name;
	}
	
}

new DTWPB_Woo_Extra_Account_Fields_Public();