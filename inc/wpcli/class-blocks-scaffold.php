<?php
/**
 * Add a CLI command for scaffolding a block.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

// Exit if class already exists (for example when the plugin `WDS ACF Blocks` is active).
if ( class_exists( 'Blocks_Scaffold' ) ) {
	return;
}

// Define a global path and url.
define( 'WebDevStudios\wd_f\ROOT_PATH', trailingslashit( get_template_directory() ) );
define( 'WebDevStudios\wd_f\ROOT_URL', trailingslashit( get_template_directory_uri() ) );

// Import wpcli.

use \WP_CLI as WP_CLI;

/**
 * Class Blocks_Scaffold
 *
 * @package WebDevStudios\wd_f
 */
class Blocks_Scaffold {

	/**
	 * Block Name
	 *
	 * @var string
	 */
	private $name = '';

	/**
	 * Create a new block.
	 *
	 * @synopsis <blockname> [--title=<blocktitle>] [--desc=<blockdescription>] [--keyword=<blockkeyword>] [--icon=<blockicon>] [--namespace=<namespace>]
	 *
	 * ## OPTIONS
	 *
	 * <blockname>
	 * : The block name. Must only have alphabetical characters.
	 *
	 * [--desc=<blockdescription>]
	 * : The bloc description.
	 *
	 * [--keyword=<blockkeyword>]
	 * : They keyword for the block.
	 *
	 * [--icon=<blockicon>]
	 * : Block Icon.
	 *
	 * [--namespace=<blocknamespace>]
	 * : Block Namespace. 
	 * : Default: WebDevStudios\wd_f
	 *
	 * ## EXAMPLES
	 *
	 * wp abs create_portable_block myblock --title="This is myblock" --desc="This block is used for wds." --keywords="myblock" --icon="table-row-before" --namespace="WebDevStudios\wd_f"
	 * @since  2.0.0
	 * @param string $name The block name.
	 * @param array  $assoc_args The block args.
	 */
	public function create_portable_block( $name, $assoc_args ) {
		$this->name = esc_html( $name[0] );

		// validate name.
		if ( ! preg_match( '/^[a-zA-Z0-9\-]+$/', $this->name ) ) {
			WP_CLI::error( 'Invalid name, Block name must only contain upper and lowercase letters.', true );
		}

		if ( ! isset( $args['namespace'] ) && preg_match( "/[\/\\\\]/", $assoc_args['namespace'] ) ) {
			WP_CLI::error( 'Invalid namespace, Block namespace must not contain slashes.', true );
		}


		// Merge with default args.
		$args = wp_parse_args(
			$assoc_args,
			[
				'title'     => ucfirst( $this->name ),
				'desc'      => '',
				'keywords'  => strtolower( $this->name ),
				'icon'      => 'table-row-before',
				'namespace' => 'wds',
			]
		);

		// create the directory.
		$this->create_block_dir();

		// create block json.
		$this->create_block_json( $args );

		// create block renderer.
		$this->create_block_render_php( $args );

		// create editor assets.
		$this->create_block_editor_assets();

		// create FE assets.
		$this->create_block_assets();

		WP_CLI::success( $this->name . ' block created.' );
	}

	/**
	 * Init file system.
	 *
	 * @since 2.0.0
	 */
	private function init_filesystem() {
		// File system support.
		global $wp_filesystem;
		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();

		return $wp_filesystem;
	}

	/**
	 * Create the block directory.
	 *
	 * @author Biplav Subedi <biplav.subedi@webdevstudios.com>
	 * @since 2.0.0
	 */
	private function create_block_dir() {
		$dir = ROOT_PATH . 'blocks/' . $this->name;

		if ( ! $this->init_filesystem()->exists( $dir ) ) {
			$this->init_filesystem()->mkdir( $dir, 0755 );
		} else {
			WP_CLI::error( 'Block directory already exists.', true );
		}
	}

	/**
	 * Create the block render file.
	 *
	 * @param array $args Block details.
	 * @since 2.0.0
	 * @author Biplav Subedi <biplav.subedi@webdevstudios.com>
	 */
	private function create_block_render_php( $args ) {
		$local_file = ROOT_PATH . 'inc/wpcli/block-starter/block.php';
		$content    = '';

		if ( $this->init_filesystem()->exists( $local_file ) ) {
			$content = $this->init_filesystem()->get_contents( $local_file );
			$content = str_replace( 'wds', $args['namespace'], $content );
			if ( ! $this->init_filesystem()->put_contents( ROOT_PATH . 'blocks/' . $this->name . '/' . $this->name . '.php', $content ) ) {
				WP_CLI::error( 'ERROR :: Could not create a render file.', true );
			}
		} else {
			WP_CLI::error( 'ERROR :: Could not create a render file.', true );
		}

	}

