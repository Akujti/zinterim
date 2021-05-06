<?php
/**
 * Template part for displaying page content in page.php
 * 
 * @subpackage lz-real-blog
 * @since 1.0
 * @version 0.3
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php lz_real_blog_edit_link( get_the_ID() ); ?>
	</header>
	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<?php			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lz-real-blog' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>