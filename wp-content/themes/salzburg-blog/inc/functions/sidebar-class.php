<?php

if ( ! function_exists( 'salzburg_sidebar_class' ) ) :
	/**
	 * Echoes selected sidebar class for styling.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_sidebar_class( $layout = 'sidebar-right' ) {
		echo salzburg_get_sidebar_class( $layout );
	}
endif;


if ( ! function_exists( 'salzburg_get_sidebar_class' ) ) :
	/**
	 * Returns selected sidebar class for styling.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_get_sidebar_class( $layout = 'sidebar-right' ) {
		$output = ( $layout !== 'sidebar-left' &&
					$layout !== 'sidebar-right') ?
					'no-sidebar' : 'sidebar-layout';

		return $output;
	}

endif;
