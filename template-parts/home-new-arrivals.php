<?php
/**
 * Template part for displaying the new arrivals section on the homepage
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="new-arrivals">
	<div class="container">
		<div class="section-title">
			<h2>New Arrivals</h2>
		</div>
		<?php
		$new_arrivals_limit   = esc_attr( get_theme_mod( 'flux_commerce_settings_new_arrivals_max_num', 4 ) );
		$new_arrivals_columns = esc_attr( get_theme_mod( 'flux_commerce_settings_new_arrivals_max_col', 4 ) );

		echo do_shortcode( '[products limit="' . $new_arrivals_limit . '" columns="' . $new_arrivals_columns . '" orderby="date"]' );
		?>
	</div>
</section>
