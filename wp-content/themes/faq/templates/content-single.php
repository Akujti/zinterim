<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class();?>>

 <?php
    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
      the_post_thumbnail('full', array('class' => 'img-responsive thumbnail'));
    }
    ?>
   <?php the_content(); ?>

  <?php faq_link_pages(); ?>


    <footer>
      <hr/>
      <?php get_template_part('templates/entry-meta'); ?>

      <?php
      if // we do not have related categories on attachment pages
        (!is_attachment()) { faq_related_by_category(); } ?>


      <hr/>
      <?php comments_template(); ?>
    </footer>

    <hr/>

      <div class="pull-left"><?php previous_post_link(); ?></div>
      <div class="pull-right"><?php next_post_link(); ?></div>

      <div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
      <div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>

  </article>
<?php endwhile; ?>