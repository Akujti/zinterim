<?php
// ----------------------------------------------------------------
// Typography: Font-families
// ----------------------------------------------------------------
Kirki::add_section( 'typography_font_families', array(
	'title'          => esc_html__( 'Font families', 'salzburg-blog' ),
	'panel'          => 'typography_options',
) );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'typography',
	'settings'    => 'main_font',
	'label'       => esc_html__( 'Please select your preferred main font', 'salzburg-blog' ),
	'section'     => 'typography_font_families',
	'default'     => [
		'font-family'    => 'Muli',
		'variant'        => 'regular',
	],
	'choices' => [
		'fonts' => [
			'google' => [ 'Muli', 'Roboto', 'Open Sans', 'Lato', 'Oswald', 'Source Sans Pro', 'Montserrat', 'Lora' ],
		],
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'salzburg_config', [
	'type'        => 'typography',
	'settings'    => 'heading_font',
	'label'       => esc_html__( 'Please select your preferred headings font', 'salzburg-blog' ),
	'section'     => 'typography_font_families',
	'default'     => [
		'font-family'    => 'Source Sans Pro',
		'variant'        => '700',
	],
	'choices' => [
		'fonts' => [
			'google' => [ 'Muli', 'Roboto', 'Open Sans', 'Lato', 'Oswald', 'Source Sans Pro', 'Montserrat', 'Lora' ],
		],
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.hero-headline,.entry-title,h1,h2,h3,h4,h5,h6,.comment-reply-title, .form-submit input,
						  .post-password-form input[type="submit"], .search-submit,.wp-block-quote>p, .wp-block-pullquote blockquote > p,
						  .wp-block-cover, .hero .entry-terms a, .hero-link, .next-post-heading, .nav-links, .primary-menu,
						  .widget-title,.site-title,.loop-vertical .entry-terms a,.loop-vertical .entry-title,
						  .latest-news-heading, .entry-tags-wrapper .entry-terms-list-item a',
		],
	],
] );
