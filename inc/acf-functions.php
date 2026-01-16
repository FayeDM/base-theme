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

        $block_folders = glob( $blocks_dir . '/*', GLOB_ONLYDIR );

        foreach ( $block_folders as $block_path ) {
            $folder_name = basename( $block_path );

            if ( preg_match('/^[_\.]/', $folder_name) ) continue;

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
 * Filters the list of allowed block types in the block editor.
 *
 * This function restricts the available block types to the ones we want to be available.
 * It appends our custom ACF blocks.
 * More blocks can be added as needed, see:
 * https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
 *
 * @param array|bool $allowed_block_types Array of block type slugs, or boolean to enable/disable all.
 * @param object     $block_editor_context The current block editor context.
 *
 * @return array The array of allowed block types.
 */
function think_shift_allowed_block_types( $allowed_block_types, $block_editor_context ) {

	$allowed_block_types = array(
    'core/paragraph',
    'core/image',
    'core/heading',
    'core/quote',
    'core/list',
    'core/separator',
    'core/pullquote',
    'core/code',
    'core/html',
    'core/spacer',
    'core/file',    
    'core/cover',
    'core/column',
    'core/columns',  
    'core/video',
    'core/audio',
    'core/group',
    'core/cover',
    'core/media-text',
    'core/details'
	);

    $blocks_dir = get_template_directory() . '/src/blocks';

    $enable_sample_block = false; // toggle to enable sample block

    $block_folders = glob( $blocks_dir . '/*', GLOB_ONLYDIR );

    foreach ( $block_folders as $block_path ) {
        $folder_name = basename( $block_path );

        if ( preg_match('/^[_\.]/', $folder_name) ) continue;

        if ( $folder_name === 'sample' && ! $enable_sample_block ) {
            continue;
        }

        $block_json = $block_path . '/block.json';
        if ( file_exists( $block_json ) ) {
            // Read block.json to get the block name
            $block_data = json_decode( file_get_contents( $block_json ), true );
            if ( isset( $block_data['name'] ) && ! in_array( $block_data['name'], $allowed_block_types, true ) ) {
                $allowed_block_types[] = $block_data['name'];
            }
        }
    }

	return $allowed_block_types;
}
add_filter( 'allowed_block_types_all', 'think_shift_allowed_block_types', 10, 2 );



/**
 * Append color classes for an ACF block.
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

