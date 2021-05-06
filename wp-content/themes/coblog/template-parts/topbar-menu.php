<?php 
if ( has_nav_menu( 'topbar-menu' ) ) :
    wp_nav_menu(
        array(
            'theme_location' => 'topbar-menu',
            'menu_class'     => 'coblog-topbar-menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        )
    );
endif; 
