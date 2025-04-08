<?php
/**
 * Flux Commerce Theme Customizer
 *
 * @package Flux_Commerce
 * @since 1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Register basic support for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer reference.
 */
function flux_commerce_customize_register( $wp_customize ) {
	/*
	 * Failsafe is safe.
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	// ==================================================
	// Add a footer/copyright information section.
	$wp_customize->add_section(
		'flux_commerce_section_copyright',
		array(
			'title'       => __( 'Copyright Information', 'flux-commerce' ),
			'description' => __( 'Customize the copyright information displayed in the footer.', 'flux-commerce' ),
		)
	);

	// Field 1 - Copyright Text Box.
	$wp_customize->add_setting(
		'flux_commerce_settings_copyright',
		array(
			'type'              => 'theme_mod',
			'default'           => __( '© 2023 Flux Commerce. All rights reserved.', 'flux-commerce' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	// Add the control for the copyright text box.
	$wp_customize->add_control(
		'flux_commerce_settings_copyright',
		array(
			'label'    => __( 'Copyright Text', 'flux-commerce' ),
			'section'  => 'flux_commerce_section_copyright',
			'settings' => 'flux_commerce_settings_copyright',
			'type'     => 'text',
		)
	);

	// =================================================
	// Add slider customization section.
	$wp_customize->add_section(
		'flux_commerce_section_slider',
		array(
			'title'       => __( 'Slider Options', 'flux-commerce' ),
			'description' => __( 'Customize the slider images and content displayed on the homepage.', 'flux-commerce' ),
			'priority'    => 30,
		)
	);

	// Create 4 slider entries with image, title, description, button text, and button URL.
	for ( $i = 1; $i <= 4; $i++ ) {

		// Slider Image.
		$wp_customize->add_setting(
			'flux_commerce_slider_image_' . $i,
			array(
				'type'              => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'flux_commerce_slider_image_' . $i,
				array(
					/* translators: %d: Slider number */
					'label'       => sprintf( __( 'Slider %d Image', 'flux-commerce' ), $i ),
					'description' => __( 'Recommended size: 1920x800 pixels', 'flux-commerce' ),
					'section'     => 'flux_commerce_section_slider',
					'settings'    => 'flux_commerce_slider_image_' . $i,
				)
			)
		);

		// Slider Title.
		$wp_customize->add_setting(
			'flux_commerce_slider_title_' . $i,
			array(
				/* translators: %d: Slider number */
				'default'           => sprintf( __( 'Slider %d Title', 'flux-commerce' ), $i ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'flux_commerce_slider_title_' . $i,
			array(
				/* translators: %d: Slider number */
				'label'    => sprintf( __( 'Slider %d Title', 'flux-commerce' ), $i ),
				'section'  => 'flux_commerce_section_slider',
				'settings' => 'flux_commerce_slider_title_' . $i,
				'type'     => 'text',
			)
		);

		// Slider Description.
		$wp_customize->add_setting(
			'flux_commerce_slider_desc_' . $i,
			array(
				/* translators: %d: Slider number */
				'default'           => sprintf( __( 'Description for slider %d', 'flux-commerce' ), $i ),
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'flux_commerce_slider_desc_' . $i,
			array(
				/* translators: %d: Slider number */
				'label'    => sprintf( __( 'Slider %d Description', 'flux-commerce' ), $i ),
				'section'  => 'flux_commerce_section_slider',
				'settings' => 'flux_commerce_slider_desc_' . $i,
				'type'     => 'textarea',
			)
		);

		// Button Text.
		$wp_customize->add_setting(
			'flux_commerce_slider_btn_text_' . $i,
			array(
				'type'              => 'theme_mod',
				'default'           => __( 'Learn More', 'flux-commerce' ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'flux_commerce_slider_btn_text_' . $i,
			array(
				/* translators: %d: Slider number */
				'label'    => sprintf( __( 'Slider %d Button Text', 'flux-commerce' ), $i ),
				'section'  => 'flux_commerce_section_slider',
				'settings' => 'flux_commerce_slider_btn_text_' . $i,
				'type'     => 'text',
			)
		);

		// Button URL.
		$wp_customize->add_setting(
			'flux_commerce_slider_btn_url_' . $i,
			array(
				'type'              => 'theme_mod',
				'default'           => '#',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'flux_commerce_slider_btn_url_' . $i,
			array(
				/* translators: %d: Slider number */
				'label'    => sprintf( __( 'Slider %d Button URL', 'flux-commerce' ), $i ),
				'section'  => 'flux_commerce_section_slider',
				'settings' => 'flux_commerce_slider_btn_url_' . $i,
				'type'     => 'url',
			)
		);
	}

	// ================================================================
	// Home Page Settings Section.
	$wp_customize->add_section(
		'flux_commerce_section_homepage',
		array(
			'title'       => __( 'Homepage Products and Blog Settings', 'flux-commerce' ),
			'description' => __( 'Customize the homepage Product and Blog Behaviour.', 'flux-commerce' ),
		)
	);

	// ====== Popular Products ======

	$wp_customize->add_setting(
		'flux_commerce_settings_popular_max_num',
		array(
			'type'              => 'theme_mod',
			'default'           => 4,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'flux_commerce_settings_popular_max_num',
		array(
			'label'       => __( 'Popular: Max Number of Products to Show', 'flux-commerce' ),
			'section'     => 'flux_commerce_section_homepage',
			'settings'    => 'flux_commerce_settings_popular_max_num',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 20,
			),
		)
	);

	$wp_customize->add_setting(
		'flux_commerce_settings_popular_max_col',
		array(
			'type'              => 'theme_mod',
			'default'           => 4,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'flux_commerce_settings_popular_max_col',
		array(
			'label'       => __( 'Popular: Max Number of column/row', 'flux-commerce' ),
			'section'     => 'flux_commerce_section_homepage',
			'settings'    => 'flux_commerce_settings_popular_max_col',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
			),
		)
	);

	// ====== New Arrivals ======
	$wp_customize->add_setting(
		'flux_commerce_settings_new_arrivals_max_num',
		array(
			'type'              => 'theme_mod',
			'default'           => 4,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'flux_commerce_settings_new_arrivals_max_num',
		array(
			'label'       => __( 'New Arrivals: Max Number of Products to Show', 'flux-commerce' ),
			'section'     => 'flux_commerce_section_homepage',
			'settings'    => 'flux_commerce_settings_new_arrivals_max_num',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 20,
			),
		)
	);
	$wp_customize->add_setting(
		'flux_commerce_settings_new_arrivals_max_col',
		array(
			'type'              => 'theme_mod',
			'default'           => 4,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'flux_commerce_settings_new_arrivals_max_col',
		array(
			'label'       => __( 'New Arrivals: Max Number of column/row', 'flux-commerce' ),
			'section'     => 'flux_commerce_section_homepage',
			'settings'    => 'flux_commerce_settings_new_arrivals_max_col',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
			),
		)
	);

	// ====== Deal of the Week: Show/Hide Checkbox ======
	$wp_customize->add_setting(
		'flux_commerce_settings_deal_of_week_show',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'flux_commerce_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'flux_commerce_settings_deal_of_week_show',
		array(
			'label'    => __( 'Show Deal of the Week', 'flux-commerce' ),
			'section'  => 'flux_commerce_section_homepage',
			'settings' => 'flux_commerce_settings_deal_of_week_show',
			'type'     => 'checkbox',
		)
	);

	// ====== Deal of the Week Product ID ======
	$wp_customize->add_setting(
		'flux_commerce_settings_deal_of_week',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'flux_commerce_settings_deal_of_week',
		array(
			'label'       => __( 'Deal of the Week: Product ID', 'flux-commerce' ),
			'section'     => 'flux_commerce_section_homepage',
			'settings'    => 'flux_commerce_settings_deal_of_week',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 999999,
			),
		)
	);

	// ==== Blog Settings====
	$wp_customize->add_setting(
		'flux_commerce_settings_set_blog_title',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Latest Blog Posts', 'flux-commerce' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'flux_commerce_settings_set_blog_title',
		array(
			'label'    => __( 'Blog Title', 'flux-commerce' ),
			'section'  => 'flux_commerce_section_homepage',
			'settings' => 'flux_commerce_settings_set_blog_title',
			'type'     => 'text',
		)
	);
}
add_action( 'customize_register', 'flux_commerce_customize_register' );


/**
 * Function to sanitize the checkbox input.
 *
 * @param mixed $input The input value.
 * @return int Sanitized value (1 for checked, 0 for unchecked).
 *
 * @since 1.0
 */
function flux_commerce_sanitize_checkbox( $input ) {
	return ( isset( $input ) && $input ) ? true : false;
}
