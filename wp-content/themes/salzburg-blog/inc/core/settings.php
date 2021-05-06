<?php
/**
 * Theme General Settings.
 *
 * @package Salzburg Blog
 */

if ( ! function_exists( 'salzburg_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function salzburg_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on salzburg, use a find and replace
		 * to change 'salzburg-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'salzburg-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 610, 610, true ); // sets the default featured image dimensions.
		add_image_size( 'salzburg-blog-vertical', 405, 500, true );
		add_image_size( 'salzburg-blog-small-square', 300, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'salzburg-blog' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 180,
				'height'      => 60,
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);
	}
endif;

add_action( 'after_setup_theme', 'salzburg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function salzburg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'salzburg_content_width', 952 );
}

add_action( 'after_setup_theme', 'salzburg_content_width', 0 );
