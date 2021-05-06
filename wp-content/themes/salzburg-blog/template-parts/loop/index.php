<?php
$hero_type = salzburg_get_theme_option( 'home_hero' );
$loop_type = salzburg_get_theme_option( 'home_loop' );

if ( have_posts() ) : ?>

	<?php
	while ( have_posts() ) : the_post();

		global $wp_query;

		/**
		 * Show hero only on the very first page.
		 */
		if ( $wp_query->current_post == 0 && ! is_paged() ) :
			get_template_part( 'template-parts/hero/' . $hero_type );
		endif;

		/**
		 * We need to wrap other posts in a container,
		 * This seems like a good place to do so
		 * since this condition will be met only once.
		 */
		if ( $wp_query->current_post == 0 ) : ?>
			<div class="container loop loop-<?php echo $loop_type; ?>">
			<div class="loop-container loop-<?php echo $loop_type; ?>-container">
			<?php
		endif;

		/**
		 * Let's get regular post template-part for first post on paged result
		 * and for all the other posts as well.
		 */
		if ( $wp_query->current_post == 0 && is_paged() ||
			 $wp_query->current_post != 0 ) {
				get_template_part( 'template-parts/loop/' . $loop_type );
		}

		/**
		 * We need to close previously opened container
		 * and we need to do so after the last post is displayed.
		 *
		 * We also need to make sure that the 'div' is closed even if we have
		 * less posts published than it would result from
		 * the number provided in 'Blog pages show at most' option.
		 */
		if ( $wp_query->current_post == $wp_query->post_count - 1 ||
			$wp_query->current_post == $wp_query->found_posts - 1 ) : ?>
				</div><!-- .container-->
				</div><!-- .container-outer -->
			<?php
		endif;

	endwhile;

	salzburg_posts_pagination();

else :
	get_template_part( 'template-parts/content', 'none' );
endif;
