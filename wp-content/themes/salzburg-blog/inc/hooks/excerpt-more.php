<?php

/**
 * Change [...] to just ...
 * Adjust excerpt length
 *
 * @since  1.0.0
 * @return string $more
 *
 * @package Salzburg Blog
 */
function salzburg_excerpt_more() {
	return '...';
}

if ( ! is_admin() ) {
	add_filter( 'excerpt_more', 'salzburg_excerpt_more' );
}

function salzburg_excerpt_length( $length ) {
	return 30;
}

if ( ! is_admin() ) {
	add_filter( 'excerpt_length', 'salzburg_excerpt_length', 999 );
}
