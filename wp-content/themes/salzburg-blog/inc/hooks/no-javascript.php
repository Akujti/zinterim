<?php
if ( ! function_exists( 'salzburg_no_javascript' ) ) :
	/**
	 * Adds custom message when JavaScript is not available.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_no_javascript() {
		$output = '<noscript>';
		$output .= '<p class="noscript-notification">';
		$output .= esc_html__( 'This website works best with JavaScript enabled.', 'salzburg-blog' );
		$output .= '</p>';
		$output .= '</noscript>';

		return $output;

	}

endif;

add_action( 'wp_body_open', 'salzburg_no_javascript' );
