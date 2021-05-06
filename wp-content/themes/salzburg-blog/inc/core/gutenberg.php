<?php
/**
 * Declaring Gutenberg support.
 *
 * @package Salzburg Blog
 */
if ( ! function_exists( 'salzburg_add_gutenberg_support' ) ) :

	function salzburg_add_gutenberg_support() {
		/* The embed blocks automatically apply styles to embedded content
		 * to reflect the aspect ratio of content that is embedded in an iFrame.
		 */
		add_theme_support( 'responsive-embeds' );
	}

endif;

add_action( 'after_setup_theme', 'salzburg_add_gutenberg_support' );
