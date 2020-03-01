<?php
// don't load directly
if (!defined('ABSPATH')) {
	die('-1');
}

global $dtwpb_product_page, $dtwpb_product_archive_custom_page;

class DTWPB_Manager {

	//direct_checkout
	public $tmpCart = null;
	public $originCart = null;
	public $is_direct_checkout = false;

	public function __construct() {
		add_action('init', array($this, 'init'));

		add_action('init', array($this, 'dtwpb_product_template_create_post_type'));
		add_action('admin_init', array($this, 'dtwpb_product_template_editor_init'));

		add_action('init', array($this, 'dtwpb_archive_template_create_post_type'));
		add_action('admin_init', array($this, 'dtwpb_archive_template_editor_init'));
		
		add_action('init', array($this, 'dtwpb_cart_template_create_post_type'));
		add_action('admin_init', array($this, 'dtwpb_cart_template_editor_init'));
		
		add_action('init', array($this, 'dtwpb_checkout_template_create_post_type'));
		add_action('admin_init', array($this, 'dtwpb_checkout_template_editor_init'));
		
		add_action('init', array($this, 'dtwpb_thankyou_template_create_post_type'));
		add_action('admin_init', array($this, 'dtwpb_thankyou_template_editor_init'));

		add_action('init', array($this, 'dtwpb_myaccount_template_create_post_type'));
		add_action('admin_init', array($this, 'dtwpb_myaccount_template_editor_init'));
		// Save the added data in the edit account details page
		add_action( 'init', array( &$this, 'dtwpb_woocommerce_edit_account_save' ) );
		
		add_action('after_setup_theme', array($this, 'include_template_functions'), 11);
		
		// Disable Gutengerg for Custom Templates
		add_filter('gutenberg_can_edit_post_type', array($this, 'dtwpb_woocommerce_disable_gutenberg'), 10, 2);
		add_filter('use_block_editor_for_post_type', array($this, 'dtwpb_woocommerce_disable_gutenberg'), 10, 2);

		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-class.php';
	}

	public function init() {

		if (!defined('WPB_VC_VERSION')) {
			return;
		}

		if (is_admin()) {
			include_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/admin.php';
			new DTWPB_Admin('dt_woocommerce_page_builder', DT_WOO_PAGE_BUILDER_VERSION);
		} else {

			//Check - get tab id
			add_action('dtwpb_account_orders_in_tab', array($this, 'dtwpb_account_orders_in_tab'), 99, 1);
			add_action('dtwpb_wc_get_endpoint_url', array($this, 'dtwpb_wc_get_endpoint_url'), 99, 1);

			// view-order
			add_action('dtwpb_woocommerce_account_view_order_backorder', array($this, 'dtwpb_woocommerce_account_view_order_backorder'), 99, 1);
			// view-subscription
			add_action('dtwpb_woocommerce_account_view_subscription_backorder', array($this, 'dtwpb_woocommerce_account_view_subscription_backorder'), 99, 1);

			// Product Page
			add_filter('template_include', array($this, 'get_single_product_template_loader'), 999999);
			add_action('template_redirect', array($this, 'get_register_single_product_template'), 999999);
			add_filter('wc_get_template_part', array($this, 'wc_get_template_part'), 99, 3);
			add_action('dtwpb_product_content', array($this, 'the_product_page_content'));
			add_action('dtwpb_product_content', array($this, 'product_data' ), 30 );

			// Custom Product Archive Pages
			add_action('template_redirect', array($this, 'dtwpb_register_product_archive_template'));
			add_action('dtwpb_archive_product_content', array($this, 'the_archive_product_page_content') );
			/*
				 * Filter wc_get_template - can be overriden to yourtheme
				 * - yourtheme/woocommerce-page-builder-templates/cart
				 * - yourtheme/woocommerce-page-builder-templates/checkout
				 * - yourtheme/woocommerce-page-builder-templates/myaccount
			*/
			// Cart
			add_filter( 'wc_get_template', array( $this, 'cart_page_template' ), 50, 3 );
			add_action( 'dtwpb_cart_content', array($this,'the_cart_content') );
			// Checkout
			add_filter(	'wc_get_template', array( $this, 'checkout_page_template' ), 50, 3 );
			add_action( 'dtwpb_checkout_content', array($this,'the_checkout_content') );
			add_action( 'dtwpb_thankyou_content', array($this,'the_thankyou_content') );
			
			// My Account
			add_filter(	'wc_get_template', array( $this, 'myaccount_page_template' ), 50, 3 );
			add_action( 'dtwpb_woocommerce_account_content', array($this,'the_account_content') );
			add_action( 'dtwpb_woocommerce_account_content_form_login', array($this,'the_account_content_form_login') );
			add_action( 'dtwpb_edit_account_form_content', array($this,'the_account_form_edit_account_details') );
		}

		// Remove actions unnecessary
		add_action('template_redirect', array(__CLASS__, 'unsupported_actions'));

	}
	
