<?php
/**
 * Content Block
 * 
 * This block is for holding a standard content section.
 *
 * @param array $block The block settings and attributes.
 * 
 */

// Block ID will use the anchor if available, if not it will auto generate
$block_id = ! empty( $block['anchor'] ) ? esc_attr( $block['anchor'] ) : esc_attr( $block['id'] );

// Each block should have a class of block, then block--TYPE
$classes = 'block block--content';

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

// Allowed blocks
$allowed_blocks = [
    'core/heading',
    'core/paragraph',
    'acf-block/button', // your ACF button block
];

// Template: preload InnerBlocks with a heading and a paragraph
$template = [
    ['core/heading', ['level' => 2]],
    ['core/paragraph', []],
    ['acf-blocks/button', []]
];

?>

<div id="<?php echo $block_id; ?>" class="<?php echo esc_attr( $classes ); ?>">

    <InnerBlocks 
        className="acf-innerblocks"
        allowedBlocks=<?php echo wp_json_encode( $allowed_blocks ); ?>
        template=<?php echo wp_json_encode( $template ); ?>
    />

</div>