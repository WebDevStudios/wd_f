<?php
/**
 * Re-order block categories
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Change_block_category_order
 *
 * @param array                   $categories An array of block categories.
 * @param WP_Block_Editor_Context $block_editor_context     The current block editor context.
 * @return array The modified array of block categories.
 * @author JC Palmes <jc@webdevstudios.com>
 * @since 2023-06-02
 */
function change_block_category_order( $categories, $block_editor_context ) {

	$wds_block_category = [
		'slug'  => 'wds-blocks-category',
		'title' => __( 'WDS Blocks', 'wd_f' ),
	];

	array_unshift( $categories, $wds_block_category );
	return $categories;
}
add_filter( 'block_categories_all', __NAMESPACE__ . '\change_block_category_order', 10, 2 );
