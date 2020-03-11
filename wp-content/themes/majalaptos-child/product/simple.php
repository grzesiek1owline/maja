<?php while ( have_posts() ) : the_post(); ?>

<?php
		global $product;
		$id = $product->get_id();
		$is_online = get_field('product-is-online', $id);
		$desc_title = get_field('product-desc-title', $id);
		$variations_title = get_field('product-variations-title', $id);
		$site_url = get_site_url();
		$share_image = get_field('product-share-image', $id)
?>

<div class="m-product-top js-prod-top">
  <div class="m-h-only-mobile product-info">
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
					$price = number_format($price, 2, '.', '');
					$old_price = number_format($old_price, 2, '.', '');
					echo '<span>'.$old_price . get_woocommerce_currency_symbol() .'</span>';
					echo $price . ' ' . get_woocommerce_currency_symbol();
				} else {
					$price = $product->get_price();
					$price = number_format($price, 2, '.', '');

					echo $price . ' ' . get_woocommerce_currency_symbol();
				}
			?>
		</p>
  </div>

	<div class="m-product-top__slider js-prod-slider">
	<?php
		if( have_rows('product-slider-gallery', $id) ):
					while ( have_rows('product-slider-gallery', $id) ) : the_row();
						$image = get_sub_field('product-slider-gallery-img', $id);
						$slider_type = get_sub_field('product-slider-type-slide', $id);
						$large = $image['sizes']['large'];

						$size1 = get_sub_field('product-slider-gallery-img-type-1');
						$size2 = get_sub_field('product-slider-gallery-img-type-2');
						$sizeClass1 = 'product-size';
						$sizeClass2 = 'product-size';

						if($size1) {
							$sizeClass1 = 'bg-size';
						}
						if($size2) {
							$sizeClass2 = 'bg-size';
						}

						if($slider_type == 'bg') {

							$return = '<div data-type="'.$slider_type.'" div class="m-product-top__slider-item '.$slider_type.'">';
							$return .= '<div class="'.$sizeClass1.' m-product-top__slider-image-wrapper '.$slider_type.'"><img data-magnify-src="'.$image['url'].'" data-lazy="'.$large.'" alt="'.esc_attr($image['alt']).'"></div>';
							$return .= '</div>';
							echo $return;
						} else {
							$image2 = get_sub_field('product-slider-gallery-img-2', $id);
							$large2 = $image2['sizes']['large'];
							$return = '<div data-type="'.$slider_type.'" div class="m-product-top__slider-item '.$slider_type.'">';
							$return .= '<div class="'.$sizeClass1.' m-product-top__slider-image-wrapper '.$slider_type.'"><img class="js-zoom" data-magnify-src="'.$image['url'].'" data-lazy="'.$large.'" alt="'.esc_attr($image['alt']).'"></div>';
							$return .= '<div class="'.$sizeClass2.' m-product-top__slider-image-wrapper '.$slider_type.'"><img class="js-zoom" data-magnify-src="'.$image2['url'].'" data-lazy="'.$large2.'" alt="'.esc_attr($image2['alt']).'"></div>';
							$return .= '</div>';
							echo $return;
						}
					endwhile;
			else :
					// no rows found
			endif;
		?>
	</div>

	<div class="m-product-short-info js-short-info">
	<!-- PRODUCT EXCERPT -->
    <div class="m-h-only-desktop">
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
					$price = number_format($price, 2, '.', '');
					$old_price = number_format($old_price, 2, '.', '');
					echo '<span>'.$old_price . get_woocommerce_currency_symbol() .'</span>';
					echo $price . ' ' . get_woocommerce_currency_symbol();
				} else {
					$price = $product->get_price();
					$price = number_format($price, 2, '.', '');

					echo $price . ' ' . get_woocommerce_currency_symbol();
				}
			?>
		</p>
    </div>
		<div class="m-product-short-info__add-to-cart-wrapper">
		<?php
			if ( ! is_object( $product)) $product = wc_get_product( get_the_ID() );
				 woocommerce_template_loop_add_to_cart_owl($product);
		?>
		</div>
		<ul class="m-product-short-info__share">
			<li class="m-product-short-info__share-item">
				<a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?= $share_image['url'] ?>&media=image&description=<?= get_the_title(); ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pinterest.png" alt="<?php echo __('Udostępnij','maja') ?>">
					<p>Udostępnij</p>
				</a>
			</li>
		</ul>

		<div class="custom-paging m-product-top__slider-nav">
			<div class="arrows">
				<button class="arrows__btn arrows__btn--prev js-arrow-prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow.png" alt="<?= __('Poprzedni Slajd','maja'); ?>"></button>
				<button class="arrows__btn arrows__btn--next js-arrow-next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow2.png" alt="<?= __('Następny Slajd','maja'); ?>"></button>
			</div>
		</div>


	</div>
</div>

<div class="m-product-bottom">
	<div class="row m-product-bottom__row">
		<?php
			$hasVariants = get_field('has-product-variations', $id);
			if($hasVariants){
		?>

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
							$return .= '<a class="js-var" href="'.$large.'">';
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
			<div class="m-h-only-mobile">
				<div class="js-var-custom-paging m-product-top__slider-nav">
					<div class="arrows">
						<button class="arrows__btn arrows__btn--prev js-arrow-prev-var"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow.png" alt="<?= __('Poprzedni Slajd','maja'); ?>"></button>
						<button class="arrows__btn arrows__btn--next js-arrow-next-var"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow2.png" alt="<?= __('Następny Slajd','maja'); ?>"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="vartiations-popup js-var-popup">
			<div class="vartiations-popup__overlay"></div>
			<div class="vartiations-popup__body">
				<div class="vartiations-popup__content">
					<img class="js-var-popup-img" src="" alt="">
					<button class="js-variations-close-popup m-product-popup__close"><?php echo __('Zamknij okno','maja'); ?></button>
				</div>
			</div>
		</div>
		<?php } ?>

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