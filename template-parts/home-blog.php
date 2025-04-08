<?php
/**
 * Template part for displaying the blog section on the homepage
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<section class="lab-blog">
	<div class="container">
		<div class="section-title">
			<h2>
				<?php
				echo esc_attr(
					get_theme_mod(
						'flux_commerce_settings_set_blog_title',
						__( 'Latest Blog Posts', 'flux-commerce' )
					)
				);
				?>
			</h2>
		</div>
		<div class="row">
			<?php
			$args       = array(
				'post_type'      => 'post',
				'posts_per_page' => 2,
			);
			$blog_posts = new WP_Query( $args );

			// Query for the latest blog posts.
			if ( $blog_posts->have_posts() ) {
				// Load the posts loop.
				while ( $blog_posts->have_posts() ) :
					$blog_posts->the_post();
					?>
					<div class="col-12 col-md-6">
						<article <?php post_class(); ?>>
							<div class="post-thumbnail">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'flux-commerce-blog', array( 'class' => 'img-fluid' ) );
								}
								?>
							</div>
							<h3>
								<a href="<?php the_permalink(); ?>" class="text-decoration-none">
									<?php the_title(); ?>
								</a>
							</h3>
							<div class="excerpt"><?php the_excerpt(); ?></div>
						</article>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			} else {
				// No posts found.
				esc_html_e( 'No posts found.', 'flux-commerce' );
			}
			?>
		</div>
	</div>
</section>
