<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div id="freshMailPopUp__background">
<div class="freshMailPopUp__container">
<div class="freshMailPopUp__body" style="max-width:<?php echo $formContainer['width'].$formContainer['width2']; ?>;" >
	<?php if(isset($in_popup) AND $in_popup == true){ ?>
		<div id="freshMailPopUp__close"></div>
	<?php } ?>
	<div style="<?php echo 'background-color: '.$formContainer['background_color'].';border:'.$formContainer['border_width'].'px solid '.$formContainer['border_color'].';border-radius:'.$formContainer['rounded_corners'].'px; padding: '.$formContainer['padding1'].'px  '.$formContainer['padding2'].'px;'; ?>overflow:hidden;" id="fm_form_<?php echo $fmFormId['id']; ?>">
		<div class="form_container">
			<form method="post" class="form_subscribe freshmail_form_<?php echo $fmFormId['id']; ?>">
				<?php if ($textHeader['display'] == 'yes'): ?>
					<p style="margin: 1em 0 0;<?php echo 'color: '.$textHeader['text_color'].'; font-size:'.$textHeader['text_size'].'pt; text-align:'.$textHeader['text_alignment'].';'; ?>" class="text_header">
						<?php echo $freshmailForm['messages']['form_header']; ?>
					</p>
				<?php endif;

				if ($subHeader['display'] == 'yes'): ?>
					<div class="sub_header"><?php echo $freshmailForm['messages']['form_sub_header']; ?></div>
					<style>
						.sub_header *, .sub_header {
						<?php echo 'color:'.$subHeader['text_color'].';
						 font-size:'.$subHeader['text_size'].'pt;
						 text-align:'.$subHeader['text_alignment'].';'; ?>
						}
					</style>
				<?php endif;

				if (isset($freshmailForm['fields']) && is_array($freshmailForm['fields'])):
					echo '<div style="float:left;width:100%;">';
					foreach ($freshmailForm['fields'] as $key => $val):


						if (is_array($val)):
							if ((isset($val['include']) && $val['include'] == 'on') || $key=='email'):
							 if (isset($label['display_labels']) && $label['display_labels'] == 'yes'): ?>
							<div style="<?php echo 'margin: '.$field['vertical_margin'].$field['vertical_margin_type'].' '.$field['horizontal_margin'].$field['horizontal_margin_type'].';'; ?>">
								<label style="word-wrap: normal;font-weight:normal;<?php echo $label['position'].';width:'.$label['width'].$label['select_width'].';color:'.$label['text_color'].';font-size:'.$label['text_size'].'pt; '.$label['select_text_style']; ?>" class="label">
									<?php echo $val['value'];
									echo ((isset($val['required']) && $val['required'] == 'on') || $key=='email'  ? '<span style="color:red;">*</span>' : null); ?>
								</label>
							</div>
							<?php endif; ?>
								<div style="<?php echo 'margin: '.$field['vertical_margin'].$field['vertical_margin_type'].' '.$field['horizontal_margin'].$field['horizontal_margin_type'].';'; ?>">
									<input type="text" class="field" placeholder="<?php echo (isset($label['display_placeholders']) && $label['display_placeholders'] == 'yes') ? (isset($val['placeholder']) ? $val['placeholder'] : $val['value']) : null; ?>" value="" name="form[<?php echo $key; ?>]" style="padding:1px 5px;<?php echo 'max-width:100%;width:'.$field['width'].$field['select_field_width'].'; height:'.$field['height'].$field['select_field_height'].';color:'.$field['text_color'].';font-size:'.$field['text_size'].'pt; border:'.$field['border_width'].'px solid '.$field['border_color'].';';?>" />
								</div><div style="clear: both;"></div>
							<?php	endif;
						endif;
					endforeach;
					echo '</div>';
				endif;

				if ($checkboxAgreement['display'] == 'yes'): ?>
					<p style="margin-bottom:0px;margin-top:8px;<?php echo 'color:'.$checkboxAgreement['text_color'].';font-size:'.$checkboxAgreement['text_size'].'pt;text-align:'.$checkboxAgreement['text_aligment'].';'; ?>">
						<input type="checkbox" value="on" name="fm_form_agree" id="fm_form_agree" class="checkbox_agreement" <?php echo($checkboxAgreement['checked'] == 'yes') ? 'checked="checked"' : null; ?> />
						<span><?php echo $freshmailForm['messages']['form_agreement_label']; ?></span>
					</p>
				<?php endif;

				if ($checkboxAgreement2['display'] == 'yes'): ?>
					<p style="margin-bottom:0px;margin-top:4px;<?php echo 'color:'.$checkboxAgreement2['text_color'].';font-size:'.$checkboxAgreement2['text_size'].'pt;text-align:'.$checkboxAgreement2['text_aligment'].';'; ?>">
						<input type="checkbox" value="on" name="fm_form_agree" id="fm_form_agree" class="checkbox_agreement2" <?php echo($checkboxAgreement2['checked'] == 'yes') ? 'checked="checked"' : null; ?> />
						<span><?php echo $freshmailForm['messages']['form_agreement2_label']; ?></span>
					</p>
				<?php endif; ?>

				<p style="margin:0 0 1em;<?php echo 'text-align:'.$button['select_aligment'].';'; ?>">
					<button type="submit" name="form_subscribe_button" class="form_subscribe_button button" style="font-weight: normal;padding:0;<?php echo 'box-shadow:none;border-radius:'.$button['rounded_corners'].'px;width:'.$button['width'].$button['select_width'].'; height:'.$button['height'].$button['select_height'].';font-size:'.$button['text_size'].'pt; color:'.$button['text_color'].';background:'.$button['background_color'].';border:'.$button['border_width'].'px solid '.$button['border_color'].';'; ?>">
						<?php echo $freshmailForm['messages']['form_subscribe_button']; ?>
					</button>
				</p>

				<?php if (!empty($fmFormId['redirect'])): ?>
					<input type="hidden" value="<?php echo $fmFormId['redirect']; ?>" name="redirect" />
				<?php endif; ?>

				<input type="hidden" value="<?php echo $fmFormId['id']; ?>" name="fm_form_id" />
				<input type="hidden" value="fm_form" name="action" />
				<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="fm_form_referer" />
			</form>
		</div>
	</div>
