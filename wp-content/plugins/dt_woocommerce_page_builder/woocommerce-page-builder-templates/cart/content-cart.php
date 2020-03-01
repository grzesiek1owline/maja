<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce-page-builder-templates/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

$theme = wc_get_theme_slug_for_templates();

?>
<div class="woocommerce woocommerce-page-builder">
	<?php
	wc_print_notices();
	
	do_action('dtwpb_cart_content');
	?>
</div>
