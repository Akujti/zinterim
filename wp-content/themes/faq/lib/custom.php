<?php
/**
 * Custom functions
 */



if ( ! function_exists( 'faq_ignore_sticky' ) ) :
/**
 *  drop sticky posts from the main query - we manually add it to the top
 */
function faq_ignore_sticky($query)
{
    if (is_home() && $query->is_main_query())
        $query->set('ignore_sticky_posts', true);
        // dropped due to issues with sticky post content >> 404 #bugfix in 1.0.7
        //$query->set('post__not_in', get_option('sticky_posts'));
}
add_action('pre_get_posts', 'faq_ignore_sticky');
endif;







if ( ! function_exists( 'faq_pagination_default' ) ) :
/**
 *  bootstrap pagination
 */
function faq_pagination_default() {
global $wp_query;
$big = 999999999; // need an unlikely integer
$output =  paginate_links(
    array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
        ) );

// required replacements for bootstrap pagination
$pattern = array("<span class='page-numbers current'>", "<ul class='page-numbers'>");
$replacement   = array("<span class='active'>", "<ul class='pagination pagination-lg'>");

$output = str_replace($pattern, $replacement, $output);


    // Display the pagination if more than one page is found
    if ( $output ) {
        echo $output;
    }
};
endif;




if ( ! function_exists( 'faq_add_custom_table_class' ) ) :
/**
 *  Add Bootstrap classes for table
 */
function faq_add_custom_table_class( $content ) {
    return str_replace( '<table>', '<table class="table table-hover">', $content );
}
add_filter( 'the_content', 'faq_add_custom_table_class' );
endif;




if ( ! function_exists( 'faq_password_protected_text' ) ) :
/**
 *  Snippet Name: Custom password protected text
 */
 function faq_password_protected_text($output)
{
    global $post;
    $adminEmail = get_option( 'admin_email' );
    $newPasswordText = '';
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="form-inline" role="form">
    <div class="alert alert-danger">' . __('Password Protected - please contact us.', 'faq').' <a href="mailto:'.antispambot( $adminEmail ).'">'.antispambot( $adminEmail ).'</a></div>
    <div class="form-group"><label for="' . $label . '">' . __( "Password:", 'faq' ) . ' </label> <input class="form-control" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" class="btn btn-default" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></div>
    </form>
    ';
    return $output;
}
add_filter( 'the_password_form', 'faq_password_protected_text', 999);
endif;




if ( ! function_exists( 'faq_related_by_category' ) ) :
/**
 *  get related posts by category
 */
function faq_related_by_category(  ) {
    global $post;
    // We should get the first category of the post
    $categories = get_the_category( $post->ID );
    $first_cat = $categories[0]->cat_ID;

    if( empty($output)) $output = '';
    $args = array(
        // It should be in the first category of our post:
        'category__in' => array( $first_cat ),
        // Our post should NOT be in the list:
        'post__not_in' => array( $post->ID ),
        // ...And it should fetch 5 posts - you can change this number if you like:
        'posts_per_page' => 5
    );
    // The get_posts() function
    $posts = get_posts( $args );
    if( $posts ) {
        $output = '<h4 class="faq-title">'. __('Related Articles', 'faq').'</h4><div class="list-group">';
        // Let's start the loop!
        foreach( $posts as $post ) {
            setup_postdata( $post );
            $post_title = get_the_title();
            $permalink = get_permalink();
            $updated = get_the_modified_time( 'F j, Y' );
            $output .= '<a class="list-group-item" href="' . $permalink . '" title="' . esc_attr( $post_title ) . '"> <i class="fa fa-caret-right"></i> ' . $post_title .'<div class="pull-right"><small>' . __('updated: ','faq') .  $updated . '</small></div></a>';
        }
        $output .= '</div>';
    } else {
        // If there are no posts, show nothing
            $output .= '';
    }
    echo $output;
    wp_reset_query(); // do not break the query.
}
endif;




if ( ! function_exists( 'faq_get_avatar_url' ) ) :
/**
 *  Get src URL from avatar <img> tag
 */
function faq_get_avatar_url($author_id, $size){
    $get_avatar = get_avatar( $author_id, $size );
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return ( $matches[1] );
}
endif;

if ( ! function_exists( 'faq_get_avatar' ) ) :
/**
 *  add classes to avatar
 */
function faq_get_avatar($avatar, $type) {
  if (!is_object($type)) { return $avatar; }

  $avatar = str_replace("class='avatar", "class='avatar pull-left media-object", $avatar);
  return $avatar;
}
add_filter('get_avatar', 'faq_get_avatar', 10, 2);
endif;




if ( ! function_exists( 'faq_link_pages' ) ) :
/*
 * Function similar to wp_link_pages but outputs an ordered list instead and adds a class of current to the current page
 */

function faq_link_pages( $args = '' ) {
    $defaults = array(
        'before'            => '',
        'after'             => '</ul>',
        'link_before'       => '',
        'link_after'        => '',
        'next_or_number'    => 'number',
        'nextpagelink'      => __( 'Next page', 'faq' ),
        'previouspagelink'  => __( 'Previous page', 'faq' ),
        'pagelink'          => '%',
        'echo'              => 1
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    $output = '';
    if ( $multipage ) {
        if ( 'number' == $next_or_number ) {
            $output .= $before;
            $output .= '<ul class="pagination">';
            for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                $j = str_replace( '%', $i, $pagelink );
                if ( ( $i == $page )) {
                    $output .= '<li class="active"><a href="#">';
                } else {
                    $output .= '</a><li>';
                }
                if ( ( $i != $page ) || ( ( ! $more ) && ( $page == 1 ) ) ) {
                    $output .= _wp_link_page( $i );
                }
                $output .= $link_before . $j . $link_after;
                if ( ( $i != $page ) || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= '</a>';
            }
            $output .= '</li>';
            $output .= $after;
        } else {
            if ( $more ) {
                $output .= $before;
                $i = $page - 1;
                if ( $i && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $link_before . $previouspagelink . $link_after . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $link_before . $nextpagelink . $link_after . '</a>';
                }
                $output .= '</ul>';
                $output .= $after;
            }
        }
    }

    if ( $echo )
        echo $output;

    return $output;
}
endif;




if ( ! function_exists( 'faq_jetpack_scroll' ) ) :
/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function faq_jetpack_scroll() {
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'infinite-scroll', array(
            'container' => 'content',
            'footer'    => 'page',
        ) );
    }
}
add_action( 'after_setup_theme', 'faq_jetpack_scroll' );
endif;





if ( ! function_exists( 'faq_footer_support' ) ) :
/**
 * Footer credits - return some love if you like the theme.
 */
function faq_footer_support() {

       $text =  bloginfo('description');
       $text .= sprintf( __( ' %1$s is built by %2$s', 'faq' ), '<div class="pull-right"><small>FAQ ', '<a href="http://www.wpcustoms.net/" rel="designer" title="WPcustoms">WPcustoms</a></small></div>' );

    echo  apply_filters( 'faq_footer_support', $text ) ;
}
add_action( 'faq_footer_credits', 'faq_footer_support' );

endif;