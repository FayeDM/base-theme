<?php
/**
 * Theme Header
 *
 * Outputs the document <head> and site header.
 *
 * @package ThinkShift
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header is-layout-constrained">
        <div class="site-header__content alignwide">
            <div class="logo">
                logo
            </div>
            <div class="navigation">
                <?php if ( has_nav_menu( 'utility_menu' ) ) { ?>
                    <nav class="nav nav--utility" aria-label="Utility">
                        <?php
                            wp_nav_menu([
                                'theme_location' => 'utility_menu',
                                'container'      => 'false',            
                                'menu_class'     => 'nav-menu',   
                                'depth'          => 1,              
                                'fallback_cb'    => false, 
                            ]);
                        ?>
                    </nav>
                    <?php } ?>
                <?php if ( has_nav_menu( 'main_menu' ) ) { ?>
                    <nav class="nav nav--main" aria-label="Main">
                        <?php
                            wp_nav_menu([
                                'theme_location' => 'main_menu',
                                'container'      => 'false',            
                                'menu_class'     => 'nav-menu',   
                                'depth'          => 1,              
                                'fallback_cb'    => false, 
                            ]);
                        ?>
                    </nav>
                <?php } ?>
            </div>
        </div>
    </header>