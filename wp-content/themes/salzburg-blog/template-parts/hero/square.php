<?php $hero_element = salzburg_hero_html_element(); ?>
<<?php echo $hero_element; ?> id="post-<?php the_ID(); ?>" <?php post_class( 'hero hero-square' ); ?>>
	<div class="container">
		<div class="hero-media-column">
			<?php salzburg_post_thumbnail(); ?>
		</div>

		<div class="hero-content-column hero-square-content-column">
			<?php $query_type = is_singular() ? 'intro' : 'highlight' ?>
			<?php get_template_part( 'template-parts/entry-' . $query_type ); ?>
		</div>
	</div>
</<?php echo $hero_element; ?>>
