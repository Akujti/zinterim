<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package Salzburg Blog
 */


add_action( 'widgets_init', 'salzburg_widgets_init' );

function salzburg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main widget area', 'salzburg-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here for main sidebar.', 'salzburg-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 1', 'salzburg-blog' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here for footer widget area 1.', 'salzburg-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 2', 'salzburg-blog' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here for footer widget area 2.', 'salzburg-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 3', 'salzburg-blog' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here for footer widget area 3.', 'salzburg-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 4', 'salzburg-blog' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here for footer widget area 4.', 'salzburg-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
