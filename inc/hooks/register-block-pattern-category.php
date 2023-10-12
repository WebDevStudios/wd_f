<?php
/**
 * Registers custom block pattern categories for the wd_f theme.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Registers custom block pattern categories for the wd_f theme.
 */
function register_pattern_category() {

	register_block_pattern_category(
		'wds-patterns',
		[
			'label' => __( 'WDS Patterns', 'wd_f' ),
		]
	);

	// Remove default patterns.
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'init', __NAMESPACE__ . '\register_pattern_category', 9 );
