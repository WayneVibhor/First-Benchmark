<?php
get_header(); ?>
 <?php the_post(); ?>
<h2>Recent Articles</h2>
<ol><?php wp_get_archives('type=postbypost&limit=10'); ?></ol>
<h2>Archives by Month:</h2>
<ul><?php wp_get_archives('type=monthly'); ?></ul>
<h2>Archives by Category:</h2>
<ul><?php wp_list_categories(); ?></ul>
<?php get_footer(); ?>