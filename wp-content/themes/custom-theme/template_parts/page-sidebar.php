 <?php
    if ( have_posts() ) : while ( have_posts() ): the_post(); ?>

<div id="content">
    <div id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <div class="post-excerpt"><?php the_content(); ?></div>
    </div>
</div>
    <?php get_sidebar();?>
<?php endwhile;
    endif;
 ?>
