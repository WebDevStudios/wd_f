<?php
/**
 * Title: Header
 * Slug: wds/header
 * Description: Header with site logo and navigation.
 * Categories: header
 * Block Types: core/template-part/header
 *
 * @package wd_f
 */

?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained","wideSize":"100vw","contentSize":"80vw"}} -->
<header class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-title /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:navigation {"ref":187,"overlayBackgroundColor":"secondary-200","overlayTextColor":"primary-300","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"medium"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></header>
<!-- /wp:group -->
