<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.2
 */

?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-inner">
            <div class="row">
                <div class="col-md-3 footer-widget">
				<?php 
					$image = get_field('image','option');
					if($image){
					?>
                    <div class="footer-logo">
                        <img src="<?php the_field('image','option'); ?>" alt="texas-disposal" class="lazyloaded" data-ll-status="loaded"><noscript><img src="<?php the_field('image','option'); ?>" alt="texas-disposal" /></noscript>
					</div>
				<?php } ?> 
				<?php 
					$description = get_field('description','option');
					if($description){
					?>
					<div class="desc-sec">
						<p><?php the_field('description','option'); ?></p>
					</div>
					<?php } ?> 
                </div>
                <div class="col-md-6 footer-widget">
                    <div class="row">
                        <div class="col-md-3 footer-menu ">
						<?php  if( have_rows('links1','option') ):?>
                            <div class="menu-footer-menu-1-container">
								<ul id="menu-footer-menu-1" class="menu">
								<?php 
									while( have_rows('links1','option') ) : the_row();
									$link = get_sub_field('link','option');
									$link_url = $link['url'];
    								$link_title = $link['title'];
								?>
									<li class="menu-item "><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
						<?php endwhile;?>
								</ul>
							</div>
						<?php endif;?>                 
						</div>
                        <div class="col-md-4 footer-menu">
                            <?php  if( have_rows('links2','option') ):?>
                            <div class="menu-footer-menu-2-container">
								<ul id="menu-footer-menu-2" class="menu">
								<?php 
									while( have_rows('links2','option') ) : the_row();
									$link = get_sub_field('link','option');
									$link_url = $link['url'];
    								$link_title = $link['title'];
								?>
									<li class="menu-item "><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
						<?php endwhile;?>
								</ul>
							</div>
						<?php endif;?>                         
						</div>
                        <div class="col-md-5 footer-menu footer-menu3">
						<?php  if( have_rows('links3','option') ):?>
                            <div class="menu-footer-menu-3-container">
								<ul id="menu-footer-menu-3" class="menu">
								<?php 
									while( have_rows('links3','option') ) : the_row();
									$link = get_sub_field('link','option');
									$link_url = $link['url'];
    								$link_title = $link['title'];
								?>
									<li class="menu-item "><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
						<?php endwhile;?>
								</ul>
							</div>
						<?php endif;?>                     
						</div>
                    </div>
                </div>
                <div class="col-md-3 footer-widget">
				<?php  if( have_rows('icons','option') ):?>
					<div class="social-links">
								<ul id="menu-footer-menu-4" class="menu">
								<?php 
									while( have_rows('icons','option') ) : the_row();
								?>
								<li class="menu-item "><?php echo get_sub_field('icon','option');?></li>

								<?php endwhile;?>
										</ul>
									</div>
								<?php endif;?> 
					</div>
                </div>
            </div>
			<?php if (get_field('copyright_text','option')):?>
            <div class="footer-copyright-section">
				<p><?php echo get_field('copyright_text','option');?></p>    
            </div>
			<?php endif;?>
        </div>
		</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
