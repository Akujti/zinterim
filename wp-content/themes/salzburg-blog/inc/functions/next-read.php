<?php
if ( ! function_exists( 'salzburg_next_read' ) ) :
	/**
	 * Prints HTML with next post recommendation.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_next_read() {
		$next_read = get_previous_post();
		if ( !empty( $next_read )): ?>
			<div class="next-post">
				<div class="container container-column">
					<a class="next-post-link" href="<?php echo esc_url( get_permalink( $next_read->ID ) ); ?>">
						<span class="next-post-read">
							<?php esc_html_e( 'Read next', 'salzburg-blog' ) ?>
						</span>
						<h2 class="next-post-heading">
							<?php echo esc_html( $next_read->post_title ); ?>
						</h2>
					</a>
				</div>

				<?php
				if ( has_post_thumbnail( $next_read->ID ) ) : ?>
					<div class="next-post-thumbnail">
						<?php echo get_the_post_thumbnail( $next_read->ID, 'small-square' ); ?>
					</div>
					<?php
				endif; ?>
			</div>
		<?php
		endif;
	}

endif;
