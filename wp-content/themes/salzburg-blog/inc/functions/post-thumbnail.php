<?php
if ( ! function_exists( 'salzburg_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @package Salzburg Blog Pro
	 */
	function salzburg_post_thumbnail( $args = array() ) {
		// Set defaults.
		$defaults = array(
			'size'     => 'post-thumbnail',
			'fallback'    => '',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( ! has_post_thumbnail() ) {
			salzburg_post_thumbnail_fallback( $args['fallback'] );
		}

		if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( $args['size'] ); ?>
		</div><!-- .post-thumbnail -->
		<?php
		endif; ?>

	<?php
	}
endif;

/**
 * Displays an optional post thumbnail fallback when the thumbnail is not present.
 *
 * @package Salzburg Blog Pro
 */
function salzburg_post_thumbnail_fallback( $fallback ) {
	if ( $fallback !== '' ) : ?>
		<div class="post-thumbnail-fallback">
			<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/<?php echo $fallback; ?>" alt="">
		</div><!-- .post-thumbnail-fallback -->
		<?php
	else :
		return;
	endif;
}