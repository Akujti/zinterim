<?php
/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * FAQ_Nav_Walker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 */



function faq_is_element_empty($element) {
  $element = trim($element);
  return empty($element) ? false : true;
}



class FAQ_Nav_Walker extends Walker_Nav_Menu {
  function check_current($classes) {
    return preg_match('/(current[-_])|active|dropdown/', $classes);
  }

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= "\n<ul class=\"dropdown-menu \">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $item_html = '';
    parent::start_el($item_html, $item, $depth, $args);

    if ($item->is_dropdown && ($depth === 0)) {
      $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
      $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
    }
    elseif (stristr($item_html, 'li class="divider')) {
      $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
    }
    elseif (stristr($item_html, 'li class="dropdown-header')) {
      $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
    }

    $item_html = apply_filters('faq_wp_nav_menu_item', $item_html);
    $output .= $item_html;
  }

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
    $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

    if ($element->is_dropdown) {
      $element->classes[] = 'dropdown';
    }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }
}

/**
 * Remove the id="" on nav menu items
 * Return 'menu-slug' for nav menu classes
 */
function faq_nav_menu_css_class($classes, $item) {
  $slug = sanitize_title($item->title);
  $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
  $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

  $classes[] = 'menu-' . $slug;

  $classes = array_unique($classes);

  return array_filter($classes, 'faq_is_element_empty');
}
add_filter('nav_menu_css_class', 'faq_nav_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');

/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 * Use FAQ_Nav_Walker() by default
 */
function faq_nav_menu_args($args = '') {
  $faq_nav_menu_args['container'] = false;

  if (!$args['items_wrap']) {
    $faq_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
  }

  if (!$args['depth']) {
    $faq_nav_menu_args['depth'] = 2;
  }

  if (!$args['walker']) {
    $faq_nav_menu_args['walker'] = new FAQ_Nav_Walker();
  }

  return array_merge($args, $faq_nav_menu_args);
}
add_filter('wp_nav_menu_args', 'faq_nav_menu_args');




/**
 * Display page list when no menu is assigned (based on wp_list_pages function by wordpress team)
 *
 * @since 0.0.1
 *
 * @param array|string $args
 * @return string html menu
 */
function faq_default_menu( $args = array() ) {
  $defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
  $args = wp_parse_args( $args, $defaults );
  $args = apply_filters( 'faq_default_menu_args', $args );

  $menu = '';

  $list_args = $args;

  // Show Home in the menu
  if ( ! empty($args['show_home']) ) {
    if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
      $text = __('Home', 'omega');
    else
      $text = $args['show_home'];
    $class = '';
    if ( is_front_page() && !is_paged() )
      $class = 'class="current_page_item"';
    $menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
    // If the front page is a page, add it to the exclude list
    if (get_option('show_on_front') == 'page') {
      if ( !empty( $list_args['exclude'] ) ) {
        $list_args['exclude'] .= ',';
      } else {
        $list_args['exclude'] = '';
      }
      $list_args['exclude'] .= get_option('page_on_front');
    }
  }

  $list_args['echo'] = false;
  $list_args['walker'] = new FAQ_Nav_Walker();
  $list_args['title_li'] = '';
  $menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

  if ( $menu )
    $menu = '<ul class="' . esc_attr($args['menu_class']) . '">' . $menu . '</ul>';

  $menu = apply_filters( 'faq_default_menu', $menu, $args );

  if ( $args['echo'] )
    echo $menu;
  else
    return $menu;
}






