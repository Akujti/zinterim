<?php
if ( ! function_exists( 'salzburg_get_post_terms' ) ) :
	/**
	 * This template tag is meant to replace template tags like `the_category()`, `the_terms()`, etc.  These core
	 * WordPress template tags don't offer proper translation and RTL support without having to write a lot of
	 * messy code within the theme's templates.  This is why theme developers often have to resort to custom
	 * functions to handle this (even the default WordPress themes do this). Particularly, the core functions
	 * don't allow for theme developers to add the terms as placeholders in the accompanying text (ex: "Posted in %s").
	 * This funcion is a wrapper for the WordPress `get_the_terms_list()` function.  It uses that to build a
	 * better post terms list.
	 *
	 * @author  Justin Tadlock
	 * @link    https://github.com/justintadlock/hybrid-core/blob/2.0/functions/template-post.php
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	 *
	 * @since   1.0.0
	 * @param   array   $args
	 * @return  string
	 */
	function salzburg_get_post_terms( $args = array() ) {

		$html = '';

		$defaults = array(
			'post_id'    => get_the_ID(),
			'taxonomy'   => 'category',
			'text'       => '%s',
			'before'     => '',
			'after'      => '',
			'items_wrap' => '<div %s>%s</div>',
			/* Translators: Separates tags, categories, etc. when displaying a post. */
			'sep'        => '<span class="screen-reader-text">' . esc_html_x( ', ', 'taxonomy terms separator', 'salzburg-blog' ) . '</span>'
		);

		$args = wp_parse_args( $args, $defaults );

		$terms = get_the_term_list(
			$args['post_id'],
			$args['taxonomy'],
			'<ul class="entry-terms-list"><li class="entry-terms-list-item">',
			$args['sep'] . '</li><li class="entry-terms-list-item">',
			'</li></ul>'
		);

		if ( !empty( $terms ) ) {
			$html .= $args['before'];
			$html .= sprintf( $args['items_wrap'] , 'class="entry-terms ' . esc_attr($args['taxonomy']) . '"', sprintf( $args['text'], $terms ));
			$html .= $args['after'];
		}

		return $html;
	}

endif;

if ( ! function_exists( 'salzburg_post_terms' ) ) :

	/**
	 * Outputs a post's taxonomy terms.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array   $args
	 * @return void
	 */
	function salzburg_post_terms( $args = array() ) {
		echo salzburg_get_post_terms( $args );
	}

endif;
