<?php
/**
 * Template part for displaying posts
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
	<?php get_template_part( 'template-parts/post', 'meta' ); ?>
	<div class="content">
		<?php
		if ( has_excerpt() ) :
			the_excerpt();
		elseif ( strpos( $post->post_content, '<!--more-->' ) ) :
				the_content( 'More' );
		else :
			the_excerpt();
		endif;
		?>
	</div>
</article>
