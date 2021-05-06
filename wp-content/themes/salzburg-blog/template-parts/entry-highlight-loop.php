<?php
/**
 * Entry highlight content for loop parts displaying category, title and meta.
 *
 * @package Salzburg Blog
 */
?>

<?php
salzburg_post_terms( array(
    'taxonomy' => 'category',
    'before' => '<span class="screen-reader-text">' . esc_html__( 'Categories:', 'salzburg-blog' ) . ' </span>',
) );

the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
salzburg_posted_on();

wp_link_pages( array(
    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'salzburg-blog' ),
    'after'  => '</div>',
) );
?>
