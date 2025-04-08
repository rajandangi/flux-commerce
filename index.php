<?php
/**
 * Blog template file.
 *
 * This is the main template file that displays the homepage and other pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flux_Commerce
 * @since 1.0
 */

get_header();
?>

<div class="content-area">
	<main>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-8 col-12">
					<?php
					// Query for the latest blog posts.
					if ( have_posts() ) {
						// Load the posts loop.
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content' );
						endwhile;
						// Pagination.
						the_posts_pagination(
							array(
								'prev_text' => 'Previous',
								'next_text' => 'Next',
							)
						);
						wp_reset_postdata();
					} else {
						// No posts found.
						esc_html_e( 'No posts found.', 'flux-commerce' );
					}
					?>
				</div>
				<!-- Sidebar -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>
