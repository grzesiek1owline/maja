<?php
vc_map( 
	array( 
		"name" => esc_html__( "Single Product Image", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_single_product_image", 
		"category" => esc_html__( "Woo Single product", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"params" => array( 
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