<?php
/**
 * Link Patial
 * 
 *  Expected variables passed via get_template_part:
 *  - $link_text
 *  - $link_url
 *  - $link_target
 *  - $link_screen_reader_text
 *  - $link_classes
 * 
 */
$link_text               = $args['link_text'] ?? '';
$link_url                = $args['link_url'] ?? '';
$link_target             = $args['link_target'] ?? '_self';
$link_screen_reader_text = $args['link_screen_reader_text'] ?? '';
$link_classes            = $args['link_classes'] ?? '';

$attr = [
    'class'      => $link_classes,
    'href'       => $link_url,
    'target'     => $link_target,
];

?>

<?php if ( ! empty( $link_text ) && ! empty( $link_url ) ) : ?>

    <a <?php think_shift_attr( $attr ); ?>>
        <?php echo esc_html( $link_text ); ?>
        <?php if ( $link_screen_reader_text ) : ?>
            <span class="screen-reader-text"><?php echo esc_html( $link_screen_reader_text ); ?></span>
        <?php endif; ?>
    </a>

<?php endif; ?>

