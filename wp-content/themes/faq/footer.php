<footer class="content-info" role="contentinfo" <?php if (has_nav_menu('footer_navigation')) { echo 'id="footer"'; };?>>

  <div class="container hidden-xs">

      <?php
        if (has_nav_menu('footer_navigation')) {
          wp_nav_menu(array(
            'theme_location' => 'footer_navigation',
            'menu_class' => 'nav navbar-nav',
            'container'       => 'nav',
            'container_class' => 'collapse navbar-collapse',
            'depth' => 1,
            ));
        };
      ?>


    <div class="col-md-4">
    <?php dynamic_sidebar('sidebar-footer-1'); ?>
    </div>

    <div class="col-md-4">
    <?php dynamic_sidebar('sidebar-footer-2'); ?>
    </div>

    <div class="col-md-4">
    <?php dynamic_sidebar('sidebar-footer-3'); ?>
    </div>

  </div>
  <div class="container">
    <hr/>
    <?php do_action( 'faq_footer_credits' ); ?>
  </div>
<br/>
</footer>
<?php wp_footer(); ?>

</body>
</html>
