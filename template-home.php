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
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
				<?php flux_commerce_render_home_slider(); ?>
				</ul>
			</div>
		</section>

	<!-- Start WooCommerce check -->
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
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

		<section class="new-arrivals">
			<div class="container">
				<div class="section-title">
					<h2>New Arrivals</h2>
				</div>
				<?php
				$new_arrivals_limit   = esc_attr( get_theme_mod( 'flux_commerce_settings_new_arrivals_max_num', 4 ) );
				$new_arrivals_columns = esc_attr( get_theme_mod( 'flux_commerce_settings_new_arrivals_max_col', 4 ) );

				echo do_shortcode( '[products limit="' . $new_arrivals_limit . '" columns="' . $new_arrivals_columns . '" orderby="date"]' );
				?>
			</div>
		</section>

		<?php
		$show_deal_of_week = esc_attr( get_theme_mod( 'flux_commerce_settings_deal_of_week_show', 1 ) );
		if ( $show_deal_of_week ) :
			$deal = esc_attr( get_theme_mod( 'flux_commerce_settings_deal_of_week', '' ) ); // Product ID.
			if ( $deal ) :
				$currency            = get_woocommerce_currency_symbol();
				$regular_price       = get_post_meta( $deal, '_regular_price', true );
				$sale_price          = get_post_meta( $deal, '_sale_price', true );
				$discount_percentage = absint( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 ) . '% OFF';
				?>
		<section class="deal-of-the-week">
			<div class="container">
				<div class="section-title">
					<h2>Deal of the week</h2>
				</div>
				<div class="row d-flex align-items-center">
					<div class="deal-img col-md-6 col-12 ms-auto text-center">
						<?php echo get_the_post_thumbnail( $deal, 'full', array( 'class' => 'img-fluid' ) ); ?>
					</div>
					<div class="deal-desc col-md-4 col-12 me-auto text-center">
						<?php if ( $sale_price ) : ?>
							<span class="discount">
								<?php echo esc_html( $discount_percentage ); ?>
							</span>
						<?php endif; ?>
						<h3>
							<a href="<?php echo esc_url( get_permalink( $deal ) ); ?>" class="text-decoration-none">
								<?php echo esc_html( get_the_title( $deal ) ); ?>
							</a>
						</h3>
						<p><?php echo esc_html( get_the_excerpt( $deal ) ); ?></p>
						<div class="prices">
							<span class="regular">
								<?php echo esc_html( $currency . $regular_price ); ?>
							</span>
							<?php if ( $sale_price ) : ?>
								<span class="sale">
									<?php echo esc_html( $currency . $sale_price ); ?>
								</span>
							<?php endif; ?>
						</div>
						<a href="<?php echo esc_url( '?add-to-cart=' . $deal ); ?>" class="add-to-cart">
							<?php esc_html_e( 'Add to Cart', 'flux-commerce' ); ?>
						</a>
					</div>
				</div>
			</div>
		</section>
				<?php
			endif;
		endif;
		?>

	<?php endif; ?>
	<!-- End WooCommerce check -->

		<section class="lab-blog">
			<div class="container">
				<div class="section-title">
					<h2>
						<?php
						echo esc_attr(
							get_theme_mod(
								'flux_commerce_settings_set_blog_title',
								'Latest Blog Posts'
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
						echo '<p>No posts found.</p>';
					}
					?>
				</div>
			</div>
		</section>
	</main>
</div>

<?php get_footer(); ?>
