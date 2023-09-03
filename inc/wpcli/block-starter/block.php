<?php
/**
 * Your block render code goes here.
 *
 * @package wd_f
 */

// ACF (Pro or Free) can be used here since we are loading this block using <ServerSideRender> (for the Free version), and adding this file as ACF render template.
// However, if using the free version of ACF, you would need to refresh the edit page to see your changes on the edit page.
?>
<p <?php echo esc_attr( get_block_wrapper_attributes() ); ?>>
	<?php esc_html_e( 'Example Dynamic - hello from a dynamic block!', 'wd_f' ); ?>
</p>
