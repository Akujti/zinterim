<?php
/**
 * Generate the CSS for the user selected font sizes.
 *
 * @package Salzburg Blog
 */
function salzburg_typography_css() {
	$hero_heading = sanitize_text_field( get_theme_mod( 'typography_hero_heading', '3.5rem' ) );
	$hero_subheading = sanitize_text_field (get_theme_mod( 'typography_hero_subheading', '1rem' ) );
	$loop_title = sanitize_text_field( get_theme_mod( 'typography_loop_title', '1.875rem' ) );
	$loop_excerpt = sanitize_text_field( get_theme_mod( 'typography_loop_excerpt', '1rem' ) );
	$post_content = sanitize_text_field( get_theme_mod( 'typography_single_post_content', '1.125rem' ) );

	$css = '
		.hero-headline {
			font-size:' . $hero_heading . ';
		}

		.hero-subheadline {
			font-size:' . $hero_subheading . ';
		}

		.loop-minimal-one .entry-title,
		.loop-vertical .entry-title {
			font-size: ' . $loop_title . ';
		}

		.loop-minimal-one .entry-body p {
			font-size: ' . $loop_excerpt . ';
		}

		.entry-content p:not(.has-small-font-size):not(.has-large-font-size):not(.wp-block-quote>p),
		.entry-content ul {
			font-size: ' . $post_content . ';
		}

	';

	return apply_filters( 'salzburg_typography_css', $css );
}