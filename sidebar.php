<?php
/**
 * The sidebar containing the main widget area
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'flux-commerce-sidebar-1' ) ) {
	return;
}
?>

<aside class="col-lg-3 col-md-4 col-12 h-100">

	<?php dynamic_sidebar( 'flux-commerce-sidebar-1' ); ?>

</aside>
