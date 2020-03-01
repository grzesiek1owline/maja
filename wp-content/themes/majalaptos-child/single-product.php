<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
					global $product;
					$id = $product->get_id();
					$is_online = get_field('product-is-online', $id);
					$desc_title = get_field('product-desc-title', $id);
					$slider_type = get_field('product-slider-type', $id);
					$variations_title = get_field('product-variations-title', $id);
					$site_url = get_site_url();
			?>

			<div class="m-product-top m-product-top--<?php echo $slider_type; ?>">
				<div class="m-product-top__slider m-product-top__slider--<?php echo $slider_type; ?> js-slider-<?php echo $slider_type; ?>">
				<?php
					if( have_rows('product-slider-gallery', $id) ):
								while ( have_rows('product-slider-gallery', $id) ) : the_row();
									$image = get_sub_field('product-slider-gallery-img', $id);
									if( !empty( $image ) ){
										$large = $image['sizes']['large'];
										$return = '<div class="m-product-top__slider-item">';
										$return .= '<div class="m-product-top__slider-image-wrapper"><img class="js-zoom" data-magnify-src="'.$image['url'].'" src="'.$large.'" alt="'.esc_attr($image['alt']).'"></div>';
										$return .= '</div>';
										echo $return;
									}
								endwhile;
						else :
								// no rows found
						endif;
					?>
				</div>

				<div class="m-product-short-info">
				<!-- PRODUCT EXCERPT -->
					<?php if($is_online) { ?>
					<p class="m-product-short-info__label m-product-short-info__label--online">
						<?php echo __('DOSTĘPNE TYLKO ONLINE','maja'); ?>
					</p>
					<?php } ?>
					<h1 class="m-product-short-info__title m-h1">
						<?php the_title() ?>
					</h1>
					<p class="m-product-short-info__price">
						<?php
							if( $product->is_on_sale() ) {
								$old_price = $product->get_regular_price();
								$price = $product->get_sale_price();
								echo '<span>'.$old_price . get_woocommerce_currency_symbol() .'</span>';
								echo $price . get_woocommerce_currency_symbol();
							} else {
								$price = $product->get_price();
								echo $price . get_woocommerce_currency_symbol();
							}
						?>
					</p>
					<div class="m-product-short-info__add-to-cart-wrapper">
					<?php
						if ( ! is_object( $product)) $product = wc_get_product( get_the_ID() );
               woocommerce_template_loop_add_to_cart_owl( $loop->post, $product );
					?>
					</div>
					<ul class="m-product-short-info__share">
						<li class="m-product-short-info__share-item">
							<a href="">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pinterest.png" alt="<?php echo __('Udostępnij','maja') ?>">
								<p>Udostępnij</p>
							</a>
						</li>
					</ul>

					<div class="custom-paging m-product-top__slider-nav">
						<div class="arrows">
							<button class="arrows__btn arrows__btn--prev js-arrow-prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow.png" alt="Poprzedni Slajd"></button>
							<button class="arrows__btn arrows__btn--next js-arrow-next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow2.png" alt="Następny Slajd"></button>
						</div>
					</div>


				</div>
			</div>

			<div class="m-product-bottom">
				<div class="row m-product-bottom__row">
					<div class="m-product-bottom__section">
						<h2 class="m-h2 m-product-bottom__section-title"><?= $variations_title ?></h2>
						<?php
						if( have_rows('product-variations-gallery', $id) ):
							echo '<ul class="m-product-variations js-variations">';
								while ( have_rows('product-variations-gallery', $id) ) : the_row();
									$image = get_sub_field('product-variations-gallery-img', $id);
									if( !empty( $image ) ){
										$medium = $image['sizes']['medium'];
										$large = $image['sizes']['large'];
										$return = '<li class="m-product-variations__item">';
										$return .= '<a href="'.$large.'">';
										$return .= '<img src="'.$medium.'" alt="'.esc_attr($image['alt']).'">';
										$return .= '</a></li>';
										echo $return;
									}
								endwhile;
							echo '</ul>';
						else :
								// no rows found
						endif;
						?>
					</div>

					<div class="m-product-bottom__section">
						<h2 class="m-h2 m-product-bottom__section-title"><?= $desc_title ?></h2>
						<div class="m-product-bottom__content">
							<?php the_content(); ?>
						</div>
					</div>

					<?php

						// check if the repeater field has rows of data
						if( have_rows('product-addons') ):
							echo '<ul class="m-addons">';
							// loop through the rows of data
								while ( have_rows('product-addons') ) : the_row();

								$title = get_sub_field('product-addons-title', $id);
								$desc = get_sub_field('product-addons-desc', $id);
								$file = get_sub_field('product-addons-file', $id);
								$fileName = get_sub_field('product-addons-file-text', $id);
								$havePopup = get_sub_field('product-addons-popup', $id);

								if($havePopup){
									$popup = get_sub_field('product-popup');
									$popupText = $popup['product-popup-btn'];
									$popupTitle = $popup['product-popup-title'];
									$popupDesc = $popup['product-popup-desc'];
									$image = $popup['product-popup-photo'];
								}

										$return = '<li class="m-addons__item">';
										$return .= '<p class="m-addons__title">'.$title.'</p>';
										$return .= '<p class="m-addons__desc">'.$desc.'</p>';
										if($file){
											$return .= '<a href="'.$file['url'].'" class="m-addons__url">'.$fileName.'</a>';
										}
										if($havePopup){
											$return .= '<button class="m-addons__url m-addons__url--popup js-product-open-popup">'.$popupText.'</button>';

											$return .= '<div class="m-product-popup js-product-popup">
												<div class="m-product-popup__overlay"></div>
												<div class="m-product-popup__body">
															<div class="m-product-popup__content">
																<p class="m-product-popup__title">
																	'.$popupTitle.'
																</p>
																<p class="m-product-popup__desc">
																	'.$popupDesc.'
																</p>
																<button class="js-product-close-popup m-product-popup__close">'.__('Zamknij okno','maja').'</button>
															</div>';
															if( !empty( $image ) ){
																$large = $image['sizes']['large'];
																$return .= '<div class="m-product-popup__image"><img src="'.$large.'" alt="'.$image['alt'].'"></div>';
															 }

															 $return .= '</div></div>';
										}
										$return .= '</li>';
										echo $return;
								endwhile;
							echo '</ul>';
						else :
						endif;
					?>
				</div>
			</div>

		<?php endwhile; // end of the loop. ?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
