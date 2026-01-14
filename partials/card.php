<?php
/**
 * Card Partial
 * 
 */

$post_type = get_post_type();
$title = get_the_title();
$excerpt = wp_trim_excerpt();
$link = get_the_permalink(); 

?>
<div class="card card--<?php echo esc_attr( $post_type ); ?>">

    <?php if( ! empty( $title ) ) : ?>
        <h2><?php echo esc_html( $title ); ?></h2>
    <?php endif; ?>

    <?php if( ! empty( $excerpt ) ) : ?>
        <p><?php echo esc_html( $excerpt ); ?></p>
    <?php endif; ?>

    <?php if( ! empty( $link ) ) : ?>
        <a href="<?php echo esc_html( $link ); ?>">
            Read More
            <span class="visually-hidden"> about <?php echo esc_html( $title ); ?></span>
        </a>
    <?php endif; ?>

</div>
