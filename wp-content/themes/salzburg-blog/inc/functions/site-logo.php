<?php
if ( ! function_exists( 'salzburg_logo' ) ) :
	/**
	 * Adds custom logo option
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}

endif;