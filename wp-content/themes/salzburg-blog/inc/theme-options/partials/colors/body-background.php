<?php
// ----------------------------------------------------------------
// Colors: body background
// ----------------------------------------------------------------
Kirki::add_field( 'salzburg_config', [
	'type'        => 'custom',
	'settings'    => 'section_divider_2',
	'section'     => 'color_options',
	'default'     => '<div style="padding: 10px 30px;background-color:#fff; margin-left: -15px; margin-right: -15px; margin-bottom: 10px;">' . esc_html__( 'Body background color', 'salzburg-blog' ) . '</div>',
	'priority'    => 10,
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'radio-buttonset',
	'settings'    => 'body_background_color_switch',
	'section'     => 'color_options',
	'default'     => '0',
	'priority'    => 10,
	'choices'     => [
		'0'  => esc_html__( 'Predefined palette', 'salzburg-blog' ),
		'1' => esc_html__( 'Custom color', 'salzburg-blog' ),
	],
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'color-palette',
	'settings'    => 'body_background_color_predefined',
	'section'     => 'color_options',
	'label'       => esc_html__( 'Pick your background color from predefined palette.', 'salzburg-blog' ),
	'default'     => '#fff',
	'choices'     => [
		'colors' => [ '#fff', '#fafafa', '#f3f3f3', '#f6f6f6', '#f9f9f9', '#eee' , '#e8e8e8'],
		'size'   => 30,
		'style'  => 'round',
	],
	'active_callback'  => [
		[
			'setting'  => 'body_background_color_switch',
			'operator' => '===',
			'value'    => '0',
		]
	]
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'color',
	'settings'    => 'body_background_color_custom',
	'section'     => 'color_options',
	'default'     => '#fff',
	'active_callback'  => [
		[
			'setting'  => 'body_background_color_switch',
			'operator' => '===',
			'value'    => '1',
		]
	]
] );
