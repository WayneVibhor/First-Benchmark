<?php
get_header(); ?>

<?php if(get_field('include_sidebar')=='Yes'){
    get_template_part('/template_parts/page','sidebar');
}
else{ 
    if ( have_posts() ) : while ( have_posts() ): the_post(); ?>

    <div id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <div class="post-excerpt"><?php the_content(); ?></div>
    </div>
    <?php endwhile;
    endif;
}?>
<?php get_footer(); ?>