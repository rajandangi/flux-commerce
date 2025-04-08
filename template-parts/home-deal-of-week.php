<?php
/**
 * Template part for displaying the deal of the week section on the homepage
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$show_deal_of_week = esc_attr( get_theme_mod( 'flux_commerce_settings_deal_of_week_show', 1 ) );
if ( ! $show_deal_of_week ) {
	return;
}

$deal = esc_attr( get_theme_mod( 'flux_commerce_settings_deal_of_week', '' ) ); // Product ID.
if ( ! $deal ) {
	return;
}

$deal                = absint( $deal );
$currency            = get_woocommerce_currency_symbol();
$regular_price       = get_post_meta( $deal, '_regular_price', true );
$sale_price          = get_post_meta( $deal, '_sale_price', true );
$discount_percentage = absint( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 ) . '% OFF';
?>

<section class="deal-of-the-week">
	<div class="container">
		<div class="section-title">
			<h2><?php esc_html_e( 'Deal of the week', 'flux-commerce' ); ?></h2>
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
