<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
<?php if (get_field('banner_image')):
	$align=get_field('banner_image_alignment');?>
	<div class="banner-slide-wrapper">
		<div class="MainBannerOverlay"></div>
		<div class="banner-content" style="<?php if($align == 'right') echo "right: 11.81%;text-align: right;"; else echo "text-align: left"; ?>">
    		<div class="banner-content-inner">
			<?php if (get_field('banner_heading')):?>
				<h1><?php echo get_field('banner_heading');?></h1>
			<?php endif;?>
			<?php if (get_field('banner_description')):?>
				<p ><strong><?php echo get_field('banner_description');?></strong></p>
			<?php endif;
				$link = get_field('button1');
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];?>
				<a href="<?php echo $link_url;?>" target="" tabindex="0"><?php echo $link_title;?></a>	
				<?php endif;?>
			</div>                
		</div>
		<img src="<?php  the_field('banner_image'); ?>" alt="We Are Essential Service" class="lazyloaded" data-ll-status="loaded">
	</div>
<?php endif;?>
	<section class="request-quote-section">
   		<div class="request-quote-inner">
		   <?php if (get_field('heading1')):?>
			<h2><?php echo get_field('heading1');?></h2>
		   <?php endif;?>
			<?php $link1 = get_field('first_button');
					$link_url1 = $link1['url'];
					$link_title1 = $link1['title']; 			
			if ($link1):?>
				<a href="<?php echo $link_url1;?>"><?php echo $link_title1;?></a>
			<?php endif;?>

			<?php $link2 = get_field('second_button');
					$link_url2 = $link2['url'];
					$link_title2 = $link2['title']; 
			if ($link2):?>
				<a href="<?php echo $link_url2;?>"><?php echo $link_title2;?></a>
			<?php endif;?>
    	</div>    
	</section>
	<section class="quick-links-section">       
        <div class="grid-container">
		<?php if(have_rows('single_grid')):  ?>
           <div class="row">
			   <?php while (have_rows('single_grid')):the_row();?>
            	<div class="col-md-4 quick-link-grid">
               		<div class="quick-link-grid-inner">
						<div class="home-link-icon">
							<img src="<?php the_sub_field('image');?>" alt="Business" class="lazyloaded" data-ll-status="loaded">
						</div>
						<div class="home-link-content">
							<h3 class="home-link-title"><?php the_sub_field('heading');?></h3>
							<div class="eqheight" style="height: 156px;">
								<p><?php the_sub_field('description');?></p>
							</div>
							<?php 
							$link = get_sub_field('button');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
							?>
							<a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif;?>
                        </div>
        			</div>							    	
				</div>
				<?php endwhile;?>					    	
			</div> 
		<?php endif;?>               
        </div>   
	</section>
	<section class="about-us-sec hidden-xs rocket-lazyload lazyloaded" style="<?php if( get_field('background_image') ): ?>background-image: url('<?php the_field('background_image');?>');<?php endif;?>">
		<?php $align=get_field('text_alignment');?>
		<div class="about-us-sec-content" style="padding-left: <?php if($align=='left') echo '11.875%'; else echo '61.875%; text-align:right;';?>;">
			<div class="about-us-sec-content-inner">
			<?php if( get_field('heading2') ): ?><h2><?php the_field('heading2');?></h2><?php endif;?>
			<?php if( get_field('description2') ): ?><p><?php the_field('description2');?></p><?php endif;?>
			<?php $button=get_field('button'); if($button): ?><a class="BtnLearnMore" href="<?php echo $button['url'];?>"><?php echo $button['title'];?></a><?php endif;?>
			</div>
		</div>
	</section>

	<section class="home-bottom-box">
           <div class="container-fluid">
               <div class="home-bottom-box-inner">
				<?php if( have_rows('second_grid') ): ?>
				   <div class="row" >
					   <?php while(have_rows('second_grid')):the_row();?>
						<div class="col-lg-4 col-md-6 col-sm-6 bottom-box-grid">
							<div class="bottom-box-grid-inner">
								<div class="bottom-box-img-wrapper rocket-lazyload lazyloaded" style="background-image: url(&quot;<?php echo get_sub_field('image');?>&quot;);" alt="Garden-Ville" class="lazyloaded" data-ll-status="loaded"><img src="http://texas.local/texas/wp-content/uploads/2020/11/bottom-box-placehodler.jpg" alt="Garden-Ville" class="lazyloaded" data-ll-status="loaded">
										<h2><?php echo get_sub_field('title');?></h2>	                       
								</div>
								<div class="bottom-box-content">
									<div class="bottom-box-content-inner">
										<h2><?php echo get_sub_field('title');?></h2>	 	
										<p><?php echo get_sub_field('content');?></p>
										<?php $button=get_sub_field('button'); if($button):?>
										<a href="<?php echo $button['url'];?>" target="_blank"><?php echo $button['title'];?></a><?php endif;?>
									</div>
								</div>
							</div>
						</div>
					   <?php endwhile;?>
					</div>    
			   <?php endif;?>        
                </div>
            </div>
		</section>
		<section class="testimonial_container">
		<?php
		$args=array('post_type'=>'testimonial','orderby' => 'menu_order','order' => 'ASC','numberposts' => -1);
			$loop=new WP_Query($args);
			if($loop->have_posts()):?>
				<div class="testimonial_title">
					<h2>What Our Customers Say</h2>
				</div>
				<div class="row" style="margin:0px;">
				<div class="slider slider-nav" style="width:100%">
				<?php while($loop->have_posts()):$loop->the_post();?>
				<div class="single-testimonial" style="background-image:url('<?php echo get_the_post_thumbnail_url();?>')">
				<div class="testimonial_wrapper row">
					<div class="testimonial_image col-sm-3">
						<img width="700" height="700" src="<?php the_field('image');?>"> 
					</div>
					<div class="testimonial_body col-sm-9">
						<div class="testimonial_copy">
							<?php echo the_field('testimonial'); ?>
						</div>
						<div class="testimonial_author">
							<p>-<?php echo the_field('name'); ?><br>
							<?php echo the_field('position'); ?></p>                                                                          
						</div>
					</div>
					</div>
				</div>
					<?php endwhile;?>
			</div>
			</div>
			<?php endif;?>
		</section>

  <div class="slider slider-for" style="display:none;">
    <div><h3>1</h3></div>
    <div><h3>2</h3></div>
    <div><h3>3</h3></div>
    <div><h3>4</h3></div>
    <div><h3>5</h3></div>
  </div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
