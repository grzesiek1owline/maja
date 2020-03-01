<?php
/*
 * Contain all shortcodes for WooCommerce page builder
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if accessed directly
}
$text_align_options = array( 
	esc_html__( 'Left', 'dt_woocommerce_page_builder' ) => 'left', 
	esc_html__( 'Right', 'dt_woocommerce_page_builder' ) => 'right', 
	esc_html__( 'Center', 'dt_woocommerce_page_builder' ) => 'center', 
	esc_html__( 'Justify', 'dt_woocommerce_page_builder' ) => 'justify' );
$show_hide_values = array( 
	esc_html__( 'Show', 'dt_woocommerce_page_builder' ) => 'show', 
	esc_html__( 'Hide', 'dt_woocommerce_page_builder' ) => 'hide' );
$order_by_values = array( 
	'', 
	esc_html__( 'Date', 'dt_woocommerce_page_builder' ) => 'date', 
	esc_html__( 'ID', 'dt_woocommerce_page_builder' ) => 'ID', 
	esc_html__( 'Author', 'dt_woocommerce_page_builder' ) => 'author', 
	esc_html__( 'Title', 'dt_woocommerce_page_builder' ) => 'title', 
	esc_html__( 'Modified', 'dt_woocommerce_page_builder' ) => 'modified', 
	esc_html__( 'Random', 'dt_woocommerce_page_builder' ) => 'rand', 
	esc_html__( 'Comment count', 'dt_woocommerce_page_builder' ) => 'comment_count', 
	esc_html__( 'Menu order', 'dt_woocommerce_page_builder' ) => 'menu_order' );

$order_way_values = array( 
	'', 
	esc_html__( 'Descending', 'dt_woocommerce_page_builder' ) => 'DESC', 
	esc_html__( 'Ascending', 'dt_woocommerce_page_builder' ) => 'ASC' );

// global
vc_map( 
	array( 
		"name" => __( "WooCommercePageBuilder Breadcrumb", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_breadcrumb", 
		"category" => __( "WooCommerce", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'Some themes may not show it and show their breadcrumb.', 'dt_woocommerce_page_builder' ), 
		"params" => array( 
			array( 
				"type" => "dropdown", 
				"heading" => __( "Text align", 'dt_woocommerce_page_builder' ), 
				"param_name" => "text_align", 
				'value' => $text_align_options ), 
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
 * ////////////////////////////
 *
 * Archive Product custom page
 *
 * ////////////////////////////
 */
