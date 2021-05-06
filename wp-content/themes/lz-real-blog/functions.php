<?php
/**
 * lz-real-blog functions and definitions
 *
 * 
 * @subpackage lz-real-blog
 * @since 1.0
 */

function lz_real_blog_setup() {

	load_theme_textdomain( 'lz-real-blog', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	));

	add_image_size( 'lz-real-blog-featured-image', 2000, 1200, true );

	add_image_size( 'lz-real-blog-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lz-real-blog' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', lz_real_blog_fonts_url() ) );

	// Theme Activation Notice
	global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'lz_real_blog_activation_notice' );
	}

}
add_action( 'after_setup_theme', 'lz_real_blog_setup' );

// Notice after Theme Activation
function lz_real_blog_activation_notice() {
	echo '<div class="notice notice-success is-dismissible start-notice">';
		echo '<h3>'. esc_html__( 'Welcome to Luzuk!!', 'lz-real-blog' ) .'</h3>';
		echo '<p>'. esc_html__( 'Thank you for choosing LZ Real Blog theme. It will be our pleasure to have you on our Welcome page to serve you better.', 'lz-real-blog' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=lz_real_blog_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'lz-real-blog' ) .'</a></p>';
	echo '</div>';
}

function lz_real_blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'lz-real-blog' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'lz-real-blog' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'lz-real-blog' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'lz-real-blog' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'lz-real-blog' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'lz-real-blog' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'lz-real-blog' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'lz-real-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'lz_real_blog_widgets_init' );

function lz_real_blog_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:200,200i,300,300i,400,400i,500,500i,700i,800i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function lz_real_blog_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'lz-real-blog-fonts', lz_real_blog_fonts_url(), array(), null );
		//Bootstarp 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );	
	
	// Theme stylesheet.
	wp_enqueue_style( 'lz-real-blog-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'lz-real-blog-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'lz-real-blog-style' ), '1.0' );
		wp_style_add_data( 'lz-real-blog-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'lz-real-blog-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'lz-real-blog-style' ), '1.0' );
	wp_style_add_data( 'lz-real-blog-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'lz-real-blog-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lz_real_blog_scripts' );

function lz_real_blog_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'lz_real_blog_front_page_template' );

function lz_real_blog_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function lz_real_blog_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Link
define('LZ_REAL_BLOG_LIVE_DEMO',__('https://luzukdemo.com/demo/lz-real-blog-pro/','lz-real-blog'));
define('LZ_REAL_BLOG_PRO_DOCS',__('https://luzukdemo.com/demo/lz-real-blog-pro/documentation/','lz-real-blog'));
define('LZ_REAL_BLOG_BUY_NOW',__('https://www.luzuk.com/product/premium-blog-wordpress-theme/','lz-real-blog'));
define('LZ_REAL_BLOG_SUPPORT',__('https://wordpress.org/support/theme/lz-real-blog/','lz-real-blog'));
define('LZ_REAL_BLOG_FACEBOOK',__('https://www.facebook.com/sharer/sharer.php?u=','lz-real-blog'));
define('LZ_REAL_BLOG_TWITTER',__('https://twitter.com/share?url=','lz-real-blog'));
define('LZ_REAL_BLOG_LINKDIN',__('https://www.linkedin.com/shareArticle?mini=true&url=','lz-real-blog'));
define('LZ_REAL_BLOG_INSTAGRAM',__('http://www.instagram.com/submit?url=','lz-real-blog'));
define('LZ_REAL_BLOG_PINTREST',__('http://www.pinterest.com/submit?url=','lz-real-blog'));
define('LZ_REAL_BLOG_CREDIT',__('https://www.luzuk.com/themes/free-blog-wordpress-theme/','lz-real-blog'));

if ( ! function_exists( 'lz_real_blog_credit' ) ) {
	function lz_real_blog_credit(){
		echo "<a href=".esc_url(LZ_REAL_BLOG_CREDIT)." target='_blank' >".esc_html__('Blog WordPress Theme','lz-real-blog')."</a>";
	}
}

/* Excerpt Limit Begin */
function lz_real_blog_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'lz_real_blog_loop_columns');
	if (!function_exists('lz_real_blog_loop_columns')) {
		function lz_real_blog_loop_columns() {
	return 3; // 3 products per row
	}
}

function lz_real_blog_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function lz_real_blog_sanitize_checkbox( $input ) {
	
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function lz_real_blog_sanitize_email( $email, $setting ) {
	// Strips out all characters that are not allowable in an email address.
	$email = sanitize_email( $email );

	// If $email is a valid email, return it; otherwise, return the default.
	return ( ! is_null( $email ) ? $email : $setting->default );
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/getting-started/getting-started.php' );