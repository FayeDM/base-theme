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


$classes .= ' block--inner-' . get_field( 'align' );


// Append theme.js color palette
$classes .= think_shift_get_color_classes( $block );

?>

<div id="<?php echo $block_id; ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php 
    
    $link = get_field( 'button' );
    $srt = get_field( 'screen_reader_text' );
    $style = 'btn btn--' . get_field( 'style' );
     if( $link ): 
        get_template_part(
            'partials/part',
            'link',
            [
                'link_text'             	=> $link['title'],
                'link_url'              	=> $link['url'],
                'link_target'	            => $link['target'] ?? '_self',
                'link_screen_reader_text'	=> $srt,
                'link_classes'	            => $style
            ]
        );
     endif;
    ?>


</div>