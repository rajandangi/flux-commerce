<?php
/**
 * Template part for displauing search results
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
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
