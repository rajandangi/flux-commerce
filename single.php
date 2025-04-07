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
			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
				?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<h1> <?php the_title(); ?> </h1>

								<div class="meta">
									<p>
										Published by <?php the_author_posts_link(); ?> on <?php echo get_the_date(); ?>
										<br/>
								<?php if ( has_category() ) { ?>
											Categories: <span><?php the_category( ' ' ); ?></span>
										<?php } ?>
										<br/>
								<?php
								if ( has_tag() ) {
									the_tags( 'Tags: ' ); }
								?>
									</p>
								</div>
								<div class="post-thumbnail">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'flux-commerce-blog', array( 'class' => 'img-fluid' ) );
							}
							?>
								</div>
							</header>
							<div class="content">
							<?php
							wp_link_pages(
								array(
									'before' => '<p class="inner-pagination">' . esc_html__( 'Pages:', 'flux-commerce' ),
									'after'  => '</p>',
								)
							);
							the_content();
							?>
							</div>
						</article>
				<?php
				// Load comments template if comments are open or there is at least one comment.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
					endwhile; // End of the loop.
			?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
