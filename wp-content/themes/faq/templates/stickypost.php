<?php

// exclude sticky posts on search result pages
if (!is_search()) {

// manual query for sticky posts - we excluded them from the main query via pre_get_posts
$faq_sticky = get_option( 'sticky_posts' );
$faq_args = array(
    'posts_per_page' => 1,
    'post__in'  => $faq_sticky,
    'ignore_sticky_posts' => 1,
    'paged' => $paged,
);
$faq_sticky_query  = new WP_Query( $faq_args );

// let's run through our sticky post loop

    while ($faq_sticky_query -> have_posts()) : $faq_sticky_query -> the_post(); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item active">
         <i class="fa fa-thumb-tack"></i> <?php the_title(); ?>
         <div class="pull-right"><small><?php  _e('last update: ','faq') . the_modified_time( 'F j, Y' );  ?></small></div>
        </a>
   <?php endwhile;


/* Restore original Post Data */
wp_reset_postdata();

} // end !is_search