</div>
</div>
</div>

<style>
	.freshmail_dialog .ui-dialog-titlebar-close {
		background: url(<?php echo WP_FRESHMAIL_URL.'/assets/images/close.png);'; ?>)
	}
	.message_error {
		<?php echo 'color:'.$errorSuccess['error_text_color'].';';?>
	}
	.message_success {
		<?php echo 'color:'.$errorSuccess['success_text_color'].';';?>
	}
	.form_subscribe_button:hover {
		<?php echo 'background:'.$buttonHovered['background_color'].' !important; color:'.$buttonHovered['text_color'].' !important; border-color:'.$buttonHovered['border_color'].' !important;'; ?>
	}

	.freshmail_popup{
		display: none;
	    position: relative;
	}
	.freshmail_popup.active {
		display: block;
	}
	body:not(.wp-admin) .freshmail_popup #freshMailPopUp__background {
	    position: fixed;
	    width: 100vw;
	    height: 100vh;
	    top: 0;
	    left: 0;
	    background: rgba(0, 0, 0, 0.5);
        opacity: 1;
    	transition: ease 0.3s;
	    z-index: 999999;
	}
	body:not(.wp-admin) .freshmail_popup .freshMailPopUp__container {
	    display: grid;
	    width: 100vw;
	    height: 100vh;
	    align-items: center;
	    justify-content: center;

	}
	.freshmail_popup .freshMailPopUp__body{
		position: relative;
	}
	#freshMailPopUp__close {
			cursor: pointer;
	    position: absolute;
	    right: 10px;
	    top: 10px;
	    width: 32px;
	    height: 31px;
	    background: url(<?php echo WP_FRESHMAIL_URL.'/assets/images/close.png'; ?>);
	}

</style>
