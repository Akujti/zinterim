<?php
if ( ! function_exists( 'salzburg_posts_pagination' ) ) :
	/**
	 * Display post pagination.
	 *
	 * Uses WordPress native the_posts_pagination function.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_posts_pagination() {

		the_posts_pagination( array(
			'mid_size'           => 1,
			'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Previous page', 'salzburg-blog' ) . '</span>' . '&lt;',
			'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next page', 'salzburg-blog' ). '</span>' . '&gt;',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'salzburg-blog' ) . ' </span>',
		) );
	}

endif;
