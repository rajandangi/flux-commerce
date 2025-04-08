<?php
/**
 * Header template for the Flux Commerce theme.
 *
 * This is the header template that displays the top part of the website.
 *
 * @package Flux_Commerce
 * @since 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="site" id="page">
		<header>
			<section class="search">
				<div class="container">
					<?php get_search_form(); ?>
				</div>
			</section>
			<section class="top-bar">
				<div class="container">
					<div class="row">
					<div class="brand col-md-4 col-12 col-lg-3 d-flex align-items-center justify-content-center justify-content-md-start">
							<?php
							if ( has_custom_logo() ) :
								the_custom_logo();
							else :
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
									<?php bloginfo( 'title' ); ?>
								</a>
								<?php
							endif;
							?>
						</div>
						<div class="second-column col-md-8 col-12 col-lg-9">
							<div class="row">
								<?php if ( class_exists( 'WooCommerce' ) ) : ?>
								<div class="account col-12">
									<div class="navbar-expand">
										<ul class="navbar-nav float-left">
											<?php
											$myaccount_page_url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
											if ( is_user_logged_in() ) :
												?>
											<li>
												<a
												href="<?php echo esc_url( $myaccount_page_url ); ?>"
													class="nav-link">
													<?php esc_html_e( 'My Account', 'flux-commerce' ); ?>
												</a>
											</li>
											<li>
												<a
												href="<?php echo esc_url( wp_logout_url( $myaccount_page_url ) ); ?>" class="nav-link">
													<?php esc_html_e( 'Logout', 'flux-commerce' ); ?>
												</a>
											</li>
											<?php else : ?>
												<li>
												<a
												href="<?php echo esc_url( $myaccount_page_url ); ?>"
													class="nav-link">
													<?php esc_html_e( 'Login/Register', 'flux-commerce' ); ?>
												</a>
											</li>
											<?php endif; ?>
										</ul>
									</div>
									<div class="cart text-end">
										<a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
											<span class="cart-icon"></span>
										</a>
										<span class="items">
											<?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
										</span>
									</div>
								</div>
								<?php endif; ?>
								<div class="col-12">
									<nav class="main-menu navbar navbar-expand-md navbar-light">
										<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
											<span class="navbar-toggler-icon"></span>
										</button>

										<div class="collapse navbar-collapse" id="main-menu">
											<?php
											wp_nav_menu(
												array(
													'theme_location' => 'main-menu',
													'container'   => false,
													'menu_class'  => '',
													'fallback_cb' => '__return_false',
													'items_wrap'  => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
													'depth'       => 3,
													'walker'      => new Flux_Commerce_Bootstrap_5_Wp_Nav_Menu_Walker(),
												)
											);
											?>
										</div>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>
