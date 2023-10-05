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
function wds_register_blocks() {
	// Get the paths of all block configuration files.
	$block_config_files = glob( ROOT_PATH . 'blocks/*/block.json' );

	foreach ( $block_config_files as $block_config_file ) {
		// Register each block type using its configuration file.
		register_block_type( $block_config_file );
	}
}
add_action( 'init', __NAMESPACE__ . '\wds_register_blocks' );
