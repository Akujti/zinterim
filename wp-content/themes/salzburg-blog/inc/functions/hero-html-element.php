<?php
if ( ! function_exists( 'salzburg_hero_html_element' ) ) :
	/**
	 * Outputs 'div' or 'article' based on currently active page.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_hero_html_element() {
		return is_singular() ? 'div' : 'article';
	}

endif;
