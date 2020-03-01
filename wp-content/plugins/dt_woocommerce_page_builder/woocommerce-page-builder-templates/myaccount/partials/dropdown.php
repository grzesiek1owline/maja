<?php
$dropdown_field = get_user_meta( get_current_user_id(), $field_name, TRUE );
?>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	<label for="reg_<?php echo $field_name ?>">
		<?php echo $label ?>
		<?php if ( $required == 'yes' ) : ?>
			<span class="required">*</span>
		<?php endif; ?>
	</label>
	<select name="<?php echo $field_name ?>"
	        id="">
		<option value=""><?php esc_html_e( 'Choose value', 'dt_woocommerce_page_builder' ) ?></option>
		<?php foreach ( $options as $l => $v ): ?>
			<?php if ( is_array( $options ) && !empty($l) && !empty($v) ): ?>
				<option
					value="<?php echo $v ?>"
					<?php
					if ( isset( $dropdown_field ) )
						selected( $v, $dropdown_field )
					?>
					><?php echo $l ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</p>