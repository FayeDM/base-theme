<?php
// footer.php
?>

        </div><!-- .site-container -->
    </main><!-- .site-main -->

    <footer class="site-footer is-layout-constrained">
        <h2 class="visually-hidden">Footer Content</h2>
        <div class="site-container site-footer__content">
            <div class="site-footer__left">
                <h3>Quicklinks</h3>
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
               <h3>Contact</h3>
               <?php
                    $contact = get_field('contact_information', 'option'); 
                    if( $contact ): ?>
                       
                        <?php if ( !empty($contact['address']) ): ?>
                            <p class="contact__address"><?php echo wp_kses_post($contact['address']); ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($contact['phone_number']) ): ?>
                            <p class="phone_number"><?php echo esc_html($contact['phone_number']); ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($contact['phone_number_copy']) ): ?>
                            <p class="phone_number_copy"><?php echo esc_html($contact['phone_number_copy']); ?></p>
                        <?php endif; ?>
                        <?php if ( !empty($contact['fax']) ): ?>
                            <p class="contact__fax"><?php echo esc_html($contact['fax']); ?></p>
                        <?php endif; ?>

                        <?php if ( !empty($contact['email']) ): ?>
                            <p class="contact__email">
                                <a href="mailto:<?php echo esc_attr($contact['email']); ?>">
                                    <?php echo esc_html($contact['email']); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>

            </div>
            <div class="site-footer__copyright">
                <?php echo date("Y"); ?> &copy; <?php the_field( 'copyright_line', 'option' ); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>
