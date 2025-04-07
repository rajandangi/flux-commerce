<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="content-area">
	<main>
		<div class="container">
			<div class="row">
				<?php
				// Load the posts loop.
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'col' ); ?>>
						<h1><?php the_title(); ?></h1>
						<div><?php the_content(); ?></div>
					</article>
					<?php
				endwhile;
				?>
			</div>
		</div>
	</main>
</div>

<?php
get_footer();
