<?php
/**
 * Preload assets.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Preload assets.
 *
 * @author Corey Collins
 */
function preload_assets() {
	?>
	<?php if ( get_custom_logo_url() ) : ?>
		<link rel="preload" href="<?php echo esc_url( get_custom_logo_url() ); ?>" as="image">
	<?php endif; ?>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\preload_assets', 1 );
