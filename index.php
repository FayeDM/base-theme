<?php
/**
 * The main index template file.
 * Duplicate and rename as a starting point for pages, singles, and archives.
 * Alternatively, write conditionals here to choose alternative content parts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Think Shift
 */

get_header(); 
?>

<main id="main-content" class="is-layout-constrained">

<?php

    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'templates/content', '' );
        endwhile;
    endif;

    ?>

</main>   

<?php
get_footer(); 
?>
