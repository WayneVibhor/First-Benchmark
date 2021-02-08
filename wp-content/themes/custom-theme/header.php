<!DOCTYPE HTML>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <title><?php wp_title('');?></title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <?php wp_head();?>
</head>
<body <?php body_class();?>>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
        <?php if(get_field('site_logo','option')){?>
          <img src="<?php echo get_field('site_logo','option');?>" style="width:250px;height:100px;">
        <?php }
            else{ ?>
            <h1><a href="<?php bloginfo('url'); ?>">Custom<span class="logo_colour">style_purple</span></a></h1>
            <h2>Simple. Custom Theme.</h2>
        <?php } ?>
          </div>
        </div>
        <?php
            wp_nav_menu(array(
                'menu'              => "primary_menu",
                'menu_id'           => "menu", 
                'container_id'      => "menubar"
            ) );
        ?>

              <?php if(class_exists("WooCommerce")):?>
                <?php if(is_user_logged_in()):?>
        <a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id"));?>" class="btn btn-primary">My account</a>
        <a href="<?php echo wp_logout_url(get_permalink(get_option("woocommerce_myaccount_page_id")));?>" class="btn btn-danger">Logout</a>
        <?php 
         else:?>
         <a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id"));?>" class="btn btn-primary">Login / Register</a>
         <?php  endif;?>

        <a  href="<?php echo wc_get_cart_url();?>"class="btn btn-primary"> 
              Cart(<span class="items-count"><?php echo WC()->cart->get_cart_contents_count();?></span>)
        </a>
              <?php endif;?>      
    </div> 
    <div id="site_content" style="margin-top: 40px;margin-bottom: 40px;">