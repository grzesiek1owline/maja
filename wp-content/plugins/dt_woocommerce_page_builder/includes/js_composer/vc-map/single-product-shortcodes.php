<?php
$text_align_options = array(
	esc_html__( 'Left', 'dt_woocommerce_page_builder' ) => 'left',
	esc_html__( 'Right', 'dt_woocommerce_page_builder' ) => 'right',
	esc_html__( 'Center', 'dt_woocommerce_page_builder' ) => 'center',
	esc_html__( 'Justify', 'dt_woocommerce_page_builder' ) => 'justify',
);

// Single product page builder
// vc_map(
// array(
// "name" => esc_html__( "Single Product Image", 'dt_woocommerce_page_builder' ),
// "base" => "dtwpb_single_product_image",
// "category" => esc_html__( "Woo Single product", 'dt_woocommerce_page_builder' ),
// "icon" => "dt-vc-icon-dt_woo",
// "params" => array(
// array(
// "type" => "textfield",
// "heading" => esc_html__( "Extra class name", 'dt_woocommerce_page_builder' ),
// "param_name" => "el_class",
// 'value' => '',
// "description" => esc_html__(
// "If you wish to style particular content element differently, then use this field to add a class name and then refer
// to it in your css file.",
// 'dt_woocommerce_page_builder' ) ),
// array(
// 'type' => 'css_editor',
// 'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ),
// 'param_name' => 'css',
// 'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
vc_map( 
	array( 
		"name" => esc_html__( "Single Product Title", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_title", 
		"category" => esc_html__( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "HTML Tag", 'dt_woocommerce_page_builder' ),
				"param_name" => "tag",
				'std' => 'h1',
				'value' => array(
					'h1' => 'h1',
					'h2' => 'h2',
					'h3' => 'h3',
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
					'p' => 'p',
					'div' => 'div',
				),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Text align", 'dt_woocommerce_page_builder' ),
				"param_name" => "text_align",
				'value' => $text_align_options,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font size', 'dt_woocommerce_page_builder'),
				'param_name' => 'font_size',
				'description' => esc_html__('Enter font size.', 'dt_woocommerce_page_builder'),
			
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Line height', 'dt_woocommerce_page_builder'),
				'param_name' => 'line_height',
				'description' => esc_html__('Enter line height.', 'dt_woocommerce_page_builder'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Color', 'dt_woocommerce_page_builder'),
				'param_name' => 'color',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Use theme default font family?', 'dt_woocommerce_page_builder'),
				'param_name' => 'use_fonts',
				'value' => array(esc_html__('No', 'dt_woocommerce_page_builder') => 'no'),
				'description' => esc_html__('Use font family from the theme.', 'dt_woocommerce_page_builder'),
			
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dt_woocommerce_page_builder'),
						'font_style_description' => esc_html__('Select font styling.', 'dt_woocommerce_page_builder'),
					),
				),
				'dependency' => array(
					'element' => 'use_fonts',
					'value' => 'no',
				),
			),
			vc_map_add_css_animation(),
			array(
				"type" => "textfield", 
				"heading" => esc_html__( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => esc_html__( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Rating", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_rating", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array(
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Price", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_price", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Text align", 'dt_woocommerce_page_builder' ),
				"param_name" => "text_align",
				'value' => $text_align_options,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font size', 'dt_woocommerce_page_builder'),
				'param_name' => 'font_size',
				'description' => esc_html__('Enter font size.', 'dt_woocommerce_page_builder'),
					
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Line height', 'dt_woocommerce_page_builder'),
				'param_name' => 'line_height',
				'description' => esc_html__('Enter line height.', 'dt_woocommerce_page_builder'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Color', 'dt_woocommerce_page_builder'),
				'param_name' => 'color',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Use theme default font family?', 'dt_woocommerce_page_builder'),
				'param_name' => 'use_fonts',
				'value' => array(esc_html__('No', 'dt_woocommerce_page_builder') => 'no'),
				'description' => esc_html__('Use font family from the theme.', 'dt_woocommerce_page_builder'),
					
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dt_woocommerce_page_builder'),
						'font_style_description' => esc_html__('Select font styling.', 'dt_woocommerce_page_builder'),
					),
				),
				'dependency' => array(
					'element' => 'use_fonts',
					'value' => 'no',
				),
			),
			vc_map_add_css_animation(),
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Excerpt", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_excerpt", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Text align", 'dt_woocommerce_page_builder' ),
				"param_name" => "text_align",
				'value' => $text_align_options,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font size', 'dt_woocommerce_page_builder'),
				'param_name' => 'font_size',
				'description' => esc_html__('Enter font size.', 'dt_woocommerce_page_builder'),
					
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Line height', 'dt_woocommerce_page_builder'),
				'param_name' => 'line_height',
				'description' => esc_html__('Enter line height.', 'dt_woocommerce_page_builder'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Color', 'dt_woocommerce_page_builder'),
				'param_name' => 'color',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Use theme default font family?', 'dt_woocommerce_page_builder'),
				'param_name' => 'use_fonts',
				'value' => array(esc_html__('No', 'dt_woocommerce_page_builder') => 'no'),
				'description' => esc_html__('Use font family from the theme.', 'dt_woocommerce_page_builder'),
					
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dt_woocommerce_page_builder'),
						'font_style_description' => esc_html__('Select font styling.', 'dt_woocommerce_page_builder'),
					),
				),
				'dependency' => array(
					'element' => 'use_fonts',
					'value' => 'no',
				),
			),
			vc_map_add_css_animation(),
			array(
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Add To Cart", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_add_to_cart", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

/*
 * Support WooCommerce Memberships
 * Sell memberships that provide access to restricted content, products, discounts, and more!
 * By: WooCommerce
 * Author: SkyVerge
 * Author URI: https://www.woocommerce.com/
 */
if ( class_exists( 'WC_Memberships_Loader' ) ) {
	
	vc_map(
		array( 
			"name" => __( "WC Memberships: Product Purchasing Discount", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_single_product_display_product_purchasing_discount_message", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"description" => __( 
				"Displays member discount message for a product or product variation.", 
				'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
	vc_map(
		array( 
			"name" => __( "WC Memberships: Product Purchasing Restricted", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_single_product_display_product_purchasing_restricted_message", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"description" => __( 
				"Displays product purchasing restricted message.", 
				'dt_woocommerce_page_builder' ),
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

vc_map( 
	array( 
		"name" => __( "Single Product Continue Shopping", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_continue_shopping_button", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Continue Shopping button text", 'dt_woocommerce_page_builder' ), 
				"param_name" => "continue_shopping_text", 
				'value' => '', 
				'std' => __( "Continue Shopping", 'dt_woocommerce_page_builder' ), 
				"description" => __( "Add Continue Shopping Button", 'dt_woocommerce_page_builder' ) ), 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Meta", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_meta", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array(
		"name" => __( "Single Product Share", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_share", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array(
			array(
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Tabs", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_tabs", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Additional Information", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_additional_information", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Description", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_description", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Text align", 'dt_woocommerce_page_builder' ),
				"param_name" => "text_align",
				'value' => $text_align_options,
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Font size', 'dt_woocommerce_page_builder'),
				'param_name' => 'font_size',
				'description' => esc_html__('Enter font size.', 'dt_woocommerce_page_builder'),
					
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Line height', 'dt_woocommerce_page_builder'),
				'param_name' => 'line_height',
				'description' => esc_html__('Enter line height.', 'dt_woocommerce_page_builder'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Color', 'dt_woocommerce_page_builder'),
				'param_name' => 'color',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Use theme default font family?', 'dt_woocommerce_page_builder'),
				'param_name' => 'use_fonts',
				'value' => array(esc_html__('No', 'dt_woocommerce_page_builder') => 'no'),
				'description' => esc_html__('Use font family from the theme.', 'dt_woocommerce_page_builder'),
					
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'google_fonts',
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dt_woocommerce_page_builder'),
						'font_style_description' => esc_html__('Select font styling.', 'dt_woocommerce_page_builder'),
					),
				),
				'dependency' => array(
					'element' => 'use_fonts',
					'value' => 'no',
				),
			),
			vc_map_add_css_animation(),
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Reviews", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_reviews", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product Related Products", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_related_products", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Product Per Page", 'dt_woocommerce_page_builder' ), 
				"param_name" => "posts_per_page", 
				"value" => 4 ), 
			array( 
				"type" => "textfield", 
				"heading" => __( "Columns", 'dt_woocommerce_page_builder' ), 
				"param_name" => "columns", 
				"value" => 4 ), 
			array( 
				"type" => "dropdown", 
				"heading" => __( "Products Ordering", 'dt_woocommerce_page_builder' ), 
				"param_name" => "orderby", 
				'class' => '', 
				"value" => array( 
					__( 'Random', 'dt_woocommerce_page_builder' ) => 'rand', 
					__( 'Publish Date', 'dt_woocommerce_page_builder' ) => 'date', 
					__( 'Modified Date', 'dt_woocommerce_page_builder' ) => 'modified', 
					__( 'Alphabetic', 'dt_woocommerce_page_builder' ) => 'title', 
					__( 'Popularity', 'dt_woocommerce_page_builder' ) => 'popularity', 
					__( 'Rate', 'dt_woocommerce_page_builder' ) => 'rating', 
					__( 'Price', 'dt_woocommerce_page_builder' ) => 'price' ) ), 
			array( 
				"type" => "dropdown", 
				"heading" => __( "Products order", 'dt_woocommerce_page_builder' ), 
				"param_name" => "order", 
				'class' => '', 
				"value" => array( 
					__( 'DESC', 'dt_woocommerce_page_builder' ) => 'desc', 
					__( 'ASC', 'dt_woocommerce_page_builder' ) => 'asc' ) ), 
			array( 
				"type" => "textfield",
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

vc_map( 
	array( 
		"name" => __( "Single Product up-sells", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_upsells", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Product Per Page", 'dt_woocommerce_page_builder' ), 
				"param_name" => "posts_per_page", 
				"value" => - 1 ), 
			array( 
				"type" => "textfield", 
				"heading" => __( "Columns", 'dt_woocommerce_page_builder' ), 
				"param_name" => "columns", 
				"value" => 4 ), 
			array( 
				"type" => "dropdown", 
				"heading" => __( "Products Ordering", 'dt_woocommerce_page_builder' ), 
				"param_name" => "orderby", 
				'class' => '', 
				"value" => array( 
					__( 'Random', 'dt_woocommerce_page_builder' ) => 'rand', 
					__( 'Publish Date', 'dt_woocommerce_page_builder' ) => 'date', 
					__( 'Modified Date', 'dt_woocommerce_page_builder' ) => 'modified', 
					__( 'Alphabetic', 'dt_woocommerce_page_builder' ) => 'title', 
					__( 'Popularity', 'dt_woocommerce_page_builder' ) => 'popularity', 
					__( 'Rate', 'dt_woocommerce_page_builder' ) => 'rating', 
					__( 'Price', 'dt_woocommerce_page_builder' ) => 'price' ) ), 
			array( 
				"type" => "dropdown", 
				"heading" => __( "Products order", 'dt_woocommerce_page_builder' ), 
				"param_name" => "order", 
				'class' => '', 
				"value" => array(
					__( 'DESC', 'dt_woocommerce_page_builder' ) => 'desc', 
					__( 'ASC', 'dt_woocommerce_page_builder' ) => 'asc' ) ), 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );

/*
 * Support YITH WooCommerce Wishlist plugin
 */
if ( defined( 'YITH_WCWL' ) ) {
	vc_map( 
		array( 
			"name" => __( "YITH WooCommerce Wishlist Single Add To Wishlist", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_yith_wcwl_add_to_wishlist", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

/*
 * Support YITH WooCommerce Compare plugin
 */
if ( defined( 'YITH_WOOCOMPARE' ) ) {
	if ( get_option( 'yith_woocompare_compare_button_in_product_page' ) == 'yes' )
		vc_map( 
			array( 
				"name" => __( "YITH WooCommerce Compare Single Add Compare Link", 'dt_woocommerce_page_builder' ), 
				"base" => "dtwpb_yith_woocompare_compare_button_in_product_page", 
				"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
				"icon" => "dt-vc-icon-dt_woo", 
				"params" => array( 
					array( 
						"type" => "textfield", 
						"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
						"param_name" => "el_class", 
						'value' => '', 
						"description" => __( 
							"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
							'dt_woocommerce_page_builder' ) ), 
					array( 
						'type' => 'css_editor', 
						'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
						'param_name' => 'css', 
						'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

/*
 * Support WooCommerce_Germanized plugin
 */
if ( class_exists( 'WooCommerce_Germanized' ) ) {
	if ( get_option( 'woocommerce_gzd_display_product_detail_unit_price' ) == 'yes' )
		vc_map( 
			array( 
				"name" => __( "WooCommerce Germanized Single Price Unit", 'dt_woocommerce_page_builder' ), 
				"base" => "dtwpb_gzd_template_single_price_unit", 
				"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
				"icon" => "dt-vc-icon-dt_woo", 
				"params" => array( 
					array( 
						"type" => "textfield", 
						"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
						"param_name" => "el_class", 
						'value' => '', 
						"description" => __( 
							"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
							'dt_woocommerce_page_builder' ) ), 
					array( 
						'type' => 'css_editor', 
						'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
						'param_name' => 'css', 
						'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
	
	if ( get_option( 'woocommerce_gzd_display_product_detail_tax_info' ) == 'yes' ||
		 get_option( 'woocommerce_gzd_display_product_detail_shipping_costs' ) == 'yes' )
		vc_map( 
			array( 
				"name" => __( "WooCommerce Germanized Single Legal Info", 'dt_woocommerce_page_builder' ), 
				"base" => "dtwpb_gzd_template_single_legal_info", 
				"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
				"icon" => "dt-vc-icon-dt_woo", 
				"params" => array( 
					array( 
						"type" => "textfield", 
						"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
						"param_name" => "el_class", 
						'value' => '', 
						"description" => __( 
							"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
							'dt_woocommerce_page_builder' ) ), 
					array( 
						'type' => 'css_editor', 
						'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
						'param_name' => 'css', 
						'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
	
	if ( get_option( 'woocommerce_gzd_display_product_detail_delivery_time' ) == 'yes' )
		vc_map( 
			array( 
				"name" => __( "WooCommerce Germanized Single Delivery Time Info", 'dt_woocommerce_page_builder' ), 
				"base" => "dtwpb_gzd_template_single_delivery_time_info", 
				"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
				"icon" => "dt-vc-icon-dt_woo", 
				"params" => array( 
					array( 
						"type" => "textfield", 
						"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
						"param_name" => "el_class", 
						'value' => '', 
						"description" => __( 
							"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
							'dt_woocommerce_page_builder' ) ), 
					array( 
						'type' => 'css_editor', 
						'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
						'param_name' => 'css', 
						'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

/*
 * Support WooCommerce Simple Auction plugin
 */
if ( class_exists( 'WooCommerce_simple_auction' ) ) {
	
	vc_map( 
		array( 
			"name" => __( "WooCommerce Simple Auction Bid", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_woocommerce_auction_bid", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
	
	vc_map( 
		array( 
			"name" => __( "WooCommerce Simple Auction Pay", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_woocommerce_auction_pay", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"description" => __( 
				"Display when the user logged in and have won the auction", 
				'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

/*
 * Support WooCommerce Frontend Manager - WC Lovers
 */
if ( class_exists( 'WCFM' ) ) {
	vc_map( 
		array( 
			"name" => __( "Single Product WooCommerce Frontend Manager Enquiry Button", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_single_product_wcfm_enquiry_button", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"description" => '', 
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

/*
 * Support WooCommerce Multivendor Marketplace - WC Lovers
 */
if ( class_exists( 'WCFMmp' ) ) {
	vc_map( 
		array( 
			"name" => __( 
				"Single Product WooCommerce Multivendor Marketplace Show Sold by", 
				'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_single_product_wcfmmp_sold_by_single_product", 
			"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
			"description" => '', 
			"icon" => "dt-vc-icon-dt_woo", 
			"params" => array( 
				array( 
					"type" => "textfield", 
					"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
					"param_name" => "el_class", 
					'value' => '', 
					"description" => __( 
						"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
						'dt_woocommerce_page_builder' ) ), 
				array( 
					'type' => 'css_editor', 
					'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
					'param_name' => 'css', 
					'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
}

/*
 * Product custom key
 */
vc_map( 
	array( 
		"name" => __( "WooCommerce Product custom key", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_custom_key", 
		"category" => __( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"description" => __( "Display Product Custom Field", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Label", 'dt_woocommerce_page_builder' ), 
				"param_name" => "product_custom_key_label", 
				'value' => '', 
				"description" => __( "Enter label to display before key value.", 'dt_woocommerce_page_builder' ) ), 
			array( 
				"type" => "textfield", 
				"heading" => __( "Product custom key", 'dt_woocommerce_page_builder' ), 
				"param_name" => "product_custom_key", 
				'value' => '', 
				"description" => __( "Enter custom key.", 'dt_woocommerce_page_builder' ) ), 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '', 
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ), 
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );