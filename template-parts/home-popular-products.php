<?php
/**
 * Template part for displaying the popular products section on the homepage
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="popular-products mt-5">
	<div class="container">
		<div class="section-title">
			<h2>Popular Products</h2>
		</div>
		<?php
		$popular_limit   = esc_attr( get_theme_mod( 'flux_commerce_settings_popular_max_num', 4 ) );
		$popular_columns = esc_attr( get_theme_mod( 'flux_commerce_settings_popular_max_col', 4 ) );

		echo do_shortcode( '[products limit="' . $popular_limit . '" columns="' . $popular_columns . '" orderby="popularity"]' );
		?>
	</div>
</section>
