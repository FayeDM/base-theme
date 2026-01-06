<?php
/**
 * Sample Block
 * 
 * This block can be used as a template for a new block folder, replacing names and content as needed.
 * 
 * This block is unregistered by default, but can be seen in the admin
 * Set $enable_sample_block value to "true" in acf-functions.php 
 * Disable before production
 *
 * @param array $block The block settings and attributes.
 * 
 */

// Block ID will use the anchor if available, if not it will auto generate
$block_id = ! empty( $block['anchor'] ) ? esc_attr( $block['anchor'] ) : esc_attr( $block['id'] );

// Each block should have a class of block, then block--TYPE
$classes = 'block block--sample';

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

    <h2>Sample Block</h2>

    <p>This block demonstrates the capabilities of acf within Gutenberg, and provides a living example for developers to template from.</p>

    <?php if( is_admin() ) : ?>
        <div class="acf-notes">
            This message is editor-only and won’t appear on the front end. It will not show in the "edit" mode of an ACF block, but it will show in the preview. Use notes like these to provide extra context or instructions. Content instructions should go within the ACF block's editing view, unless it pertains to a InnerBlocks area.
        </div>
    <?php endif; ?>


    <InnerBlocks class="acf-innerblocks" />

    <?php if( is_admin() ) : ?>
        <div class="acf-notes">
            InnerBlocks, seen above, is an area within ACF that permits adding other blocks. Additional styling helps identify the InnerBlock space, since it can be difficult to see. InnerBlocks is extendable and has several properties for adding templates, block restriction, and more.
            <br/>
            Note, there can only be <strong>one</strong> InnerBlocks section per ACF block.
        </div>
    <?php endif; ?>

    <p>WordPress block.json offers a wide range of additional supports, including styles. Meanwhile, ACF field groups can be assigned per block, and blocks can be assigned to pages and posts, or to other conditions, making custom blocks easily usable across the entire post type system. Within these block templats, ACF functions as normal.
    </p>

    <p><strong>Resources</strong></p>

    <ul>
        <li><a href="https://www.advancedcustomfields.com/resources/extending-acf-blocks-with-block-supports/">Extending ACF Block Supports</a></li>
        <li><a href="https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/">Json Block Meta</a></li>
        <li><a href="https://github.com/WordPress/gutenberg/blob/trunk/packages/block-editor/src/components/inner-blocks/README.md">InnerBlocks Git README</a></li>
        <li><a href="https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/nested-blocks-inner-blocks/">WP Resources for InnerBlocks</a></li>
    </ul>


</div>