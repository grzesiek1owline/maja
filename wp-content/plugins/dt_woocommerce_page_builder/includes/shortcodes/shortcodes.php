<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class DTWPB_Shorcodes{
	
	public static function single_product_shortcodes(){
		$product_shortcodes = array(
			'dtwpb_single_product_image' 		=> 'dtwpb_single_product_image_sc',
			'dtwpb_single_product_title' 		=> 'dtwpb_single_product_title_sc',
			'dtwpb_single_product_rating'		=> 'dtwpb_single_product_rating_sc',
			'dtwpb_single_product_price' 		=> 'dtwpb_single_product_price_sc',
			'dtwpb_single_product_excerpt' 		=> 'dtwpb_single_product_excerpt_sc',
			'dtwpb_single_product_add_to_cart' 	=> 'dtwpb_single_product_add_to_cart_sc',
			'dtwpb_single_product_display_product_purchasing_discount_message' => 'dtwpb_single_product_display_product_purchasing_discount_message_sc',
			'dtwpb_single_product_display_product_purchasing_restricted_message' => 'dtwpb_single_product_display_product_purchasing_restricted_message_sc',
			'dtwpb_single_product_continue_shopping_button' 	=> 'dtwpb_single_product_continue_shopping_button_sc',
			'dtwpb_single_product_meta' 		=> 'dtwpb_single_product_meta_sc',
			'dtwpb_single_product_share' 		=> 'dtwpb_single_product_share_sc',
			'dtwpb_single_product_tabs' 		=> 'dtwpb_single_product_tabs_sc',
			'dtwpb_single_product_additional_information' => 'dtwpb_single_product_additional_information_sc',
			'dtwpb_single_product_description' 	=> 'dtwpb_single_product_description_sc',
			'dtwpb_single_product_reviews' 		=> 'dtwpb_single_product_reviews_sc',
			'dtwpb_single_product_related_products' => 'dtwpb_single_product_related_products_sc',
			'dtwpb_single_product_upsells' 		=> 'dtwpb_single_product_upsells_sc',
			'dtwpb_single_product_custom_key'	=> 'dtwpb_single_product_custom_key_sc',
		);
		
		/*
		 * Plugins support
		 */
		// Single product - WooCommerce Frontend Manager - WC Lovers
		if( class_exists('WCFM') ){
			$product_shortcodes['dtwpb_single_product_wcfm_enquiry_button'] = 'dtwpb_single_product_wcfm_enquiry_button_sc';
		}
		// Support WooCommerce Multivendor Marketplace - WC Lovers
		if ( class_exists( 'WCFMmp' ) ) {
			$product_shortcodes['dtwpb_single_product_wcfmmp_sold_by_single_product'] = 'dtwpb_single_product_wcfmmp_sold_by_single_product_sc';
		}
		// Single product - Support YITH WooCommerce Wishlist plugin
		if ( defined( 'YITH_WCWL' ) ){
			$product_shortcodes['dtwpb_yith_wcwl_add_to_wishlist'] = 'dtwpb_yith_wcwl_add_to_wishlist_sc';
		}
		// Single product - Support YITH WooCommerce Compare plugin
		if ( defined( 'YITH_WOOCOMPARE' ) ){
			$product_shortcodes['dtwpb_yith_woocompare_compare_button_in_product_page'] = 'dtwpb_yith_woocompare_compare_button_in_product_page_sc';
		}
		
		// Single product - Support WooCommerce_Germanized plugin
		if( class_exists('WooCommerce_Germanized') ){
			$product_shortcodes['dtwpb_gzd_template_single_price_unit'] = 'dtwpb_gzd_template_single_price_unit_sc';
			$product_shortcodes['dtwpb_gzd_template_single_legal_info'] = 'dtwpb_gzd_template_single_legal_info_sc';
			$product_shortcodes['dtwpb_gzd_template_single_delivery_time_info'] = 'dtwpb_gzd_template_single_delivery_time_info_sc';
		}
		// Single product - Support WooCommerce Simple Auction plugin
		if ( class_exists( 'WooCommerce_simple_auction' ) ) {
			$product_shortcodes['dtwpb_woocommerce_auction_bid'] = 'dtwpb_woocommerce_auction_bid_sc';
			$product_shortcodes['dtwpb_woocommerce_auction_pay'] = 'dtwpb_woocommerce_auction_pay_sc';
		}
		
		return $product_shortcodes;
	}
	
	public static function archive_shortcodes(){
		return array(
			'dtwpb_product_category_thumbnail' 	=> 'dtwpb_product_category_thumbnail_sc',
			'dtwpb_archive_product_header' 		=> 'dtwpb_archive_product_header_sc',
			'dtwpb_archive_product_header_title' => 'dtwpb_archive_product_header_title_sc',
			'dtwpb_archive_product_description' => 'dtwpb_archive_product_description_sc',
			'dtwpb_woocommerce_shop_loop'		=> 'dtwpb_woocommerce_product_loop_default',
			'dtwpb_woocommerce_sidebar' 		=> 'dtwpb_woocommerce_sidebar_sc',
		);
	}
	
	public static function cart_shortcodes(){
		return array(
			'dtwpb_cart_table'					=> 'dtwpb_cart_table_sc',
			'dtwpb_cart_totals'					=> 'dtwpb_cart_totals_sc',
			'dtwpb_cross_sell'					=> 'dtwpb_cross_sell_sc',
		);
	}
	
	public static function checkout_shortcodes(){
		return array(
			'dtwpb_woocommerce_checkout_coupon_form' => 'dtwpb_woocommerce_checkout_coupon_form_sc',
			'dtwpb_form_billing'				=> 'dtwpb_form_billing_sc',
			'dtwpb_form_shipping'				=> 'dtwpb_form_shipping_sc',
			'dtwpb_checkout_order_review' 		=> 'dtwpb_checkout_order_review_sc',
		);
	}
	
	public static function thankyou_shortcodes(){
		return array(
			'dtwpb_order_received_thankyou' => 'dtwpb_order_received_thankyou_sc',
			'dtwpb_order_received_order_details' => 'dtwpb_order_received_order_details_sc',
			'dtwpb_order_received_order_customer_details' => 'dtwpb_order_received_order_customer_details_sc',
		);
	}
	
	public static function myaccount_shortcodes(){
		return array(
			'dtwpb_woocommerce_myaccount_form_login'	=> 'dtwpb_woocommerce_myaccount_form_login',
			'dtwpb_woocommerce_myaccount_form_register'	=> 'dtwpb_woocommerce_myaccount_form_register',
			
			'dtwpb_woocommerce_myaccount_dashboard'	=> 'dtwpb_woocommerce_myaccount_dashboard',
			'dtwpb_woocommerce_myaccount_orders'	=> 'dtwpb_woocommerce_myaccount_orders',
			'dtwpb_woocommerce_myaccount_wc_memberships'	=> 'dtwpb_woocommerce_myaccount_wc_memberships',
			'dtwpb_woocommerce_myaccount_downloads'	=> 'dtwpb_woocommerce_myaccount_downloads',
			'dtwpb_woocommerce_myaccount_addresses'	=> 'dtwpb_woocommerce_myaccount_addresses',
			'dtwpb_woocommerce_myaccount_edit_account'	=> 'dtwpb_woocommerce_myaccount_edit_account',
			'dtwpb_woocommerce_myaccount_payment_methods'	=> 'dtwpb_woocommerce_myaccount_payment_methods',
			'dtwpb_woocommerce_myaccount_add_payment_method'	=> 'dtwpb_woocommerce_myaccount_add_payment_method',
			'dtwpb_woocommerce_account_bookings_endpoint'	=> 'dtwpb_woocommerce_account_bookings_endpoint',
			'dtwpb_woocommerce_account_subscriptions_endpoint'	=> 'dtwpb_woocommerce_account_subscriptions_endpoint',
			'dtwpb_woocommerce_myaccount_extra_endpoint'	=> 'dtwpb_woocommerce_myaccount_extra_endpoint',
			'dtwpb_woocommerce_myaccount_logout'	=> 'dtwpb_woocommerce_myaccount_logout',
			
			'dtwpb_account_first_name'	=> 'dtwpb_account_first_name',
			'dtwpb_account_last_name'	=> 'dtwpb_account_last_name',
			'dtwpb_account_display_name'	=> 'dtwpb_account_display_name',
			'dtwpb_account_email'	=> 'dtwpb_account_email',
			'dtwpb_account_password'	=> 'dtwpb_account_password',
			'dtwpb_account_extra_fields'	=> 'dtwpb_account_extra_fields',
		);
	}
	
	protected function getCSSAnimation( $animation ) {
		$output = '';
		if ( '' !== $animation && 'none' !== $animation ) {
			wp_enqueue_script( 'waypoints' );
			wp_enqueue_style( 'animate-css' );
			
			$output = ' wpb_animate_when_almost_visible wpb_' . $animation . ' ' . $animation;
		}
		return $output;
	}
	
	protected function enqueueGoogleFonts( $fontsData ) {
		// Get extra subsets for settings (latin/cyrillic/etc)
		$settings = get_option( 'wpb_js_google_fonts_subsets' );
		if ( is_array( $settings ) && ! empty( $settings ) ) {
			$subsets = '&subset=' . implode( ',', $settings );
		} else {
			$subsets = '';
		}
		
		// We also need to enqueue font from googleapis
		if ( isset( $fontsData['values']['font_family'] ) ) {
			wp_enqueue_style('vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets );
		}
	
	}
	
	protected function googleFontsStyles( $fontsData ) {
		$styles = array();
		// Inline styles
		$fontFamily = explode( ':', $fontsData['values']['font_family'] );
		if( isset($fontFamily[0]) )
			$styles[] = 'font-family:' . $fontFamily[0];
		$fontStyles = explode( ':', $fontsData['values']['font_style'] );
		if( isset($fontStyles[1]) )
			$styles[] = 'font-weight:' . $fontStyles[1];
		if( isset($fontStyles[2]) )
			$styles[] = 'font-style:' . $fontStyles[2];
		 
		$inline_style = '';
		foreach( $styles as $attribute ){
			$inline_style .= $attribute.'; ';
		}
		return $inline_style;
	}
	
	protected function getFontsData( $fontsString ) {
		// Font data Extraction
		$googleFontsParam = new Vc_Google_Fonts();
		$fieldSettings = array();
		$fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
		return $fontsData;
	}
	
	public function __construct(){

		$shortcodes = array(
			'dtwpb_woocommerce_breadcrumb' 		=> 'dtwpb_woocommerce_breadcrumb_sc',
		);
		foreach ($shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
		
		$product_shortcodes = self::single_product_shortcodes();
		foreach ($product_shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
		
		$archive_shortcodes = self::archive_shortcodes();
		foreach ($archive_shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
		
		$cart_shortcodes = self::cart_shortcodes();
		foreach ($cart_shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
		
		$checkout_shortcodes = self::checkout_shortcodes();
		foreach ($checkout_shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
		
		$thankyou_shortcodes = self::thankyou_shortcodes();
		foreach ($thankyou_shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
		
		$myaccount_shortcodes = self::myaccount_shortcodes();
		foreach ($myaccount_shortcodes as $shortcode => $function){
			add_shortcode($shortcode, array(&$this, $function));
		}
	}
	
	public function dtwpb_woocommerce_breadcrumb_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => '',
		'text_align' => '',
		'css' => '',
		), $atts) );
		ob_start();
		$style = '';
		if( ! empty( $text_align )  ){
			$style = 'style="text-align: ' . esc_attr( $text_align ) . ';"';
		}
		
		echo '<div ' . $style . ' class="dtwpb-woocommerce-breadcrumb '.esc_attr($el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ', $atts).'">';
				woocommerce_breadcrumb();
		echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_image_sc( $atts, $content = null ){
		if( is_product() ):
			global $product;
			extract( shortcode_atts(array(
				'el_class' => '',
				'css' => '',
			), $atts) );
			ob_start();

			$theme = wc_get_theme_slug_for_templates();
			
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
						
					if( $theme == 'mrtailor' ){ ?>
						<div class="row">	
							<div class="large-2 columns product_summary_thumbnails_wrapper without_sidebar">
								<div><?php woocommerce_show_product_thumbnails(); ?>&nbsp;</div>
							</div><!-- .columns -->
							
							<div class="large-10 large-push-0 medium-8 medium-push-2 columns">
					
								<?php				
									if ( (isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 0) ) {
										do_action( 'woocommerce_before_single_product_summary_sale_flash' );
									}
									do_action( 'woocommerce_before_single_product_summary_product_images' );
									do_action( 'woocommerce_before_single_product_summary' );
								?>
								
							
								<?php if ( (isset($mr_tailor_theme_options['catalog_mode'])) && ($mr_tailor_theme_options['catalog_mode'] == 0) ) : ?>
									<?php if ( !$product->is_in_stock() && !empty($mr_tailor_theme_options['out_of_stock_text'])) : ?>          
				                        <div class="out_of_stock_badge_single <?php if (!$product->is_on_sale()) : ?>first_position<?php endif; ?>"><?php echo __($mr_tailor_theme_options['out_of_stock_text'], 'getbowtied'); ?></div>            
				                    <?php endif; ?>
				                <?php endif; ?>
								
								&nbsp;
								
							</div><!-- .columns -->
						</div><!-- .row -->
					<?php
					}elseif( function_exists('dawnthemes_custom_woocommerce_before_single_product_summary') ){
						dawnthemes_custom_woocommerce_before_single_product_summary();
					}else{
						wc_get_template( 'loop/sale-flash.php' );
						wc_get_template( 'single-product/product-image.php' );
						do_action( 'dtwpb_woocommerce_before_single_product_summary_additional_tag_after' );
					}
					/*
					if( class_exists('Iconic_WooThumbs') ){
					 	if( function_exists('woocommerce_show_product_sale_flash') ){
							woocommerce_show_product_sale_flash();
						}else{
							wc_get_template( 'single-product/sale-flash.php' );
						}
						echo do_shortcode('[woothumbs-gallery]');
					}else{
						do_action( 'woocommerce_before_single_product_summary' );
					}*/
			if(	!empty($el_class) || !empty($css) )
				echo '</div>';
			
			return ob_get_clean();
		endif;
	}
		
	public function dtwpb_single_product_title_sc( $atts, $content = null ){
		if( !is_product() ){
			return;
		}
		global $product;
		extract( shortcode_atts(array(
			'tag' => 'h1',
			'text_align' => '',
			'font_size' => '',
			'line_height' => '',
			'color' => '',
			'use_fonts' => 'yes',
			'google_fonts' => 'font_family:Abril Fatface|font_style:400 regular',
			'css_animation' => '',
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		$class = 'product_title entry-title';
		
		$animation_classes = $this->getCSSAnimation( $css_animation );
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ', $atts).'">';
		
			$style = '';
			$styles = array();
				
			if($font_size!="")
				$styles[] = 'font-size:'. absint($font_size) .'px !important';
			
			if($line_height!="")
				$styles[] = 'line-height:'. $line_height . 'px !important';
			
			if($color!="")
				$styles[] = 'color:'. $color .' !important';
			
			if($text_align!="")
				$styles[] = 'text-align:'. $text_align .'';
			
			if ( ! empty( $styles ) ) {
				$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
			}
			
			if( $use_fonts == 'no' ){
				$text_font_data = $this->getFontsData( $google_fonts );
				$text_font_inline_style = $this->googleFontsStyles( $text_font_data );
				$this->enqueueGoogleFonts( $text_font_data );
				
				the_title( '<'.$tag.' class="'.$class.' '.$animation_classes.'" style="'.$text_font_inline_style.' '.esc_attr( implode( ';', $styles ) ).'">', '</'.$tag.'>' );
				
			}else{
				the_title( '<'.$tag.' '. $style .' class="'.$class.' '.$animation_classes.'">', '</'.$tag.'>' );
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_rating_sc( $atts, $content = null ){
		if( is_product() ):
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		
		echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			woocommerce_template_single_rating ();
		echo '</div>';
		
		return ob_get_clean();
		endif;
	}
	
	public function dtwpb_single_product_price_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'text_align' => '',
			'font_size' => '',
			'line_height' => '',
			'color' => '',
			'use_fonts' => 'yes',
			'google_fonts' => 'font_family:Abril Fatface|font_style:400 regular',
			'css_animation' => '',
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		
		$class = 'dtwpb-price price';
		
		$animation_classes = $this->getCSSAnimation( $css_animation );
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ', $atts).'">';
		
			$style = '';
			$styles = array();
			
			if($font_size!="")
				$styles[] = 'font-size:'. absint($font_size) .'px !important';
				
			if($line_height!="")
				$styles[] = 'line-height:'. $line_height . 'px !important';
				
			if($color!="")
				$styles[] = 'color:'. $color .' !important';
				
			if($text_align!="")
				$styles[] = 'text-align:'. $text_align .'';
				
			if ( ! empty( $styles ) ) {
				$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
			}
		
			if( $use_fonts == 'no' ){
				$text_font_data = $this->getFontsData( $google_fonts );
				$text_font_inline_style = $this->googleFontsStyles( $text_font_data );
				$this->enqueueGoogleFonts( $text_font_data );
				
				echo '<p class="'.$class.' '.$animation_classes.'"  style="'.$text_font_inline_style.' '.esc_attr( implode( ';', $styles ) ).'">' . $product->get_price_html() . '</p>';
				
			}else{
				echo '<p '.$style.' class="'.$class.' '.$animation_classes.'">' . $product->get_price_html() . '</p>';
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_excerpt_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product, $post;
		$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		
		if ( ! $short_description ) {
			return;
		}
		
		extract( shortcode_atts(array(
			'text_align' => '',
			'font_size' => '',
			'line_height' => '',
			'color' => '',
			'use_fonts' => 'yes',
			'google_fonts' => 'font_family:Abril Fatface|font_style:400 regular',
			'css_animation' => '',
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		
		$class = 'woocommerce-product-details__short-description';
		
		$animation_classes = $this->getCSSAnimation( $css_animation );
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ', $atts).'">';
			
			$style = '';
			$styles = array();
				
			if($font_size!="")
				$styles[] = 'font-size:'. absint($font_size) .'px !important';
			
			if($line_height!="")
				$styles[] = 'line-height:'. $line_height . 'px !important';
			
			if($color!="")
				$styles[] = 'color:'. $color .' !important';
			
			if($text_align!="")
				$styles[] = 'text-align:'. $text_align .'';
			
			if ( ! empty( $styles ) ) {
				$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
			}
		
			if( $use_fonts == 'no' ){
				$text_font_data = $this->getFontsData( $google_fonts );
				$text_font_inline_style = $this->googleFontsStyles( $text_font_data );
				$this->enqueueGoogleFonts( $text_font_data );
				?>
				<div class="<?php echo esc_attr( $class.' '.$animation_classes )?>" style="<?php echo $text_font_inline_style ?> <?php echo esc_attr( implode( ';', $styles ) );?>">
					<?php echo $short_description; // WPCS: XSS ok. ?>
				</div>
				<?php
			}else{?>
				<div <?php echo $style ?> class="<?php echo esc_attr( $class.' '.$animation_classes )?>">
					<?php echo $short_description; // WPCS: XSS ok. ?>
				</div>
			<?php
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_add_to_cart_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			woocommerce_template_single_add_to_cart ();
			
			// WooCommerce Subscriptions - Display a product's first payment date on the product's page to make sure it's obvious to the customer when payments will start
			if( class_exists('WC_Subscriptions_Synchroniser') ){
				WC_Subscriptions_Synchroniser::products_first_payment_date( true );
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_display_product_purchasing_discount_message_sc( $atts, $content = null ){
		// WC_Memberships_Products_Restrictions->display_product_purchasing_discount_message
		if( !class_exists( 'WC_Memberships_Loader' ) ) { return ''; }
		if( !is_product() ) { return ''; }
		global $post, $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';

		if ( $product instanceof \WC_Product ) {
		
			$user_id = get_current_user_id();
			$args    = array(
				'post'      => $post && in_array( $post->post_type, array( 'product', 'product_variation' ), true ) ? $post : get_post( $product ),
				'rule_type' => 'purchasing_discount',
			);
		
			// if the main/parent product needs the message, just display it normally
			if (  wc_memberships_product_has_member_discount( $product )
				&& ! wc_memberships_user_has_member_discount( $product, $user_id ) ) {
		
					echo \WC_Memberships_User_Messages::get_message_html( 'product_discount', $args );
		
					// if this is a variable product, set the messages up for display per-variation
				} elseif ( $product->is_type( 'variable' ) && $product->has_child() ) {
		
					unset( $args['post'] );
		
					$variations_discounted = false;
		
					/* @type \WC_Product_Variable $product */
					foreach ( $product->get_children() as $variation_id ) {
		
						if ( wc_memberships_product_has_member_discount( $variation_id )
							&& ! wc_memberships_user_has_member_discount( $variation_id, $user_id ) ) {
		
								$args['post_id']       = (int) $variation_id;
								$args['classes']       = array( 'wc-memberships-variation-message', 'js-variation-' . sanitize_html_class( $variation_id ) );
								$variations_discounted = true;
		
								echo WC_Memberships_User_Messages::get_message_html( 'product_discount', $args );
							}
					}
		
					if ( $variations_discounted ) {
						wc_enqueue_js( "
						jQuery( '.variations_form' )
							.on( 'woocommerce_variation_select_change', function( event ) {
								jQuery( '.wc-memberships-variation-message.wc-memberships-member-discount-message' ).hide();
							} )
							.on( 'found_variation', function( event, variation ) {
								jQuery( '.wc-memberships-variation-message.wc-memberships-member-discount-message' ).hide();
								jQuery( '.wc-memberships-variation-message.wc-memberships-member-discount-message.js-variation-' + variation.variation_id ).show();
							} )
							.find( '.variations select' ).change();
					" );
					}
				}
		}
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_display_product_purchasing_restricted_message_sc( $atts, $content = null ){
		// WC_Memberships_Products_Restrictions->display_product_purchasing_restricted_message
		if( !class_exists( 'WC_Memberships_Loader' ) ) { return ''; }
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';

		if ( $product instanceof \WC_Product ) {
	
				$product_id = $product instanceof \WC_Product ? $product->get_id() : 0;
				$args       = array( 'post_id' => $product_id );
	
				if ( ! current_user_can( 'wc_memberships_purchase_restricted_product', $product_id ) ) {
	
					// purchasing is restricted
					echo \WC_Memberships_User_Messages::get_message_html( 'product_purchasing_restricted', $args );
	
				} elseif ( ! current_user_can( 'wc_memberships_purchase_delayed_product', $product_id ) ) {
	
					$args['access_time'] = wc_memberships()->get_capabilities_instance()->get_user_access_start_time_for_post( get_current_user_id(), $product_id, 'purchase' );
	
					// purchasing is delayed
					echo \WC_Memberships_User_Messages::get_message_html( 'product_access_delayed', $args );
	
				} elseif ( $product->is_type( 'variable' ) && $product->has_child() ) {
	
					// variation-specific messages
					$variations_restricted = false;
	
					/* @type \WC_Product_Variable $product */
					foreach ( $product->get_available_variations() as $variation ) {
	
						if ( ! $variation['is_purchasable'] ) {
	
							$variation_id    = (int) $variation['variation_id'];
							$args['classes'] = array( 'wc-memberships-variation-message', 'js-variation-' . sanitize_html_class( $variation_id ) );
							$args['post_id'] = $variation_id;
	
							if ( ! current_user_can( 'wc_memberships_purchase_restricted_product', $variation_id ) ) {
	
								$variations_restricted = true;
	
								// purchasing is restricted
								echo \WC_Memberships_User_Messages::get_message_html( 'product_purchasing_restricted', $args );
	
							} elseif ( ! current_user_can( 'wc_memberships_purchase_delayed_product', $variation['variation_id'] ) ) {
	
								$args['access_time']   = wc_memberships()->get_capabilities_instance()->get_user_access_start_time_for_post( get_current_user_id(), $product_id, 'purchase' );
								$variations_restricted = true;
	
								// purchasing is delayed
								echo \WC_Memberships_User_Messages::get_message_html( 'product_access_delayed', $args );
							}
						}
					}
	
					if ( $variations_restricted ) {
						wc_enqueue_js( "
							jQuery( '.variations_form' )
								.on( 'woocommerce_variation_select_change', function( event ) {
									jQuery( '.wc-memberships-variation-message' ).hide();
								} )
								.on( 'found_variation', function( event, variation ) {
									jQuery( '.wc-memberships-variation-message' ).hide();
									if ( ! variation.is_purchasable ) {
										jQuery( '.wc-memberships-variation-message.js-variation-' + variation.variation_id ).show();
									}
								} )
								.find( '.variations select' ).change();
						" );
					}
				}
			}
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_continue_shopping_button_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		
		global $post, $product;
		
		extract( shortcode_atts(array(
			'continue_shopping_text' => __( "Continue Shopping", 'dt_woocommerce_page_builder' ),
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
			$single_product_title = strip_tags($post->post_title);
			$additional_button_url = get_permalink(get_option('woocommerce_shop_page_id'));
			
			echo '<a href="'.$additional_button_url.'" title="'.$single_product_title.'" class="button alt">'.$continue_shopping_text.'</a>';
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_meta_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		woocommerce_template_single_meta ();
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_share_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			if( function_exists('acoda_share_post') ){
				echo acoda_share_post();
			}else{
				woocommerce_template_single_sharing ();
			}
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_tabs_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
			wc_get_template( 'single-product/tabs/tabs.php' );
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_additional_information_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
				wc_get_template( 'single-product/tabs/additional-information.php' );
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_description_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product, $post;
		
		extract( shortcode_atts(array(
			'text_align' => '',
			'font_size' => '',
			'line_height' => '',
			'color' => '',
			'use_fonts' => 'yes',
			'google_fonts' => 'font_family:Abril Fatface|font_style:400 regular',
			'css_animation' => '',
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		
		$class = 'dtwpb-woocommerce-product-description';
		
		$animation_classes = $this->getCSSAnimation( $css_animation );
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ', $atts).'">';
			
			$style = '';
			$styles = array();
			
			if($font_size!="")
  	   		  $styles[] = 'font-size:'. absint($font_size) .'px !important';
  	   		
  	   		if($line_height!="")
  	   		  $styles[] = 'line-height:'. $line_height . 'px !important';
  	   		
  	   		if($color!="")
  	   		   $styles[] = 'color:'. $color .' !important';
  	   		
			if($text_align!="")
  	   		  $styles[] = 'text-align:'. $text_align .'';
  	   		
			if ( ! empty( $styles ) ) {
				$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
			}
		
			if( $use_fonts == 'no' ){ 
				$text_font_data = $this->getFontsData( $google_fonts );
				$text_font_inline_style = $this->googleFontsStyles( $text_font_data );
				$this->enqueueGoogleFonts( $text_font_data );
				?>
				<div class="<?php echo esc_attr( $class.' '.$animation_classes )?>" style="<?php echo $text_font_inline_style ?> <?php echo esc_attr( implode( ';', $styles ) ); ?>">
					<?php the_content(); ?>
				</div>
				<?php
			}else{?>
				<div <?php echo $style; ?>class="<?php echo esc_attr( $class.' '.$animation_classes )?>">
					<?php the_content(); ?>
				</div>
			<?php
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
		
	}
	
	public function dtwpb_single_product_reviews_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			if(comments_open() ){
				comments_template();
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_related_products_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		$atts = extract( shortcode_atts( array(
			'posts_per_page' => 4,
			'columns'  => 4,
			'orderby'  => 'rand',
			'order'  => 'desc',
			'el_class' => '',
			'css' => '',
		), $atts ));
		
		$args = array(
			'posts_per_page' => $posts_per_page,
			'columns'        => $columns,
			'orderby'        => $orderby, // @codingStandardsIgnoreLine.
			'order'          => $order,
		);
		
		ob_start();

		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			$theme = wc_get_theme_slug_for_templates();
			if( $theme == 'mrtailor'){
				if ( function_exists( 'getbowtied_output_related' ) ) {
					echo '<div class="single_product_summary_related">';
					getbowtied_output_related();
					echo '</div>';
				}
			}else{
				woocommerce_related_products($args);
			}
			
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_upsells_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		$atts = extract( shortcode_atts( array(
			'posts_per_page' => '-1',
			'columns'  => '4',
			'orderby'  => 'rand',
			'order'  => 'desc',
			'el_class' => '',
			'css' => '',
		), $atts ));
		
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			$theme = wc_get_theme_slug_for_templates();
			if( $theme == 'mrtailor'){
				if ( function_exists( 'getbowtied_output_upsells' ) ) {
					echo '<div class="single_product_summary_upsell">';
					getbowtied_output_upsells();
					echo '</div>';
				}
			}else{
				woocommerce_upsell_display($posts_per_page, $columns, $orderby, $order);
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Support YITH WooCommerce Wishlist plugin
	 */
	public function dtwpb_yith_wcwl_add_to_wishlist_sc(){
		ob_start();
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		return ob_get_clean();
	}
	/*
	 * Support YITH WooCommerce Compare plugin
	 */
	public function dtwpb_yith_woocompare_compare_button_in_product_page_sc(){
		ob_start();
		echo do_shortcode('[yith_compare_button]');
		return ob_get_clean();
	}
	
	/*
	 * Support WooCommerce_Germanized plugin
	 */
	public function dtwpb_gzd_template_single_price_unit_sc ( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		if( function_exists('woocommerce_gzd_template_single_price_unit') ){
			ob_start();
			woocommerce_gzd_template_single_price_unit();
			return ob_get_clean();
		}
	}
	public function dtwpb_gzd_template_single_legal_info_sc ( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		if( function_exists('woocommerce_gzd_template_single_legal_info') ){
			ob_start();
			woocommerce_gzd_template_single_legal_info();
			return ob_get_clean();
		}
	}
	public function dtwpb_gzd_template_single_delivery_time_info_sc ( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		if( function_exists('woocommerce_gzd_template_single_delivery_time_info') ){
			ob_start();
			woocommerce_gzd_template_single_delivery_time_info();
			return ob_get_clean();
		}
	}
	
	/*
	 * Support WooCommerce Simple Auction plugin
	 */
	public function dtwpb_woocommerce_auction_bid_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		if ( function_exists( 'woocommerce_auction_bid' ) ) {
			ob_start();
			woocommerce_auction_bid();
			return ob_get_clean();
		}
	}
	public function dtwpb_woocommerce_auction_pay_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		if ( function_exists( 'woocommerce_auction_pay' ) ) {
			ob_start();
			woocommerce_auction_pay();
			return ob_get_clean();
		}
	}

	public function dtwpb_single_product_custom_key_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		global $product;
		extract( shortcode_atts( array(
			'product_custom_key_label'  => '',
			'product_custom_key'  => '',
			'el_class' => '',
			'css' => '',
		), $atts ));
		
		//$product_attributes = get_post_meta( get_the_ID(), '_product_attributes', true );
        //$product_custom_value = $product_attributes[$product_custom_key]['value'];
        $product_custom_value = get_post_meta( get_the_ID(), $product_custom_key, true );

		if( empty($product_custom_value) ) return '';

		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			echo '<div class="dtwpb_woocommerce_product_custom_key">';
				echo (!empty($product_custom_key_label)) ? '<span class="product_custom_key_label">'.esc_html($product_custom_key_label).'</span> ' : '';
				echo $product_custom_value;
			echo '</div>';
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_wcfm_enquiry_button_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		
		if( !class_exists('WCFM') ){
			return '';
		}
		
		extract( shortcode_atts( array(
			'el_class' => '',
			'css' => '',
		), $atts ));
		
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			/**
			 * Enquiry Button on Single Product Page
			 * WCFM_Enquiry -> wcfm_enquiry_button
			 * @since 3.3.5
			 */
			global $WCFM, $post;
			if( apply_filters( 'wcfm_is_pref_enquiry_button', true ) ) {
		
			$vendor_id = 0;
			$product_id = 0;
			if( is_product() && $post && is_object( $post ) ) {
				$product_id = $post->ID;
				$vendor_id = $WCFM->wcfm_vendor_support->wcfm_get_vendor_id_from_product( $product_id );
			}
		
			$button_style = '';
			$wcfm_options = $WCFM->wcfm_options;
			if( isset( $wcfm_options['wc_frontend_manager_button_background_color_settings'] ) ) { $button_style .= 'background: ' . $wcfm_options['wc_frontend_manager_button_background_color_settings'] . ';border-bottom-color: ' . $wcfm_options['wc_frontend_manager_button_background_color_settings'] . ';'; }
			if( isset( $wcfm_options['wc_frontend_manager_button_text_color_settings'] ) ) { $button_style .= 'color: ' . $wcfm_options['wc_frontend_manager_button_text_color_settings'] . ';'; }
		
			$wcfm_enquiry_button_label  = isset( $wcfm_options['wcfm_enquiry_button_label'] ) ? $wcfm_options['wcfm_enquiry_button_label'] : __( 'Ask a Question', 'wc-frontend-manager' );
		
			$base_color = '';
			if( isset( $wcfm_options['wc_frontend_manager_base_highlight_color_settings'] ) ) { $base_color = $wcfm_options['wc_frontend_manager_base_highlight_color_settings']; }
			?>
				<div class="wcfm_ele_wrapper wcfm_catalog_enquiry_button_wrapper">
					<div class="wcfm-clearfix"></div>
					<a href="#" class="wcfm_catalog_enquiry" data-store="<?php echo $vendor_id; ?>" data-product="<?php echo $product_id; ?>" style="<?php echo $button_style; ?>"><span class="fa fa-question-circle-o"></span>&nbsp;&nbsp;<span class="add_enquiry_label"><?php _e( $wcfm_enquiry_button_label, 'wc-frontend-manager' ); ?></span></a>
					<?php if( $base_color ) { ?>
						<style>a.wcfm_catalog_enquiry:hover{background: <?php echo $base_color; ?> !important;border-bottom-color: <?php echo $base_color; ?> !important;}</style>
					<?php } ?>
					<div class="wcfm-clearfix"></div>
				</div>
				<?php
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
	
		return ob_get_clean();
	}
	
	public function dtwpb_single_product_wcfmmp_sold_by_single_product_sc( $atts, $content = null ){
		if( !is_product() ) { return ''; }
		
		if( !class_exists('WCFMmp') ){
			return '';
		}
		
		extract( shortcode_atts( array(
			'el_class' => '',
			'css' => '',
		), $atts ));
		
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			/**
			 * Show Sold by at Single Product Page
			 * WCFMmp_Frontend -> wcfmmp_sold_by_single_product
			 */
			global $WCFM, $WCFMmp, $product;
			
			if( !apply_filters( 'wcfmmp_is_allow_single_product_sold_by', true ) ) return;
			
			if( $WCFMmp->wcfmmp_vendor->is_vendor_sold_by() ) {
				$product_id = $product->get_id();
					
				$vendor_sold_by_template = $WCFMmp->wcfmmp_vendor->get_vendor_sold_by_template();
					
				if( $vendor_sold_by_template == 'tab' ) {
			
				} elseif( $vendor_sold_by_template == 'advanced' ) {
					$WCFMmp->template->get_template( 'sold-by/wcfmmp-view-sold-by-advanced.php', array( 'product_id' => $product_id ) );
				} else {
					$WCFMmp->template->get_template( 'sold-by/wcfmmp-view-sold-by-simple.php', array( 'product_id' => $product_id ) );
				}
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
	
		return ob_get_clean();
	}
	
	
	
	/*
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 * 
	 * 
	 * Product category page builder
	 * 
	 * 
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 */
	public function dtwpb_product_category_thumbnail_sc( $atts, $content = null ){
		if( ! is_tax('product_cat') && ! is_product_category() ){
			return '';
		}
		$category = get_queried_object();
		$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
		if( empty($thumbnail_id) ){
			return '';
		}

		extract( shortcode_atts(array(
		'thumbnail_size' => 'full',
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
			<div class="woocommerce-category-thumbnail">
				<?php 
				$img = wpb_getImageBySize( array(
					'attach_id' => $thumbnail_id,
					'thumb_size' => $thumbnail_size,
					'class' => 'dtwpb_woocommerce_category_thumbnail',
				) );
				if( isset($img['thumbnail']) ){
					echo $img['thumbnail'];
				}
				?>
		    </div>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	public function dtwpb_archive_product_header_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
			<header class="woocommerce-products-header">
		
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		
					<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		
				<?php endif; ?>
		
				<?php
					/**
					 * woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
				?>
		
		    </header>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}

	public function dtwpb_archive_product_header_title_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
		'tag' => 'h1',
		'text_align' => '',
		'font_size' => '',
		'line_height' => '',
		'color' => '',
		'use_fonts' => 'yes',
		'google_fonts' => 'font_family:Abril Fatface|font_style:400 regular',
		'css_animation' => '',
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		$class = 'woocommerce-products-header__title page-title';
		
		$animation_classes = $this->getCSSAnimation( $css_animation );
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
		$style = '';
		$styles = array();
		
		if($font_size!="")
			$styles[] = 'font-size:'. absint($font_size) .'px !important';
			
		if($line_height!="")
			$styles[] = 'line-height:'. $line_height . 'px !important';
			
		if($color!="")
			$styles[] = 'color:'. $color .' !important';
			
		if($text_align!="")
			$styles[] = 'text-align:'. $text_align .'';
			
		if ( ! empty( $styles ) ) {
			$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
		}
		
		if( $use_fonts == 'no' ){
			$text_font_data = $this->getFontsData( $google_fonts );
			$text_font_inline_style = $this->googleFontsStyles( $text_font_data );
			$this->enqueueGoogleFonts( $text_font_data );
		
			echo '<'.$tag.' class="'.$class.' '.$animation_classes.'" style="'.$text_font_inline_style.' '.esc_attr( implode( ';', $styles ) ).'">'.woocommerce_page_title( false ).'</'.$tag.'>';
		
		}else{
			echo '<'.$tag.' '. $style .' class="'.$class.' '.$animation_classes.'">'.woocommerce_page_title( false ).'</'.$tag.'>';
		}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}

	public function dtwpb_archive_product_description_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
		'text_align' => '',
		'font_size' => '',
		'line_height' => '',
		'color' => '',
		'use_fonts' => 'yes',
		'google_fonts' => 'font_family:Abril Fatface|font_style:400 regular',
		'css_animation' => '',
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		$class = 'dtwpb-product-archive-description';
		
		$animation_classes = $this->getCSSAnimation( $css_animation );
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
			$style = '';
			$styles = array();
			
			if($font_size!="")
				$styles[] = 'font-size:'. absint($font_size) .'px !important';
				
			if($line_height!="")
				$styles[] = 'line-height:'. $line_height . 'px !important';
				
			if($color!="")
				$styles[] = 'color:'. $color .' !important';
				
			if($text_align!="")
				$styles[] = 'text-align:'. $text_align .'';
				
			if ( ! empty( $styles ) ) {
				$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
			}
			
			if( $use_fonts == 'no' ){
				$text_font_data = $this->getFontsData( $google_fonts );
				$text_font_inline_style = $this->googleFontsStyles( $text_font_data );
				$this->enqueueGoogleFonts( $text_font_data );
				?>
				<div class="<?php echo esc_attr( $class.' '.$animation_classes )?>" style="<?php echo $text_font_inline_style ?> <?php echo esc_attr( implode( ';', $styles ) );?>">
					<?php
					/**
					 * woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
				?>
				</div>
				<?php
			}else{?>
				<div <?php echo $style ?> class="<?php echo esc_attr( $class.' '.$animation_classes )?>">
					<?php
					/**
					 * woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
				?>
				</div>
			<?php
			}
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_product_loop_default( $atts, $content = null ){
		global $wp_query, $woocommerce_loop;
	
		$isTheme = wc_get_theme_slug_for_templates();
		
		extract( shortcode_atts(array(
			'layout' => '',
			'columns' => '4',
			'tablet_columns' => '3',
			'mobile_columns' => '2',
			'rows' => '3',
			'paginate' => 'yes',
			'allow_order' => 'yes',
			'show_result_count' => 'yes',
			'nothing_found_message' => esc_html__( 'No products were found matching your selection.', 'dt_woocommerce_page_builder' ),
			'query_post_type' => 'current_query',
			'el_class' => '',
			'column_gap' => 20,
			'row_gap' => 40,
			'text_align' => '',
			'css' => '',
		), $atts) );
		
		$type = 'products';
		$settings = array();
		$settings['columns'] = absint($columns);
		$settings['rows'] = absint($rows);
		$settings['paginate'] = $paginate;
		$settings['allow_order'] = $allow_order;
		$settings['show_result_count'] = $show_result_count;
		$settings['nothing_found_message'] = $nothing_found_message;
		$settings['query_post_type'] = 'current_query';
		$settings['class'] = '';
			
		if( $isTheme == 'shopme' ){
			$settings['class'] = '';
		}
		if( $isTheme == 'bridge' ){
			$settings['class'] = 'container_inner default_template_holder clearfix';
		}
		
		ob_start(); $html = '';
		
		if( $layout == 'custom' ){
			$class = 'dtwpb-archive-products';
			$class .= ' products-columns-'.$columns;
			$class .= ' products-columns-tablet-'.$tablet_columns;
			$class .= ' products-columns-mobile-'.$mobile_columns;
			
			echo '<div class="'.esc_attr($class . ' ' . $el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			echo '<style>';
			echo '.dtwpb-archive-products .woocommerce ul.products{grid-column-gap:'.$column_gap.'px;}';
			echo '.dtwpb-archive-products .woocommerce ul.products{grid-row-gap:'.$row_gap.'px;}';
			echo ($text_align) ? '.dtwpb-archive-products ul.products li.product{text-align:'.$text_align.';}' : '';
			echo '</style>';
			
			if ( WC()->session ) {
				wc_print_notices();
			}
			// For Render.
			if ( ! isset( $GLOBALS['post'] ) ) {
				$GLOBALS['post'] = null; // WPCS: override ok.
			}
			$shortcode = new DTWPB_Products_Renderer( $settings, $type );
			
			$content = $shortcode->get_content();
			
			if ( $content ) {
				echo ( $content );
			} elseif ( $settings['nothing_found_message'] ) {
				echo '<div class="dtwpb-nothing-found dtwpb-products-nothing-found">' . esc_html( $settings['nothing_found_message'] ) . '</div>';
			}
			
			
			echo '</div><!--archive-products-wrap-->';
			
			return ob_get_clean();
			
		}else{ // Theme default
			$woocommerce_loop['columns'] = absint( $columns );
			
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class) . dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			if ( woocommerce_product_loop() ) {
			
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			
				woocommerce_product_loop_start();
			
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
			
						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						*/
						do_action( 'woocommerce_shop_loop' );
			
						wc_get_template_part( 'content', 'product' );
					}
				}
			
				woocommerce_product_loop_end();
			
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				*/
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
			$class_wrapper = 'woocommerce columns-' . absint( $columns );
			if( $isTheme == 'shopme' ){
				$class_wrapper = '';
			}
			if( $isTheme == 'bridge' ){
				$class_wrapper = 'container_inner default_template_holder clearfix';
			}
			
			if(	!empty($el_class) || !empty($css) )
				echo '</div>';
			
			return '<div class="' . $class_wrapper . '">' . ob_get_clean() . '</div>';
		}
		
	}
	
	public function dtwpb_woocommerce_sidebar_sc( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Cart page shortcodes
	 */
	public function dtwpb_cart_table_sc( $atts, $content = null ){
		if( !is_cart() ){ 
			return;
		}
		
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			echo DT_WC_Shortcode_Cart::output( $atts );
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_cart_totals_sc( $atts, $content = null ){
		if( !is_cart() ){ return '';}
		if(WC()->cart->is_empty())
			return '';
		
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		
		echo '<div class="woocommerce '.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
			woocommerce_cart_totals();
		
		echo '</div>';

		return ob_get_clean();
	}
	
	public function dtwpb_cross_sell_sc( $atts, $content = null ){
		if( !is_cart() ){ return '';}
		extract( shortcode_atts(array(
			'posts_per_page'=> 4,
			'columns'=> 4,
			'orderby'=> 'rand',
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		?>
			<div class="woocommerce dtwpb_cross_sell">
			<?php woocommerce_cross_sell_display( $posts_per_page, $columns, $orderby); ?>
			</div>
		<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';

		return ob_get_clean();
	}
	
	/*
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 *
	 * Checkout page builder
	 *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 */
	
	public function dtwpb_woocommerce_checkout_coupon_form_sc( $atts, $content = null ){
		if ( !is_checkout() ) {
			return;
		}
	
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
		echo '<div class="dtwpb_woocommerce_checkout_coupon_form"></div>';
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
	
		return ob_get_clean();
	}
	
	
	public function dtwpb_form_billing_sc( $atts, $content = null ){
		if ( !is_checkout() ) {
			return;
		}
		
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		if ( sizeof( $checkout->checkout_fields ) > 0 ) :
		do_action( 'woocommerce_checkout_billing' );
		endif;
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
	
		return ob_get_clean();
	}
	
	public function dtwpb_form_shipping_sc( $atts, $content = null ){
		if ( !is_checkout() ) {
			return;
		}
		
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		if ( sizeof( $checkout->checkout_fields ) > 0 ) :
		do_action( 'woocommerce_checkout_shipping' );
		endif;
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
	
		return ob_get_clean();
	}
	
	
	public function dtwpb_checkout_order_review_sc( $atts, $content = null ){
		if ( !is_checkout() ) {
			return;
		}
		
		$checkout = WC()->checkout();
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class ). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';?>
			
			<h3 id="order_review_heading"><?php _e( 'Your order', 'dt_woocommerce_page_builder' ); ?></h3>
		
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
		
			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
		
			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Custom Thank you page
	 */
	
	public function dtwpb_order_received_thankyou_sc( $atts, $content = null ){
		global $wp;
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		
		if(	!empty($el_class) || !empty($css) )
		echo '<div class="'.esc_attr($el_class ). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';?>
			
			<?php
			if( !isset($wp->query_vars['order-received']) ){
				return;
			}
			
			$order = wc_get_order($wp->query_vars['order-received']);
			wc_get_template( 'checkout/thankyou-order-received.php',array( 'order' => $order ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
			?>
			
		<?php
		if(	!empty($el_class) || !empty($css) )
		echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_order_received_order_details_sc( $atts, $content = null ){
		global $wp;
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		
		if(	!empty($el_class) || !empty($css) )
		echo '<div class="'.esc_attr($el_class ). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';?>
			
			<?php 
			if( !isset($wp->query_vars['order-received']) ){
				return;
			}
			$order = wc_get_order($wp->query_vars['order-received']);
			$order_id = $order->get_id();
			
			wc_get_template( 'order/order-details.php',array( 'order_id' => $order_id ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
			?>
			
		<?php
		if(	!empty($el_class) || !empty($css) )
		echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_order_received_order_customer_details_sc( $atts, $content = null ){
		global $wp;
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		
		if(	!empty($el_class) || !empty($css) )
		echo '<div class="'.esc_attr($el_class ). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';?>
			
			<?php 
			if( !isset($wp->query_vars['order-received']) ){
				return;
			}
			
			$order = wc_get_order($wp->query_vars['order-received']);
			
			$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
			if ( $show_customer_details ) {
				wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
			}
			?>
			
		<?php
		if(	!empty($el_class) || !empty($css) )
		echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Custom MyAccount before login page
	 */
	
	public function dtwpb_woocommerce_myaccount_form_login( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
		wc_get_template( 'myaccount/content-form-login.php', array( 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_form_register( $atts, $content = null ){
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
		wc_get_template( 'myaccount/form-register.php', array( 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 * Custom MyAccount page
	 */
	public function dtwpb_woocommerce_myaccount_dashboard( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
		if( !empty($content) ){
			global $current_user;
			?>
			<?php if( is_user_logged_in() ) : ?>
			<p>
				<?php
					printf(
					__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'dt_woocommerce_page_builder' ),
					'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
					esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
					);
				?>
			</p>
			<?php endif; ?>
			<p>
				<?php echo $content;?>
			</p>
			<?php
		}else{
			wc_get_template( 'myaccount/dashboard.php', array(
			'current_user' => get_user_by( 'id', get_current_user_id() ),
			) );
		}
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_orders( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		if ( ! is_user_logged_in() ) { return esc_html__('You need first to be logged in', 'dt_woocommerce_page_builder'); }
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
		global $wp,$dtwbp_my_account_current_view_id,$dtwpb_wc_get_endpoint_url_tab_id;
		
		VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Section' );
		$tab_id = end(WPBakeryShortCode_VC_Tta_Section::$section_info);
		if($tab_id){
			do_action('dtwpb_account_orders_in_tab',$tab_id);
			do_action('dtwpb_wc_get_endpoint_url',$tab_id);
		}
		
		if( isset($wp->query_vars['orders']) ){
			$value = $wp->query_vars['orders'];
			do_action( 'woocommerce_account_orders_endpoint', $value );
			
		}elseif( isset($wp->query_vars['view-order']) ){
			$value = $wp->query_vars['view-order'];
			if($tab_id){
				$myaccount_url = get_permalink().'#'.$tab_id['tab_id'];
				do_action('dtwpb_woocommerce_account_view_order_backorder',$myaccount_url);
			}
			do_action( 'woocommerce_account_view-order_endpoint', $value );
			
		}elseif( isset($wp->query_vars['payment-methods']) ){
			$value = $wp->query_vars['payment-methods'];
			do_action( 'woocommerce_account_view-order_endpoint', $value );
			
		}elseif( isset($wp->query_vars['add-payment-method']) ){
			$value = $wp->query_vars['add-payment-method'];
			do_action( 'woocommerce_account_view-order_endpoint', $value );
			
		}else{
			$value = '';
			do_action( 'woocommerce_account_orders_endpoint', $value );
		}
		/*
		foreach ( $wp->query_vars as $key => $value ) {
			// Ignore pagename param.
			if ( 'pagename' === $key ) {
				continue;
			}

			if ( has_action( 'woocommerce_account_' . $key . '_endpoint' ) ) {
				do_action( 'woocommerce_account_' . $key . '_endpoint', $value );
				return;
			}
		}*/
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		$dtwbp_my_account_current_view_id = null;
		$dtwpb_wc_get_endpoint_url_tab_id = null;
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_wc_memberships( $atts, $content = null ){
		if ( !is_account_page() || !class_exists('WC_Memberships_Members_Area') ) {
			return;
		}
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			//do_action('woocommerce_account_members-area_endpoint');
			require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/plugins-support/woocommerce-memberships/class-wc-memberships-members-area.php';
			$output_members_area = new DTWPB_WC_Memberships_Members_Area();
			$output_members_area->output_members_area();
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_downloads( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
			do_action('woocommerce_account_downloads_endpoint');
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_addresses( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		
		if ( ! is_user_logged_in() ) { return esc_html__('You need first to be logged in', 'dt_woocommerce_page_builder'); }
		
		global $wp, $dtwpb_wc_get_endpoint_url_tab_id;
		
		$type = '';
		
		if( isset($wp->query_vars['edit-address']) ){
			$type = $wp->query_vars['edit-address'];
		}else{
			$type = wc_edit_address_i18n( sanitize_title( $type ), true );
		}
		
		VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Section' );
		$tab_id = end(WPBakeryShortCode_VC_Tta_Section::$section_info);
		if($tab_id){
			do_action('dtwpb_wc_get_endpoint_url',$tab_id);
		}
		
		
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
			), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
		WC_Shortcode_My_Account::edit_address( $type );
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		$dtwpb_wc_get_endpoint_url_tab_id = null;
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_edit_account( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		
		if ( ! is_user_logged_in() ) { return esc_html__('You need first to be logged in', 'dt_woocommerce_page_builder'); }
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
				do_action('woocommerce_account_edit-account_endpoint');
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_payment_methods( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		
		if ( ! is_user_logged_in() ) { return esc_html__('You need first to be logged in', 'dt_woocommerce_page_builder'); }
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
			), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
				
				//do_action('woocommerce_account_payment-methods_endpoint');
				
				//wc_get_template( 'myaccount/payment-methods.php' );
				
				wc_get_template( 'myaccount/payment-methods.php', array( 'woocommerce-page-builder-custom-templates' => 1 ), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
			
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	
	public function dtwpb_woocommerce_myaccount_add_payment_method( $atts, $content = null ){
		if ( !is_account_page() ) {
			return;
		}
		
		if ( ! is_user_logged_in() ) { return esc_html__('You need first to be logged in', 'dt_woocommerce_page_builder'); }
		
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
			), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
				
				//WC_Shortcode_My_Account::add_payment_method();
				//do_action('woocommerce_account_add-payment-method_endpoint');
				//wc_get_template( 'myaccount/form-add-payment-method.php' );
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}

	public function dtwpb_woocommerce_account_bookings_endpoint($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
				do_action('woocommerce_account_bookings_endpoint');
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}

	public function dtwpb_woocommerce_account_subscriptions_endpoint($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
				//do_action('woocommerce_account_subscriptions_endpoint');
				
				global $wp,$dtwbp_my_account_current_view_id,$dtwpb_wc_get_endpoint_url_tab_id;
				
				VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Section' );
				$tab_id = end(WPBakeryShortCode_VC_Tta_Section::$section_info);
				if($tab_id){
					do_action('dtwpb_account_orders_in_tab',$tab_id);
					do_action('dtwpb_wc_get_endpoint_url',$tab_id);
				}
				
				if( isset($wp->query_vars['subscriptions']) ){
					$value = $wp->query_vars['subscriptions'];
					do_action( 'woocommerce_account_subscriptions_endpoint', $value );
						
				}elseif( isset($wp->query_vars['view-subscription']) ){
					$value = $wp->query_vars['view-subscription'];
					if($tab_id){
						$myaccount_url = get_permalink().'#'.$tab_id['tab_id'];
						do_action('dtwpb_woocommerce_account_view_subscription_backorder',$myaccount_url);
					}
					do_action( 'woocommerce_account_view-subscription_endpoint', $value );
						
				}elseif( isset($wp->query_vars['payment-methods']) ){
					$value = $wp->query_vars['payment-methods'];
					do_action( 'woocommerce_account_view-subscription_endpoint', $value );
						
				}elseif( isset($wp->query_vars['add-payment-method']) ){
					$value = $wp->query_vars['add-payment-method'];
					do_action( 'woocommerce_account_view-subscription_endpoint', $value );
						
				}else{
					$value = '';
					do_action( 'woocommerce_account_subscriptions_endpoint', $value );
				}
				
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
			$dtwbp_my_account_current_view_id = null;
			$dtwpb_wc_get_endpoint_url_tab_id = null;
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_extra_endpoint($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		extract( shortcode_atts(array(
			'extra_key' => 'bookings',
			'el_class' => '',
			'css' => '',
		), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
				do_action('woocommerce_account_'.$extra_key.'_endpoint');
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_woocommerce_myaccount_logout($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		extract( shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		), $atts) );
			ob_start();
			if(	!empty($el_class) || !empty($css) )
				echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		
			foreach ( wc_get_account_menu_items() as $endpoint => $label ) :
				if( $endpoint == 'customer-logout' ):
				?>
				<a href="<?php echo esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) ); ?>"><?php echo esc_html( $label ); ?></a>
				
				<?php
				endif;
			endforeach;
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	/*
	 *  Custom My Account Details form
	 */
	public function dtwpb_account_first_name($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
	
		$user = get_user_by( 'id', get_current_user_id() );
	
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
		?>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="account_first_name"><?php esc_html_e( 'First name', 'dt_woocommerce_page_builder' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
				</p>
				<?php
			if(	!empty($el_class) || !empty($css) )
				echo '</div>';
			
			return ob_get_clean();
	}
		
	public function dtwpb_account_last_name($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		
		$user = get_user_by( 'id', get_current_user_id() );
		
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_last_name"><?php esc_html_e( 'Last name', 'dt_woocommerce_page_builder' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</p>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_account_display_name($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		
		$user = get_user_by( 'id', get_current_user_id() );
		
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
			</p>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_account_email($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		
		$user = get_user_by( 'id', get_current_user_id() );
		
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="account_email"><?php esc_html_e( 'Email address', 'dt_woocommerce_page_builder' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</p>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_account_password($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		
		$user = get_user_by( 'id', get_current_user_id() );
		
		extract( shortcode_atts(array(
		'el_class' => '',
		'css' => '',
		), $atts) );
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			?>
			<fieldset>
				<legend><?php esc_html_e( 'Password change', 'dt_woocommerce_page_builder' ); ?></legend>
		
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'dt_woocommerce_page_builder' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'dt_woocommerce_page_builder' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_2"><?php esc_html_e( 'Confirm new password', 'dt_woocommerce_page_builder' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
				</p>
			</fieldset>
			<?php
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
	public function dtwpb_account_extra_fields($atts, $content = null){
		if ( ! is_user_logged_in() ) { return ''; }
		
		extract( shortcode_atts(array(
		'type' => 'text', // text||textarea||dropdown||radio||check||date
		'label' => 'Label',
		'name' => '',
		'extra_options' => '',
		'required' => 'no',
		'el_class' => '',
		'css' => '',
		), $atts) );
		if ( empty($name) ) { return '<strong>'.$label . ': Field Name is required</strong>'; }
		
		$field_name = 'dtwpb_billing_' . DTWPB_Woo_Extra_Account_Fields_Public::generate_name( esc_attr($name) );
		
		$args = array(
			'field_name' => $field_name,
			'label' => esc_html($label),
			'options' => array(),
			'required' => $required,
		);
		
		if( $type == 'dropdown' || $type == 'check' || $type == 'radio' ){
			if(!empty($extra_options)){
				$options = json_decode(base64_decode($extra_options));
				foreach ((array)$options as $option){
					$args['options'][$option->label] = $option->value;
				}
			}
		}
		//var_dump($args);
		ob_start();
		if(	!empty($el_class) || !empty($css) )
			echo '<div class="'.esc_attr($el_class). dtwpb_woocommerce_page_builder_shortcode_vc_custom_css_class($css, ' ').'">';
			
			wc_get_template( 'myaccount/partials/'.$type.'.php',  $args , DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		
		if(	!empty($el_class) || !empty($css) )
			echo '</div>';
		
		return ob_get_clean();
	}
	
}
new DTWPB_Shorcodes();


/**
 * Cart Shortcode
 * DT_WC_Shortcode_Cart
 * Used on the cart page, the cart shortcode displays the cart contents and interface for coupon codes and other cart bits and pieces.
 *
 * @author 		WooThemes
 * @category 	Shortcodes
 * @package 	WooCommerce/Shortcodes/Cart
 * @version     2.3.0
 */
class DT_WC_Shortcode_Cart extends WC_Shortcode_Cart{
	/**
	 * Output the cart shortcode.
	 */
	public static function output( $atts = '' ) {
		// Constants.
		wc_maybe_define_constant( 'WOOCOMMERCE_CART', true );

		$atts = shortcode_atts( array(), $atts, 'woocommerce_cart' );

		// Update Shipping
		if ( ! empty( $_POST['calc_shipping'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'woocommerce-cart' ) ) {
			self::calculate_shipping();

			// Also calc totals before we check items so subtotals etc are up to date
			WC()->cart->calculate_totals();
		}

		// Check cart items are valid
		do_action( 'woocommerce_check_cart_items' );

		// Calc totals
		WC()->cart->calculate_totals();

		if ( WC()->cart->is_empty() ) {
			wc_get_template( 'cart/cart-empty.php',  array('woocommerce-page-builder-custom-templates' => 1), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/' );
		} else {
			wc_get_template( 'cart/cart-table.php',  array('woocommerce-page-builder-custom-templates' => 1), DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/', DT_WOO_PAGE_BUILDER_DIR . 'woocommerce-page-builder-templates/'  );
		}
	}
}
