<?php 
/**
 * Plugin Name:       Custom Page
 * Description:       A plugin that creates a Custom Page.
 * Version:           1.10.3
 * Author:            Wayne Vibhor
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-page
 */

 //Add Admin Menu
add_action( 'admin_menu', 'custom_page_info_menu' );  
function custom_page_info_menu(){    
	$page_title = 'Custom Page';
	$menu_title = 'Custom Page';   
	$capability = 'manage_options';   
	$menu_slug  = 'custom-page';   
	$function   = 'custom_page_function';   
	$icon_url   = 'dashicons-palmtree';   
	$position   = 10;    
	add_menu_page( $page_title,$menu_title,$capability,$menu_slug,$function,$icon_url,$position );
 }

 //Activate Function
 function plugin_custompage_activate(){
	$new_page_title = 'Events';
	$new_page_content = 'This is your page content that automatically gets inserted into the Events page!';
	global $page_check;
	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		wp_insert_post($new_page);
	}
}
register_activation_hook(__FILE__, 'plugin_custompage_activate');


 //Deactivate Function
 function plugin_custompage_deactivate()
 {
	 wp_delete_post($page_check->ID); 
 }
 register_deactivation_hook(__FILE__,'plugin_custompage_deactivate');





 if(!function_exists('custom_page_function')){
	function custom_page_function(){
		echo 'custom page';
		//$page_check = get_page_by_title('Events');
		print_r($page_check);
		


	}




 }


