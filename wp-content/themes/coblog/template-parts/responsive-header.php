<div class="header-responsive-wrap d-lg-none">
    <div class="container">  
        <div class="coblog-flex-wrap"> 
            <div class="site-branding coblog-flex-col">
                <a href="<?php echo esc_url(home_url()); ?>">
                <?php
                    $coblog_logoimg   = get_theme_mod( 'logo_img', COBLOG_URI.'/assets/images/logo.png' );
                    $coblog_logotext  = get_theme_mod( 'logo_text', 'Coblog' );
                    $coblog_logotype  = get_theme_mod( 'logo_type', 'logo_img' );
                    switch ($coblog_logotype) {
                        case 'logo_img':
                        if( !empty($coblog_logoimg) ) { ?>
                            <img class="coblog-logo" src="<?php echo esc_url( $coblog_logoimg ); ?>" alt="<?php esc_attr_e( 'Logo', 'coblog' ); ?>" title="<?php esc_attr_e( 'Logo', 'coblog' ); ?>">
                        <?php } else { ?>
                            <h1> <?php echo esc_html(get_bloginfo('name'));?> </h1>
                        <?php }
                        break;
                        default:
                        if( $coblog_logotext ) { ?>
                            <h1> <?php echo esc_html( $coblog_logotext ); ?> </h1>
                        <?php } else { ?>
                            <h1><?php echo esc_html(get_bloginfo('name'));?> </h1>
                        <?php }
                        break;
                    } ?>
                </a>
            </div><!-- .site-branding -->
            <div class="coblog-flex-col coblog-responsive-menu-option coblog-search-user-cart">   
                <a class="coblog-trigger" href="#">
                    <i class="cb-font-menu"></i>
                </a>
                <?php $coblog_enable_search = get_theme_mod( 'enable_search', 1 );?>
                    <?php if($coblog_enable_search) { ?>
                    <div class="coblog-search">
                        <i class="cb-font-search"></i>
                    </div>
                <?php } ?>
                <?php
                $coblog_cart_search = get_theme_mod( 'cart_search', 1 );
                $coblog_woo_myaccount_url = get_theme_mod( 'woo_myaccount_url' );
                if (is_wc_active()) { ?>
                    <?php if($coblog_woo_myaccount_url) { ?>
                    <div class="coblog-user">
                        <a href="<?php echo esc_url($coblog_woo_myaccount_url);?>"><span class="cb-font-user-o"></span></a>
                    </div>
                    <?php } ?>
                    <?php if($coblog_cart_search) { ?>
                    <div class="coblog-cart"> 
                        <?php echo coblog_header_cart(); ?>  
                    </div>
                <?php } 
                }?>
            </div> 
        </div><!--/.coblog-flex-wrap--> 
    </div><!--/.container--> 
</div><!--/.header-responsive-wrap-->
   