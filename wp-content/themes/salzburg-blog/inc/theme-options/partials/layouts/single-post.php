<?php
// ----------------------------------------------------------------
// Layouts: Single page
// ----------------------------------------------------------------
Kirki::add_section( 'single_layout', array(
	'title'          => esc_html__( 'Single post', 'salzburg-blog' ),
	'panel'          => 'layouts_options',
) );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'select',
	'settings'    => 'single_hero_layout_select',
	'label'       => esc_html__( 'Single post hero layout', 'salzburg-blog' ),
	'section'     => 'single_layout',
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
	'settings'    => 'single_content_layout_select',
	'label'       => esc_html__( 'Single post content layout', 'salzburg-blog' ),
	'section'     => 'single_layout',
	'default'     => 'sidebar-right',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'sidebar-right' => esc_html__( 'Right sidebar', 'salzburg-blog' ),
		'sidebar-left' => esc_html__( 'Left sidebar', 'salzburg-blog' ),
	],
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'switch',
	'settings'    => 'single_next_post_switch',
	'label'       => esc_html__( 'Show next read', 'salzburg-blog' ),
	'section'     => 'single_layout',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'salzburg-blog' ),
		'off' => esc_html__( 'Hide', 'salzburg-blog' ),
	],
] );
