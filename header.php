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

    <header>
        <div class="is-layout-constrained">
            <p>My Header</p>
        </div>
    </header>