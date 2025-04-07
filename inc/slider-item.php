<?php
/**
 * Slider item rendering function for the Flux Commerce theme.
 *
 * This function renders a single slider item with an image, title, description,
 * button text, and button URL.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

/**
 * Renders a slider item.
 *
 * @param string $image        The URL of the slider image.
 * @param string $title        The title of the slider item.
 * @param string $description  The description of the slider item.
 * @param string $button_text  The text for the button.
 * @param string $button_url   The URL for the button.
 */
function flux_commerce_render_slider_item( $image, $title, $description, $button_text, $button_url ) {
	if ( empty( $image ) ) {
		return; // Skip rendering if no image is provided.
	}
	?>
	<li>
		<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy" />
		<div class="container">
			<div class="slider-details-container">
				<div class="slider-title">
					<h1><?php echo esc_html( $title ); ?></h1>
				</div>
				<div class="slider-description">
					<div class="subtitle"><?php echo esc_html( $description ); ?></div>
					<a href="<?php echo esc_url( $button_url ); ?>" class="link">
						<?php echo esc_html( $button_text ); ?>
					</a>
				</div>
			</div>
		</div>
	</li>
	<?php
}



/**
 * Render the homepage slider.
 *
 * @since 1.0
 */
function flux_commerce_render_home_slider() {
	$flag = false;

	for ( $i = 1; $i <= 4; $i++ ) {
		$slider_image = get_theme_mod( 'flux_commerce_slider_image_' . $i );

		if ( empty( $slider_image ) ) {
			continue;
		}
		/* translators: %d: Slider number */
		$slider_title = get_theme_mod( 'flux_commerce_slider_title_' . $i, sprintf( __( 'Slider %d Title', 'flux-commerce' ), $i ) );
		/* translators: %d: Slider number */
		$slider_desc     = get_theme_mod( 'flux_commerce_slider_desc_' . $i, sprintf( __( 'Description for slider %d', 'flux-commerce' ), $i ) );
		$slider_btn_text = get_theme_mod( 'flux_commerce_slider_btn_text_' . $i, __( 'Learn More', 'flux-commerce' ) );
		$slider_btn_url  = get_theme_mod( 'flux_commerce_slider_btn_url_' . $i, '#' );

		flux_commerce_render_slider_item(
			$slider_image,
			$slider_title,
			$slider_desc,
			$slider_btn_text,
			$slider_btn_url
		);

		$flag = true;
	}

	if ( ! $flag && file_exists( get_template_directory() . '/template-parts/default-slider.php' ) ) {
		require get_template_directory() . '/template-parts/default-slider.php';
	}
}
