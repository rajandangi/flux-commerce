<?php
/**
 * Footer template for the Flux Commerce theme.
 *
 * This is the footer template that displays the bottom part of the website.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

?>
		<footer>
			<section class="footer-widgets">
				<div class="container">
					<div class="row">
						<?php if ( is_active_sidebar( 'flux-commerce-sidebar-footer-1' ) ) : ?>
							<div class="col-md-4 col-12">
								<?php dynamic_sidebar( 'flux-commerce-sidebar-footer-1' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'flux-commerce-sidebar-footer-2' ) ) : ?>
							<div class="col-md-4 col-12">
								<?php dynamic_sidebar( 'flux-commerce-sidebar-footer-2' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'flux-commerce-sidebar-footer-3' ) ) : ?>
							<div class="col-md-4 col-12">
								<?php dynamic_sidebar( 'flux-commerce-sidebar-footer-3' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<section class="copyright">
				<div class="container">
					<div class="row">
						<div class="copyright-text col-12 col-md-6">
							<?php echo esc_html( get_theme_mod( 'flux_commerce_settings_copyright', '© 2025 Flux Commerce. All rights reserved.' ) ); ?>
						</div>
						<nav class="footer-menu col-12 col-md-6 text-start text-md-end">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'flux_commerce_footer_menu',
								)
							);
							?>
						</nav>
					</div>
				</div>
			</section>
		</footer>
	</div>

<?php wp_footer(); ?>
</body>

</html>
