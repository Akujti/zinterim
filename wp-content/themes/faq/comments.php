<?php
  if (post_password_required()) {
    return;
  }

 if (have_comments()) : ?>


  <section id="comments">

    <h3 class="faq-title"><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'faq'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>
    <hr/>
    <ol class="media-list">
      <?php wp_list_comments(array('walker' => new FAQ_Walker_Comment)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav>
      <ul class="pagination">
        <?php if (get_previous_comments_link()) : ?>
          <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'faq')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'faq')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'faq'); ?>
    </div>
    <?php endif; ?>
  </section><!-- /#comments -->
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <section id="comments">
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'faq'); ?>
    </div>
  </section><!-- /#comments -->
<?php endif; ?>


 <section id="respond">
    <?php comment_form(); ?>
  </section><!-- /#respond -->



