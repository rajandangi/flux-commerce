<?php
/**
 * Theme basic setup
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'flux_commerce_setup' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flux_commerce_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 *
	 * Text domain: flux-commerce
	 */
	load_theme_textdomain( 'flux-commerce', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu'   => __( 'Main Menu', 'flux-commerce' ),
			'footer-menu' => __( 'Footer Menu', 'flux-commerce' ),
		)
	);

	// Specify Content Width.
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Adding Thumbnail basic support
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Adding support for Widget edit icons in customizer
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Set up the WordPress Theme logo feature.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 85,
			'width'       => 160,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Add Custom Image Sizes.
	add_image_size( 'flux-commerce-blog', 960, 640, array( 'center', 'center' ) );
	add_image_size( 'flux-commerce-slider', 1920, 800, array( 'center', 'center' ) );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
}
