<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Salzburg Blog
 */

get_header(); ?>

<main class="site-main" role="main">
	<?php salzburg_layout_switcher(); ?>
</main><!-- .site-main -->

<?php
get_footer();