	/**
	 * Create the block json.
	 *
	 * @param array $args Block details.
	 * @since 2.0.0
	 * @author Biplav Subedi <biplav.subedi@webdevstudios.com>
	 */
	private function create_block_json( $args ) {
		$local_file = ROOT_PATH . 'inc/wpcli/block-starter/block.json';
		$content    = '';

		if ( $this->init_filesystem()->exists( $local_file ) ) {
			$content = $this->init_filesystem()->get_contents( $local_file );
			$content = str_replace(
				[
					'{{name}}',
					'{{title}}',
					'{{description}}',
					'{{icon}}',
					'wds/',
					'{{keyword}}',
				],
				[
					$this->name,
					$args['title'],
					$args['desc'],
					$args['icon'],
					trailingslashit( $args['namespace'] ),
					$args['keyword'],
				],
				$content
			);
		}

		if ( ! $this->init_filesystem()->put_contents( ROOT_PATH . 'blocks/' . $this->name . '/block.json', $content ) ) {
			WP_CLI::error( 'ERROR :: Could not create a block json file.', true );
		}
	}

	/**
	 * Create the block editor styles.
	 *
	 * @since 2.0.0
	 * @author Biplav Subedi <biplav.subedi@webdevstudios.com>
	 */
	private function create_block_editor_assets() {
		$asset_js  = ROOT_PATH . 'inc/wpcli/block-starter/editor.js';
		$asset_php = ROOT_PATH . 'inc/wpcli/block-starter/editor.asset.php';

		if ( ! $this->init_filesystem()->exists( $asset_js ) ) {
			WP_CLI::error( 'ERROR :: Could not find editor assets.', true );
		}

		// copy editor js.
		if ( ! $this->init_filesystem()->copy( $asset_js, ROOT_PATH . 'blocks/' . $this->name . '/editor.js' ) ) {
			WP_CLI::error( 'ERROR :: Could not create editor js file.', true );
		}
		// copy editor.asset.php.
		if ( ! $this->init_filesystem()->copy( $asset_php, ROOT_PATH . 'blocks/' . $this->name . '/editor.asset.php' ) ) {
			WP_CLI::error( 'ERROR :: Could not create editor asset php file.', true );
		}
	}

	/**
	 * Create the block main styles.
	 *
	 * @since 2.0.0
	 * @author Biplav Subedi <biplav.subedi@webdevstudios.com>
	 */
	private function create_block_assets() {
		$asset_js  = ROOT_PATH . 'inc/wpcli/block-starter/script.js';
		$asset_php = ROOT_PATH . 'inc/wpcli/block-starter/script.asset.php';

		if ( ! $this->init_filesystem()->exists( $asset_js ) ) {
			WP_CLI::error( 'ERROR :: Could not find block assets.', true );
		}

		// copy editor js.
		if ( ! $this->init_filesystem()->copy( $asset_js, ROOT_PATH . 'blocks/' . $this->name . '/script.js' ) ) {
			WP_CLI::error( 'ERROR :: Could not create script js file.', true );
		}

		// copy script.asset.php.
		if ( ! $this->init_filesystem()->copy( $asset_php, ROOT_PATH . 'blocks/' . $this->name . '/script.asset.php' ) ) {
			WP_CLI::error( 'ERROR :: Could not create script asset php file.', true );
		}
	}

}

/**
 * Registers our command when cli get's initialized.
 *
 * @since  4.0.0
 * @author Biplav Subedi <biplav.subedi@webdevstudios.com>
 * @return void
 */
function cli_register_commands() {
	WP_CLI::add_command( 'abs', __NAMESPACE__ . '\Blocks_Scaffold' );
}
add_action( 'cli_init', __NAMESPACE__ . '\cli_register_commands' );

/**
 * Register Blocks
 *
 * @return void
 * @author Jenna Hines
 * @since  2.0.0
 */
function wds_acf_register_blocks() {
	$wds_acf_blocks = glob( ROOT_PATH . 'blocks/*/block.json' );

	foreach ( $wds_acf_blocks as $block ) {
		register_block_type( $block );
	}
}
add_action( 'init', __NAMESPACE__ . '\wds_acf_register_blocks' );
