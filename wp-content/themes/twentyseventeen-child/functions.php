<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//external-css
function my_scripts() {
	wp_enqueue_style('owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css');
	wp_enqueue_script( 'owl-js','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'jquery' ),'',true );
	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
	wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
	wp_enqueue_style('custom-css',get_stylesheet_directory_uri().'/assets/css/custom.css');
	wp_enqueue_script( 'custom-js',get_stylesheet_directory_uri().'/assets/js/custom.js', array( 'jquery' ),'',true );
	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style('slick-css',get_stylesheet_directory_uri().'/assets/css/slick.css');
	wp_enqueue_script( 'slick-js',get_stylesheet_directory_uri().'/assets/js/slick.js', array( 'jquery' ),'',true );
	wp_enqueue_style('slick-theme-css',get_stylesheet_directory_uri().'/assets/css/slick-theme.css');
	wp_enqueue_script( 'slick-init-js',get_stylesheet_directory_uri().'/assets/js/slick-init.js', array( 'jquery' ),'',true );
	wp_enqueue_script( 'slick-min-js',get_stylesheet_directory_uri().'/assets/js/slick.min.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

//custom-logo
function themename_custom_logo_setup() {
	$defaults = array(
	'height'      => 100,
	'width'       => 382,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

   //add menus
   function wpb_custom_new_menu() {
	register_nav_menus(
	  array(
		'main-menu' => __( 'My Main Menu' )
	  )
	);
  }
  add_action( 'init', 'wpb_custom_new_menu' );

  //options page
  if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'menu_slug' 	=> 'footer-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Top Header Settings',
		'menu_title'	=> 'Top Header Settings',
		'menu_slug' 	=> 'top-header-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
}

//register custom post type
function my_custom_post_testimonial() {
	$labels = array(
	  'name'               => _x( 'Testimonials', 'post type general name' ),
	  'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
	  'add_new'            => _x( 'Add New ', 'book' ),
	  'add_new_item'       => __( 'Add New Testimonial' ),
	  'edit_item'          => __( 'Edit Testimonial' ),
	  'new_item'           => __( 'New Testimonial' ),
	  'all_items'          => __( 'All Testimonials' ),
	  'view_item'          => __( 'View Testimonial' ),
	  'search_items'       => __( 'Search Testimonials' ),
	  'not_found'          => __( 'No Testimonial found' ),
	  'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
	  'menu_name'          => 'Testimonials'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds our Testimonials specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title','thumbnail','page-attributes'),
	  'has_archive'   => true,
	);
	register_post_type( 'testimonial', $args ); 
  }
  add_action( 'init', 'my_custom_post_testimonial' );



  //Dashboard API
  function add_dashboard_widget()
  {
	  wp_add_dashboard_widget("sitepoint", "Dashboard  API", "display_sitepoint_dashboard_widget");
  }
  
  function display_sitepoint_dashboard_widget()
  {
	  echo "<p style='color:red'>Dashboard API content</p>";
  }
  
  add_action("wp_dashboard_setup", "add_dashboard_widget");