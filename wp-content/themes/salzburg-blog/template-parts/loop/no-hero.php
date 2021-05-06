<?php
$loop_type = salzburg_get_theme_option( 'home_loop' );

if ( have_posts() ) : ?>

	<div class="container loop loop-<?php echo $loop_type; ?>">
		<div class="loop-container loop-<?php echo $loop_type; ?>-container">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/loop/' . $loop_type );
			endwhile; ?>
		</div>
	</div>
	<?php
	salzburg_posts_pagination();

else :
	get_template_part( 'template-parts/content', 'none' );
endif;
