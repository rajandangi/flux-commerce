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

	register_sidebar(
		array(
			'name'          => __( 'Flux Commerce Footer Sidebar-1', 'flux-commerce' ),
			'id'            => 'flux-commerce-sidebar-footer-1',
			'description'   => __( 'Drag and drop your widgets here', 'flux-commerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Flux Commerce Footer Sidebar-2', 'flux-commerce' ),
			'id'            => 'flux-commerce-sidebar-footer-2',
			'description'   => __( 'Drag and drop your widgets here', 'flux-commerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Flux Commerce Footer Sidebar-3', 'flux-commerce' ),
			'id'            => 'flux-commerce-sidebar-footer-3',
			'description'   => __( 'Drag and drop your widgets here', 'flux-commerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}

add_action( 'widgets_init', 'flux_commerce_widgets_init' );
