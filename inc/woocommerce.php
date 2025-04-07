<?php
/**
 * Add WooCommerce support
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Add WooCommerce support.
 *
 * @since 1.0
 */
function flux_commerce_woocommerce_setup() {
	// Add WooCommerce support.
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 255,
			'single_image_width'    => 255,
			'product_grid'          => array(
				'default_rows'    => 10,
				'min_rows'        => 5,
				'max_rows'        => 10,
				'default_columns' => 1,
				'min_columns'     => 1,
				'max_columns'     => 1,
			),
		)
	);

	// Add Product Gallery support.
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'flux_commerce_woocommerce_setup' );


/**
 * Show cart contents / total Ajax
 *
 * @param array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 * @since 1.0
 */
function flux_commerce_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'flux_commerce_woocommerce_header_add_to_cart_fragment' );


/**
 * Customize the WooCommerce Listing Behavior.
 *
 * @since 1.0
 */
function flux_commerce_wc_customize() {
	// Targer the product archive page.
	if ( is_shop() ) {
		// Include product description.
		add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1 );
	}
}
add_action( 'wp', 'flux_commerce_wc_customize' );
