<?php 
// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Manger for Category Template post type for product category design with constructor
 *
 * @package WooCommercePageBuilder
 * @since 4.0
 */
if ( ! class_exists( 'DTWPB_MyAccount_Tpl' ) ) {
	
	require_once vc_path_dir( 'EDITORS_DIR', 'class-vc-backend-editor.php' );
	
	class DTWPB_MyAccount_Tpl extends Vc_Backend_Editor{
		protected static $post_type = 'dtwpb_myaccount';
		protected $templates_editor = false;
		
		/**
		 * This method is called to add hooks.
		 *
		 * @since  4.8
		 * @access public
		 */
		public function addHooksSettings(){
			parent::addHooksSettings();
		}
		
		public function render( $post_type ) {
			if ( $this->isValidPostType( $post_type ) ) {
				$this->registerBackendJavascript();
				$this->registerBackendCss();
				// B.C:
				visual_composer()->registerAdminCss();
				visual_composer()->registerAdminJavascript();
				// Disbale Frontend
				vc_disable_frontend();
		
				add_meta_box( 'wpb_visual_composer', __( 'WPBakery Page Builder', 'js_composer' ), array(
				$this,
				'renderEditor',
				), $post_type, 'normal', 'high' );
			}
		}
		
		public function editorEnabled() {
			return true;
		}
		
		/**
		 * Rewrites validation for correct post_type of th post.
		 *
		 * @param string $type
		 *
		 * @return bool
		 */
		public function isValidPostType( $type = '' ) {
			$type = ! empty( $type ) ? $type : get_post_type();
			return $this->editorEnabled() && $this->postType() === $type;
		}
		
		public static function createPostType() {
			if ( post_type_exists( self::$post_type ) && !class_exists('WooCommerce') )
				return;
			
			register_post_type( self::$post_type, array(
						'labels' => array(
							'name' => esc_html__( 'My Account Templates', 'dt_woocommerce_page_builder' ), 
							'singular_name' => esc_html__( 'My Account Template', 'dt_woocommerce_page_builder' ), 
							'menu_name' => _x( 'My Account Templates', 'Admin menu name', 'dt_woocommerce_page_builder' ), 
							'add_new' => esc_html__( 'Add New Templates', 'dt_woocommerce_page_builder' ), 
							'add_new_item' => esc_html__( 'Add New', 'dt_woocommerce_page_builder' ), 
							'edit' => esc_html__( 'Edit', 'dt_woocommerce_page_builder' ), 
							'edit_item' => esc_html__( 'Edit Template', 'dt_woocommerce_page_builder' ), 
							'new_item' => esc_html__( 'New', 'dt_woocommerce_page_builder' ), 
							'view' => esc_html__( 'View', 'dt_woocommerce_page_builder' ), 
							'view_item' => esc_html__( 'View', 'dt_woocommerce_page_builder' ), 
							'search_items' => esc_html__( 'Search Template', 'dt_woocommerce_page_builder' ), 
							'not_found' => esc_html__( 'No Templates found', 'dt_woocommerce_page_builder' ), 
							'not_found_in_trash' => esc_html__( 'No Templates found in trash', 'dt_woocommerce_page_builder' ), 
							'parent' => esc_html__( 'Parent Template', 'dt_woocommerce_page_builder' ) ), 
						'public' => false,
						'show_ui' => true,
						'show_in_nav_menus' => false,
						'exclude_from_search' => true,
						'publicly_queryable' => false,
						'show_in_menu' => 'dtwpb_settings',
						'exclude_from_search' => true,
						'capability_type' => 'post',
						'map_meta_cap'=> true,
						'has_archive' => false,
						'hierarchical' => false,
						'supports' => array( 'title','editor','revisions' )

					) );
		}
		
		public static function postType(){
			return self::$post_type;
		}
		
	}
}