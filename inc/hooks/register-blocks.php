<?php
/**
 * Register custom blocks for the theme.
 *
 * @package WebDevStudios\wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Registers custom blocks.
 *
 * This function locates and registers custom blocks defined in the theme.
 *
 * @return void
 */
function register_blocks() {
	// Define the ROOT_PATH constant.
	define( 'WDS_ROOT_PATH', get_template_directory() . '/' );

	// Get the paths of all block configuration files.
	$block_config_files = glob( WDS_ROOT_PATH . 'blocks/*/build/block.json' );

	foreach ( $block_config_files as $block_config_file ) {
		// Register each block type using its configuration file.
		register_block_type( $block_config_file );
	}
}
add_action( 'init', __NAMESPACE__ . '\register_blocks' );
