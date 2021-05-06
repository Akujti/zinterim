<?php
// ----------------------------------------------------------------
// Typography: Font sizing
// ----------------------------------------------------------------
Kirki::add_section( 'typography_font_sizing', array(
	'title'          => esc_html__( 'Font sizes', 'salzburg-blog' ),
	'panel'          => 'typography_options',
) );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'custom',
	'settings'    => 'section_divider_4',
	'section'     => 'typography_font_sizing',
	'default'     => '<div style="padding: 10px 30px;background-color:#fff; margin-left: -15px; margin-right: -15px; margin-bottom: 10px;">' . esc_html__( 'Pick your font sizes here. You can enter any valid CSS value. [px, rem, em, %]', 'salzburg-blog' ) . '</div>',
	'priority'    => 10,
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'dimension',
	'settings'    => 'typography_hero_heading',
	'label'       => esc_html__( 'Hero title font size.', 'salzburg-blog' ),
	'section'     => 'typography_font_sizing',
	'default'     => '3.5rem',
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'dimension',
	'settings'    => 'typography_hero_subheading',
	'label'       => esc_html__( 'Hero description font size.', 'salzburg-blog' ),
	'section'     => 'typography_font_sizing',
	'default'     => '1rem',
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'dimension',
	'settings'    => 'typography_loop_title',
	'label'       => esc_html__( 'Loop articles title font size.', 'salzburg-blog' ),
	'section'     => 'typography_font_sizing',
	'default'     => '1.875rem',
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'dimension',
	'settings'    => 'typography_loop_excerpt',
	'label'       => esc_html__( 'Loop articles excerpt font size.', 'salzburg-blog' ),
	'section'     => 'typography_font_sizing',
	'default'     => '1rem',
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'dimension',
	'settings'    => 'typography_single_post_content',
	'label'       => esc_html__( 'Single post entry content font size.', 'salzburg-blog' ),
	'section'     => 'typography_font_sizing',
	'default'     => '1.125rem',
] );
