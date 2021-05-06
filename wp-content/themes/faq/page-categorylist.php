<?php
/*
Template Name: Category List Template
*/
?>

<?php get_header();?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo faq_main_class(); ?>" role="main">

        <?php get_template_part('templates/notices'); ?>
        <?php get_template_part('templates/page', 'title'); ?>

        <div class="row">
        <?php
        $categories = get_terms( 'category', array('hide_empty' => false, 'orderby' => 'name', 'parent' => 0) );
        if ( $categories ) {
            foreach ( $categories as $category ) {
        ?>
        <div class="col-xs-6 col-md-4 list-group">
                  <a href="<?php echo get_term_link( $category ); ?>" class="list-group-item" title="<?php echo $category->name; ?>">
             <h3 class="text-center"><?php echo $category->name; ?> <small>(<?php echo $category->count; ?>)</small></h3>
            <p class="list-group-item-text">
                <?php if ( !empty( $category->description ) ) { ?>
                <?php  // shorten our description text to 200 letters and stay in same box height
                echo substr( $category->description,0,200 ) . "..."; ?>
                <?php } ?>
            </p>
          </a>
        </div>

         <?php  }

        }
        ?>
        </div>
        <div class="clearfix"></div>

      </main><!-- /.main -->
      <?php if (faq_display_sidebar()) : ?>
        <aside class="sidebar <?php echo faq_sidebar_class(); ?>" role="complementary">
          <?php get_sidebar(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

<?php get_footer();?>


