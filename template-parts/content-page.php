<?php
/**
 * Template part for displaying page content
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'col' ); ?>>
	<h1><?php the_title(); ?></h1>
	<div><?php the_content(); ?></div>
</article>
