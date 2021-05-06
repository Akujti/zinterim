<?php
/**
 * Generate the CSS for the selected background color.
 *
 * @package Salzburg Blog
 */
function salzburg_body_background_color_css() {
	$body_background_color = salzburg_get_theme_option( 'body_background_color' );

	$css = '
		body {
			background-color:' . sanitize_hex_color( $body_background_color ) . ';
		}
	';

	return apply_filters( 'salzburg_primary_color_css', $css );
}
