
<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <div class="entry-content">
      <?php the_content(); ?>

    </div>
    <footer>
      <?php get_template_part('templates/entry-meta');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                    ?>
      <?php wp_link_pages( array(
        'before'      => '<h4 class="faq-title">' . __( 'Pages:', 'faq' ) . '</h4><ul class="pagination">',
        'after'       => '</ul>',
        'link_before' => '<li>',
        'link_after'  => '</li>',
      ) );
      ?>
    </footer>
  </article>
<?php endwhile; ?>
