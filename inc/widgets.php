<?php
/**
 * Declaring widgets
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Initializes themes widgets.
 */
function flux_commerce_widgets_init() {
	// Registering Sidebar.
	register_sidebar(
		array(
			'name'          => __( 'Flux Commerce Main Sidebar', 'flux-commerce' ),
			'id'            => 'flux-commerce-sidebar-1',
			'description'   => __( 'Drag and drop your widgets here', 'flux-commerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Flux Commerce Shop Sidebar', 'flux-commerce' ),
			'id'            => 'flux-commerce-sidebar-shop',
			'description'   => __( 'Drag and drop your WooCommerce widgets here', 'flux-commerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	// Register footer sidebars.
	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar(
			array(
				// Translators: %d is the footer sidebar number.
				'name'          => sprintf( __( 'Flux Commerce Footer Sidebar-%d', 'flux-commerce' ), $i ),
				'id'            => 'flux-commerce-sidebar-footer-' . $i,
				'description'   => __( 'Drag and drop your widgets here', 'flux-commerce' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}
}

add_action( 'widgets_init', 'flux_commerce_widgets_init' );



/**
 * Add custom classes to the array of body classes.
 *
 * @since 1.0
 * @param array $classes Classes for the body element.
 * @return array
 */
function flux_commerce_body_classes( $classes ) {
	// Check for the main sidebar.
	if ( ! is_active_sidebar( 'flux-commerce-sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Check for the shop sidebar.
	if ( ! is_active_sidebar( 'flux-commerce-sidebar-shop' ) ) {
		$classes[] = 'no-sidebar-shop';
	}

	// Check for any active footer sidebars.
	$footer_ids    = array(
		'flux-commerce-sidebar-footer-1',
		'flux-commerce-sidebar-footer-2',
		'flux-commerce-sidebar-footer-3',
	);
	$footer_active = false;
	foreach ( $footer_ids as $id ) {
		if ( is_active_sidebar( $id ) ) {
			$footer_active = true;
			break;
		}
	}
	if ( ! $footer_active ) {
		$classes[] = 'no-sidebar-footer';
	}

	return $classes;
}
add_action( 'body_class', 'flux_commerce_body_classes' );
