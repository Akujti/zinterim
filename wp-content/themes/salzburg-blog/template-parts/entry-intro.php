<?php
/**
 * Entry intro content for displaying single post/page heading and meta.
 *
 * @package Salzburg Blog
 */
?>

<header class="hero-header">
	<?php
	salzburg_post_terms( array(
		'taxonomy' => 'category',
		'before' => '<span class="screen-reader-text">' . esc_html__( 'Categories:', 'salzburg-blog' ) . ' </span>',
	) );
	the_title( '<h1 class="hero-headline">', '</h1>' );
	salzburg_posted_meta(); ?>
</header>