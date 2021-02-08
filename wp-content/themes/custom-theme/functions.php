<?php
//Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height' => 480,
    'width'  => 720,
) );
add_theme_support( 'post-thumbnails' );

//Custom Logo
function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

//Menus
function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'text_domain' ),
        'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
    ) );
    add_theme_support('woocommerce',array(
         "thumbnail_image_width" => 150, //set image size on archive product page
         "single_image_width" => 200,  //set image size on single-product page 
         "product_grid"  => array(
             "default_columns" => 10,
             "min_columns" => 3,
             "max_columns" => 3
         )
    ));
    //product thumbnail effect
    add_theme_support("wc-product-gallery-zoom");
    add_theme_support("wc-product-gallery-lightbox");
    add_theme_support("wc-product-gallery-slider"); 
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );

//Stylesheets and Scripts
function add_style_scripts()
{
    wp_enqueue_style('custom-style' , get_template_directory_uri(). '/assets/css/style.css');
}
add_action('wp_enqueue_scripts','add_style_scripts'); 

//add options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer Content',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sidebar',
		'menu_title'	=> 'Sidebar Content',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

//excerpt
function new_excerpt_more($more) {
    global $post;
    return '<br><a class="moretag" 
    href="'. get_permalink($post->ID) . '">Read More</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');

   function mytheme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

//include stylesheets
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//external-css
function my_scripts() {
	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
	wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


//woocommerce 


//Remove Postcode Validation
add_filter( 'woocommerce_checkout_fields' , 'remove_postcode_validation', 99 );

function remove_postcode_validation( $fields ) {

    unset($fields['billing']['billing_postcode']['validate']);
    unset($fields['shipping']['shipping_postcode']['validate']);
	return $fields;
}

// Display payment methods on shopping cart page
add_action( 'woocommerce_after_cart_totals', 'available_payment_methods' );
function available_payment_methods() {
echo '<div class="payment-methods-cart-page">
<img src="http://texas.local/texas/wp-content/uploads/2020/11/Payment_Options.jpg">
</div>
<div class="payment-methods-message">We accept the following payment methods</div>';
}

// Display trust badges on checkout page
add_action( 'woocommerce_review_order_after_submit', 'approved_trust_badges' );
function approved_trust_badges() {
echo '<div class="trust-badges">
<img src="http://texas.local/texas/wp-content/uploads/2020/11/110-1105590_more-payment-options-trust-badges-shopify-checkout.jpg">
</div>';
}

//Archive Page
//add container and row class
function open_container_row_div_classes(){
    echo "<div class='container owt-container'><div class='row owt-row'>";
}
add_action("woocommerce_before_main_content","open_container_row_div_classes",5);

function close_container_row_div_classes(){
    echo "</div></div>";
}
add_action("woocommerce_after_main_content","close_container_row_div_classes",5);

remove_action("woocommerce_sidebar","woocommerce_get_sidebar");





add_action("template_redirect","load_template_layout");
function load_template_layout(){

    if(is_shop()){
//add sidebar
add_action("woocommerce_before_main_content","open_sidebar_column_grid",6);
function open_sidebar_column_grid(){
    echo "<div class='col-sm-4'>";
}

add_action("woocommerce_before_main_content","woocommerce_get_sidebar",7 );
add_action("woocommerce_before_main_content","close_sidebar_column_grid",8);
function close_sidebar_column_grid(){
    echo "</div>";
}

add_action("woocommerce_before_main_content","open_product_column_grid",9);
function open_product_column_grid(){
    echo "<div class='col-md-8'>";
}
add_action("woocommerce_before_main_content","close_product_column_grid",10);
function close_product_column_grid(){
    echo "</div>";
}

    }  
}
//Hide Page Title
add_filter( 'woocommerce_show_page_title', 'toggle_page_title' );
function toggle_page_title($val){
    $val = false;
    return $val;
}

add_action("woocommerce_after_shop_loop_item_title","the_excerpt");

//Remove Breadcrumb
//remove_action("woocommerce_before_main_content","woocommerce_breadcrumb",20); 

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
        <span class="items-count"><?php echo WC()->cart->get_cart_contents_count();?></span>
	<?php
	$fragments['span.items-count'] = ob_get_clean();
	return $fragments;
}


//Add additional field to theme customsier
//For text below footer copyright
function simple_theme_customiser($wp_customsize)
{
    //First
    //adding section
    $wp_customsize->add_section("sec_copyright",array(
        "title" => "Copyright Section",
        "description"  => "This is a copyright section"
    ));    
    //adding settings
    $wp_customsize->add_setting("set_copyright",array(
        "type" => "theme_mod", 
        "default" => "",
        "sanitize_callback" => "sanitize_text_field"
    ));
    //add control
    $wp_customsize->add_control("set_copyright",array(
        "label" => "Copyright",
        "description" => "Please fill the copyright",
        "section"  => "sec_copyright",
        "type" => "text"
    ));
    //Second
     //adding settings
     $wp_customsize->add_setting("set_year_copyright",array(
        "type" => "theme_mod", 
        "default" => "",
        "sanitize_callback" => "sanitize_text_field"
    ));
    //add control
    $wp_customsize->add_control("set_year_copyright",array(
        "label" => "Copyright Year",
        "description" => "Please fill the copyright Year",
        "section"  => "sec_copyright",
        "type" => "text"
    ));
}
add_action('customize_register','simple_theme_customiser');

add_action( 'wp_enqueue_scripts', 'coaches_enqueue_scripts' );
function coaches_enqueue_scripts() {
wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js' );
}


