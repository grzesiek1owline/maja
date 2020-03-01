<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if accessed directly
}
/**
 * Manger for Account Details for Account Details design with constructor
 *
 * @package WooCommercePageBuilder
 * @since 4.0
 */

if( ! class_exists('DTWPB_Woo_Extra_Account_Fields') ){

	class DTWPB_Woo_Extra_Account_Fields{
		
		public function dtwpb_woo_validate_extra_register_fields( $username, $email, $validation_errors ){
			if( isset($POST['dtwpb_extra_fields_name']) ){
				$fields_data = $POST['dtwpb_extra_fields_name'];
				
				foreach ( $fields_data as $field ) {
				
					// if the field is required ignore it and continue
					if ( $field[ 'woocommerce_extra_fields_setting_id_required' ] == 'no' ) {
						continue;
					}
				
					$field_name = 'billing_' . $this->generate_name( $field[ 'woocommerce_extra_fields_setting_id_name' ] );
					if ( isset( $_POST[ $field_name ] ) && empty( $_POST[ $field_name ] ) ) {
						$validation_errors->add( "billing_" . $field_name . "_error", __( "<strong>Error</strong>: " . $field[ 'woocommerce_extra_fields_setting_id_name' ] . " is required!", $this->text_domain ) );
					}
				}
			}
		}
		
		/**
		 * Save the password/account details and redirect back to the my account page.
		 * Since WC_Form_Handler @version	2.2.0
		 * WooCommerce 3.5.3
		 */
		public static function dtwpb_woocommerce_edit_account_save(){
			
			if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
				return;
			}
	
			if ( empty( $_POST['action'] ) || 'save_account_details' !== $_POST['action'] ) {
				return;
			}
	
			wc_nocache_headers();
	
			$nonce_value = wc_get_var( $_REQUEST['save-account-details-nonce'], wc_get_var( $_REQUEST['_wpnonce'], '' ) ); // @codingStandardsIgnoreLine.
	
			if ( ! wp_verify_nonce( $nonce_value, 'save_account_details' ) ) {
				return;
			}
	
			$user_id = get_current_user_id();
	
			if ( $user_id <= 0 ) {
				return;
			}
			
			// Custom fields
			if ( ! empty( $_POST[ '_wp_http_referer' ] ) ) {
				$fields = $_POST;
				$customer_id = get_current_user_id();
				foreach ( $fields as $key => $field ) {
					if ( isset( $field ) ) {
						
							if ( $key == 'email_2' || $key == '_wpnonce' || $key == '_wp_http_referer' || $key == 'register' ) {
								continue;
							}
			
							update_user_meta( $customer_id, $key, sanitize_text_field( $field ) );
					}
				}
			}
			
			$account_first_name   = ! empty( $_POST['account_first_name'] ) ? wc_clean( $_POST['account_first_name'] ): '';
			$account_last_name    = ! empty( $_POST['account_last_name'] ) ? wc_clean( $_POST['account_last_name'] ) : '';
			$account_display_name = ! empty( $_POST['account_display_name'] ) ? wc_clean( $_POST['account_display_name'] ) : '';
			$account_email        = ! empty( $_POST['account_email'] ) ? wc_clean( $_POST['account_email'] ) : '';
			$pass_cur             = ! empty( $_POST['password_current'] ) ? $_POST['password_current'] : '';
			$pass1                = ! empty( $_POST['password_1'] ) ? $_POST['password_1'] : '';
			$pass2                = ! empty( $_POST['password_2'] ) ? $_POST['password_2'] : '';
			$save_pass            = true;
	
			// Current user data.
			$current_user       = get_user_by( 'id', $user_id );
			$current_first_name = $current_user->first_name;
			$current_last_name  = $current_user->last_name;
			$current_email      = $current_user->user_email;
	
			// New user data.
			$user                = new stdClass();
			$user->ID            = $user_id;
			$user->first_name    = $account_first_name;
			$user->last_name     = $account_last_name;
			$user->display_name  = $account_display_name;
	
			// Prevent display name to be changed to email.
			if ( is_email( $account_display_name ) ) {
				wc_add_notice( __( 'Display name cannot be changed to email address due to privacy concern.', 'woocommerce' ), 'error' );
			}
	
			// Handle required fields.
			$required_fields = apply_filters( 'woocommerce_save_account_details_required_fields', array(
				'account_first_name'    => __( 'First name', 'woocommerce' ),
				'account_last_name'     => __( 'Last name', 'woocommerce' ),
				'account_display_name'  => __( 'Display name', 'woocommerce' ),
				'account_email'         => __( 'Email address', 'woocommerce' ),
			) );
	
			foreach ( $required_fields as $field_key => $field_name ) {
				if ( empty( $_POST[ $field_key ] ) ) {
					wc_add_notice( sprintf( __( '%s is a required field.', 'woocommerce' ), '<strong>' . esc_html( $field_name ) . '</strong>' ), 'error' );
				}
			}
	
			if ( $account_email ) {
				$account_email = sanitize_email( $account_email );
				if ( ! is_email( $account_email ) ) {
					wc_add_notice( __( 'Please provide a valid email address.', 'woocommerce' ), 'error' );
				} elseif ( email_exists( $account_email ) && $account_email !== $current_user->user_email ) {
					wc_add_notice( __( 'This email address is already registered.', 'woocommerce' ), 'error' );
				}
				$user->user_email = $account_email;
			}
	
			if ( ! empty( $pass_cur ) && empty( $pass1 ) && empty( $pass2 ) ) {
				wc_add_notice( __( 'Please fill out all password fields.', 'woocommerce' ), 'error' );
				$save_pass = false;
			} elseif ( ! empty( $pass1 ) && empty( $pass_cur ) ) {
				wc_add_notice( __( 'Please enter your current password.', 'woocommerce' ), 'error' );
				$save_pass = false;
			} elseif ( ! empty( $pass1 ) && empty( $pass2 ) ) {
				wc_add_notice( __( 'Please re-enter your password.', 'woocommerce' ), 'error' );
				$save_pass = false;
			} elseif ( ( ! empty( $pass1 ) || ! empty( $pass2 ) ) && $pass1 !== $pass2 ) {
				wc_add_notice( __( 'New passwords do not match.', 'woocommerce' ), 'error' );
				$save_pass = false;
			} elseif ( ! empty( $pass1 ) && ! wp_check_password( $pass_cur, $current_user->user_pass, $current_user->ID ) ) {
				wc_add_notice( __( 'Your current password is incorrect.', 'woocommerce' ), 'error' );
				$save_pass = false;
			}
	
			if ( $pass1 && $save_pass ) {
				$user->user_pass = $pass1;
			}
	
			// Allow plugins to return their own errors.
			$errors = new WP_Error();
			do_action_ref_array( 'woocommerce_save_account_details_errors', array( &$errors, &$user ) );
	
			if ( $errors->get_error_messages() ) {
				foreach ( $errors->get_error_messages() as $error ) {
					wc_add_notice( $error, 'error' );
				}
			}
	
			if ( wc_notice_count( 'error' ) === 0 ) {
				wp_update_user( $user );
	
				// Update customer object to keep data in sync.
				$customer = new WC_Customer( $user->ID );
	
				if ( $customer ) {
					// Keep billing data in sync if data changed.
					if ( is_email( $user->user_email ) && $current_email !== $user->user_email ) {
						$customer->set_billing_email( $user->user_email );
					}
	
					if ( $current_first_name !== $user->first_name ) {
						$customer->set_billing_first_name( $user->first_name );
					}
	
					if ( $current_last_name !== $user->last_name ) {
						$customer->set_billing_last_name( $user->last_name );
					}
	
					$customer->save();
				}
	
				wc_add_notice( __( 'Account details changed successfully.', 'woocommerce' ) );
	
				do_action( 'woocommerce_save_account_details', $user->ID );
	
				wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
				exit;
			}
			
			
		}
	}
}