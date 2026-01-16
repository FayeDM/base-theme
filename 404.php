<?php
/**
 * The 404 Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Think Shift
 */

get_header(); 
?>

<main id="main-content" class="is-layout-constrained">
    <?php get_template_part( 'content/content', '404' ); ?>
</main>

<?php get_footer(); ?>