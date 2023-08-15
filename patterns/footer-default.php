<?php
/**
 * Title: Default Footer
 * Slug: wds/footer-default
 * Description: Footer with site logo and menus.
 * Categories: footer
 * Block Types: core/template-part/footer
 *
 * @package wd_f
 */

?>
<!-- wp:group {"tagName":"footer","style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary-300"}}},"spacing":{"blockGap":"var:preset|spacing|40"}},"backgroundColor":"primary-300","textColor":"secondary-100","layout":{"type":"constrained","wideSize":"100vw"}} -->
<footer class="wp-block-group has-secondary-100-color has-primary-300-background-color has-text-color has-background has-link-color">
	<!-- wp:image {"align":"center","id":189,"width":150,"sizeSlug":"medium","linkDestination":"none"} -->
	<figure class="wp-block-image aligncenter size-medium is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'src/images/site-logo-transparent.png' ) ); ?>" alt="" class="wp-image-189" width="150"/></figure>
	<!-- /wp:image -->

	<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">
	<?php
		printf(
			/* Translators: WordPress link. */
			esc_html__( 'Proudly powered by %s', 'wd_f' ),
			'<a href="' . esc_url( __( 'https://wordpress.org', 'wd_f' ) ) . '" rel="nofollow">WordPress</a> Hosted by WP Engine. WebDevStudios is a <strong><a href="' . esc_url( __( 'https://wd3.co/', 'wd_f' ) ) . '">WD3</a></strong> Party'
		);
		?>
	</p>
	<!-- /wp:paragraph -->
</footer>
<!-- /wp:group -->
