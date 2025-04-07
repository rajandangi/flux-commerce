<?php
/**
 * Main template file for the Flux Commerce theme.
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
				<?php
				// Query for the latest blog posts.
				if ( have_posts() ) {
					// Load the posts loop.
					while ( have_posts() ) :
						the_post();
						?>
						<article <?php post_class(); ?>>
							<h2>
								<a href="<?php the_permalink(); ?>" class="text-decoration-none">
									<?php the_title(); ?>
								</a>
							</h2>
							<div class="post-thumbnail">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'flux-commerce-blog', array( 'class' => 'img-fluid' ) );
								}
								?>
							</div>
							<div class="meta">
								<p>
									Published by <?php the_author_posts_link(); ?> on <?php echo get_the_date(); ?>
									<br/>
									<?php if ( has_category() ) { ?>
										Categories: <span><?php the_category( ', ' ); ?></span>
									<?php } ?>
									<br/>
									<?php
									if ( has_tag() ) {
										the_tags( 'Tags: ' ); }
									?>
								</p>
							</div>
							<div class="excerpt"><?php the_excerpt(); ?></div>
						</article>
						<?php
					endwhile;
				} else {
					// No posts found.
					echo '<p>No posts found.</p>';
				}
				?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>
