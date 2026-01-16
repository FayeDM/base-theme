<?php
/**
 * General Functions
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 * 
 */


/**
 * Attribute Helper.
 * Take an array of attributes and spit them out.
 *
 * @param array $array an array of attributes.
 */
function think_shift_attr( $array ) {
 
	foreach ( $array as $key => $value ) {
		echo esc_attr( $key ) . '="' . esc_attr( $value ) . '" ';
	}
}