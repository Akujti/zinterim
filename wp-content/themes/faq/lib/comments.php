<?php
/**
 * Use Bootstrap's media object for listing comments
 *
 * @link http://getbootstrap.com/components/#media
 */
class FAQ_Walker_Comment extends Walker_Comment {
  function start_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1; ?>
    <ul <?php comment_class('media-list unstyled comment-' . get_comment_ID()); ?>>
    <?php
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1;
    echo '</ul>';
  }

  function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0) {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;

    if (!empty($args['callback'])) {
      call_user_func($args['callback'], $comment, $args, $depth);
      return;
    }

    extract($args, EXTR_SKIP); ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media comment-' . get_comment_ID()); ?>>
  <?php echo get_avatar($comment, $size = '50'); ?>
  <div class="media-body">
    <h4 class="media-heading"><?php echo get_comment_author_link(); ?> <?php edit_comment_link(__('(Edit Comment)', 'faq'), '<small>', '</small>'); ?></h4>


    <?php if ($comment->comment_approved == '0') : ?>
      <div class="alert alert-info">
        <?php _e('Your comment is awaiting moderation.', 'faq'); ?>
      </div>
    <?php endif; ?>

    <?php comment_text(); ?>
    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    <time datetime="<?php echo comment_date('c'); ?>"><a class="pull-right" href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><small><?php printf(__('%1$s', 'faq'), get_comment_date(),  get_comment_time()); ?></small></a></time>
    <hr/>

  <?php
  }
  function end_el(&$output, $comment, $depth = 0, $args = array()) {
    if (!empty($args['end-callback'])) {
      call_user_func($args['end-callback'], $comment, $args, $depth);
      return;
    }

    echo "</li>\n";
  }
}





//Modifying Comment Form Default Field
if ( ! function_exists( 'bootstrap3_comment_form_fields' ) ) :
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' , 'faq' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' , 'faq'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' , 'faq'  ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
    );

    return $fields;
}
endif;

// Modifying Textarea Field
if ( ! function_exists( 'bootstrap3_comment_form' ) ) :
add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun'  , 'faq'  ) . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    return $args;
}
endif;

//Creating Submit Button
if ( ! function_exists( 'bootstrap3_comment_button' ) ) :
add_action('comment_form', 'bootstrap3_comment_button' );
function bootstrap3_comment_button() {
    echo '<button class="btn btn-primary" type="submit">' . __( 'Submit' , 'faq'  ) . '</button>';
}
endif;







