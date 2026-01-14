<?php
/**
 * The template for displaying the post page
 *
 * @package WordPress
 */
 
get_header(); 

?>
 
<h1><?php echo single_post_title(); ?></h1>

    <?php
    if ( have_posts() ) :
        echo '<div class="cards">';
        while ( have_posts() ) :
            the_post();

            get_template_part( 'partials/card', '' ); 

        endwhile;
        echo '</div>';
        echo get_the_posts_pagination();

    else :
        // Code for when no posts are found (e.g., a "not found" message)
    endif;
    ?>
 
<?php get_footer(); ?>