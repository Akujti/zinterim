<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		if( ! get_post_meta(get_the_ID(), 'disable_page_title', true) ) { ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php }
	?>
	<?php coblog_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coblog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post -->