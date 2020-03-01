<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class DTWPB_VC_CLASS{
	
	public function __construct(){
		
		$this->init();
		$vc_params_js = DT_WOO_PAGE_BUILDER_URL . '/assets/js/params.js';
		vc_add_shortcode_param( 'dtwpb_options', array(&$this, 'dtwpb_options_param' ), $vc_params_js );
		
		add_action('vc_backend_editor_render', array(&$this,'enqueue_scripts'), 100 );
	}
	
	public function init(){
		require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/js_composer/vc-map/single-product/single-product-image.php';
		
		require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/js_composer/vc-map/single-product-shortcodes.php';
		
		require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/js_composer/vc-map/vc-map.php';
		require_once DT_WOO_PAGE_BUILDER_DIR . '/includes/js_composer/vc-map/account-details-shortcodes.php';
	}
	
	public function dtwpb_options_param( $settings, $value ){
		
		$value_64 = base64_decode( $value );
		$value_arr = json_decode( $value_64 );
		if ( empty( $value_arr ) && ! is_array( $value_arr ) ) {
			for ( $i = 0; $i < 2; $i++ ) {
				$option = new stdClass();
				$option->content = '<input type="text" placeholder="Label" name="label" value=""><input type="text" placeholder="Value" name="value" value="">';
				$value_arr[] = $option;
			}
		}
		$param_line = '';
		$param_line .= '<div class="dtwpb_options-list clearfix">';
		$param_line .= '<table>';
		$param_line .= '<thead>';
		$param_line .= '<tr>';
		$param_line .= '<td>';
		$param_line .= __( 'Apply for field type: dropdown, check, radio', 'dt_woocommerce_page_builder' );
		$param_line .= '</td>';
		$param_line .= '<td>';
		$param_line .= '</td>';
		$param_line .= '</tr>';
		$param_line .= '</thead>';
		$param_line .= '<tbody>';
		if ( is_array( $value_arr ) && ! empty( $value_arr ) ) {
			foreach ( $value_arr as $k => $v ) {
				$param_line .= '<tr>';
				$param_line .= '<td>';
				$param_line .= '<div id="content">';
				$param_line .= '<input type="text" placeholder="Label" name="label" value="' .  esc_attr($v->label)  . '">';
				$param_line .= '<input type="text" placeholder="Value" name="value" value="' .  esc_attr($v->value)  . '">';
				$param_line .= '</div>';
				$param_line .= '</td>';
				$param_line .= '<td align="left" style="padding:5px;">';
				$param_line .= '<a href="#" class="button" onclick="return dtwpb_options_remove(this);"  title="' . esc_attr__( 'Remove', 'dt_woocommerce_page_builder' ) . '">' . esc_html__( 'Remove', 'dt_woocommerce_page_builder' ) . '</a>';
				$param_line .= '</td>';
				$param_line .= '</tr>';
			}
		}
		$param_line .= '</tbody>';
		$param_line .= '<tfoot>';
		$param_line .= '<tr>';
		$param_line .= '<td colspan="3">';
		$param_line .= '<a href="#" onclick="return dtwpb_options_add(this);" class="button" title="' .__( 'Add', 'dt_woocommerce_page_builder' ) . '">' . __( 'Add', 'dt_woocommerce_page_builder' ) . '</a>';
		$param_line .= '</td>';
		$param_line .= '</tfoot>';
		$param_line .= '</table>';
		$param_line .= '<input type="hidden" name="' . $settings['param_name'] . '" class="wpb_vc_param_value' .$settings['param_name'] . ' ' . $settings['type'] . '" value="' . $value . '">';
		$param_line .= '</div>';
		return $param_line;
	}
	
	public function enqueue_scripts() {
		
		wp_register_script( 'dtwpb-vc-custom', DT_WOO_PAGE_BUILDER_URL . 'assets/js/vc-custom.js', array( 'jquery', 'jquery-ui-datepicker' ), '1.0.0', true );
			
		$dtwpb_options_tmpl = '
			<tr>
				<td>
					<div id="content"><input type="text" placeholder="Label" name="label" value=""><input type="text" placeholder="Value" name="value" value=""></div>
				</td>
				<td align="left" style="padding:5px;">
					<a href="#" class="button" onclick="return dtwpb_options_remove(this);"  title="' .esc_attr__( 'Remove', 'dt_woocommerce_page_builder' ) . '">'.esc_html__( 'Remove', 'dt_woocommerce_page_builder' ).'</a>
				</td>
			</tr>';
	
		$dtwpb_L10n = array(
			'dtwpb_options_tmpl' => $dtwpb_options_tmpl,
		);
		wp_localize_script( 'dtwpb-vc-custom', 'dtwpb_L10n', $dtwpb_L10n );
		wp_enqueue_script( 'dtwpb-vc-custom' );
	}
//
}

new DTWPB_VC_CLASS();
