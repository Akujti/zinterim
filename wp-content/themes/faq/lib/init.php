<?php
/**
 * faq initial setup and constants
 */
function faq_setup() {
  // Make theme available for translation
  load_theme_textdomain('faq', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'faq'),
    'footer_navigation' => __('Footer Navigation', 'faq'),
  ));


  /**
   * Set up the WordPress custom background settings.
   */
  add_theme_support( 'custom-background', apply_filters( 'faq_custom_background_args', array(
  'default-color'           => 'ffffff',
  'wp-head-callback'        => '_custom_background_cb',
  'admin-head-callback'     => '',
  'admin-preview-callback'  => '',
      )
    )
  );


  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list',
  ) );

  // This theme uses its own gallery styles.
  add_filter( 'use_default_gallery_style', '__return_false' );

  add_theme_support( 'automatic-feed-links' );
  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');

  /**
   * $content_width is a global variable used by WordPress for max image upload sizes
   * and media embeds (in pixels).
   *
   * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
   * Default: 1140px is the default Bootstrap container width.
   */
  if (!isset($content_width)) { $content_width = 1140; }

}

add_action('after_setup_theme', 'faq_setup');




/**
 * Register sidebars and widgets
 */
function faq_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Sidebar', 'faq'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="faq-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Left', 'faq'),
    'id'            => 'sidebar-footer-1',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="faq-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Middle', 'faq'),
    'id'            => 'sidebar-footer-2',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="faq-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Right', 'faq'),
    'id'            => 'sidebar-footer-3',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="faq-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name' => __( 'Front Page Widget', 'faq' ),
    'id' => 'frontpage-widget',
    'description' => __( 'Appears only on your frontpage.', 'faq' ),
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="faq-title">',
    'after_title'   => '</h3>',
  ) );


  // Widgets
  register_widget('faq_popular_posts_widget');
}
add_action('widgets_init', 'faq_widgets_init');



