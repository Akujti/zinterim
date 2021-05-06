<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action('single_page_meta', get_the_ID()); ?>
	<div class="entry-content">
        <?php
        the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coblog' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article>