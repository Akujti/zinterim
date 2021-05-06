<?php
/**
 * Theme stylesheets and scripts.
 *
 * @package Salzburg Blog
 */

function salzburg_scripts() {
	$salzburg_theme = wp_get_theme();

	// ------------------------------------------
	// If we are on the admin screen we dont need
	// to load the custom scripts and styles.
	// What we need to load is basic stylesheet.
	// ------------------------------------------
	wp_enqueue_style( 'salzburg-stylesheet', get_stylesheet_uri() );

	// ------------------------------------------
	// Enqueue Salzburg CSS
	// ------------------------------------------
	$style_src = WP_DEBUG ? 'style.css' : 'style.min.css';
	wp_enqueue_style( 'salzburg-styles', get_theme_file_uri( '/assets/styles/'. $style_src .'' ), false, $salzburg_theme->get( 'Version' ) );

	// If Kirki is not installed then enqueue default fonts.
	if ( ! class_exists( 'Kirki' ) ) {
		wp_enqueue_style( 'salzburg-fonts', '//fonts.googleapis.com/css?family=Muli|Source+Sans+Pro:700&display=fallback');
	}
	// ------------------------------------------
	// Enqueue Salzburg JS
	// ------------------------------------------
	$scripts_src = WP_DEBUG ? 'bundle.js' : 'bundle.min.js';
	wp_enqueue_script( 'salzburg-scripts', get_theme_file_uri( '/assets/scripts/'. $scripts_src .'' ), false, $salzburg_theme->get( 'Version' ), true );

	// ------------------------------------------
	// Add comments script.
	// ------------------------------------------
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'salzburg_scripts' );

/**
 * Add custom CSS in Customizer.
 */
function salzburg_enqueue_customizer_stylesheet() {

	wp_register_style( 'salzburg-customizer-css', get_template_directory_uri() . '/assets/styles/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'salzburg-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'salzburg_enqueue_customizer_stylesheet' );


/**
 * Display custom CSS.
 */
function salzburg_custom_styles() {

	$style = '<style type="text/css" id="theme-custom-styling">';
	$style .= salzburg_body_background_color_css();
	$style .= salzburg_primary_color_css();
	$style .= salzburg_typography_css();
	$style .= '</style>';

	echo $style;
}

add_action( 'wp_head', 'salzburg_custom_styles' );
