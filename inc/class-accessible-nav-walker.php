<?php
/**
 * Accessible_Nav_Walker
 *
 * Minimal WordPress nav menu walker for disclosure-style navigation.
 * https://www.w3.org/WAI/ARIA/apg/patterns/disclosure/examples/disclosure-navigation/
 *
 *
 * @package Think Shift
 * @since 1.0.0
 */


class Accessible_Nav_Walker extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );

        // <li> wrapper
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $output .= '<li' . $class_names . '>';

        if ( $has_children ) {
            // Top-level parent with submenu → button only
            $output .= '<button aria-expanded="false" class="submenu-toggle">';
            $output .= esc_html( $item->title );
            $output .= '</button>';
        } else {
            // Leaf item → normal link
            $output .= '<a href="' . esc_url( $item->url ) . '">';
            $output .= apply_filters( 'the_title', $item->title, $item->ID );
            $output .= '</a>';
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', '', $item, $depth, $args );
    }
}
