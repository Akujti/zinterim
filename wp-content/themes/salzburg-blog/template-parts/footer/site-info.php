<?php
/**
 * Displays footer site info
 *
 * @package Salzburg Blog
 */

?>
<div class="site-info">
	<span class="powered-by">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'salzburg-blog' ) ); ?>">
			<?php printf( esc_html__( 'Proudly powered by %s', 'salzburg-blog' ), 'WordPress' ); ?>
		</a>
	</span>
	<span class="sep"> | </span>
	<span class="site-designer">
		<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'salzburg-blog' ), 'Salzburg Blog', '<a href="https://humblethemes.com/">Humble Themes</a>' );
		?>
	</span>
</div><!-- .site-info -->
