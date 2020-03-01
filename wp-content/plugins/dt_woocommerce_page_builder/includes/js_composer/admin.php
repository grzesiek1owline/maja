<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class DTWPB_Admin{
	
	private $text_domain;
	private $version;
	private $title;
	private $options;
	
	public function __construct( $text_domain, $version ){
		$this->title = __( 'WooCommerce Page Builder', $text_domain );
		$this->text_domain = $text_domain;
		
		add_action ('admin_init', array(&$this,'init'));
		add_action ('admin_enqueue_scripts',array(&$this,'enqueue_styles'));
		add_action ('admin_enqueue_scripts',array(&$this,'enqueue_scripts'));
		add_action ('admin_menu', array(&$this,'addMenuPage') );
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), 1 );
		
		// Product, checkout page meta data
		add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
		add_action('save_post', array(&$this, 'save_product_meta_data'), 1, 2 );
		
		// Product category add fields
		add_action('product_cat_add_form_fields', array(&$this, 'add_category_fields'));
		add_action('product_cat_edit_form_fields', array(&$this, 'edit_category_fields'), 10, 2);

		// Product Tag add fields
		add_action('product_tag_add_form_fields', array(&$this, 'add_product_tag_fields'));
		add_action('product_tag_edit_form_fields', array(&$this, 'edit_product_tag_fields'), 10, 2);

		// Save custom fields
		add_action('created_term', array(&$this, 'save_category_fields'), 10, 3);
		add_action('edit_term', array(&$this, 'save_category_fields'), 10, 3);

		
	}
	
	public function init(){
		register_setting('dtwpb_settings', 'dtwpb_settings');
	}
	
	public function enqueue_styles(){
		wp_enqueue_style('dtwpb-admin', DT_WOO_PAGE_BUILDER_URL . 'assets/css/admin.css');
		wp_enqueue_style('bootstrap-tabs', DT_WOO_PAGE_BUILDER_URL .'assets/css/bootstrap-tabs.css');
	}
	
	public function enqueue_scripts(){
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script('bootstrap-tab', DT_WOO_PAGE_BUILDER_URL.'assets/js/bootstrap-tab.js');
		wp_register_script( 'dtwpb-admin',DT_WOO_PAGE_BUILDER_URL. 'assets/js/admin.js', array('jquery'),DT_WOO_PAGE_BUILDER_VERSION,false);
		wp_enqueue_script( 'dtwpb-admin' );
		wp_enqueue_style('jquery-chosen', DT_WOO_PAGE_BUILDER_URL. 'assets/css/chosen/chosen.css');
		wp_enqueue_script( 'jquery-chosen', DT_WOO_PAGE_BUILDER_URL . '/assets/js/chosen/chosen.jquery.js', array( 'jquery' ), '1.1.0', true );
	}
	
	public function addMenuPage() {
		//add_submenu_page( 'woocommerce', $this->title, $this->title, 'manage_options', 'dtwpb_settings', array( $this, 'MenuPageRender' ) );		
		add_menu_page(
			$this->title,
			$this->title,
			'manage_options',
			'dtwpb_settings',
			null,
			'dashicons-admin-page',
			'56'
		);
		
		add_submenu_page( 'dtwpb_settings', esc_html__( 'Settings', 'dt_woocommerce_page_builder' ), esc_html__( 'Settings', 'dt_woocommerce_page_builder' ), 'manage_options', 'dtwpb_settings', array( $this, 'MenuPageRender' ) );
	}
	
	public function MenuPageRender(){
		
		?>
				<div class="wrap dtwpb_settings-panel dt_pg_tabs">
					<div id="icon-options-general" class="icon32">
						<br>
					</div>
					<form method="post" action="options.php" id="tnpg_form" name="tnpg_form">
						<?php settings_fields('dtwpb_settings')?>
						<p>
							<button type="submit" id="submit-dtwpb-form" class="button button-primary "><?php esc_html_e('SAVE CHANGES','dt_woocommerce_page_builder');?></button>
						</p>
						<!-- Tabs Options -->
						<div class="dtwpb-tabs-wrap">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" id="dtwpb-tabs"> 
								<li><a href="#dtwpb-general" data-toggle="tab"><?php esc_html_e('General','dt_woocommerce_page_builder');?></a></li>
								<li><a href="#dtwpb-product" data-toggle="tab"><?php esc_html_e('Single Product','dt_woocommerce_page_builder');?></a></li>
								<li><a href="#dtwpb-category" data-toggle="tab"><?php esc_html_e('Product Archive Pages','dt_woocommerce_page_builder');?></a></li>
								<li><a href="#dtwpb-checkout" data-toggle="tab"><?php esc_html_e('Checkout','dt_woocommerce_page_builder');?></a></li>
								<li><a href="#dtwpb-thankyou" data-toggle="tab"><?php esc_html_e('Thank You','dt_woocommerce_page_builder');?></a></li>
								<li><a href="#dtwpb-accounts" data-toggle="tab"><?php esc_html_e('My Account','dt_woocommerce_page_builder');?></a></li>
								
								<li class="pl-link-service"><a href="http://dawnthemes.com/support/forums/forum/plugins/woocommerce-page-builder/" target="_blank"><?php esc_html_e('Support','dt_woocommerce_page_builder');?></a></li>
							</ul>
							
							<!-- Tab panes -->
							<div class="tab-content">
								<!-- wpplOptions tab -->
								<div class="tab-pane fade" id="dtwpb-general">
									<div>
										<p>We would like to thank you for purchasing <strong>WooCommerce Page Builder</strong>! We are very pleased you have chosen <strong>WooCommerce Page Builder </strong>for your website, you will not be disappointed!<br/>Before getting started, be sure to always refer:</strong>
                        				</p>
                        				<ul class="dtwpb_features">
                        					<li><a href="http://doc.dawnthemes.com/woocommerce-page-builder/" target="blank"><?php esc_html_e('Online Documentation','dt_woocommerce_page_builder');?></a></li>
                        					<li><a href="https://www.youtube.com/watch?v=HIJ0-u67Aeo&list=PL_HbKbJsShUhl9s6GyBPRvZ6glDBpq6k4" target="blank"><?php esc_html_e('Video Tutorials','dt_woocommerce_page_builder');?></a></li>
                        				</ul>
									</div>
								</div>
								
								<div class="tab-pane fade" id="dtwpb-product">
									<table class="form-table">
										<tbody>
											<?php $dtwpb_product_tpl_type_page = dtwpb_get_option('dtwpb_product_tpl_type_page', 'dtwpb_product_tpl');?>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_product_tpl_type_page"><?php esc_html_e('Template Type', $this->text_domain) ?></label></th>
												<td>
												<select name="dtwpb_settings[dtwpb_product_tpl_type_page]">
													<option value="dtwpb_product_tpl" <?php selected( $dtwpb_product_tpl_type_page, 'dtwpb_product_tpl', true )?> ><?php esc_html_e('Default', $this->text_domain); ?></option>
													<option value="page" <?php selected( $dtwpb_product_tpl_type_page, 'page', true )?>><?php esc_html_e('Page', $this->text_domain); ?></option>
												</select>
												<p class="description"><?php esc_html_e('Select the type of template you want to work on. (Hit SAVE CHANGES to apply)', $this->text_domain); ?></p>
												</td>
											</tr>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_single_product_page_df"><?php esc_html_e('Single Product Template Default', $this->text_domain) ?></label></th>
												<td>
												<?php 
												$product_tpl =  ($dtwpb_product_tpl_type_page == 'page') ? 'page' : 'dtwpb_product_tpl';
												
												$dtwpb_single_product_page_df = dtwpb_get_option('dtwpb_single_product_page_df', '');
												
												$products_tpl = get_posts(array('post_type'=> $product_tpl, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_single_product_page_df]" id="dtwpb_single_product_page_df" class="" data-placeholder="'.__( 'Select a product template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($products_tpl as $p_tpl) {
													echo '<option value="'. $p_tpl->ID .'" '. selected( $dtwpb_single_product_page_df, $p_tpl->ID, false ) .'>'. $p_tpl->post_title. '</option>';
												}
												echo '</select>';
												
												?>
												<p class="description">
													<?php esc_html_e('Select Product Template default for all Products.', $this->text_domain);
													if( !empty($dtwpb_single_product_page_df) ){
														echo '<a href="' . esc_url( esc_url( get_edit_post_link($dtwpb_single_product_page_df) ) ) . '"> '.esc_html__( 'Edit', $this->text_domain ).'</a>';
													}
													?>
												</p>
												</td>					
											</tr>
											
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="dtwpb-category">
									<table class="form-table">
										<tbody>
											<?php $dtwpb_cat_tpl_type_page = dtwpb_get_option('dtwpb_cat_tpl_type_page', 'dtwpb_cat_tpl');?>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_cat_tpl_type_page"><?php esc_html_e('Template Type', $this->text_domain) ?></label></th>
												<td>
												<select name="dtwpb_settings[dtwpb_cat_tpl_type_page]">
													<option value="dtwpb_cat_tpl" <?php selected( $dtwpb_cat_tpl_type_page, 'dtwpb_cat_tpl', true )?> ><?php esc_html_e('Default', $this->text_domain); ?></option>
													<option value="page" <?php selected( $dtwpb_cat_tpl_type_page, 'page', true )?>><?php esc_html_e('Page', $this->text_domain); ?></option>
												</select>
												<p class="description"><?php esc_html_e('Select the type of template you want to work on. (Hit SAVE CHANGES to apply)', $this->text_domain); ?></p>
												</td>
											</tr>
											
											<tr valign="top">
												<th scope="row"><label for="dtwpb_shop_custom_page_id"><?php esc_html_e('Shop Page', $this->text_domain) ?></label></th>
												<td>
												<?php 
												$shop_tpl = ($dtwpb_cat_tpl_type_page == 'page') ? 'page' : 'dtwpb_cat_tpl';

												$dtwpb_shop_custom_page_id = dtwpb_get_option('dtwpb_shop_custom_page_id', '');
												
												$product_archive_tpl = get_posts(array('post_type'=> $shop_tpl, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_shop_custom_page_id]" id="dtwpb_shop_custom_page_id" class="" data-placeholder="'.__( 'Select Shop template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($product_archive_tpl as $s_tpl) {
													echo '<option value="'. $s_tpl->ID .'" '. selected( $dtwpb_shop_custom_page_id , $s_tpl->ID, false ) .'>'. $s_tpl->post_title. '</option>';
												}
												echo '</select>';
												?>
												<p class="description">
													<?php esc_html_e('Custom Shop Page', $this->text_domain);
														if( !empty($dtwpb_shop_custom_page_id) ){
															echo '<a href="'.esc_url( get_edit_post_link($dtwpb_shop_custom_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
														}
													?>
												</p>
												</td>	
												</td>							
											</tr>
											
											<tr valign="top">
												<th scope="row"><label for="dtwpb_product_cat_custom_page_id"><?php esc_html_e('Categories Template Default', $this->text_domain) ?></label></th>
												<td>
												<?php 
												$product_cat_tpl = ($dtwpb_cat_tpl_type_page == 'page') ? 'page' : 'dtwpb_cat_tpl';
												
												$dtwpb_product_cat_custom_page_id = dtwpb_get_option('dtwpb_product_cat_custom_page_id', '');
												
												$cat_tpl = get_posts(array('post_type'=> $product_cat_tpl, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_product_cat_custom_page_id]" id="dtwpb_product_cat_custom_page_id" class="" data-placeholder="'.__( 'Select a category template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($cat_tpl as $c_tpl) {
													echo '<option value="'. $c_tpl->ID .'" '. selected( $dtwpb_product_cat_custom_page_id , $c_tpl->ID, false ) .'>'. $c_tpl->post_title. '</option>';
												}
												echo '</select>';
												
												?>
												<p class="description">
												<?php 
													echo __('Select Product Archive Template default for Category Page <br/>Or you can go to the specific category and setting <strong>Category Custom Page</strong> option for each category. (One Custom Product Archive for one Product category)', $this->text_domain);
													echo '<br/>';
													if( !empty($dtwpb_product_cat_custom_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($dtwpb_product_cat_custom_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}
												?>
												</p>
												</td>							
											</tr>
											
											<tr valign="top">
												<th scope="row"><label for="dtwpb_product_tag_custom_page_id"><?php esc_html_e('Tags Template Default', $this->text_domain) ?></label></th>
												<td>
												<?php 
												$product_tag_tpl = ($dtwpb_cat_tpl_type_page == 'page') ? 'page' : 'dtwpb_cat_tpl';
												
												$dtwpb_product_tag_custom_page_id = dtwpb_get_option('dtwpb_product_tag_custom_page_id', '');
												
												$tag_tpl = get_posts(array('post_type'=> $product_tag_tpl, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_product_tag_custom_page_id]" id="dtwpb_product_tag_custom_page_id" class="" data-placeholder="'.__( 'Select a category template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($tag_tpl as $t_tpl) {
													echo '<option value="'. $t_tpl->ID .'" '. selected( $dtwpb_product_tag_custom_page_id , $t_tpl->ID, false ) .'>'. $t_tpl->post_title. '</option>';
												}
												echo '</select>';
												
												?>
												<p class="description">
												<?php 
													echo __('Select Product Archive Template default for Product Tag page<br/>Or you can go to the specific tag and setting <strong>Tag Custom Page</strong> option for each Tag. (One Custom Product Archive for one Product Tag)', $this->text_domain);
													echo '<br/>';
													if( !empty($dtwpb_product_tag_custom_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($dtwpb_product_tag_custom_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}
												?>
												</p>
												</td>							
											</tr>
											
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="dtwpb-checkout">
									<table class="form-table">
										<tbody>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_cart_page_id"><?php esc_html_e('Cart Page Template', $this->text_domain) ?></label></th>
												<td>
												<?php
												$cart_page_id = dtwpb_get_option('dtwpb_cart_page_id', '');
												
												$cart_tpl = get_posts(array('post_type'=> DTWPB_Cart_Tpl::postType(), 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_cart_page_id]" id="dtwpb_cart_page_id" class="" data-placeholder="'.__( 'Select a cart template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($cart_tpl as $tpl) {
													echo '<option value="'. $tpl->ID .'" '. selected( $cart_page_id , $tpl->ID, false ) .'>'. $tpl->post_title. '</option>';
												}
												echo '</select>';
												?>
												<p class="description"><?php esc_html_e('Select Cart page custom template.');
													echo '<br/>';
													if( !empty($cart_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($cart_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}?>
												</p>
												</td>
											</tr>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_checkout_page_id"><?php esc_html_e('Checkout Page Template', $this->text_domain) ?></label></th>
												<td>
												<?php
												$checkout_page_id = dtwpb_get_option('dtwpb_checkout_page_id', '');
												
												$checkout_tpl = get_posts(array('post_type'=> DTWPB_Checkout_Tpl::postType(), 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_checkout_page_id]" id="dtwpb_checkout_page_id" class="" data-placeholder="'.__( 'Select a checkout template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($checkout_tpl as $tpl) {
													echo '<option value="'. $tpl->ID .'" '. selected( $checkout_page_id , $tpl->ID, false ) .'>'. $tpl->post_title. '</option>';
												}
												echo '</select>';
												?>
												<p class="description">
												<?php esc_html_e('Select Checkout page custom template.');
													echo '<br/>';
													if( !empty($checkout_page_id) ){
													echo '<a href="'.esc_url( get_edit_post_link($checkout_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}?>
												</p>
												</td>		
											</tr>
											
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="dtwpb-thankyou">
									<table class="form-table">
										<tbody>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_thankyou_page_id"><?php esc_html_e('Thank You Template', $this->text_domain) ?></label></th>
												<td>
												<?php
												$dtwpb_thankyou_page_id = dtwpb_get_option('dtwpb_thankyou_page_id', '');
												
												$thankyou_tpl = get_posts(array('post_type'=> DTWPB_Thankyou_Tpl::postType(), 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_thankyou_page_id]" id="dtwpb_thankyou_page_id" class="" data-placeholder="'.__( 'Select a template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($thankyou_tpl as $tpl) {
													echo '<option value="'. $tpl->ID .'" '. selected( $dtwpb_thankyou_page_id , $tpl->ID, false ) .'>'. $tpl->post_title. '</option>';
												}
												echo '</select>';
												?>
												<p class="description"><?php esc_html_e('Select Thank you custom template.');
													echo '<br/>';
													if( !empty($dtwpb_thankyou_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($dtwpb_thankyou_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}?>
												</p>
												</td>
											</tr>											
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="dtwpb-accounts">
									<table class="form-table">
										<tbody>
											<tr valign="top">
												<th scope="row"><label for="dtwpb_woocommerce_myaccount_before_login_page_id"><?php esc_html_e('My Account Before Login Page Template', $this->text_domain) ?></label></th>
												<td>
												<?php
												$myaccount_login_page_id = dtwpb_get_option('dtwpb_woocommerce_myaccount_before_login_page_id', '');
												
												$myaccount_tpl = get_posts(array('post_type'=> DTWPB_MyAccount_Tpl::postType(), 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_woocommerce_myaccount_before_login_page_id]" id="dtwpb_woocommerce_myaccount_before_login_page_id" class="" data-placeholder="'.__( 'Select My Account template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($myaccount_tpl as $tpl) {
													echo '<option value="'. $tpl->ID .'" '. selected( $myaccount_login_page_id, $tpl->ID, false ) .'>'. $tpl->post_title. '</option>';
												}
												echo '</select>';
												
												?>
												<p class="description">
													<?php 
													esc_html_e('Custom page before user login. Go to build a custom MyAccount Before login page, use the elements in the "Woo MyAccount Before Login". You can also add the steps/description how to create an account for this custom page.');
													echo '<br/>';
													if( !empty($myaccount_login_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($myaccount_login_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}?>
													</p>
												</td>					
											</tr>
											
											<tr valign="top">
												<th scope="row"><label for="dtwpb_myaccount_page_id"><?php esc_html_e('My Account Page Template', $this->text_domain) ?></label></th>
												<td>
												<?php
												$myaccount_page_id = dtwpb_get_option('dtwpb_myaccount_page_id', '');
												
												$myaccount_tpl = get_posts(array('post_type'=> DTWPB_MyAccount_Tpl::postType(), 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_myaccount_page_id]" id="dtwpb_myaccount_page_id" class="" data-placeholder="'.__( 'Select My Account template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($myaccount_tpl as $tpl) {
													echo '<option value="'. $tpl->ID .'" '. selected( $myaccount_page_id, $tpl->ID, false ) .'>'. $tpl->post_title. '</option>';
												}
												echo '</select>';
												?>
												<p class="description">
													<?php esc_html_e('Select My Account page custom template.');
													echo '<br/>';
													if( !empty($myaccount_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($myaccount_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}?>
													</p>
												</td>					
											</tr>
											
											<tr valign="top">
												<th scope="row"><label for="dtwpb_set_edit_account_page_id"><?php esc_html_e('Account Details Template', $this->text_domain) ?></label></th>
												<td>
												<?php
												$dtwpb_set_edit_account_page_id = dtwpb_get_option('dtwpb_set_edit_account_page_id', '');
												
												$myaccount_tpl = get_posts(array('post_type'=> DTWPB_MyAccount_Tpl::postType(), 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
												echo '<select name="dtwpb_settings[dtwpb_set_edit_account_page_id]" id="dtwpb_set_edit_account_page_id" class="" data-placeholder="'.__( 'Select a template&hellip;','dt_woocommerce_page_builder').'">';
												echo '<option value="">'. __( '-- None (Use theme layout) --','dt_woocommerce_page_builder') . '</option>';
												foreach ($myaccount_tpl as $tpl) {
													echo '<option value="'. $tpl->ID .'" '. selected( $dtwpb_set_edit_account_page_id, $tpl->ID, false ) .'>'. $tpl->post_title. '</option>';
												}
												echo '</select>';
												?>
												<p class="description">
													<?php esc_html_e('Select Account Details Template.');
													echo '<br/>';
													if( !empty($dtwpb_set_edit_account_page_id) ){
														echo '<a href="'.esc_url( get_edit_post_link($dtwpb_set_edit_account_page_id) ).'"> '.esc_html__('Edit', $this->text_domain).'</a>';
													}?>
													</p>
												</td>					
											</tr>
											
										</tbody>
									</table>
								</div>
								
								
							</div> 
							
						</div> <!-- //Tab options -->
					</form>
				</div>		
				
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('#dtwpb-tabs a:first').tab('show');
						
					});
				</script>
			<?php
		}
	
		/**
		 * Change the admin footer text on WooCommerce admin pages.
		 *
		 * @since  2.3
		 * @param  string $footer_text
		 * @return string
		 */
		public function admin_footer_text( $footer_text ) {
			if ( ! function_exists( 'dtwpb_get_screen_ids' ) ) {
				return $footer_text;
			}
			$current_screen = get_current_screen();
			$dtwpb_pages       = dtwpb_get_screen_ids();
		
			// Set only WC pages.
			$dtwpb_pages = array_diff( $dtwpb_pages, array( 'profile', 'user-edit' ) );
		
			// Check to make sure we're on a WooCommerce admin page.
			if ( isset( $current_screen->id ) && in_array( $current_screen->id, $dtwpb_pages ) ) {
				// Change the footer text
					$footer_text = sprintf(
						/* translators: 1: WooCommerce 2:: five stars */
						__( 'If you like %1$s please leave us a %2$s rating. A huge thanks in advance!', 'dt_woocommerce_page_builder' ),
						sprintf( '<strong>%s</strong>', esc_html__( 'WooCommerce Page Builder', 'dt_woocommerce_page_builder' ) ),
						'<a href="https://codecanyon.net/item/woocommerce-page-builder/15534462" target="_blank" class="wc-rating-link" data-rated="' . esc_attr__( 'Thanks :)', 'dt_woocommerce_page_builder' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
					);
			}
		
			return $footer_text;
		}
		
	public function add_meta_boxes(){
		global $post;
		
		add_meta_box('dtwpb-single-product-meta-box', __( 'DTWPB Single Product Page', 'dt_woocommerce_page_builder'), array(&$this, 'add_product_meta_box'), 'product', 'side');
		
	}
	
	public function add_product_meta_box(){
		
		$product_id = get_the_ID();
		$page_id	= get_post_meta($product_id, 'dtwpb_single_product_page', true);
		
		$args = array(
			'post_status'	=> 'publish,private',
			'name'			=> 'dtwpb_single_product_page',
			'show_option_none' => esc_html__('None', 'dt_woocommerce_page_builder'),
			'echo'			=> false,
			'selected'		=> absint($page_id),
			'default'		=> '',
		);
		//echo str_replace(' id=', " data-placeholder='" . __( 'Select a page&hellip;', 'dt_woocommerce_page_builder') .  "' class='' id=", wp_dropdown_pages( $args ) );
		
		$dtwpb_product_tpl_type_page = dtwpb_get_option('dtwpb_product_tpl_type_page', 'dtwpb_product_tpl');

		$post_type = ($dtwpb_product_tpl_type_page == 'page') ? 'page' : 'dtwpb_product_tpl';
		$post_type_object = get_post_type_object($post_type);
		$label = $post_type_object->label;
		$selected = absint($page_id);
		$posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
		echo '<select name="dtwpb_single_product_page" id="dtwpb_single_product_page" class="" data-placeholder="'.__( 'Select a template&hellip;','dt_woocommerce_page_builder').'">';
		echo '<option value="">'. __( 'Default','dt_woocommerce_page_builder') . '</option>';
		foreach ($posts as $post) {
			echo '<option value="'. $post->ID .'"'. ($selected == $post->ID ? ' selected="selected"' : '') .'>'. $post->post_title. '</option>';
		}
		echo '</select>';
		?>
		<p class="description"><?php echo sprintf( __( 'Select a product template. Default is use in %sProduct Template Default%s setting.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'admin.php?page=dtwpb_settings' ) ) . '" target="_blank">', '</a>' ); ?></p>
	<?php
	}
	
	
	public function save_product_meta_data($post_id,$post){
		if( empty($post_id) || empty($post) )
			return;
		
		// Dont' save meta boxes for revisions or autosaves
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}
		
		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}
		
		// Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		
		if(!empty($_POST['dtwpb_single_product_page'])){
			update_post_meta( $post_id, 'dtwpb_single_product_page', absint($_POST['dtwpb_single_product_page']) );
		}else{
			delete_post_meta( $post_id, 'dtwpb_single_product_page');
		}
	}
	
	public function add_category_fields(){
		?>
		<div class="form-field">
			<label for="dtwpb_cat_product_page"><?php _e( 'DTWPB Single Product Page', 'dt_woocommerce_page_builder' ); ?></label>
			<?php
			$product_type = dtwpb_get_option('dtwpb_product_tpl_type_page', 'dtwpb_product_tpl');
			$post_type_object = get_post_type_object($product_type);
			$label = $post_type_object->label;
			
			$posts = get_posts(array('post_type'=> $product_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
			echo '<select name="dtwpb_cat_product_page" id="dtwpb_cat_product_page" class="enhanced chosen_select_nostd" data-placeholder="'.__( 'Select a product template&hellip;','dt_woocommerce_page_builder').'">';
			echo '<option value="">'. __( 'None','dt_woocommerce_page_builder') . '</option>';
			foreach ($posts as $post) {
				echo '<option value="'. $post->ID .'">'. $post->post_title. '</option>';
			}
			echo '</select>';
			?>
			<p class="description"><?php echo sprintf( __( 'Select a product template or %sCreate new%s template. This template will be applied for all products of the category.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type='.$product_type ) ) . '" target="_blank">', '</a>' ); ?></p>
		</div>
		
		<div class="form-field">
			<label for="dtwpb_product_cat_custom_page"><?php esc_html_e( 'DTWPB Product Archive Page', 'dt_woocommerce_page_builder' ); ?></label>
			<?php 
			$cat_type = dtwpb_get_option('dtwpb_cat_tpl_type_page', 'dtwpb_cat_tpl');
			$post_type_object = get_post_type_object($cat_type);
			$label = $post_type_object->label;
				
			$posts = get_posts(array('post_type'=> $cat_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
			echo '<select name="dtwpb_product_cat_custom_page" id="dtwpb_product_cat_custom_page" class="enhanced chosen_select_nostd" data-placeholder="'.esc_attr__( 'Select a category template&hellip;','dt_woocommerce_page_builder').'">';
			echo '<option value="">'. esc_html__( 'None','dt_woocommerce_page_builder') . '</option>';
			foreach ($posts as $post) {
				echo '<option value="'. $post->ID .'">'. $post->post_title. '</option>';
			}
			echo '</select>';
			?>
			<br/><br/><input type="checkbox" name="dtwpb_product_cat_custom_page_child" value="1">
				<span><?php _e( 'Apply Product Archive template for the Child Categories', 'dt_woocommerce_page_builder' ); ?></span>
			<p class="description"><?php echo sprintf( __( 'Select Product Archive Template or %sCreate new%s template.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type='.$cat_type ) ) . '" target="_blank">', '</a>' ); ?></p>
		</div>
		<div class="form-field">
			<br/>
		</div>
		<?php
	}
	
	public function edit_category_fields( $term, $taxonomy ) {
		$dtwpb_cat_product_page = get_woocommerce_term_meta( $term->term_id, 'dtwpb_cat_product_page', true );
		$dtwpb_product_archive_custom_page = get_woocommerce_term_meta( $term->term_id, 'dtwpb_product_cat_custom_page', true );
		$dtwpb_product_archive_custom_page_child = get_woocommerce_term_meta( $term->term_id, 'dtwpb_product_cat_custom_page_child', true );

		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'DTWPB Single Product Page', 'dt_woocommerce_page_builder' ); ?></label></th>
			<td>
				<?php
				$product_type = dtwpb_get_option('dtwpb_product_tpl_type_page', 'dtwpb_product_tpl');
				$post_type_object = get_post_type_object($product_type);
				$label = $post_type_object->label;
				$selected = absint($dtwpb_cat_product_page);
				$posts = get_posts(array('post_type'=> $product_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
				echo '<select name="dtwpb_cat_product_page" id="dtwpb_cat_product_page" class="enhanced chosen_select_nostd" data-placeholder="'.__( 'Select a product template&hellip;','dt_woocommerce_page_builder').'">';
				echo '<option value="">'. __( 'None','dt_woocommerce_page_builder') . '</option>';
				foreach ($posts as $post) {
					echo '<option value="'. $post->ID .'"'. ($selected == $post->ID ? ' selected="selected"' : '') .'>'. $post->post_title. '</option>';
				}
				echo '</select>';
				?>
				<p class="description"><?php echo sprintf( __( 'Select a product template or %sCreate new%s template. This template will be applied for all products of the category.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type='.$product_type ) ) . '" target="_blank">', '</a>' ); ?></p>
				
			</td>
		</tr>
		
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'DTWPB Product Archive Page', 'dt_woocommerce_page_builder' ); ?></label></th>
			<td>
				<?php 
				$cat_type = dtwpb_get_option('dtwpb_cat_tpl_type_page', 'dtwpb_cat_tpl');
				$post_type_object = get_post_type_object($cat_type);
				$label = $post_type_object->label;
				$selected = absint($dtwpb_product_archive_custom_page);
				$posts = get_posts(array('post_type'=> $cat_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
				echo '<select name="dtwpb_product_cat_custom_page" id="dtwpb_product_cat_custom_page" class="enhanced chosen_select_nostd" data-placeholder="'.__( 'Select a category template&hellip;','dt_woocommerce_page_builder').'">';
				echo '<option value="">'. __( 'None','dt_woocommerce_page_builder') . '</option>';
				foreach ($posts as $post) {
					echo '<option value="'. $post->ID .'"'. ($selected == $post->ID ? ' selected="selected"' : '') .'>'. $post->post_title. '</option>';
				}
				echo '</select>';
				?>
				<p class="description"><?php echo sprintf( __( 'Select a Product Archive Template or %sCreate new%s template.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type='.$cat_type ) ) . '" target="_blank">', '</a>' ); ?></p>
			</td>
			
			
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"></th>
			<td>
				<input type="checkbox" name="dtwpb_product_cat_custom_page_child" value="1" <?php checked($dtwpb_product_archive_custom_page_child, 1, true); ?>>
				<span><?php _e( 'Apply Product Archive Template for the Child Categories', 'dt_woocommerce_page_builder' ); ?></span>
			</td>
		</tr>
		<?php
	}
	
	public function save_category_fields( $term_id, $tt_id, $taxonomy ) {
	
		if(!empty($_POST['dtwpb_cat_product_page'])){
			update_woocommerce_term_meta( $term_id, 'dtwpb_cat_product_page', absint( $_POST['dtwpb_cat_product_page'] ) );
		}else{
			delete_woocommerce_term_meta($term_id,  'dtwpb_cat_product_page');
		}

		if ( isset( $_POST[sanitize_key('dtwpb_product_cat_thumbnail_id')] ) ) {
			update_woocommerce_term_meta( $term_id, 'dtwpb_product_cat_thumbnail_id', absint( $_POST['dtwpb_product_cat_thumbnail_id'] ) );
		}
		
		if(!empty($_POST['dtwpb_product_cat_custom_page'])){
			update_woocommerce_term_meta( $term_id, 'dtwpb_product_cat_custom_page', absint( $_POST['dtwpb_product_cat_custom_page'] ) );
		}else{
			delete_woocommerce_term_meta($term_id,  'dtwpb_product_cat_custom_page');
		}

		if(!empty($_POST['dtwpb_product_cat_custom_page_child'])){
			update_woocommerce_term_meta( $term_id, 'dtwpb_product_cat_custom_page_child', absint( $_POST['dtwpb_product_cat_custom_page_child'] ) );
		}else{
			delete_woocommerce_term_meta($term_id,  'dtwpb_product_cat_custom_page_child');
		}

		if(!empty($_POST['dtwpb_product_tag_custom_page'])){
			update_woocommerce_term_meta( $term_id, 'dtwpb_product_tag_custom_page', absint( $_POST['dtwpb_product_tag_custom_page'] ) );
		}else{
			delete_woocommerce_term_meta($term_id,  'dtwpb_product_tag_custom_page');
		}
	}

	public function add_product_tag_fields(){
		?>
		
		<div class="form-field">
			<label for="dtwpb_product_tag_custom_page"><?php esc_html_e( 'WooCommerce Page Builder Archive Template', 'dt_woocommerce_page_builder' ); ?></label>
			<?php 
			$archive_type = dtwpb_get_option('dtwpb_cat_tpl_type_page', 'dtwpb_cat_tpl');
			$post_type_object = get_post_type_object($archive_type);
			$label = $post_type_object->label;
				
			$posts = get_posts(array('post_type'=> $archive_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
			echo '<select name="dtwpb_product_tag_custom_page" id="dtwpb_product_tag_custom_page" class="enhanced chosen_select_nostd" data-placeholder="'.esc_attr__( 'Select a Produc Archive template&hellip;','dt_woocommerce_page_builder').'">';
			echo '<option value="">'. esc_html__( 'None','dt_woocommerce_page_builder') . '</option>';
			foreach ($posts as $post) {
				echo '<option value="'. $post->ID .'">'. $post->post_title. '</option>';
			}
			echo '</select>';
			?>
			<p class="description"><?php echo sprintf( __( 'Select a Produc Archive template for Product Tag page or %sCreate new%s template.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type='.$archive_type ) ) . '" target="_blank">', '</a>' ); ?></p>
		</div>
		<div class="form-field">
			<br/>
		</div>
		<?php
	}

	public function edit_product_tag_fields( $term, $taxonomy ) {
		
		$dtwpb_product_tag_custom_page = get_woocommerce_term_meta( $term->term_id, 'dtwpb_product_tag_custom_page', true );

		?>
		
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'WooCommerce Page Builder Archive Template', 'dt_woocommerce_page_builder' ); ?></label></th>
			<td>
				<?php 
				$archive_type = dtwpb_get_option('dtwpb_cat_tpl_type_page', 'dtwpb_cat_tpl');
				$post_type_object = get_post_type_object($archive_type);
				$label = $post_type_object->label;
				$selected = absint($dtwpb_product_tag_custom_page);
				$posts = get_posts(array('post_type'=> $archive_type, 'post_status'=> 'publish,private', 'suppress_filters' => false, 'posts_per_page'=>-1));
				echo '<select name="dtwpb_product_tag_custom_page" id="dtwpb_product_tag_custom_page" class="enhanced chosen_select_nostd" data-placeholder="'.__( 'Select a Produc Archive template&hellip;','dt_woocommerce_page_builder').'">';
				echo '<option value="">'. __( 'None','dt_woocommerce_page_builder') . '</option>';
				foreach ($posts as $post) {
					echo '<option value="'. $post->ID .'"'. ($selected == $post->ID ? ' selected="selected"' : '') .'>'. $post->post_title. '</option>';
				}
				echo '</select>';
				?>
				<p class="description"><?php echo sprintf( __( 'Select a Produc Archive template for Product Tag page or %sCreate new%s template.', 'dt_woocommerce_page_builder' ), '<a href="' . esc_url( admin_url( 'post-new.php?post_type='.$archive_type ) ) . '" target="_blank">', '</a>' ); ?></p>
			</td>
			
		</tr>
		<?php
	}
	
	// End Class
}
