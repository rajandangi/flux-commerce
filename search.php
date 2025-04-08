<?php
/**
 * The template for displaying search results pages
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
				<h1>
				<?php
				esc_html_e( 'Search Results for :', 'flux-commerce' );
				echo get_search_query();
				?>
				</h1>
				<?php
				// Query for the latest blog posts.
				if ( have_posts() ) {
					// Load the posts loop.
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'search' );
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
					esc_html_e( 'There are no results for your query.', 'flux-commerce' );
				}
				?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>
