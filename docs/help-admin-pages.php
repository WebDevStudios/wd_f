<?php
/**
 * Add documentation admin pages.
 * New markdown files in /docs will be automatically added.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

use ParsedownExtra; // Use ParsedownExtra.
use Parsedown; // Include Parsedown for comparison.
use function get_template_directory_uri;

// Include Composer's autoloader.
require_once realpath( __DIR__ . '/..' ) . '/vendor/autoload.php';

/**
 * Add documentation admin pages.
 */
function add_admin_page() {
	$docs_dir = get_template_directory() . '/docs';

	// Add the top-level documentation page.
	add_menu_page(
		'funderscores Theme Help',
		'Theme Help',
		'edit_posts',
		'wds-docs-home',
		function () use ( $docs_dir ) {
			render_markdown_files( "$docs_dir/_index.md" );
		},
		'dashicons-editor-help'
	);

	// Add editor submenu page with rendered documentation.
	add_docs_submenu_page( 'wds-docs-home', $docs_dir . '/editors', 'edit_posts' );

	// Add developer submenu page with rendered documentation.
	add_docs_submenu_page( 'wds-docs-home', $docs_dir . '/developers', 'switch_themes' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\add_admin_page' );

/**
 * Adds a submenu page for a given directory.
 *
 * @param string $parent_slug The slug of the parent menu item.
 * @param string $subdir The path to the subdirectory containing the documentation files.
 * @param string $capability The capability required to view the submenu page.
 */
function add_docs_submenu_page( $parent_slug, $subdir, $capability ) {
	// Get the name of the subdirectory.
	$subdir_name = basename( $subdir );

	// Add a submenu page for the subdirectory.
	add_submenu_page(
		$parent_slug,
		ucwords( str_replace( '-', ' ', $subdir_name ) ),
		ucwords( str_replace( '-', ' ', $subdir_name ) ),
		$capability,
		"wds-docs-$subdir_name",
		function () use ( $subdir ) {
			render_markdown_files( "$subdir/_index.md" );
		}
	);
}

/**
 * Convert all Markdown files in the same directory as the given index file to HTML and output the HTML.
 *
 * @param string $index_file The path to the _index.md file.
 */
function render_markdown_files( $index_file ) {
	// Get the directory path for the _index.md file.
	$dir_path       = dirname( $index_file );
	$img_path       = get_template_directory_uri() . str_replace( get_template_directory(), '', $dir_path ) . '/img';
	$markdown_files = glob( "$dir_path/*.md" );

	natsort( $markdown_files );

	// Create a new ParsedownExtra instance.
	$parsedown = new ParsedownExtra();

	// Loop through all files in the same directory as the _index.md file.
	foreach ( $markdown_files as $file ) {
		// Parse the file and output the HTML.
		$file_contents = file_get_contents( $file ); // phpcs:ignore -- TODO: Fix this.
		$file_contents = str_replace( './img/', $img_path . '/', $file_contents );
		$html          = $parsedown->text( $file_contents );
		$html          = str_replace( '<img', '<img loading="lazy"', $html );
		echo wp_kses_post( $html );
	}
}

/**
 * Enqueue docs admin styles.
 */
function add_admin_styles() {
	wp_enqueue_style( 'wds-help-admin-styles', get_template_directory_uri() . '/docs/help-style.css', [], wp_rand( 111, 9999 ), 'all' );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\add_admin_styles' );
