<?php
// ----------------------------------------------------------------
// Layouts: Homepage
// ----------------------------------------------------------------
Kirki::add_section( 'homepage_layout', array(
	'title'          => esc_html__( 'Homepage', 'salzburg-blog' ),
	'panel'          => 'layouts_options',
) );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'custom',
	'settings'    => 'section_divider_3',
	'section'     => 'homepage_layout',
	'default'     => '<div style="padding: 10px 30px;background-color:#fff; margin-left: -15px; margin-right: -15px; margin-bottom: 10px;">' . esc_html__( 'Below layouts will apply also to archive and search pages', 'salzburg-blog' ) . '</div>',
	'priority'    => 10,
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'select',
	'settings'    => 'homepage_hero_layout_select',
	'label'       => esc_html__( 'Homepage hero layout', 'salzburg-blog' ),
	'section'     => 'homepage_layout',
	'default'     => 'square',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'no-hero' => esc_html__( 'No hero', 'salzburg-blog' ),
		'square' => esc_html__( 'Square', 'salzburg-blog' ),
		'minimal' => esc_html__( 'Minimal', 'salzburg-blog' ),
	],
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'select',
	'settings'    => 'homepage_loop_layout_select',
	'label'       => esc_html__( 'Homepage loop layout', 'salzburg-blog' ),
	'section'     => 'homepage_layout',
	'default'     => 'vertical',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'rectangle' => esc_html__( 'Default', 'salzburg-blog' ),
		'minimal-one' => esc_html__( 'Minimal', 'salzburg-blog' ),
	],
] );

