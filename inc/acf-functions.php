<?php
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 * 
 */
if ( function_exists('acf_register_block_type') ) {

    function think_shift_register_acf_blocks() {
        /**
         * We register our block's with WordPress's handy
         * register_block_type();
         * while using
         * glob();
         * to automagically grab our acf blocks from the block folder
         *
         * @link https://developer.wordpress.org/reference/functions/register_block_type/
         */
        $blocks_dir = get_template_directory() . '/src/blocks';

        $enable_sample_block = true; // toggle to enable sample block

        $block_folders = glob( $blocks_dir . '/*', GLOB_ONLYDIR );

        foreach ( $block_folders as $block_path ) {
            $folder_name = basename( $block_path );

            if ( preg_match('/^[_\.]/', $folder_name) ) continue;

            if ( $folder_name === 'sample' && ! $enable_sample_block ) {
                error_log("Skipping registration of sample block.");
                continue;
            }

            $block_json = $block_path . '/block.json';
            if ( file_exists( $block_json ) ) {
                register_block_type( $block_path );
                error_log("Registered block folder: $folder_name");
            } else {
                error_log("Skipped block folder '$folder_name' — block.json not found.");
            }
        }
    }


add_action( 'init', 'think_shift_register_acf_blocks' );


} else {
    error_log('ACF Pro is not active — blocks were not registered.');
}

add_filter( 'block_categories_all', function( $categories ) {
    // Theme Blocks
    $categories[] = array(
        'slug'  => 'think-shift-theme-blocks',
        'title' => __( 'Custom Blocks', 'think-shift' ),
        'icon'  => 'admin-home',
    );

    return $categories;
}, 10, 2 );


/**
 * Append color classes for a block.
 *
 * @param array $block The ACF block array.
 * @return string Color classes string (space-prefixed).
 */
function think_shift_get_color_classes( $block ) {
    $color_classes = [
        'text'       => ['prefix' => 'has-text-color',       'suffix' => '-color',           'value' => $block['textColor'] ?? ''],
        'background' => ['prefix' => 'has-background',       'suffix' => '-background-color','value' => $block['backgroundColor'] ?? ''],
        'link'       => ['prefix' => 'has-link-color',       'suffix' => '-link-color',      'value' => $block['linkColor'] ?? ''],
        'link-hover' => ['prefix' => 'has-link-hover-color', 'suffix' => '-link-hover-color','value' => $block['linkHoverColor'] ?? ''],
    ];

    $classes = '';

    foreach ( $color_classes as $data ) {
        if ( $data['value'] ) {
            $classes .= " {$data['prefix']} has-{$data['value']}{$data['suffix']}";
        }
    }

    return $classes;
}
