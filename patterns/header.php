<?php
/**
 * Title: Header
 * Slug: wds/header
 * Description: Header with site logo and navigation.
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-300","textColor":"secondary-100","layout":{"type":"constrained","wideSize":"100vw","contentSize":"80vw"}} -->
<header class="wp-block-group has-secondary-100-color has-primary-300-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"align":"center","id":189,"width":150,"sizeSlug":"medium","linkDestination":"none"} -->
<figure class="wp-block-image aligncenter size-medium is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'src/images/wds-light-transparent-300x76.png' ) ) ?>" alt="" class="wp-image-189" width="150"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:navigation {"ref":187,"overlayBackgroundColor":"secondary-200","overlayTextColor":"primary-300","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"medium"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></header>
<!-- /wp:group -->
