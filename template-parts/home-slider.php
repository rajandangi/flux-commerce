<?php
/**
 * Template part for displaying the homepage slider
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="slider">
	<div class="flexslider">
		<ul class="slides">
		<?php flux_commerce_render_home_slider(); ?>
		</ul>
	</div>
</section>
