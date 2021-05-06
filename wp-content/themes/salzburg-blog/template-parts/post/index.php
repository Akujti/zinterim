<?php
/**
 * Template part for displaying default single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salzburg Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		$hero = salzburg_get_theme_option( 'single_hero' );
		$layout = salzburg_get_theme_option( 'single_layout' );

		if ( 'page' === get_post_type() ) {
			$hero = salzburg_get_theme_option( 'page_hero' );
			$layout = salzburg_get_theme_option( 'page_layout' );
		}

		get_template_part( 'template-parts/hero/' . $hero ); ?>

		<div
		class="entry-content entry-container
		<?php salzburg_sidebar_class( $layout ); ?>
		<?php echo $layout; ?> ">
			<div class="content-wrap">
				<?php
				the_content();
				salzburg_edit_link();
				wp_link_pages( array(
					'before'        => '<div class="page-links">' . esc_html__( 'Pages:', 'salzburg-blog' ),
					'after'         => '</div>',
					'link_before'   => '<span>',
					'link_after'    => '</span>',
					'pagelink'      => '<span class="screen-reader-text">' . esc_html__( 'Page', 'salzburg-blog' ) . ' </span>%',
					'separator'     => '<span class="screen-reader-text">,</span> ',
				) );
				get_template_part( 'template-parts/entry-footer' ); ?>
			</div>
			<div class="entry-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
</article>
