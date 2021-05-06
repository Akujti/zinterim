<div class="coblog-topbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
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
                ?> 
            </div><!--/.col-md-6-->
            <div class="col-sm-12 col-md-5">
                <div class="coblog-topbar-info">
                    <?php $coblog_number = get_theme_mod( 'contact_number', '(123)456 7890' ); ?>
                    <?php $coblog_email = get_theme_mod( 'email', 'demo@coblog.com' ); ?>
                    <?php if($coblog_number) { ?>
                        <span><i class="cb-font-phone"></i><?php echo esc_attr($coblog_number);?></span>
                    <?php } ?>
                    <?php if($coblog_email) { ?>
                    <span><i class="cb-font-mail-alt"></i><?php echo esc_attr($coblog_email);?></span>
                    <?php } ?>
                </div><!--/.coblog-copyrhigt-->  
            </div><!--/.col-sm-6-->        
        </div><!--/.row-->
    </div><!-- .container -->
</div>