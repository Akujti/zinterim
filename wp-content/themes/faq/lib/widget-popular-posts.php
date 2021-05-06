<?php


class faq_popular_posts_widget extends WP_Widget {

    /**
     * Widget setup.
     */
    function faq_popular_posts_widget() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'faq_tabbed_widget', 'description' => __('Displays tabbed list of popular posts, recent posts & comments', 'faq') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'faq_tabbed_widget' );

        /* Create the widget. */
        $this->WP_Widget( 'faq_tabbed_widget', __('FAQ Posts Widget', 'faq'), $widget_ops, $control_ops );
    }

    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $number = $instance['number'];

        ?>
        <h3 class="faq-title"><?php _e('Updates','faq'); ?></h3>
        <div class="widget tabbed">
            <div class="tabs-wrapper">
                <ul class="nav nav-tabs">
                      <li class="active"><a href="#recent" data-toggle="tab"><i class="fa fa-folder-open"></i><?php _e('Recent','faq');?></a></li>
                      <li><a href="#messages" data-toggle="tab"><i class="fa fa-comments tab-comment"></i> <?php _e('Comments','faq');?></a></li>
                </ul>

            <div class="tab-content">


                <ul id="recent" class="tab-pane active nav nav-pills nav-stacked">
                    <?php $recent_posts = new WP_Query(array('showposts' => $number,'post_status' => 'publish', 'ignore_sticky_posts' => 1 ));?>

                    <?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                          <li><a class="list-group-item" href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?>
                            <div class="pull-right"><small><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></small></div></a>
                          </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>

                <ul id="messages" class="tab-pane nav nav-pills nav-stacked">

                <?php
                $recent_comments = get_comments( array(
                    'number'    => $number,
                    'status'    => 'approve'
                ) );
                //var_dump($recent_comments);
                ?>

                <?php foreach($recent_comments as $comment) : ?>

                    <li>
                            <a class="list-group-item" href="<?php echo get_permalink($comment->comment_post_ID) ?>" rel="bookmark" title="<?php echo get_the_title($comment->comment_post_ID); ?>">
                             <?php if ( $comment->comment_author ) { echo $comment->comment_author; } else { _e('Anonymous','faq'); } ?> <?php _e('on','faq'); ?>
                                <?php echo get_the_title($comment->comment_post_ID); ?>
                                <?php echo substr( $comment->comment_content, 0, strrpos( substr( $comment->comment_content, 0, 60), ' ' ) );?>
                            <?php if (strlen($comment->comment_content) > 60 ) {echo '(...)'; } ?>
                            </a>
                     </li>


                 <?php endforeach; ?>

                </ul>
                </div>
            </div>
        </div>

        <?php
    }
    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['number'] = strip_tags( $new_instance['number'] );

        return $instance;
    }

    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array('number' => 3);
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show','faq') ?>:</label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
        </p>

    <?php
    }
}
?>