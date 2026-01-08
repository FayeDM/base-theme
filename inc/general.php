<?php
/**
 * General Functions
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 * 
 */

function add_noopener_to_external_links( $content ) {
    // Use DOMDocument to parse content safely
    libxml_use_internal_errors(true); // suppress warnings
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);
    $links = $dom->getElementsByTagName('a');

    foreach ( $links as $link ) {
        $href = $link->getAttribute('href');
        $target = $link->getAttribute('target');

        // Only modify external links that open in a new tab
        if ( $target === '_blank' && $href && !empty($href) && strpos($href, home_url()) === false ) {
            $rel = $link->getAttribute('rel');
            $rels = array_map('trim', explode(' ', $rel));
            $rels = array_unique( array_merge($rels, ['noopener', 'noreferrer']) );
            $link->setAttribute('rel', implode(' ', $rels));
        }
    }

    return $dom->saveHTML();
}
add_filter( 'the_content', 'add_noopener_to_external_links', 20 );