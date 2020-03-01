<?php
$radio_field = get_user_meta( get_current_user_id(), $field_name, TRUE );
?>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_<?php echo $field_name ?>">
        <?php echo $label; ?>
        <?php if( $required == 'yes' ) : ?>
            <span class="required">*</span>
        <?php endif; ?>
    </label>
    <?php foreach( $options as $l => $v ): ?>
        <?php if( is_array( $options ) && !empty($l) && !empty($v) ): ?>

            <input type="radio"
                   name="<?php echo $field_name ?>"
                   value="<?php echo $v ?>"
	               <?php
	               if( isset($radio_field) )
	                    checked( $v , $radio_field)
	               ?>
	            > <?php echo $l ?>
            <br/>

        <?php endif; ?>
    <?php endforeach; ?>

</p>