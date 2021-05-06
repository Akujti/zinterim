<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salzburg Blog
 */

get_header(); ?>

<main class="site-main" role="main">

	<?php
	if ( have_posts() ) : ?>
		<div class="container">
			<header class="page-header">
				<h1 class="page-title">
					<?php printf( esc_html__( 'Search Results for: %s', 'salzburg-blog' ), '<span class="search-phrase">' . get_search_query() . '</span>' ); ?>
				</h1>
			</header><!-- .page-header -->
		</div>
		<?php
	endif;

	salzburg_layout_switcher(); ?>

</main><!-- .site-main -->

<?php
get_footer();
