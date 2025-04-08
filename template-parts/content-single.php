<?php
/**
 * Template part for displaying single post content
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
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
