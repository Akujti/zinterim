<?php
/**
 * Entry meta content for displaying post date and author.
 *
 * @package Salzburg Blog
 */

if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php salzburg_posted_on(); ?>
	</div><!-- .entry-meta -->
<?php endif; ?>
