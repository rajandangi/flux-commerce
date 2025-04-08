<?php
/**
 * The sidebar for the shop page
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'flux-commerce-sidebar-shop' ) ) {
	return;
}

dynamic_sidebar( 'flux-commerce-sidebar-shop' );
