<div class="list-group">  <?php get_template_part('templates/stickypost'); ?>
<?php
    if ( have_posts() ) :
            while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="list-group-item">
                 <i class="fa fa-caret-right"></i> <?php the_title(); ?>
                 <div class="pull-right"><small><?php  _e('last update: ','faq') . the_modified_time( 'F j, Y' );  ?></small></div>
                </a>
        <?php endwhile; ?>
 </div>
 <div class="text-center">
<?php faq_pagination_default();?>
</div>
 <?php
        else :
            $noresults = '<div class="alert alert-danger">'.sprintf( __('Sorry, we could not find a post with that keyword.', 'faq') ).'</div>';
            echo $noresults;

    endif; ?>

