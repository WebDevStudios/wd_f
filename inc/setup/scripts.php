<?php
/**
 * Enqueue scripts and styles.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Enqueue scripts and styles.
 *
 * @author WebDevStudios
 */
function scripts() {
	$asset_file_path = get_template_directory() . '/build/index.asset.php';

	if ( is_readable( $asset_file_path ) ) {
		$asset_file = include $asset_file_path;
	} else {
		$asset_file = [
			'version'      => '1.0.0',
			'dependencies' => [ 'wp-polyfill' ],
		];
	}

	// Register styles & scripts.
	wp_enqueue_style( 'wd_f-styles', get_stylesheet_directory_uri() . '/build/index.css', [], $asset_file['version'] );
	wp_enqueue_style( 'custom-preflight', get_stylesheet_directory_uri() . '/src/tailwind-preflight.css', [], $asset_file['version'] );
	wp_enqueue_script( 'wd_f-scripts', get_stylesheet_directory_uri() . '/build/index.js', $asset_file['dependencies'], $asset_file['version'], true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\scripts' );

/**
 * Enqueue editor scripts.
 *
 * @author WebDevStudios
 */
function editor_scripts() {

	$asset_file_path = get_template_directory() . '/build/editor.asset.php';

	if ( is_readable( $asset_file_path ) ) {
		$asset_file = include $asset_file_path;
	} else {
		$asset_file = [
			'version'      => '1.0.0',
			'dependencies' => [ 'wp-polyfill' ],
		];
	}

	wp_enqueue_script(
		'editor-js',
		get_template_directory_uri() . '/build/editor.js',
		$asset_file['dependencies'],
		$asset_file['version'],
	);

}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\editor_scripts' );
