<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays the home page.
 * It includes sections for a slider, popular products, new arrivals,
 * deal of the week, and a blog section.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

get_header();
?>
<div class="content-area">
	<main>
		<?php
		// Homepage slider.
		get_template_part( 'template-parts/home', 'slider' );

		// Start WooCommerce check.
		if ( class_exists( 'WooCommerce' ) ) :
			// Popular Products.
			get_template_part( 'template-parts/home', 'popular-products' );
			// New Arrivals.
			get_template_part( 'template-parts/home', 'new-arrivals' );
			// Deal of the Week.
			get_template_part( 'template-parts/home', 'deal-of-week' );
		endif;
		// End WooCommerce check.

		// Blog Section.
		get_template_part( 'template-parts/home', 'blog' );
		?>
	</main>
</div>

<?php get_footer(); ?>
