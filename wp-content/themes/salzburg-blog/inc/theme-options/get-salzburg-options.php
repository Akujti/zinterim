<?php

/**
 * Retrieves information about the current site.
 *
 * @return string Mostly string values, might be empty.
 */
function salzburg_get_theme_option( $option ) {
	switch ( $option ) {
		case 'primary_color':
			$output = salzburg_get_primary_color();
			break;
		case 'body_background_color':
			$output = salzburg_get_body_background_color();
			break;
		case 'home_hero':
			$output = salzburg_get_home_hero();
			break;
		case 'home_loop':
			$output = salzburg_get_home_loop();
			break;
		case 'single_hero':
			$output = salzburg_get_single_hero();
			break;
		case 'single_layout':
			$output = salzburg_get_single_layout();
			break;
		case 'page_hero':
			$output = salzburg_get_page_hero();
			break;
		case 'page_layout':
			$output = salzburg_get_page_layout();
			break;
		default:
		   $output = '';
	}

	return $output;
}

function salzburg_get_primary_color() {
	return get_theme_mod( 'primary_color_predefined', '#ff353e' );
}

function salzburg_get_body_background_color() {
	$selected_option = get_theme_mod( 'body_background_color_switch', '0' );
	return ( $selected_option == '0' ) ?
		get_theme_mod( 'body_background_color_predefined', '#fff' ) :
		get_theme_mod( 'body_background_color_custom', '#fff' );
}

function salzburg_get_home_hero() {
	return get_theme_mod( 'homepage_hero_layout_select', 'square' );
}

function salzburg_get_home_loop() {
	return get_theme_mod( 'homepage_loop_layout_select', 'rectangle' );
}

function salzburg_get_single_hero() {
	return get_theme_mod( 'single_hero_layout_select', 'square' );
}

function salzburg_get_single_layout() {
	return get_theme_mod( 'single_content_layout_select', 'sidebar-right' );
}

function salzburg_get_page_hero() {
	return get_theme_mod( 'page_hero_layout_select', 'square' );
}

function salzburg_get_page_layout() {
	return get_theme_mod( 'page_content_layout_select', 'sidebar-right' );
}
