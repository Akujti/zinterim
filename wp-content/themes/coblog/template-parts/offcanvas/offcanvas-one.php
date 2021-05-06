<div class="coblog-close-canvas"></div>
<div class="coblog-offcanvas-wrap"> 
    <div class="coblog-offcanvas-header">
        <div class="coblog-offcanvas-logo">
            <?php $offcanvas_logo_img   = get_theme_mod( 'offcanvas_logo_img', COBLOG_URI.'/assets/images/logo.png' ); ?>
            <img class="coblog-offcanavs-logo" src="<?php echo esc_url( $offcanvas_logo_img ); ?>" alt="<?php esc_attr_e( 'Logo', 'coblog' ); ?>">
        </div>
        <a class="coblog-trigger" href="#" style="height: 20px; width: 20px; display: inline-block;">
            <i class="cb-font-cancel"></i>
        </a>
    </div><!--/.coblog-offcanvas-header-->
    <div class="coblog-offcanvas-sidebar">     
        <div class="coblog-offcanvas-menu">     
            <nav class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'coblog' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>
            </nav><!-- .site-navigation -->
        </div><!--/.coblog-offcanvas-menu-->
        <?php
        if ( is_active_sidebar( 'offcanavs-1' ) ) { ?>
            <div class="coblog-offcanvas-widget">  
                <?php dynamic_sidebar( 'offcanavs-1' ); ?>
            </div><!--/.coblog-offcanvas-widget-->
        <?php } ?>
        <a class="coblog-trigger-bottom" href="#" style="height: 20px; width: 20px; display: inline-block;">
            <i class="cb-font-cancel"></i>
        </a>
    </div><!--/.coblog-offcanvas-sidebar-->
</div><!--/.coblog-offcanvas-wrap-->
