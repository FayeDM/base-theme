<?php
// footer.php
?>

    <footer class="site-footer is-layout-constrained">
        <div class="alignwide">
            <div class="footer-left">
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
            <div class="footer-right">
               Logo / Contact / Social Media
            </div>
            <div class="footer-copyright">
                Copyright
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>
