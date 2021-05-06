<?php
// ----------------------------------------------------------------
// Colors: Primary color
// ----------------------------------------------------------------
Kirki::add_field( 'salzburg_config', [
	'type'        => 'custom',
	'settings'    => 'section_divider_1',
	'section'     => 'color_options',
	'default'     => '<div style="padding: 10px 30px;background-color:#fff; margin-left: -15px; margin-right: -15px; margin-bottom: 10px;">' . esc_html__( 'Primary color picker', 'salzburg-blog' ) . '</div>',
	'priority'    => 10,
] );


Kirki::add_field( 'salzburg_config', [
	'type'        => 'color-palette',
	'settings'    => 'primary_color_predefined',
	'section'     => 'color_options',
	'label'       => esc_html__( 'Pick your primary color from predefined palette.', 'salzburg-blog' ),
	'default'     => '#ff353e',
	'choices'     => [
		'colors' => [ '#ff353e', '#ff4081', '#e91e63', '#9c27b0', '#2196F3', '#00bcd4', '#4CAF50'],
		'size'   => 30,
		'style'  => 'round',
	],
] );
