<?php
/**
 * The template for displaying single posts and pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Salzburg Blog
 */

get_header(); ?>

<main class="site-main" role="main">
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/index' );

		// next post link
		if ( is_single() && 
			 get_theme_mod( 'single_next_post_switch', 'true' ) === 'true' ) {
				salzburg_next_read();
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- .site-main -->

<?php
get_footer();
