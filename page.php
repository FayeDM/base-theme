<?php
/**
 * Basic Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Think Shift
 */

get_header(); 
?>

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            get_template_part( 'content/content', '' ); 

        endwhile;
    else :
        // Code for when no posts are found (e.g., a "not found" message)
    endif;
    ?>

<?php get_footer(); ?>
