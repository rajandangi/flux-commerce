<?php
/**
 * Enqueue scripts and styles for the Flux Commerce theme.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue scripts and styles.
 *
 * This function is responsible for loading the necessary CSS and JavaScript files
 * for the theme. It ensures that the styles and scripts are loaded in the correct
 * order and only when needed.
 *
 * @since 1.0
 */
function flux_commerce_scripts() {
	// Enqueue Bootstrap Javascript and CSS files.
	wp_enqueue_script( 'flux-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '5.3.3', true );
	wp_enqueue_style( 'flux-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.3', 'all' );

	// FlexSlider Javascript and CSS files.
	wp_enqueue_script( 'flux-commerce-flexslider-js', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '2.7.2', true );
	wp_enqueue_style( 'flux-commerce-flexslider-css', get_template_directory_uri() . '/flexslider/flexslider.css', array(), '2.7.2', 'all' );

	// Enqueue custom theme scripts and styles.
	wp_enqueue_script( 'flux-commerce-js', get_template_directory_uri() . '/js/flux-commerce.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/flux-commerce.js' ), true );

	// Check if the environment is local for development.
	$version = '1.0';
	if ( defined( 'WP_ENVIRONMENT_TYPE' ) && WP_ENVIRONMENT_TYPE === 'local' ) {
		$version = filemtime( get_template_directory() . '/style.css' );
	}
	wp_enqueue_style( 'flux-commerce-style', get_stylesheet_uri(), array(), $version, 'all' );

	// Comment-reply script for threaded comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flux_commerce_scripts' );