// depth = 0 styling
function custom_list_categories( $args = '' ) {
  $defaults = array(
    'taxonomy' => 'category',
    'show_option_none' => '',
    'echo' => 1,
    'depth' => 2,
    'wrap_class' => '',
    'level_class' => '',
    'parent_title_format' => '%s',
    'current_class' => 'active'
  );
  $r = wp_parse_args( $args, $defaults );
  if ( ! isset( $r['wrap_class'] ) ) $r['wrap_class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];
  extract( $r );
  if ( ! taxonomy_exists($taxonomy) ) return false;
  $categories = get_categories( $r );
  $output = "" . PHP_EOL;
  if ( empty( $categories ) ) {
    if ( ! empty( $show_option_none ) ) $output .= "<li>" . $show_option_none . "</li>" . PHP_EOL;
  } else {
    if ( is_category() || is_tax() || is_tag() ) {
      $current_term_object = get_queried_object();
      if ( $r['taxonomy'] == $current_term_object->taxonomy ) $r['current_category'] = get_queried_object_id();
    }
    $depth = $r['depth'];
    $walker = new FAQ_Category_Walker;

    $output .= $walker->walk($categories, $depth, $r);
  }
  //$output .= "</ul>" . PHP_EOL;
  if ( $echo ) echo $output;
  else return $output;
}




class FAQ_Category_Walker extends Walker_Category {

  var $lev = -1;
  var $skip = 0;
  static $current_parent;


  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $this->lev = 0;

  }


  function end_lvl( &$output, $depth = 0, $args = array() ) {

    $this->lev = -1;
  }

  function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
    extract($args);
    if (empty($class)) $class = ''; // define our $class variable first
    $cat_name = esc_attr( $category->name );
    $class_current = $current_class ? $current_class . ' ' : 'current ';
    if ( ! empty($current_category) ) {
      $_current_category = get_term( $current_category, $category->taxonomy );
      if ( $category->term_id == $current_category ) $class = $class_current;
      elseif ( $category->term_id == $_current_category->parent ) $class = rtrim($class_current) . '-parent ';
    } else {
    $class = '';
    }

    // define our active class variable
    if ( !empty($current_category) ) {
    if (empty($active_class)) $active_class = '';
        $_current_category = get_term( $current_category, $category->taxonomy );
        if ( $category->term_id == $current_category )
            $active_class =  'active';
        elseif ( $category->term_id == $_current_category->parent )
            $active_class =  ' active-parent';
    } else {
    $active_class = '';
    }


    if ( ! $category->parent ) {
      if ( ! get_term_children( $category->term_id, $category->taxonomy ) ) {
        // uncomment the next line if you want to also list categories which have no child categories.
        // $output .= '<a href="' . esc_url( get_term_link($category) ) . '" class="list-group-item '.$active_class.'"><i class="fa fa-caret-right"></i> &nbsp;<strong>'. sprintf($parent_title_format, $cat_name).'</strong></a>';
          $this->skip = 1;
      } else {
        if ($class == $class_current) self::$current_parent = $category->term_id;
      $output .= '<a href="' . esc_url( get_term_link($category) ) . '" class="list-group-item '.$active_class.'"><i class="fa fa-caret-right"></i> &nbsp;<strong>'. sprintf($parent_title_format, $cat_name).'</strong></a>';
      }
    } else {
      if ( $this->lev == 0 && $category->parent) {
        $link = get_term_link(intval($category->parent) , $category->taxonomy);
        $stored_parent = intval(self::$current_parent);
        $now_parent = intval($category->parent);
        $all_class = ($stored_parent > 0 && ( $stored_parent === $now_parent) ) ? $class_current . ' all' : 'all';
        //$output .= "<a href='" . $link . "' class='list-group-item'>" . __('All') . "</a>\n";
        self::$current_parent = null;
      }

      $link = '<a href="' . esc_url( get_term_link($category) ) . '" class="subcat list-group-item '.$active_class.'"><i class="fa fa-angle-right"></i> &nbsp;' . $cat_name . '</a>';
      $output .=  $link;
    }
  }

  function end_el( &$output, $page, $depth = 0, $args = array() ) {
    $this->lev++;
    if ( $this->skip == 1 ) {
      $this->skip = 0;
      return;
    }
    $output .= "</li>" . PHP_EOL;
  }

}

