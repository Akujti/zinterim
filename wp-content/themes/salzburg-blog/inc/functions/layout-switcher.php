<?php
if ( ! function_exists( 'salzburg_layout_switcher' ) ) :
	/**
	 * Prints correct loop based on user's preference.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_layout_switcher() {
		if ( salzburg_get_theme_option( 'home_hero' ) === 'no-hero' ) {
			get_template_part( 'template-parts/loop/no-hero' );
		} else {
			get_template_part( 'template-parts/loop/index' );
		}
	}

endif;
