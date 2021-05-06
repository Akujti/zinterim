<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="coblog-entry-header">
		<div class="coblog-post-grid-category"><?php echo wp_kses_post(get_the_category_list());?></div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="coblog-entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="coblog-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( 'post' === get_post_type() ) :
			?>
			<div class="coblog-entry-meta">
				<?php
				coblog_posted_meta();
				?>
			</div><!-- .coblog-entry-meta -->
		<?php endif; ?>
	</header><!-- .coblog-entry-header -->
	<?php coblog_post_thumbnail(); ?>   

	<div class="entry-content">
        <?php
        coblog_post_entry_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coblog' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article>
