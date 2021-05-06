<?php
/**
 * Enable theme features
 */

add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('nice-search');           // Enable /?s= to /search/ redirect


/**
 * Configuration values
 */
define('POST_EXCERPT_LENGTH', 40); // Length in words for excerpt_length filter (http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length)

/**
 * .main classes
 */
function faq_main_class() {
  if (faq_display_sidebar()) {
    // Classes on pages with the sidebar
    $class = 'col-sm-8';
  } else {
    // Classes on full width pages
    $class = 'col-sm-12';
  }

  return $class;
}

/**
 * .sidebar classes
 */
function faq_sidebar_class() {
  return 'col-sm-4';
}

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function faq_display_sidebar() {
  $sidebar_config = new faq_Sidebar(
    /**
     * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
     * Any of these conditional tags that return true won't show the sidebar
     *
     * To use a function that accepts arguments, use the following format:
     *
     * array('function_name', array('arg1', 'arg2'))
     *
     * The second element must be an array even if there's only 1 argument.
     */
    array(
      //'is_404',

    ),
    /**
     * Page template checks (via is_page_template())
     * Any of these page templates that return true won't show the sidebar
     */
    array(
      'page-categorylist.php',
      'page-nosidebar.php'
    )
  );

  return apply_filters('faq_display_sidebar', $sidebar_config->display);
}


