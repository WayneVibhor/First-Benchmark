<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0 
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
?>
<form role="search"  method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $twentytwenty_unique_id ); ?>">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'twentytwenty' );?></span>
		<input type="search" id="<?php echo esc_attr( $twentytwenty_unique_id ); ?>" class="search-field form-control" placeholder="Search For..." value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<span class="input-group-btn">
        <button type="submit" class="search-submit btn btn-secondary">Go!</button>
    </span>
    <input type="hidden" value="product" name="post_type" id="post_type" />
</form>
