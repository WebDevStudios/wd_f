<?php
/**
 * Your block render code goes here.
 *
 * @package wd_f
 */

// Add classes to block.
$wds_classes = '';
if ( ! empty( $block['className'] ) ) {
	$wds_classes .= $block['className'] . ' ';
}
if ( ! empty( $block['align'] ) ) {
	$wds_classes .= 'align' . $block['align'] . ' ';
}

// Add anchor to the block.
$wds_anchor = ( ! empty( $block['anchor'] ) ) ? 'id="' . esc_attr( $block['anchor'] ) . '" ' : '';
?>
<section <?php echo $wds_anchor; //phpcs:ignore ?>class="<?php echo esc_attr( $wds_classes ); ?>">
	<!-- Your block render code goes here. -->
</section>
