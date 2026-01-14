<?php
// footer.php
?>

        </div><!-- .site-container -->
    </main><!-- .site-main -->

    <footer class="site-footer is-layout-constrained">
        <div class="site-container site-footer__content">
            <div class="site-footer__left">
                <?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
                    <nav class="nav nav--footer" aria-label="Footer">
                        <?php
                            wp_nav_menu([
                                'theme_location' => 'footer_menu',
                                'container'      => 'false',            
                                'menu_class'     => 'nav-menu',   
                                'depth'          => 1,              
                                'fallback_cb'    => false, 
                            ]);
                        ?>
                    </nav>
                <?php } ?>
                <?php if ( has_nav_menu( 'legal_menu' ) ) { ?>
                    <nav class="nav nav--legal" aria-label="Legal">
                        <?php
                            wp_nav_menu([
                                'theme_location' => 'legal_menu',
                                'container'      => 'false',            
                                'menu_class'     => 'nav-menu',   
                                'depth'          => 1,              
                                'fallback_cb'    => false, 
                            ]);
                        ?>
                    </nav>
                <?php } ?> 
            </div>
            <div class="site-footer__right">
               Logo </br> Contact </br> Social Media
            </div>
            <div class="site-footer__copyright">
                <?php echo date("Y"); ?> &copy; <?php the_field( 'copyright_line', 'option' ); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>
