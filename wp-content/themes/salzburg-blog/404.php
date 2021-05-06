<?php
/**
 * Template part for displaying a message that a page was not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salzburg Blog
 */

get_header(); ?>

<main class="container no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'salzburg-blog' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like this page was not found at this location. Maybe try a search?', 'salzburg-blog' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .page-content -->
</main><!-- .no-results -->

<?php 
get_footer(); ?>
