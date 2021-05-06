<?php
/**
 * Enqueue scripts and stylesheets
 *
 */
function faq_scripts() {
  // $css_file: set our version number to last file change date timestamp
  $faq_css_file = get_template_directory() . '/assets/css/main.min.css';
  wp_enqueue_style('faq_main', get_template_directory_uri() . '/assets/css/main.min.css', false,  filemtime($faq_css_file));
  wp_enqueue_style('faq_fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false,  '4.0.3'); // solo enqueue for max compability in firefox
  wp_enqueue_style('faq_style', get_template_directory_uri() . '/style.css', false);

// bugfix report - roots: is_single needs to be is_singular
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_register_script('faq_modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', array(), null, false);
  wp_register_script('faq_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '4c66da3ec00dd0e471a48d7551a0d5e9', false);
  wp_enqueue_script('faq_modernizr');
  wp_enqueue_script('faq_scripts');

}
add_action('wp_enqueue_scripts', 'faq_scripts', 100);