<?php
if ( ! function_exists( 'salzburg_sticky_pin' ) ) :
	/**
	 * Displays sticky pin icon
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_sticky_pin() {
		if ( is_sticky() && is_home() ) :
			echo salzburg_get_svg( array( 'icon' => 'pin' ) );
		endif;
	}

endif;