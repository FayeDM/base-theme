<?php
/**
 * Button Block
 * 
 *
 * @param array $block The block settings and attributes.
 * 
 */

// Block ID will use the anchor if available, if not it will auto generate
$block_id = ! empty( $block['anchor'] ) ? esc_attr( $block['anchor'] ) : esc_attr( $block['id'] );

// Each block should have a class of block, then block--TYPE
$classes = 'block block--testimonial';

// Applies WP classes
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

// Append theme.js color palette
$classes .= think_shift_get_color_classes( $block );

?>

<div id="<?php echo $block_id; ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php 
    $quote = get_field( 'quote' );
    $name = get_field ( 'cite_name' ) ;
    $byline = get_field ( 'cite_byline' ) ;
    $img_id = get_field ( 'image' );
    ?>

    <figure>
        <?php if ( ! empty( $img_id ) ) : ?>
            <div class="testimonial__image">
                <?php echo wp_get_attachment_image( $img_id, $size = 'thumb' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $quote ) ) : ?>
            <blockquote>
                <?php echo wp_kses_post( $quote ); ?>
            </blockquote>
        <?php endif; ?>
        
        <?php if ( ! empty( $name ) ) : ?>    
            <figcaption>
                <cite>
                    <?php echo esc_html( $name ); ?> 
                    <?php if ( ! empty( $byline ) ) : ?>
                        <span><?php echo esc_html( $byline ); ?></span>
                    <?php endif; ?>
                </cite>
            </figcaption>
        <?php endif; ?>

    </figure>
</div>