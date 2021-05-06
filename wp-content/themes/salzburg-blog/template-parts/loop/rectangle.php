<?php
/**
 * Template part for displaying loop with 3 columns
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salzburg Blog Pro
 */

?>

<div class="article-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php salzburg_sticky_pin(); ?>

		<a class="three-columns-image-link" href="<?php the_permalink(); ?>">
			<?php 
			salzburg_post_thumbnail( array(
				'size' => 'rectangle',
				'fallback' => 'placeholder-3-cols.jpg',
			) ); ?>
		</a>

		<?php get_template_part( 'template-parts/entry-highlight-loop' ); ?>
	</article>
</div>
