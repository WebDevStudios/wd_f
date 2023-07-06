<?php
/**
 * Remove the theme customizer.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * A function that filters the user capabilities to remove the 'customize' capability.
 *
 * @param array  $caps     User capabilities.
 * @param string $cap      Capability name.
 * @param int    $user_id  User ID.
 * @param array  $args     Additional arguments.
 *
 * @return array           User capabilities with the 'customize' capability removed.
 */
function filter_to_remove_customize_capability( $caps = array(), $cap = '', $user_id = 0, $args = array() ) {
	if ( 'customize' === $cap ) {
		return array( 'nope' );
	}

	return $caps;
}

add_filter( 'map_meta_cap', __NAMESPACE__ . '\filter_to_remove_customize_capability', 10, 4 );
