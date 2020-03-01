<?php 
// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Manger for Product Template post type for single product design with constructor
 *
 * @package WooCommercePageBuilder
 * @since 4.0
 */

if ( ! class_exists( 'dtwpb_posttype_product_tpl' ) ) {
	
	require_once vc_path_dir( 'EDITORS_DIR', 'class-vc-backend-editor.php' );
	
	class dtwpb_posttype_product_tpl extends Vc_Backend_Editor{
		protected static $post_type = 'dtwpb_product_tpl';
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
		
		public function dtwpb_woocommerce_disable_gutenberg( $can_edit, $post_type ){
			if ($post_type === 'dtwpb_product_tpl' ) return false;
		
			return $can_edit;
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
			
			if ( post_type_exists( self::$post_type && !class_exists('WooCommerce') ) )
				return;
			
			register_post_type( self::$post_type, array( 
						'labels' => self::createPostTypeLabels(),
						'public' => false,
						'show_in_rest' => false, // set to false to disable G7G
						'editable_in_rest' => false,
						'has_archive' => false,
						'show_in_nav_menus' => false,
						'exclude_from_search' => true,
						'publicly_queryable' => false, // action view
						'show_ui' => true,
						//'show_in_menu' => 'edit.php?post_type=product',
						'show_in_menu' => 'dtwpb_settings',
						'query_var' => true,
						'capability_type' => 'post',
						'map_meta_cap'=> true,
						'hierarchical' => false,
						'supports' => array( 'title','editor','revisions' )
			 ) );
			
		}
		
		public static function createPostTypeLabels(){
			return array(
				'name' => esc_html__( 'Product Templates', 'dt_woocommerce_page_builder' ),
				'singular_name' => esc_html__( 'Product Template', 'dt_woocommerce_page_builder' ),
				'menu_name' => _x( 'Product Templates', 'Admin menu name', 'dt_woocommerce_page_builder' ),
				'add_new' => esc_html__( 'Add New Product Template', 'dt_woocommerce_page_builder' ),
				'add_new_item' => esc_html__( 'Add New Product Template', 'dt_woocommerce_page_builder' ),
				'edit' => esc_html__( 'Edit', 'dt_woocommerce_page_builder' ),
				'edit_item' => esc_html__( 'Edit Product Template', 'dt_woocommerce_page_builder' ),
				'new_item' => esc_html__( 'New Product Template', 'dt_woocommerce_page_builder' ),
				'view' => esc_html__( 'View Product Template', 'dt_woocommerce_page_builder' ),
				'view_item' => esc_html__( 'View Product Template', 'dt_woocommerce_page_builder' ),
				'search_items' => esc_html__( 'Search Product Templates', 'dt_woocommerce_page_builder' ),
				'not_found' => esc_html__( 'No Product Templates found', 'dt_woocommerce_page_builder' ),
				'not_found_in_trash' => esc_html__( 'No Product Templates found in trash', 'dt_woocommerce_page_builder' ),
				'parent' => esc_html__( 'Parent Product Template', 'dt_woocommerce_page_builder' )
			);
		}
		
		public static function postType(){
			return self::$post_type;
		}
		
		public static function remove_row_actions($actions){
			if( get_post_type() === 'dtwpb_product_tpl' )
				unset( $actions['edit_vc'] );
			return $actions;
		}
	}
}