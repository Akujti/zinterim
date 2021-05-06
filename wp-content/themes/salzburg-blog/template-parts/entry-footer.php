<?php
/**
 * Entry footer.
 *
 * @package Salzburg Blog
 */
?>

<?php if ( 'post' == get_post_type() ) : ?>
	<?php
		salzburg_post_terms( array(
			'taxonomy' => 'post_tag',
			'before' => '
				<span class="entry-terms-wrapper entry-tags-wrapper">
				<span class="screen-reader-text">' . esc_html__( 'Tags:', 'salzburg-blog' ) . ' </span>
				<span class="icon-wrapper">' . salzburg_get_svg( array( 'icon' => 'hashtag' ) ) . '</span>',
			'after' => '</span>'
		) );
	?>
<?php 
endif;
