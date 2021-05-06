<?php
/**
 * Template Name: Contributor Template
 */

?>

<?php get_header();?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo faq_main_class(); ?>" role="main">

        <?php get_template_part('templates/notices'); ?>
        <?php get_template_part('templates/page', 'title'); ?>


        <?php
            $contributor_ids = get_users( array(
                'fields'  => 'ID',
                'orderby' => 'post_count',
                'order'   => 'DESC',
                'who'     => 'authors',
            ) );

            echo '<ul class="nav nav-pills">';
            foreach ( $contributor_ids as $contributor_id ) :
                $post_count = count_user_posts( $contributor_id );

            // Move on if user has not published a post (yet).
            if ( ! $post_count ) {
                continue;
            }
            ?>
                <li class="list-group-item">
                    <a href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>"  rel="tooltip" data-placement="top" title="<?php printf( _n( '%d Article', '%d Articles', $post_count, 'faq' ), $post_count ); ?>">
                       <p><img src="<?php echo faq_get_avatar_url( $contributor_id, 120 ); ?>" alt="<?php echo get_the_author_meta( 'display_name', $contributor_id ); ?>"></p>
                         <p class="text-center "><strong><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></strong></p>
                    </a>
                </li>

            <?php
            endforeach;
            echo '</ul>';
         ?>


      </main><!-- /.main -->
      <?php if (faq_display_sidebar()) : ?>
        <aside class="sidebar <?php echo faq_sidebar_class(); ?>" role="complementary">
          <?php get_sidebar(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

<?php get_footer();?>


