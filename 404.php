<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package flux-commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="content-area">
	<main>
		<div class="container">
			<div class="error-404">
				<header>
					<h1>Page not found</h1>
					<p>Unfortunately, the page you tried to reach does not exist on this site.</p>
				</header>
				<?php
				the_widget(
					'WP_Widget_Recent_Posts',
					array(
						'title'  => __( 'Recent Posts', 'flux-commerce' ),
						'number' => 5,
					)
				);
				?>
			</div>
		</div>
	</main>
</div>
<?php
get_footer();
