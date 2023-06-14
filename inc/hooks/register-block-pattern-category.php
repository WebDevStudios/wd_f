<?php
/**
 * Registers custom block pattern categories for the WD_S theme.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Registers custom block pattern categories for the WD_S theme.
 */
function wd_f_register_block_pattern_category() {

	register_block_pattern_category(
		'wds-patterns',
		[
			'label' => __( 'WDS Patterns', 'wd_f' ),
		]
	);

	// Remove default patterns.
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'init', __NAMESPACE__ . '\wd_f_register_block_pattern_category', 9 );