vc_map( 
	array( 
		"name" => __( "Category Thumbnail", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_product_category_thumbnail", 
		"category" => __( "Archive Product Page", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( "Displaying Category Thumbnail", 'dt_woocommerce_page_builder' ), 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Image size", 'dt_woocommerce_page_builder' ), 
				"param_name" => "thumbnail_size", 
				'value' => '', 
				"description" => __( 
					'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 
					'dt_woocommerce_page_builder' ) ), 
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
		"name" => __( "Archive Header", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_archive_product_header", 
		"category" => __( "Archive Product Page", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( "Displaying Archive Title and Archive Description", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Archive Header Title", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_archive_product_header_title", 
		"category" => __( "Archive Product Page", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( "Displaying Archive Title", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Archive Header Description", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_archive_product_description", 
		"category" => __( "Archive Product Page", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( "Displaying Archive Description", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Archive Products Loop", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_shop_loop", 
		"category" => __( "Archive Product Page", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( "Displaying product archives, including the main shop", 'dt_woocommerce_page_builder' ), 
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __( "Layout", 'dt_woocommerce_page_builder' ),
				"param_name" => "layout",
				'save_always' => true,
				'value' =>
					array(
						esc_html__( 'Theme Default', 'dt_woocommerce_page_builder' ) => '',
						esc_html__( 'Custom Content', 'dt_woocommerce_page_builder' ) => 'custom',
					),
				'std' => '',
				"description" => '' ),
			array( 
				"type" => "dropdown", 
				"heading" => __( "Columns", 'dt_woocommerce_page_builder' ), 
				"param_name" => "columns", 
				'value' => array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12' ), 
				'std' => '4',
				'save_always' => true,
				"description" => '' ),
			array( 
				"type" => "dropdown", 
				"heading" => __( "Tablet Columns", 'dt_woocommerce_page_builder' ), 
				"param_name" => "tablet_columns", 
				'value' => array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6' ), 
				'std' => '3',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				"description" => '' ),
			array( 
				"type" => "dropdown", 
				"heading" => __( "Mobile Columns", 'dt_woocommerce_page_builder' ), 
				"param_name" => "mobile_columns", 
				'value' => array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6' ), 
				'std' => '2',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				"description" => '' ),
			array(
				"type" => "textfield",
				"heading" => __( "Rows", 'dt_woocommerce_page_builder' ),
				"param_name" => "rows",
				'save_always' => true,
				'std' => '3',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
			),
			array(
				"type" => "dropdown",
				"heading" => __( "Pagination", 'dt_woocommerce_page_builder' ),
				"param_name" => "paginate",
				'save_always' => true,
				'value' => 
					array( 
						esc_html__( 'Yes', 'dt_woocommerce_page_builder' ) => 'yes', 
						esc_html__( 'No', 'dt_woocommerce_page_builder' ) => 'no', 
					),
				'std' => 'yes',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				"description" => '' ),
			array(
				"type" => "dropdown",
				"heading" => __( "Allow Order", 'dt_woocommerce_page_builder' ),
				"param_name" => "allow_order",
				'save_always' => true,
				'value' => 
					array( 
						esc_html__( 'Yes', 'dt_woocommerce_page_builder' ) => 'yes', 
						esc_html__( 'No', 'dt_woocommerce_page_builder' ) => 'no', 
					),
				'std' => 'yes',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				"description" => '' ),
			array(
				"type" => "dropdown",
				"heading" => __( "Show Result Count", 'dt_woocommerce_page_builder' ),
				"param_name" => "show_result_count",
				'save_always' => true,
				'value' => 
					array( 
						esc_html__( 'Yes', 'dt_woocommerce_page_builder' ) => 'yes', 
						esc_html__( 'No', 'dt_woocommerce_page_builder' ) => 'no', 
					),
				'std' => 'yes',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				"description" => '' ),
			array(
				"type" => "textfield", 
				"heading" => __( "Nothing Found Message", 'dt_woocommerce_page_builder' ), 
				"param_name" => "nothing_found_message",
				'save_always' => true,
				'std' => __( "No products were found matching your selection.", 'dt_woocommerce_page_builder' ),
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				"description" => '' ), 
			array(
				"type" => "textfield", 
				"heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ), 
				"param_name" => "el_class", 
				'value' => '',
				"description" => __( 
					"If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 
					'dt_woocommerce_page_builder' ) ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Columns Gap', 'dt_woocommerce_page_builder' ),
				'param_name' => 'column_gap',
				'value' => '20',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				'group' => esc_html__( 'Style', 'dt_woocommerce_page_builder' ) ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Rows Gap', 'dt_woocommerce_page_builder' ),
				'param_name' => 'row_gap',
				'value' => '40',
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				'group' => esc_html__( 'Style', 'dt_woocommerce_page_builder' ) ),
			array(
				"type" => "dropdown",
				"heading" => __( "Text align", 'dt_woocommerce_page_builder' ),
				"param_name" => "text_align",
				'value' => array(
					esc_html__( 'Left', 'dt_woocommerce_page_builder' ) => 'left',
					esc_html__( 'Right', 'dt_woocommerce_page_builder' ) => 'right',
					esc_html__( 'Center', 'dt_woocommerce_page_builder' ) => 'center',
				),
				'dependency' => array( 'element' => 'layout','value' => 'custom',),
				'group' => esc_html__( 'Style', 'dt_woocommerce_page_builder' ),
			),
			array( 
				'type' => 'css_editor', 
				'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ), 
				'param_name' => 'css', 
				'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ),

	) ) );

if ( is_active_sidebar( 'shop' ) ) {
	vc_map( 
		array( 
			"name" => __( "WooCommerce Sidebar", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_woocommerce_sidebar", 
			"category" => __( "Archive Product Page", 'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			'description' => '', 
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

// Cart page builder
vc_map( 
	array( 
		"name" => __( "Cart Table", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_cart_table", 
		"category" => __( "Woo Cart", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Cart Totals", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_cart_totals", 
		"category" => __( "Woo Cart", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Cross Sells", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_cross_sell", 
		"category" => __( "Woo Cart", 'dt_woocommerce_page_builder' ), 
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
				"heading" => __( "Orderby", 'dt_woocommerce_page_builder' ), 
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
				"heading" => __( "Order", 'dt_woocommerce_page_builder' ), 
				"param_name" => "order", 
				'class' => '', 
				"value" => array( 
					__( 'desc', 'dt_woocommerce_page_builder' ) => 'desc', 
					__( 'asc', 'dt_woocommerce_page_builder' ) => 'asc' ) ), 
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

// Checkout page builder
vc_map( 
	array( 
		"name" => __( "Checkout Coupon Form", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_checkout_coupon_form", 
		"category" => __( "Woo Checkout", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"description" => '', 
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
		"name" => __( "Billing Information", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_form_billing", 
		"category" => __( "Woo Checkout", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Shipping information form", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_form_shipping", 
		"category" => __( "Woo Checkout", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Order review", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_checkout_order_review", 
		"category" => __( "Woo Checkout", 'dt_woocommerce_page_builder' ), 
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

// Thank you
vc_map( 
	array( 
		"name" => __( "Thank You Order", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_order_received_thankyou", 
		"category" => __( "Woo Thank you", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Order Details", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_order_received_order_details", 
		"category" => __( "Woo Thank you", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "Order Customer Details", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_order_received_order_customer_details", 
		"category" => __( "Woo Thank you", 'dt_woocommerce_page_builder' ), 
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

// My Account page before login builder
vc_map( 
	array( 
		"name" => __( "My Account Login Form", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_form_login", 
		"category" => __( "Woo My Account Before Login", 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "My Account Register Form", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_form_register", 
		"category" => __( "Woo My Account Before Login", 'dt_woocommerce_page_builder' ), 
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

// My Account page builder
vc_map( 
	array( 
		"name" => __( "My Account Dashboard", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_dashboard", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'Shows account dashboard.', 'dt_woocommerce_page_builder' ), 
		"params" => array( 
			array( 
				'type' => 'textarea_html', 
				'heading' => __( 'Custom My Account Dashboard', 'dt_woocommerce_page_builder' ), 
				'value' => '', 
				'save_always' => true, 
				'param_name' => 'content', 
				'description' => __( 
					'Overridden woocommerce/myaccount/dashboard.php. Leave blank to use the template dashboard.php file', 
					'dt_woocommerce_page_builder' ) ), 
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
		"name" => __( "My Account Orders", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_orders", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'Shows orders on the account page.', 'dt_woocommerce_page_builder' ), 
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
			"name" => __( "WC Memberships: My Account Memberships", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_woocommerce_myaccount_wc_memberships", 
			"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			'description' => __( 'Renders the members area content.', 'dt_woocommerce_page_builder' ), 
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

if ( class_exists( 'WC_Subscriptions' ) ) {
	vc_map( 
		array( 
			"name" => __( "WC Subscriptions: My Account Subscriptions", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_woocommerce_account_subscriptions_endpoint", 
			"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			'description' => '', 
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
} // Class WC_Subscriptions

if ( class_exists( 'WC_Bookings' ) ) {
	vc_map( 
		array( 
			"name" => __( "WooCommerce Bookings", 'dt_woocommerce_page_builder' ), 
			"base" => "dtwpb_woocommerce_account_bookings_endpoint", 
			"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
			"icon" => "dt-vc-icon-dt_woo", 
			'description' => '', 
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
} // Class WC_Bookings

vc_map( 
	array( 
		"name" => __( "My Account Downloads", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_downloads", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'Shows orders on the account page.', 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "My Account Addresses", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_addresses", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'My Addresses.', 'dt_woocommerce_page_builder' ), 
		"params" => array (
		/*array(
			'type' => 'textarea_html',
			'heading' => __( 'Custom My Account Addresses Description', 'dt_woocommerce_page_builder' ),
			'value' => '',
			'save_always' => true,
			'param_name' => 'content',
			'description' => __( 'filter woocommerce_my_account_my_address_description', 'dt_woocommerce_page_builder' ),
		),*/
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
		"name" => __( "My Account Details", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_edit_account", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'Edit account form.', 'dt_woocommerce_page_builder' ), 
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
		"name" => __( "My Account Payment methods", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_payment_methods", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => __( 'Edit account form.', 'dt_woocommerce_page_builder' ), 
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
 * vc_map(
 * array(
 * "name" => __( "My Account Add Payment method", 'dt_woocommerce_page_builder' ),
 * "base" => "dtwpb_woocommerce_myaccount_add_payment_method",
 * "category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ),
 * "icon" => "dt-vc-icon-dt_woo",
 * 'description' => __( 'Edit account form.', 'dt_woocommerce_page_builder' ),
 * "params" => array(
 * array(
 * "type" => "textfield",
 * "heading" => __( "Extra class name", 'dt_woocommerce_page_builder' ),
 * "param_name" => "el_class",
 * 'value' => '',
 * "description" => __(
 * "If you wish to style particular content element differently, then use this field to add a class name and then refer
 * to it in your css file.",
 * 'dt_woocommerce_page_builder' ) ),
 * array(
 * 'type' => 'css_editor',
 * 'heading' => esc_html__( 'Css', 'dt_woocommerce_page_builder' ),
 * 'param_name' => 'css',
 * 'group' => esc_html__( 'Design options', 'dt_woocommerce_page_builder' ) ) ) ) );
 */

vc_map( 
	array( 
		"name" => __( "My Account Extra Endpoint", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_extra_endpoint", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => '', 
		"params" => array( 
			array( 
				"type" => "textfield", 
				"heading" => __( "Extra Key endpoint", 'dt_woocommerce_page_builder' ), 
				"param_name" => "extra_key", 
				'value' => 'bookings', 
				"description" => __( 
					"Enter extra key for Account endpoint. eg: 'extra-key' for 'woocommerce_account_extra-key_endpoint', 'bookings' for 'woocommerce_account_bookings_endpoint'.", 
					'dt_woocommerce_page_builder' ) ), 
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
		"name" => __( "My Account Logout", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_woocommerce_myaccount_logout", 
		"category" => __( "Woo My Account", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		'description' => '', 
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