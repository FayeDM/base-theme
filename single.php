<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 */
 
get_header(); ?>
 
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            get_template_part( 'content/content-single', get_post_type() ); 

        endwhile;
    else :
        // Code for when no posts are found (e.g., a "not found" message)
    endif;
    ?>
 
<?php get_footer(); ?>