	// Product
	public function dtwpb_product_template_create_post_type() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-product-tpl-editor.php';
		dtwpb_posttype_product_tpl::createPostType();
	}
	public function dtwpb_product_template_editor_init() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-product-tpl-editor.php';
		$vc_product_editor = new dtwpb_posttype_product_tpl();
		$vc_product_editor->addHooksSettings();
	}
	
	// Archive
	public function dtwpb_archive_template_create_post_type() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-archive-editor.php';
		dtwpb_posttype_archive_tpl::createPostType();
	}
	public function dtwpb_archive_template_editor_init() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-archive-editor.php';
		$vc_archive_editor = new dtwpb_posttype_archive_tpl();
		$vc_archive_editor->addHooksSettings();
	}
	
	// Cart
	public function dtwpb_cart_template_create_post_type() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-cart-editor.php';
		DTWPB_Cart_Tpl::createPostType();
	}
	public function dtwpb_cart_template_editor_init() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-cart-editor.php';
		$vc_cart_editor = new DTWPB_Cart_Tpl();
		$vc_cart_editor->addHooksSettings();
	}
	
	// Checkout
	public function dtwpb_checkout_template_create_post_type() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-checkout-editor.php';
		DTWPB_Checkout_Tpl::createPostType();
	}
	public function dtwpb_checkout_template_editor_init() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-checkout-editor.php';
		$vc_checkout_editor = new DTWPB_Checkout_Tpl();
		$vc_checkout_editor->addHooksSettings();
	}
	
	// Thank you
	public function dtwpb_thankyou_template_create_post_type() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-thankyou-editor.php';
		DTWPB_Thankyou_Tpl::createPostType();
	}
	public function dtwpb_thankyou_template_editor_init() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-thankyou-editor.php';
		$vc_thankyou_editor = new DTWPB_Thankyou_Tpl();
		$vc_thankyou_editor->addHooksSettings();
	}
	
	// My Account
	public function dtwpb_myaccount_template_create_post_type() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-myaccount-editor.php';
		DTWPB_MyAccount_Tpl::createPostType();
	}
	public function dtwpb_myaccount_template_editor_init() {
		require_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-myaccount-editor.php';
		$vc_myaccount_editor = new DTWPB_MyAccount_Tpl();
		$vc_myaccount_editor->addHooksSettings();
	}
	public function dtwpb_woocommerce_edit_account_save(){
		require_once ( DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/vc-editor/vc-woo-extra-account-fields-editor.php' );
		DTWPB_Woo_Extra_Account_Fields::dtwpb_woocommerce_edit_account_save();
	}

	public function dtwpb_woocommerce_disable_gutenberg($can_edit, $post_type) {
		if ($post_type == 'dtwpb_product_tpl') {
			return false;
		}

		return $can_edit;
	}

	public function include_template_functions() {
		if (class_exists('WooCommerce')):
			include_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/dt-template-functions.php';
			include_once DT_WOO_PAGE_BUILDER_DIR . 'includes/js_composer/dt-template-hooks.php';
		endif;
	}

	/**
	 *
	 * @param array $output
	 * @param WPBakeryShortCode $shortcode
	 * @param array $atts
	 * @return string
	 */
	function dtwpb_account_orders_in_tab($tab_id) {
		global $dtwbp_my_account_current_view_id;
		if (empty($dtwbp_my_account_current_view_id)) {
			$dtwbp_my_account_current_view_id = $tab_id;
		}

		add_filter('woocommerce_my_account_my_orders_actions', array($this, 'woocommerce_my_account_my_orders_actions'), 10, 2);
	}
	function woocommerce_my_account_my_orders_actions($actions, $order) {
		global $dtwbp_my_account_current_view_id;
		$new_actions = array();
		foreach ($actions as $key => $action) {
			// remove duplicate tab id
			$action['url'] = str_replace('#' . $dtwbp_my_account_current_view_id['tab_id'], '', $action['url']);
			$action['url'] = $action['url'] . '#' . $dtwbp_my_account_current_view_id['tab_id'];
			$new_actions[$key] = $action;
		}
		return $new_actions;
	}

	function dtwpb_wc_get_endpoint_url($tab_id) {
		global $dtwpb_wc_get_endpoint_url_tab_id;
		if (empty($dtwpb_wc_get_endpoint_url_tab_id)) {
			$dtwpb_wc_get_endpoint_url_tab_id = $tab_id;
		}

		add_filter('woocommerce_get_endpoint_url', array($this, 'dtwpb_woocommerce_get_endpoint_url'), 10, 4);
	}

	function dtwpb_woocommerce_get_endpoint_url($url, $endpoint, $value, $permalink) {
		global $dtwpb_wc_get_endpoint_url_tab_id;
		$url = $url . '#' . $dtwpb_wc_get_endpoint_url_tab_id['tab_id'];
		return $url;
	}

	public function dtwpb_woocommerce_account_view_order_backorder($myaccount_url) {
		?>
		<h2><a href="<?php echo esc_url($myaccount_url); ?>" title="<?php echo apply_filters('woocommerce_account_view_order_backorder', esc_html__('Back to Order list', 'dt_woocommerce_page_builder')); ?>"><?php echo apply_filters('woocommerce_account_view_order_backorder', esc_html__('Back to Order list', 'dt_woocommerce_page_builder')); ?></a></h2>
		<?php
}

	public function dtwpb_woocommerce_account_view_subscription_backorder($myaccount_url) {
		?>
		<h2><a href="<?php echo esc_url($myaccount_url); ?>" title="<?php echo apply_filters('woocommerce_account_view_subscription_backorder', esc_html__('Back to Subscriptions list', 'dt_woocommerce_page_builder')); ?>"><?php echo apply_filters('woocommerce_account_view_order_backorder', esc_html__('Back to Subscriptions list', 'dt_woocommerce_page_builder')); ?></a></h2>
		<?php
}

	public function get_register_single_product_template() {
		if (is_singular('product')) {

			global $post, $dtwpb_product_page;

			$product_template_id = 0;

			if ($dtwpb_single_product_page = get_post_meta($post->ID, 'dtwpb_single_product_page', true)):
				$product_template_id = $dtwpb_single_product_page;
			else:
				$terms = wp_get_post_terms($post->ID, 'product_cat');
				foreach ($terms as $term):
					if ($dtwpb_cat_product_page = get_woocommerce_term_meta($term->term_id, 'dtwpb_cat_product_page', true)):
						$product_template_id = $dtwpb_cat_product_page;
					endif;
				endforeach;
			endif;

			// Get setting option
			if ($product_template_id == 0) {
				$product_template_id = dtwpb_get_option('dtwpb_single_product_page_df', '');
			}

			if (!empty($product_template_id)) {
				$dtwpb_product_page = get_post($product_template_id);
			}

			return $product_template_id;

		}
	}

	public function get_single_product_template_loader($template) {
		$theme = wc_get_theme_slug_for_templates();

		if (is_singular('product')) {
			if ($theme == 'labomba' || $theme == 'mrtailor' || $theme == 'consultix'  || $theme == 'patrios') {
			$product_template_id = $this->get_register_single_product_template();
			$find = array();
			$file = 'single-product.php';
			$find[] = 'woocommerce-page-builder-templates/' . $file;
			if ($dtwpb_product_page = get_post($product_template_id)) {
				$template = locate_template($find);
				if (!$template || (!empty($status_options['template_debug_mode']) && current_user_can('manage_options'))) {
					$template = DT_WOO_PAGE_BUILDER_DIR . '/woocommerce-page-builder-templates/' . $file;
				}

				return $template;
			}
			}
		}

		return $template;
	}

	public function wc_get_template_part($template, $slug, $name) {
		global $post, $dtwpb_product_page;
		$product_template_id = $this->get_register_single_product_template();
		if ($slug === 'content' && $name === 'single-product') {

			// Overridden to yourtheme/woocommerce-page-builder-templates/content-single-product.php.
			$file = 'content-single-product.php';
			$find[] = 'woocommerce-page-builder-templates/' . $file;
			if (!empty($product_template_id)) {
				if ($wpb_custom_css = get_post_meta($product_template_id, '_wpb_post_custom_css', true)) {
					echo '<style type="text/css">' . $wpb_custom_css . '</style>';
				}
				if ($wpb_shortcodes_custom_css = get_post_meta($product_template_id, '_wpb_shortcodes_custom_css', true)) {
					echo '<style type="text/css">' . $wpb_shortcodes_custom_css . '</style>';
				}
				$dtwpb_product_page = get_post($product_template_id);

				if ($dtwpb_product_page) {
					$template = locate_template($find);
					if (!$template || (!empty($status_options['template_debug_mode']) && current_user_can('manage_options'))) {
						$template = DT_WOO_PAGE_BUILDER_DIR . '/woocommerce-page-builder-templates/' . $file;
					}

					return $template;
				}
			}
		}
		
		return $template;
	}
	
	public static function the_product_page_content( $post ){
		global $dtwpb_product_page;
		if( $dtwpb_product_page ){
			$content = $dtwpb_product_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
		}else{
			the_content();
		}
	}
	
	/**
	 * Generates Product structured data.
	 *
	 * Hooked into `dtwpb_product_content` action hook.
	 *
	 * @param WC_Product $product Product data (default: null).
	 */
	public function product_data() {
		WC()->structured_data->generate_product_data();
	}

	public static function unsupported_actions() {
		if (is_product()) {
			global $post;
			$product_template_id = 0;

			$product_template_id = dtwpb_get_option('dtwpb_single_product_page_df', '');

			$terms = wp_get_post_terms($post->ID, 'product_cat');
			foreach ($terms as $term):
				if ($dtwpb_cat_product_page = get_woocommerce_term_meta($term->term_id, 'dtwpb_cat_product_page', true)):
					$product_template_id = $dtwpb_cat_product_page;
				endif;
			endforeach;

			if ($dtwpb_single_product_page = get_post_meta($post->ID, 'dtwpb_single_product_page', true)) {
				$product_template_id = $dtwpb_single_product_page;
			}

			if (!empty($product_template_id)) {

				// If theme Impreza |
				//remove_action('woocommerce_before_main_content', 'us_woocommerce_before_main_content', 10);
				//remove_action('woocommerce_after_main_content', 'us_woocommerce_after_main_content', 20);
				// If theme Site | A Modern, Sharp eCommerce Theme by Select Themes
				remove_action('woocommerce_before_single_product_summary', 'bazaar_qodef_single_product_content_additional_tag_before', 5);
				remove_action('woocommerce_before_single_product_summary', 'bazaar_qodef_single_product_summary_additional_tag_before', 30);
				// If theme Bridge | Bridge Theme
				//remove_action('woocommerce_before_single_product_summary', 'qode_single_product_summary_additional_tag_before', 30);
				//remove_action('woocommerce_after_single_product_summary', 'qode_single_product_summary_additional_tag_after', 5);

				// If theme Depot - A Contemporary Theme for eCommerce
				if (function_exists('depot_mikado_single_product_content_additional_tag_after')) {
					add_action('dtwpb_woocommerce_before_single_product_summary_additional_tag_after', 'depot_mikado_single_product_content_additional_tag_after', 1);
					add_action('dtwpb_woocommerce_before_single_product_summary_additional_tag_after', 'depot_mikado_single_product_summary_additional_tag_after', 5);
				}
				// If theme DynamiX - A Contemporary Theme for eCommerce
				remove_action('woocommerce_before_single_product_summary', 'acoda_image_open_wrap', 2);
				remove_action('woocommerce_before_single_product_summary', 'acoda_close_image_div', 20);
				remove_action('woocommerce_before_single_product_summary', 'acoda_summary_open_wrap', 25);
				remove_action('woocommerce_after_single_product_summary', 'acoda_close_summary_div', 3);
				// enfold
				remove_action('woocommerce_before_single_product_summary', 'avia_add_image_div', 2);
				remove_action('woocommerce_before_single_product_summary', 'avia_close_image_div', 20);
				// If theme Salient
				remove_action('woocommerce_before_single_product_summary', 'summary_div', 35);
				remove_action('woocommerce_after_single_product_summary', 'close_div', 4);
				remove_action('woocommerce_before_single_product_summary', 'images_div', 8);
				remove_action('woocommerce_before_single_product_summary', 'close_div', 29);
				// If theme Fortuna
				remove_action('woocommerce_before_single_product_summary', 'boc_images_div', 2);
				remove_action('woocommerce_before_single_product_summary', 'boc_close_div', 20);
				remove_action('woocommerce_before_single_product_summary', 'boc_summary_div', 35);
				remove_action('woocommerce_after_single_product_summary', 'boc_close_div', 4);
				remove_action('woocommerce_after_single_product_summary', 'boc_woocommerce_output_related_products', 20);
				remove_action('woocommerce_after_single_product_summary', 'boc_woocommerce_output_upsells', 21);
				remove_action('woocommerce_before_single_product', 'boc_wrap_single_product_image', 8);
				remove_action('woocommerce_after_single_product', 'boc_close_div', 9);
				// X
				remove_action('woocommerce_before_single_product', 'x_woocommerce_before_single_product', 10);
				remove_action('woocommerce_after_single_product', 'x_woocommerce_after_single_product', 10);
				// DIVI
				remove_action( 'woocommerce_before_single_product_summary', 'et_divi_output_product_wrapper', 0  );
				remove_action( 'woocommerce_after_single_product_summary', 'et_divi_output_product_wrapper_end', 0  );
				// Superfood
				remove_action( 'woocommerce_before_single_product_summary', 'superfood_elated_single_product_content_additional_tag_before', 5 );
				remove_action( 'woocommerce_after_single_product_summary', 'superfood_elated_single_product_content_additional_tag_after', 1 );
				remove_action( 'woocommerce_before_single_product_summary', 'superfood_elated_single_product_summary_additional_tag_before', 30 );
				remove_action( 'woocommerce_after_single_product_summary', 'superfood_elated_single_product_summary_additional_tag_after', 5 );
			}
		}
		if (is_cart()) {
			// Impreza
			remove_action('woocommerce_after_cart', 'woocommerce_cross_sell_display', 10);
		}
	}

	public function dtwpb_register_product_archive_template() {
		if (defined('WOOCOMMERCE_VERSION')) {

			global $wp_query, $dtwpb_product_archive_custom_page;

			if (is_shop()) {
				$product_achive_custom_page_id = dtwpb_get_option('dtwpb_shop_custom_page_id', '');

				if (!empty($product_achive_custom_page_id)) {
					$dtwpb_product_archive_custom_page = $product_achive_custom_page_id;
					add_filter('template_include', array($this, 'dtwpb_redirect_product_archive_template'), 999999);
				}

			} elseif (is_tax('product_cat') && is_product_category()) {

				$product_cat_custom_page_id = 0;

				$term_id = $wp_query->get_queried_object()->term_id;
				$product_cat_custom_page_id = get_woocommerce_term_meta($term_id, 'dtwpb_product_cat_custom_page', true);

				// Has parrent
				$parent = $wp_query->get_queried_object()->parent;
				if (empty($product_cat_custom_page_id) && ($parent && get_woocommerce_term_meta($parent, 'dtwpb_product_cat_custom_page_child', true))) {
					$product_cat_custom_page_id = get_woocommerce_term_meta($parent, 'dtwpb_product_cat_custom_page', true);
				}

				// Get setting option Category Template Default
				if (empty($product_cat_custom_page_id)) {
					$product_cat_custom_page_id = dtwpb_get_option('dtwpb_product_cat_custom_page_id', '');
				}

				if (!empty($product_cat_custom_page_id)) {
					$dtwpb_product_archive_custom_page = $product_cat_custom_page_id;
					add_filter('template_include', array($this, 'dtwpb_redirect_product_archive_template'), 999999);
				}

			} elseif (is_tax('product_tag') && is_product_tag()) {

				$product_tag_custom_page_id = 0;

				$term_id = $wp_query->get_queried_object()->term_id;
				$product_tag_custom_page_id = get_woocommerce_term_meta($term_id, 'dtwpb_product_tag_custom_page', true);

				// Get setting option Tag Template Default
				if (empty($product_tag_custom_page_id)) {
					$product_tag_custom_page_id = dtwpb_get_option('dtwpb_product_tag_custom_page_id', '');
				}

				if (!empty($product_tag_custom_page_id)) {
					$dtwpb_product_archive_custom_page = $product_tag_custom_page_id;
					add_filter('template_include', array($this, 'dtwpb_redirect_product_archive_template'), 999999);
				}
			}
		}
	}

	public function dtwpb_redirect_product_archive_template($template) {
		global $dtwpb_product_archive_custom_page;
		// Overridden to yourtheme/woocommerce-page-builder-templates/archive-product.php.
		$file = 'archive-product.php';
		$find[] = 'woocommerce-page-builder-templates/' . $file;

		if (($wpb_custom_css = get_post_meta($dtwpb_product_archive_custom_page, '_wpb_post_custom_css', true))) {
			echo '<style type="text/css">' . $wpb_custom_css . '</style>';
		}
		if ($wpb_shortcodes_custom_css = get_post_meta($dtwpb_product_archive_custom_page, '_wpb_shortcodes_custom_css', true)) {
			echo '<style type="text/css">' . $wpb_shortcodes_custom_css . '</style>';
		}

		$dtwpb_product_archive_custom_page = get_post($dtwpb_product_archive_custom_page);

		if ($dtwpb_product_archive_custom_page) {
			$template = locate_template($find);
			if (!$template || (!empty($status_options['template_debug_mode']) && current_user_can('manage_options'))) {
				$template = DT_WOO_PAGE_BUILDER_DIR . '/woocommerce-page-builder-templates/' . $file;
			}

			return $template;
		}
	}
	
	public static function the_archive_product_page_content( $post ){
		global $dtwpb_product_archive_custom_page;
		if( $dtwpb_product_archive_custom_page ){
			$content = $dtwpb_product_archive_custom_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
		}else{
			the_content();
		}
	}
	
	public function cart_page_template( $located, $name, $args ){
		if($name === 'cart/cart.php'){
			$cart_page_id = dtwpb_get_option('dtwpb_cart_page_id', '');
			if( !empty($cart_page_id) ) {
				if (($wpb_custom_css = get_post_meta($cart_page_id, '_wpb_post_custom_css', true))) {
					echo '<style type="text/css">' . $wpb_custom_css . '</style>';
				}
				if ($wpb_shortcodes_custom_css = get_post_meta($cart_page_id, '_wpb_shortcodes_custom_css', true)) {
					echo '<style type="text/css">' . $wpb_shortcodes_custom_css . '</style>';
				}
				$located = DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/cart/content-cart.php';
			}
		}
		
		return $located;
	}
	
	public function the_cart_content( $content ){
		$cart_page_id = dtwpb_get_option('dtwpb_cart_page_id', '');
		if( !empty($cart_page_id) ){
			$cart_page = get_post($cart_page_id);
			$content = $cart_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
		}else{
			the_content();
		}
	
	}
	
	public function checkout_page_template( $located, $name, $args ){
		if($name === 'checkout/form-checkout.php'){
			$dtwpb_checkout_page_id = dtwpb_get_option('dtwpb_checkout_page_id', '');
			if( !empty($dtwpb_checkout_page_id) ) {
				if (($wpb_custom_css = get_post_meta($dtwpb_checkout_page_id, '_wpb_post_custom_css', true))) {
					echo '<style type="text/css">' . $wpb_custom_css . '</style>';
				}
				if ($wpb_shortcodes_custom_css = get_post_meta($dtwpb_checkout_page_id, '_wpb_shortcodes_custom_css', true)) {
					echo '<style type="text/css">' . $wpb_shortcodes_custom_css . '</style>';
				}
				$located = DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/checkout/form-checkout.php';
			}
		}elseif($name === 'checkout/thankyou.php'){
			$dtwpb_thankyou_page_id = dtwpb_get_option('dtwpb_thankyou_page_id', '');
			if( !empty($dtwpb_thankyou_page_id) ) {
				if (($wpb_custom_css = get_post_meta($dtwpb_thankyou_page_id, '_wpb_post_custom_css', true))) {
					echo '<style type="text/css">' . $wpb_custom_css . '</style>';
				}
				if ($wpb_shortcodes_custom_css = get_post_meta($dtwpb_thankyou_page_id, '_wpb_shortcodes_custom_css', true)) {
					echo '<style type="text/css">' . $wpb_shortcodes_custom_css . '</style>';
				}
				$located = DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/checkout/thankyou.php';
			}
		}
		
		return $located;
	}
	
	public function the_checkout_content(){
		$dtwpb_checkout_page_id = dtwpb_get_option('dtwpb_checkout_page_id', '');
		if(!empty($dtwpb_checkout_page_id)){
			
			$checkout_page = get_post($dtwpb_checkout_page_id);
			$content = $checkout_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
			
		}else{
			the_content();
		}
	}
	
	public function the_thankyou_content(){
		$dtwpb_thankyou_page_id = dtwpb_get_option('dtwpb_thankyou_page_id', '');
		if(!empty($dtwpb_thankyou_page_id)){
			
			$thankyou_page = get_post($dtwpb_thankyou_page_id);
			$content = $thankyou_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
			
		}else{
			the_content();
		}
	}
	
	public function myaccount_page_template($located, $name, $args ){
		
		if($name === 'myaccount/my-account.php'){
			$dtwpb_myaccount_page_id = dtwpb_get_option('dtwpb_myaccount_page_id', '');
			if( !empty($dtwpb_myaccount_page_id) ) {
				if($wpb_custom_css = get_post_meta( $dtwpb_myaccount_page_id, '_wpb_post_custom_css', true )){
					echo '<style type="text/css">'.$wpb_custom_css.'</style>';
				}
				if($wpb_shortcodes_custom_css = get_post_meta( $dtwpb_myaccount_page_id, '_wpb_shortcodes_custom_css', true )){
					echo '<style type="text/css">'.$wpb_shortcodes_custom_css.'</style>';
				}
					
				$located = DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/myaccount/my-account.php';
			}
		}elseif($name === 'myaccount/form-login.php'){
			$dtwpb_woocommerce_myaccount_before_login_page_id = dtwpb_get_option('dtwpb_woocommerce_myaccount_before_login_page_id', '');
			if( !empty($dtwpb_woocommerce_myaccount_before_login_page_id) ) {
				if($wpb_custom_css = get_post_meta( $dtwpb_woocommerce_myaccount_before_login_page_id, '_wpb_post_custom_css', true )){
					echo '<style type="text/css">'.$wpb_custom_css.'</style>';
				}
				if($wpb_shortcodes_custom_css = get_post_meta( $dtwpb_woocommerce_myaccount_before_login_page_id, '_wpb_shortcodes_custom_css', true )){
					echo '<style type="text/css">'.$wpb_shortcodes_custom_css.'</style>';
				}
				
				$located = DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/myaccount/form-login.php';
			}
		}elseif($name === 'myaccount/form-edit-account.php'){
			$dtwpb_set_edit_account_page_id = dtwpb_get_option('dtwpb_set_edit_account_page_id', '');
			if( !empty($dtwpb_set_edit_account_page_id) ) {
				if($wpb_custom_css = get_post_meta( $dtwpb_set_edit_account_page_id, '_wpb_post_custom_css', true )){
					echo '<style type="text/css">'.$wpb_custom_css.'</style>';
				}
				if($wpb_shortcodes_custom_css = get_post_meta( $dtwpb_set_edit_account_page_id, '_wpb_shortcodes_custom_css', true )){
					echo '<style type="text/css">'.$wpb_shortcodes_custom_css.'</style>';
				}
				
				$located = DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/myaccount/form-edit-account.php';
			}
		}
	
		return $located;
	}
	
	public function the_account_content(){
		$dtwpb_myaccount_page_id = dtwpb_get_option('dtwpb_myaccount_page_id', '');
		if(!empty($dtwpb_myaccount_page_id)){
			
			$myaccount_page = get_post($dtwpb_myaccount_page_id);
			$content = $myaccount_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
				
		}else{
			the_content();
		}
	}
	
	public function the_account_content_form_login(){
		$myaccount_before_login_page_id = dtwpb_get_option('dtwpb_woocommerce_myaccount_before_login_page_id', '');
		if(!empty($myaccount_before_login_page_id)){
			
			$myaccount_before_login_page = get_post($myaccount_before_login_page_id);
			$content = $myaccount_before_login_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
				
		}else{
			the_content();
		}
	}
	
	public function the_account_form_edit_account_details(){
		$dtwpb_set_edit_account_page_id = dtwpb_get_option('dtwpb_set_edit_account_page_id', '');
		if(!empty($dtwpb_set_edit_account_page_id)){
			$account_details_page = get_post($dtwpb_set_edit_account_page_id);
			$content = $account_details_page->post_content;
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
				
		}else{
			the_content();
		}
	}


}

new DTWPB_Manager();