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
$classes = 'block block--btn';

// Applies WP classes
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

// Applies WP alignment classes
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];

}

// Append theme.js color palette
$classes .= think_shift_get_color_classes( $block );

?>

<div id="<?php echo $block_id; ?>" class="<?php echo esc_attr( $classes ); ?>">

    <?php 
    $link = get_field( 'button' );
    $srt = get_field( 'screen_reader_text' );
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a 
            class="btn <?php echo think_shift_style( $block ); ?>" 
            href="<?php echo esc_url( $link_url ); ?>" 
            target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo esc_html( $link_title ); ?>
                <?php if (! empty( $srt )) { ?>
                  <span class="always-visually-hidden"><?php echo esc_html( $srt ); ?></span>
                <?php } ?>
        </a>
    <?php endif; ?>

</div>