<?php

// Single product page builder
vc_map( 
	array( 
		"name" => esc_html__( "First Name", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_account_first_name", 
		"category" => esc_html__( "Woo Account Details", 'dt_woocommerce_page_builder' ), 
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
vc_map( 
	array(
		"name" => esc_html__( "Last Name", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_account_last_name",
		"category" => esc_html__( "Woo Account Details", 'dt_woocommerce_page_builder' ), 
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
vc_map( 
	array(
		"name" => esc_html__( "Display name", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_account_display_name",
		"category" => esc_html__( "Woo Account Details", 'dt_woocommerce_page_builder' ), 
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
vc_map( 
	array(
		"name" => esc_html__( "Email Address", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_account_email",
		"category" => esc_html__( "Woo Account Details", 'dt_woocommerce_page_builder' ), 
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
vc_map( 
	array(
		"name" => esc_html__( "Password", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_account_password",
		"category" => esc_html__( "Woo Account Details", 'dt_woocommerce_page_builder' ), 
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

vc_map( 
	array( 
		"name" => esc_html__( "Extra Account Details Fields", 'dt_woocommerce_page_builder' ), 
		"base" => "dtwpb_account_extra_fields", 
		"category" => esc_html__( "Woo Account Details", 'dt_woocommerce_page_builder' ), 
		"icon" => "dt-vc-icon-dt_woo", 
		"description" => esc_html__( "Add extra fields", 'dt_woocommerce_page_builder' ),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => __( "Type", 'dt_woocommerce_page_builder' ),
				"param_name" => "type",
				'class' => '',
				'std' => 'text',
				"value" => array(
					__( 'Text field', 'dt_woocommerce_page_builder' ) => 'text',
					__( 'Textarea field', 'dt_woocommerce_page_builder' ) => 'textarea',
					__( 'Dropdown field', 'dt_woocommerce_page_builder' ) => 'dropdown',
					__( 'Date field', 'dt_woocommerce_page_builder' ) => 'date',
					__( 'Check field', 'dt_woocommerce_page_builder' ) => 'check',
					__( 'Radio field', 'dt_woocommerce_page_builder' ) => 'radio',
				)
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Field Label", 'dt_woocommerce_page_builder' ),
				"param_name" => "label",
				'value' => 'Label',
				'save_always' => true,
				'admin_label'	=> true,
				"description" => '',
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Field Name (Required)", 'dt_woocommerce_page_builder' ),
				"param_name" => "name",
				'value' => '',
				'std' => '',
				'save_always' => true,
				"description" => 'Ex: your-phone',
			),
			array(
				"type" => "dtwpb_options",
				"heading" => esc_html__( "Options", 'dt_woocommerce_page_builder' ),
				"param_name" => "extra_options",
			),
			/*array(
				"type" => "dropdown",
				"heading" => __( "Required", 'dt_woocommerce_page_builder' ),
				"param_name" => "required",
				'class' => '',
				"value" => array(
					__( 'No', 'dt_woocommerce_page_builder' ) => 'no',
					__( 'Yes', 'dt_woocommerce_page_builder' ) => 'yes',
				)
			),*/
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

