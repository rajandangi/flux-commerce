<?php
/**
 * The template for displaying search forms
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$uid = wp_unique_id( 's-' ); // The search form specific unique ID for the input.

$aria_label = '';
if ( isset( $args['aria_label'] ) && ! empty( $args['aria_label'] ) ) {
	$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '"';
}
?>

<form role="search" class="search-form col-md-6 col-lg-4 ms-md-auto"
		method="get"
		action="<?php echo esc_url( home_url( '/' ) ); ?>"
		<?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>
		>
	<div class="input-group align-items-center">
		<input type="search" class="field search-field form-control" id="search" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'flux-commerce' ); ?>">
		<button type="submit" class="submit search-submit" name="submit">
			<span class="screen-reader-text"><?php echo esc_attr_x( 'Search', 'submit button', 'flux-commerce' ); ?></span>
		</button>
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
			<!-- <input type="hidden" name="post_type" value="product"> -->
		<?php endif; ?>
	</div>
</form>
<?php
