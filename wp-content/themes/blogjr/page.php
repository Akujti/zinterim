<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogjr
 */

get_header();

if ( blogjr_theme_option( 'header_alignment', 'left-align' ) == 'left-absolute' ) :
	if ( ! has_post_thumbnail() ) {
		if ( has_header_image() ) : ?>
			<div class="featured-image inner-header-image">
				<?php the_header_image_tag(); ?>
			</div>
		<?php endif;
	}
endif;

if ( has_post_thumbnail() ) : ?>
	<div class="featured-image inner-header-image">
		<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</div>
<?php endif; ?>

<div class="single-template-wrapper wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
