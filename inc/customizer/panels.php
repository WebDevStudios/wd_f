<?php
/**
 * Customizer panels.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Add a custom panels to attach sections too.
 *
 * @author WebDevStudios
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Class.
 */
function customize_panels( $wp_customize ) {
	// Register a new panel.
	$wp_customize->add_panel(
		'site-options',
		[
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Site Options', 'wd_f' ),
			'description'    => esc_html__( 'Other theme options.', 'wd_f' ),
		]
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_panels' );
