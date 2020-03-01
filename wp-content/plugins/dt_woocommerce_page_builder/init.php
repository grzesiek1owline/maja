<?php
/**
* Plugin Name: DT WooCommerce Page Builder
* Plugin URI: http://dawnthemes.com/
* Description: is the ideal WPBakery Page Builder add-on to effortlessly layout for WooCommerce and more.
* Version: 3.3.7.3
* Author: DawnThemes 
* Author URI: http://dawnthemes.com/
* Copyright @2016 by DawnThemes
* License: License GNU General Public License version 2 or later
* Text-domain: dt_woocommerce_page_builder
* WC tested up to: 3.5.5
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Current DT WooCommerce Page Builder
 */
if ( ! defined( 'DT_WOO_PAGE_BUILDER_VERSION' ) ) {
	/**
	 *
	 */
	define( 'DT_WOO_PAGE_BUILDER_VERSION', '3.3.7.3' );
}

if ( ! defined( 'DT_WOO_PAGE_BUILDER_URL' ) )
	define( 'DT_WOO_PAGE_BUILDER_URL' , plugin_dir_url(__FILE__));

if ( ! defined( 'DT_WOO_PAGE_BUILDER_DIR' ) )
	define( 'DT_WOO_PAGE_BUILDER_DIR' , plugin_dir_path(__FILE__));


if( !class_exists('DT_WooCommerce_Page_Builder') ):

	class DT_WooCommerce_Page_Builder{
		
		public function __construct(){
			add_action( 'plugins_loaded', array($this,'plugins_loaded'), 9 );
		}
		
		public function plugins_loaded(){
			
			if(!function_exists('is_plugin_active'))
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			
			if ( is_plugin_active( 'woocommerce/woocommerce.php' )) {
				
				require_once ( DT_WOO_PAGE_BUILDER_DIR . 'includes/functions.php' );
				
				if(defined('WPB_VC_VERSION')){
					require_once ( DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/dt_js_composer.php' );
				}else{
					add_action('admin_notices', array(&$this, 'showVcVersionNotice'));
					return;
				}
			}else{
				add_action('admin_notices', array(&$this, 'woocommerce_notice'));
				return ;
			}
			
			add_action('init', array(&$this, 'init'));
			
			require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/shortcodes/shortcodes.php';
			require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/class-woo-extra-account-fields-public.php';
			require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/class-products-renderer.php';
			
		}
		
		public function init(){
			load_plugin_textdomain( 'dt_woocommerce_page_builder' , false, basename(DT_WOO_PAGE_BUILDER_DIR) . '/languages');
			
			if(is_admin()){
				
			}else{
				add_action('wp_enqueue_scripts', array(&$this, 'enqueue_styles'));
				add_action('wp_enqueue_scripts',array(&$this,'enqueue_scripts'));
			}
			
			add_filter( 'body_class', array(&$this, 'dtwpb_body_classes') );
		}
		
		public function woocommerce_notice(){
			$plugin  = get_plugin_data(__FILE__);
			echo '
			  <div class="updated">
			    <p>' . sprintf(__('The <strong>%s</strong> requires <strong><a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a></strong> plugin to be installed and activated on your site.', 'dt_woocommerce_page_builder'), $plugin['Name']) . '</p>
			  </div>';
		}
		
		public function showVcVersionNotice(){
			$plugin_data = get_plugin_data(__FILE__);
			echo '
			<div class="updated">
	          <p>'.sprintf(__('<strong>%s</strong> Compatible with <strong>WPBakery Page Builder</strong> plugin. So You can install <strong><a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=dawnthemes" target="_blank">WPBakery Page Builder</a></strong> plugin to be used into WPBakery Page Builder.', 'dt_woocommerce_page_builder'), $plugin_data['Name']).'</p>
	        </div>';
		}
		
		public function enqueue_styles(){
			wp_enqueue_style('js_composer_front');
			wp_enqueue_style('js_composer_custom_css');
			wp_enqueue_style('dtwpb', DT_WOO_PAGE_BUILDER_URL .'assets/css/style.css');
		}
		
		public function enqueue_scripts(){
			wp_enqueue_script('wpb_composer_front_js');
			wp_enqueue_script('dtwpb',DT_WOO_PAGE_BUILDER_URL.'assets/js/script.js',array('jquery'),DT_WOO_PAGE_BUILDER_VERSION,true);
		}
		
		public function dtwpb_body_classes( $classes ){
			global $dtwpb_product_archive_custom_page, $dtwpb_product_page;
			if($dtwpb_product_page){
				$classes[] = 'dawnthemes-custom-single-product-page';
			}
			if($dtwpb_product_archive_custom_page){
				$classes[] = 'dawnthemes-custom-woocommerce-product-archive';
			}
			return $classes;
		}
		
	}
	
	new DT_WooCommerce_Page_Builder();

endif;