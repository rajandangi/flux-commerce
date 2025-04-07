<?php
/**
 * Default slider template for the Flux Commerce theme.
 *
 * This template displays the default slider with a single image and text.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Default slider content.
$default_slider = array(
	'title'       => __( 'Welcome to Flux Commerce', 'flux-commerce' ),
	'description' => __( 'Your one-stop shop for quality products', 'flux-commerce' ),
	'button_text' => __( 'Shop Now', 'flux-commerce' ),
	'button_url'  => home_url( '/shop/' ),
);

// Default image path - use a single specific default image.
$default_image_path = get_template_directory() . '/img/slider/default.jpg';
$default_image      = '';
if ( file_exists( $default_image_path ) ) {
	$default_image = get_template_directory_uri() . '/img/slider/default.jpg';
}

// Check if default image is set before displaying.
if ( ! empty( $default_image ) ) {
	flux_commerce_render_slider_item(
		$default_image,
		$default_slider['title'],
		$default_slider['description'],
		$default_slider['button_text'],
		$default_slider['button_url']
	);
} else {
	echo '<p>Default slider image not found.</p>';
}
