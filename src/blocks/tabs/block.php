<?php
/**
 * Tab Block
 * 
 *
 * @param array $block The block settings and attributes.
 * 
 */

// Block ID will use the anchor if available, if not it will auto generate
$block_id = ! empty( $block['anchor'] ) ? esc_attr( $block['anchor'] ) : esc_attr( $block['id'] );

// Each block should have a class of block, then block--TYPE
$classes = 'block block--tabs';

// Applies WP classes
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}

?>

<div id="<?php echo $block_id; ?>" class="<?php echo esc_attr( $classes ); ?>">

    <div class="tabs">
    
            <div role="tablist" class="automatic">
    
                <?php if( have_rows( 'tabs' ) ): ?>
                    <?php while( have_rows( 'tabs' ) ): the_row(); ?>
                        <?php	
                            $row      = get_row_index();
                            $tabindex = '';
                            $tab_id   = 'tab-' . $row;
                            $selected = 'false';
                            $controls = 'tabpanel-' . $row;
                            $tab_name = get_sub_field( 'tab_name' );
    
                            if ( 1 === $row ) {
                                $selected = 'true';
                                $tabindex = '-1';
                            }
    
                            $attr = [
                                'id'            => $tab_id,
                                'type'          => 'button',
                                'role'          => 'tab',
                                'aria-selected' => $selected,
                                'aria-controls' => $controls,
                                'tabindex'      => $tabindex
                            ];
    
                            ?>			
    
                            <button <?php think_shift_attr( $attr ); ?>>
                                <span class="focus">
                                    <?php echo esc_html( $tab_name );?>
                                </span>
                            </button>
                
                        <?php endwhile; ?>
                    <?php endif; ?>
            </div> <!-- tablist end -->
    
    
            <?php if( have_rows( 'tabs' ) ): ?>
                <?php while( have_rows( 'tabs' ) ): the_row(); ?>
                    <?php	
                            $row       = get_row_index();
                            $tabindex  = '0';
                            $tab_id    = 'tab-' . $row;
                            $tab_panel = 'tabpanel-' . $row;
                            $row_class = 'is-hidden';
                            $tab_name  = get_sub_field( 'tab_name' );
    
                            if ( 1 === $row ) {
                                $row_class = '';
                            }
    
                            $attr_panel = [
                                'id'              => $tab_panel,
                                'role'            => 'tabpanel',
                                'aria-labelledby' => $tab_id,
                                'tabindex'        => $tabindex,
                                'class'           => $row_class,
                            ];
    
                            ?>	
                        <div <?php think_shift_attr( $attr_panel ); ?>>
                             <?php echo esc_html( $tab_name );?>
                             <!-- Add additional fields to block ACF -->
                        </div>
                <?php endwhile; ?>
            <?php endif; ?>
    
    </div>

</div>