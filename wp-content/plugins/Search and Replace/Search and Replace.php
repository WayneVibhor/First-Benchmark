<?php 
/**
 * Plugin Name:       Search and Replace
 * Description:       A plugin that will Replace the text from the Post & Pages.
 * Version:           1.10.3
 * Author:            Wayne Vibhor
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       search-and-replace
 */

 //Add Admin Menu
add_action( 'admin_menu', 'extra_post_info_menu' );  
function extra_post_info_menu(){    
	$page_title = 'Search and Replace';
	$menu_title = 'Search & Replace';   
	$capability = 'manage_options';   
	$menu_slug  = 'search-and-replace';   
	$function   = 'search_and_replace';   
	$icon_url   = 'dashicons-code-standards';   
	$position   = 99;    
	add_menu_page( $page_title,$menu_title,$capability,$menu_slug,$function,$icon_url,$position );
 }
 //Activate Function
function plugin_activate()
{
	do_action('admin_menu');
	 function my_theme_add_styles() 
	{
		wp_register_style('custom-plugin-css', plugins_url('/assets/css/custom-plugin-css.css',__FILE__ ));
		wp_enqueue_style('custom-plugin-css');
	}
	add_action('wp_enqueue_scripts', 'my_theme_add_styles');
}

 register_activation_hook(__FILE__,'plugin_activate');


 //Deactivate Function
 function plugin_deactivate()
 {
	add_action('wp_enqueue_style', 'my_theme_remove_styles');
	function my_theme_remove_styles()
	{
	wp_dequeue_style( 'custom-plugin-css');
	}
 }
 register_deactivation_hook(__FILE__,'plugin_deactivate');


 //Uninstall Function
 function plugin_uninstall(){

 }
 register_uninstall_hook(__FILE__,'plugin_uninstall');


 if( !function_exists("search_and_replace") ) 
 	{ 
	 function search_and_replace()
	 { ?> 
		<h1>Search and Replace</h1> 
		<form id="searchform" method="post">
			<table>   
				<tbody>
				<tr><input type="text" name="search" placeholder="Search"></tr>
				<tr><input type="text" name="replace" placeholder="Replace"></tr>
				<tr>
					<td><input class="pref"  name="search_item" type="radio" value="Posts" />Posts</td>				
				</tr>
				<tr>
					<td><input class="pref" name="search_item" type="radio" value="Pages" />Pages</td>				
				</tr>
				<tr>
					<td><input class="pref" name="search_item" type="radio" value="Posts-and-pages" />Posts and Pages</td>				
				</tr> 
				<tr>
				<td><input type="submit" value="Search & Replace"></td>
				</tr>
				</tbody>
			</table>
		</form>

		<?php 
		if (!empty($_POST['search']) && !empty($_POST['replace'])) {
			$term = $_POST['search'];
			$replace = $_POST['replace'];
			$search_item = $_POST["search_item"];
			$count=0; 
			global $wpdb;
			$posts_table=$wpdb->prefix."posts";
			if($search_item=="Posts")
			{
			$posts_types = $wpdb->get_results("SELECT * FROM $posts_table WHERE post_type='post'");
				foreach ($posts_types as $posts_type)
				{
					if (strpos($posts_type->post_content, $term) !== false) 
						{
							$wpdb->query($wpdb->prepare("update $posts_table set post_content = replace(post_content,'$term','$replace') WHERE post_type='post'"));
							// $sql_query = "update $posts_table set post_content = replace(post_content,'$term','$replace')";      
							// $all = $wpdb->get_results($sql_query);               
							$count++;
						}
				}
			}
			else if($search_item=="Pages")
			{
				$posts_types = $wpdb->get_results("SELECT * FROM $posts_table  WHERE post_type='page'");
				foreach ($posts_types as $posts_type)
				{
					if (strpos($posts_type->post_content, $term) !== false) 
						{
							$wpdb->query($wpdb->prepare("update $posts_table set post_content = replace(post_content,'$term','$replace') WHERE post_type='page'"));
							// $sql_query = "update $posts_table set post_content = replace(post_content,'$term','$replace')";      
							// $all = $wpdb->get_results($sql_query);               
							$count++;
						}
				}
			}
			else if($search_item=="Posts-and-pages")
			{
				$posts_types = $wpdb->get_results("SELECT * FROM $posts_table  WHERE post_type='page' OR post_type='post'");
				foreach ($posts_types as $posts_type)
				{
					if (strpos($posts_type->post_content, $term) !== false) 
						{
							$wpdb->query($wpdb->prepare("update $posts_table set post_content = replace(post_content,'$term','$replace') WHERE post_type='page' OR post_type='post'"));
							// $sql_query = "update $posts_table set post_content = replace(post_content,'$term','$replace')";      
							// $all = $wpdb->get_results($sql_query);               
							$count++;
						}
				}
			}
			if($count>0)
			{
				echo '<span style="color:red;"><b>'.$term.'</b></span> found in '.$count.' '. $search_item.' and replaced by <span style="color:green;"><b>'.$replace.'</b></span>';
				// echo $all;      
			}
			else
			{
				echo 'No Search Results found';
			}
		}
		else
		{
			echo 'Please enter Search and Replace fields';
		}
	} 
}
	


	
	