<?php
/**
 * Salzburg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Salzburg Blog
 */

if ( ! function_exists( 'salzburg_freemius' ) ) {
	// Create a helper function for easy SDK access.
	function salzburg_freemius() {
		global  $salzburg_freemius ;
		if ( !isset( $salzburg_freemius ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/freemius/start.php';
			$salzburg_freemius = fs_dynamic_init( array(
				'id'				=> '4566',
				'slug'				=> 'salzburg-blog',
				'type'				=> 'theme',
				'public_key'		=> 'pk_3deedc432ab5df805925723c37365',
				'is_premium'		=> false,
				'premium_suffix'	=> 'Premium',
				'has_addons'		=> false,
				'has_paid_plans'	=> true,
				'menu'				=> array(
					'slug'   => 'salzburg-welcome-page',
					'parent' => array(
						'slug' => 'themes.php',
					),
				),
				'is_live'			=> true,
			) );
		}
		return $salzburg_freemius;
	}
	// Init Freemius.
	salzburg_freemius();
	// Signal that SDK was initiated.
	do_action( 'salzburg_freemius_loaded' );
}

/**
 * Theme options
 */
require get_template_directory() . '/inc/theme-options/options.php';
require get_template_directory() . '/inc/theme-options/get-salzburg-options.php';
require get_template_directory() . '/inc/hooks/theme-options-config.php';
require get_template_directory() . '/inc/hooks/disable-kirki-telemetry.php';

/**
 * Core functionality
 */
require get_template_directory() . '/inc/core/settings.php';
require get_template_directory() . '/inc/core/gutenberg.php';
require get_template_directory() . '/inc/core/scripts.php';
require get_template_directory() . '/inc/core/widgets.php';
require get_template_directory() . '/inc/core/recommended-plugins.php';
require get_template_directory() . '/inc/core/theme-page.php';

/**
 * Functions
 */
require get_template_directory() . '/inc/functions/body-open.php';
require get_template_directory() . '/inc/functions/layout-switcher.php';
require get_template_directory() . '/inc/functions/sidebar-class.php';
require get_template_directory() . '/inc/functions/site-logo.php';
require get_template_directory() . '/inc/functions/site-branding.php';
require get_template_directory() . '/inc/functions/posted-meta.php';
require get_template_directory() . '/inc/functions/posted-on.php';
require get_template_directory() . '/inc/functions/post-pagination.php';
require get_template_directory() . '/inc/functions/post-thumbnail.php';
require get_template_directory() . '/inc/functions/post-terms.php';
require get_template_directory() . '/inc/functions/edit-link.php';
require get_template_directory() . '/inc/functions/next-read.php';
require get_template_directory() . '/inc/functions/css-primary-color.php';
require get_template_directory() . '/inc/functions/css-body-background-color.php';
require get_template_directory() . '/inc/functions/css-font-sizes.php';
require get_template_directory() . '/inc/functions/sticky-pin.php';
require get_template_directory() . '/inc/functions/hero-html-element.php';

/**
 * Hooks
 * actions and filters used in the theme
 */
require get_template_directory() . '/inc/hooks/body-classes.php';
require get_template_directory() . '/inc/hooks/excerpt-more.php';
require get_template_directory() . '/inc/hooks/icons.php';
require get_template_directory() . '/inc/hooks/javascript-detect.php';
require get_template_directory() . '/inc/hooks/no-javascript.php';
