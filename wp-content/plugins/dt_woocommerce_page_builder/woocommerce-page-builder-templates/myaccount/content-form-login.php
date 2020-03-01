<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce-page-builder-templates/myaccount/content-form-login.php.
 *
 * @version 3.3.7.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="u-column1 col-1">

	<h2><?php esc_html_e( 'Login', 'dt_woocommerce_page_builder' ); ?></h2>

	<form class="woocommerce-form woocommerce-form-login login" method="post">

		<?php do_action( 'woocommerce_login_form_start' ); ?>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="username"><?php esc_html_e( 'Username or email address', 'dt_woocommerce_page_builder' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="password"><?php esc_html_e( 'Password', 'dt_woocommerce_page_builder' ); ?>&nbsp;<span class="required">*</span></label>
			<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
		</p>

		<?php do_action( 'woocommerce_login_form' ); ?>

		<p class="form-row">
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'dt_woocommerce_page_builder' ); ?>"><?php esc_html_e( 'Log in', 'dt_woocommerce_page_builder' ); ?></button>
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'dt_woocommerce_page_builder' ); ?></span>
			</label>
		</p>
		<p class="woocommerce-LostPassword lost_password">
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'dt_woocommerce_page_builder' ); ?></a>
		</p>

		<?php do_action( 'woocommerce_login_form_end' ); ?>

	</form>
</div>
