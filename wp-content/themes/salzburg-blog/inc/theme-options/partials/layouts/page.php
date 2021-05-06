<?php
// ----------------------------------------------------------------
// Layouts: Single page
// ----------------------------------------------------------------
Kirki::add_section( 'page_layout', array(
	'title'          => esc_html__( 'Page', 'salzburg-blog' ),
	'panel'          => 'layouts_options',
) );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'select',
	'settings'    => 'page_hero_layout_select',
	'label'       => esc_html__( 'Page hero layout', 'salzburg-blog' ),
	'section'     => 'page_layout',
	'default'     => 'square',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'square' => esc_html__( 'Square', 'salzburg-blog' ),
		'minimal' => esc_html__( 'Minimal', 'salzburg-blog' ),
	],
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'select',
	'settings'    => 'page_content_layout_select',
	'label'       => esc_html__( 'Page content layout', 'salzburg-blog' ),
	'section'     => 'page_layout',
	'default'     => 'sidebar-right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'sidebar-right' => esc_html__( 'Right sidebar', 'salzburg-blog' ),
		'sidebar-left' => esc_html__( 'Left sidebar', 'salzburg-blog' ),
	],
] );
