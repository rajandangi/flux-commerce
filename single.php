<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="content-area" id="primary">
	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-8 col-12">
					<?php
					// Start the loop.
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'single' );

						// Load comments template if comments are open or there is at least one comment.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					endwhile; // End of the loop.
					?>
				</div>
				<!-- Sidebar -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
