<?php
/**
 * Your block render code goes here.
 *
 * @package wd_f
 */

?>
<p <?php echo esc_attr( get_block_wrapper_attributes() ); ?>>
	<?php esc_html_e( 'Example Dynamic - hello from a dynamic block!', 'wd_f' ); ?>
</p>
