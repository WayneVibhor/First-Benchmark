<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $announcement=get_field('announcement','option');
$display=get_field("display","option");?>
<div class="utility-nav" style="display:<?php if ($display=="yes")echo "block"; else echo "none";?>">
<marquee><p><?php echo get_field('announcement','option');?></p></marquee>
</div>
<header class="siteHeader">
<div class="container-header">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
	<?php if ( function_exists( 'the_custom_logo' ) ) {
 the_custom_logo();
}?>
    </div>
	<?php
wp_nav_menu( array( 
	'theme_location' => 'main-menu',
	'container_class' => 'custom-menu-class',
	'menu_class'      => 'nav navbar-nav navbar-right', ) ); 
?>
  </div>
</nav>
</div>

</header>



