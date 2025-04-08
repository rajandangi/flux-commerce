<?php
/**
 * Template part for displaying post meta
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="meta">
	<p>
		<?php
		printf(
			/* translators: %s: Author's posts link */
			esc_html__( 'Published by %1$s on %2$s', 'flux-commerce' ),
			wp_kses_post( get_the_author_posts_link() ),
			get_the_date()
		);
		?>
		<br/>
		<?php if ( has_category() ) { ?>
			<?php
			printf(
				/* translators: %s: List of categories */
				esc_html__( 'Categories: %s', 'flux-commerce' ),
                 // phpcs:ignore
				'<span>' . get_the_category_list( ', ' ) . '</span>'
			);
			?>
		<?php } ?>
		<br/>
		<?php
		if ( has_tag() ) {
			the_tags(
				/* translators: Tags label */
				esc_html__( 'Tags: ', 'flux-commerce' )
			);
		}
		?>
	</p>
</div>
