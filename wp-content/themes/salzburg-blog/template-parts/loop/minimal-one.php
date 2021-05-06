<div class="article-container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php salzburg_sticky_pin(); ?>
			<?php salzburg_posted_on(); ?>
			<a class="entry-link" href="<?php the_permalink(); ?>">
				<div class="entry-body">
					<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					<?php the_excerpt(); ?>
				</div>
				<span class="entry-continue-reading">
					<?php esc_html_e( 'Continue reading', 'salzburg-blog' )?>
				</span>
			</a>
		</article>
	</a>
</div>
