<?php
/**
 * Display post taxonomies template function.
 *
 * @package wd_f
 */

namespace WebDevStudios\wd_f;

/**
 * Prints HTML with taxonomies for the current post.
 *
 * @author WebDevStudios
 *
 * @param array $args Configuration args.
 */
function print_post_taxonomies( $args = [] ) {

	// Set defaults.
	$defaults = [
		'tax_name' => '',
		'post_id'  => get_the_ID(),
		'linked'   => true,
		'in_list'  => true,
	];

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Bail early if we have no post id or taxonomy name.
	if ( empty( $args['post_id'] ) || empty( $args['tax_name'] ) ) :
		return;
	endif;

	// Get the terms.
	$wd_f_terms = get_the_terms( $args['post_id'], $args['tax_name'] );

	// Set up the display.
	$wd_f_tagname = $args['in_list'] ? 'ul' : 'span';
	?>

	<<?php echo $wd_f_tagname; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="post-taxonomies">
		<?php
		foreach ( $wd_f_terms as $wd_f_term ) :
			echo wp_kses_post( $args['in_list'] ? '<li class="taxonomy-item">' : '<span class="taxonomy-item">' );
			if ( $args['linked'] ) :
				print_element(
					'anchor',
					[
						'text' => $wd_f_term->name,
						'href' => get_term_link( $wd_f_term->term_id, $args['tax_name'] ),
					]
				);
			else :
				echo esc_html( $wd_f_term->name );
			endif;
			echo $args['in_list'] ? '</li>' : '</span>';
		endforeach;
		?>
	</<?php echo $wd_f_tagname; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<?php
}
