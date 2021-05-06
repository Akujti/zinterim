<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'coblog' ); ?>">
    <?php
    if (has_nav_menu('primary')) {
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )
        );
    } else {
        wp_page_menu(
            array(
            'menu_class' => 'menu-primary-container',
            'before'       => '<ul id="primary-menu" class="primary-menu">',
            'after'        => '</ul>',
            )
        );
    }
    
    ?>
</nav><!-- #site-navigation -->



