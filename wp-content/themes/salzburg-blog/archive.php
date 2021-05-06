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
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		</div>
		<?php
	endif; ?>

	<?php salzburg_layout_switcher(); ?>

</main><!-- .site-main -->

<?php
get_footer();
