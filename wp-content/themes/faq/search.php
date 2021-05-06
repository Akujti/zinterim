<?php get_header();?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo faq_main_class(); ?>" role="main">

        <?php get_template_part('templates/notices'); ?>
        <?php get_template_part('templates/page', 'title'); ?>
        <?php get_template_part('templates/content', 'faq'); ?>

      </main><!-- /.main -->
      <?php if (faq_display_sidebar()) : ?>
        <aside class="sidebar <?php echo faq_sidebar_class(); ?>" role="complementary">
          <?php get_sidebar(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

<?php get_footer();?>