<?php
/**
 * Entry highlight content for displaying post heading, excerpt and read more link.
 *
 * @package Salzburg Blog
 */
?>

<header class="hero-header">
	<?php
	salzburg_sticky_pin(); 
	the_title( '<h2 class="hero-headline">', '</h2>' ); ?>
</header>

<p class="hero-subheadline">
	<?php echo get_the_excerpt(); ?>
</p>

<a class="hero-link" href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
	<?php esc_html_e( 'Continue reading', 'salzburg-blog' ) ?>
</a>