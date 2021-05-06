<div class="btn-group">


<?php edit_post_link( __( 'Edit', 'faq' ), '<button type="button" class="btn btn-default">', '</button>' ); ?>

<?php
// only show timestamp on single posts and not on pages
 if (is_singular() && !is_page()) { ?>
<button type="button" class="btn btn-default">
<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo __('last edit:', 'faq'); ?> <?php echo get_the_modified_date(); ?></time>
</button>
<?php } ?>

<button type="button" class="btn btn-default">
<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo __('Author:', 'faq'); ?> <?php echo get_the_author(); ?></a>
</button>


    <?php
    /* translators: used between list items, there is a space after the comma */
        $tag_list           = get_the_tag_list('<li>','</li><li>','</li>');
        $categories_list    = get_the_term_list( $post->ID, 'category', '<li>', '</li><li>', '</li>' );

        if ( '' != $tag_list ) { ?>


  <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <?php echo __('tagged', 'faq'); ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php echo $tag_list; ?>
    </ul>
  </div>

    <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <?php echo __('categorized', 'faq'); ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php echo $categories_list; ?>
    </ul>
  </div>

     <?php   } elseif ( '' != $categories_list ) { ?>

    <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <?php echo __('categorized', 'faq'); ?>
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php echo $categories_list; ?>
    </ul>
  </div>

      <?php  } else {
            //$utility_text =  __('Sorry, this post has not been categorized nor have any tags.', 'faq');
        }
    ?>
</div>
<div class="clearfix"></div>