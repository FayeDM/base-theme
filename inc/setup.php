<?php
/**
 * Setup theme
 *
 * @package BlockTheme
 */

namespace BlockTheme\Setup;

/**
 * Setup theme
 */
function theme_setup() {
	/**
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on 'think-shift', use a find and replace
	* to change 'think-shift' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'think-shift', get_template_directory() . '/languages' );

	/**
	 * Remove support for the core block pattern library.
	 *
	 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#disabling-the-default-block-patterns
	 */
	remove_theme_support( 'core-block-patterns' );

	add_theme_support('wp-block-styles');        // Enables core block styles
	add_theme_support('editor-styles');          // Allows editor styles to be loaded
	add_theme_support('align-wide');             // Wide / full alignment
	add_theme_support('responsive-embeds');     // Responsive embeds
	add_theme_support('experimental-link-color'); // optional, newer features
	add_theme_support('editor-font-sizes');     // optional, only if defining font sizes
	add_theme_support('custom-line-height');    // optional, for line heights
	add_theme_support('custom-spacing');        // optional, for spacing

	// Enable editor styles so theme.json and editor CSS work
	add_theme_support('editor-styles');

	// Enqueue your editor CSS
	add_editor_style('css/editor.css'); // adjust path if needed

}
add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );


/**
 * Removes Block Theme Design in Admin
 */
add_action( 'admin_menu', function() {
    remove_submenu_page( 'themes.php', 'site-editor.php' );
} );
add_action( 'admin_bar_menu', function($wp_admin_bar) {
    $wp_admin_bar->remove_node( 'site-editor' );
}, 250 );
add_action( 'admin_init', function() {
    global $pagenow;
    if ( 'site-editor.php' === $pagenow ) {
        wp_safe_redirect( admin_url() );
        exit();
    }
} );

/**
 * Custom login logo
 */
function custom_login_logo() {

	$colors    = wp_get_global_styles( array( 'color' ) );
	$variables = wp_get_global_stylesheet( array( 'variables' ) );
	?>

	<style type="text/css">
		<?php echo esc_html( $variables ); ?>
		body.login {
			background-color: <?php echo esc_attr( $colors['background'] ); ?>;
			color: <?php echo esc_attr( $colors['text'] ); ?>;
		}

		<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		// We have a logo. Logo is go.
		if ( $custom_logo_id ) :
			$image = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
			?>
			#login h1 a, .login h1 a {
				background-image: url(<?php echo esc_attr( $image[0] ); ?>);
				height:<?php echo esc_attr( $image[2] ); ?>px;
				width:<?php echo esc_attr( $image[1] ); ?>px;
				max-width: 100%;
				background-size: <?php echo esc_attr( $image[1] ); ?>px <?php echo esc_attr( $image[2] ); ?>px;
				background-repeat: no-repeat;
				padding-bottom: 30px;
			}
		<?php endif; ?>

	</style>
	<?php
}
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\custom_login_logo' );


/**
 * Replace login logo link to homepage
 */
function custom_login_link() {
	return home_url();
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\custom_login_link' );

/**
 * Create Default Menus.
 */
function think_shift_register_menus() {
    register_nav_menus([
        'main_menu' => __('Main Menu', 'think-shift'),
        'utility_menu' => __('Utility Menu', 'think-shift'),
		'footer_menu' => __('Footer Menu', 'think-shift'),
		'legal_menu' => __('Legal Menu', 'think-shift'),
    ]);
}
add_action('after_setup_theme', __NAMESPACE__ . '\think_shift_register_menus');