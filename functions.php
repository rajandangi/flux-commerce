<?php
/**
 * Functions and definitions for the Flux Commerce WordPress theme.
 *
 * This file contains the main functions and features for the Flux Commerce theme.
 * It includes script and style enqueuing, theme setup, and other customizations.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Flux Commerce's includes directory.
$flux_commerce_inc_dir = 'inc';

// Array of files to include.
$flux_commerce_includes = array(
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/customizer.php',                      // Customizer additions.
	'/slider-item.php',                     // Slider item rendering function.
	'/class-flux-commerce-bootstrap-5-wp-nav-menu-walker.php',    // Load custom WordPress nav walker.
	'/required-plugins.php', // Load required plugins.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$flux_commerce_includes[] = '/woocommerce.php';
}


// Include files.
foreach ( $flux_commerce_includes as $file ) {
	require_once get_theme_file_path( $flux_commerce_inc_dir . $file );
}
