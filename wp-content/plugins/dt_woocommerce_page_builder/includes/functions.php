<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
function dtwpb_get_screen_ids(){
	$screen_ids   = array(
		'toplevel_page_dtwpb_settings',
		'woocommerce_page_dtwpb_settings'
	);
	return $screen_ids;
}

function dtwpb_get_option($key,$default=''){
	$options = get_option('dtwpb_settings');
	if(isset($options[$key]))
		return $options[$key];
	return $default;
}

function dtwpb_insert_page_tpl_2_product_tpl($posted_data = array(), $post_type = ''){
	if($post_type == '') return;
	
	$post_description = isset( $posted_data['post_content'] ) ? $posted_data['post_content'] : '';
	$post_excerpt = isset( $posted_data['post_excerpt'] ) ? $posted_data['post_excerpt'] : '';
	$post_title = isset( $posted_data['post_title'] ) ? $posted_data['post_title'] : '';
	$_wpb_post_custom_css = isset( $posted_data['_wpb_post_custom_css'] ) ? $posted_data['_wpb_post_custom_css'] : '';
	
	if( !get_page_by_title($post_title, OBJECT, $post_type) ){
		$post_post = array(
			'post_content'   => $post_description,
			'post_excerpt'   => $post_excerpt,
			'post_name' 	   => sanitize_title($post_title), //slug
			'post_title'     => $post_title,
			'post_status'    => 'publish',
			'post_type'      => $post_type
		);
		
		if( ($new_id = wp_insert_post( $post_post, false)) ){
			add_post_meta( $new_id, '_wpb_post_custom_css', $_wpb_post_custom_css );
		}
	}
	
}

function dtwpb_apply_custom_css_option($custom_css){
	//
	$css = apply_filters( 'dtwpb_base_build_shortcodes_custom_css', $custom_css );
	if ($css!="") {
		echo '<style>';
		echo $css;
		echo '</style>';
	}
}

function dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class( $param_value, $prefix = '', $atts = '' ){
	dtwpb_apply_custom_css_option($param_value);
	if(function_exists('vc_shortcode_custom_css_class')){ 
		return vc_shortcode_custom_css_class($param_value,$prefix);
	}
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';

	return $css_class;
}