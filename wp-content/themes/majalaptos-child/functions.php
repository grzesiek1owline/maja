<?php
	 add_action( 'wp_enqueue_scripts', 'maja_laptos_child_enqueue_styles' );
	 function maja_laptos_child_enqueue_styles() {
			 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
			 wp_enqueue_style( 'imaggo-style', get_stylesheet_directory_uri() . '/assets/css/main.min.css' );
		 }

		add_action("wp_enqueue_scripts", "myscripts");
		function myscripts() {
				wp_register_script('vendors', get_stylesheet_directory_uri() .'/assets/js/vendor.min.js', '', '', true);
				wp_enqueue_script('vendors');
				wp_register_script('myscript', get_stylesheet_directory_uri() .'/assets/js/custom.min.js', '', '', true);
				wp_enqueue_script('myscript');
		}

//  <!-- add composer -->
$photos_dir = get_stylesheet_directory_uri() . '/assets/img/';
require_once('vendor/stoutlogic/acf-builder/autoload.php');
require_once('inc/acf.php');

if ( ! function_exists( 'woocommerce_template_loop_add_to_cart_owl' ) ) {

	/**
	 * Get the add to cart template for the loop.
	 *
	 * @param array $args Arguments.
	 */
			function woocommerce_template_loop_add_to_cart_owl( $args = array() ) {
					global $product;
					if ( ! is_object( $product)) $product = wc_get_product( get_the_ID() );
					if ( $product ) {
							$defaults = array(
									'quantity'   => 1,
									'class'      => implode( ' ', array_filter( array(
											'button',
											'product_type_' . $product->get_type(),
											$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
											$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
									) ) ),
									'attributes' => array(
											'data-product_id'  => $product->get_id(),
											'data-product_sku' => $product->get_sku(),
											'aria-label'       => $product->add_to_cart_description(),
											'rel'              => 'nofollow',
											'data-name'        => $product->get_name(),
									),
							);

							$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

							// wc_get_template( 'loop/add-to-cart-owl.php', $args );
							echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
									sprintf( '<a href="%s" data-quantity="%s" class="%s m-add-to-cart js-add-to-cart" %s>'. __('Dodaj  do koszyka', 'maja') .'</a>',
											esc_url( $product->add_to_cart_url() ),
											esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
											esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
											isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
											esc_html( $product->add_to_cart_text() )
									),
							$product, $args );
									}
			}
	}
