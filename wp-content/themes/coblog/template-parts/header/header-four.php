<header id="masthead" class="site-header coblog-header-four">
    <div class="main-navigation-wrap site-branding d-none d-lg-block">       
        <div class="container-fluid">    
            <div class="coblog-flex-wrap coblog-menu-wrap"> 
                <div class="coblog-site-branding coblog-flex-col">
                    <a id="coblog-header-trigger" class="coblog-trigger" href="#">
                        <i class="cb-font-menu"></i>
                    </a>
                    <?php get_template_part( 'template-parts/logo' );?>
                    <div class="coblog-logo-branding">
                        <?php $coblog_slogan = get_theme_mod( 'logo_slogan', __('Self Made Intrepreneurs', 'coblog') );
                        echo esc_html($coblog_slogan);
                        ?>
                    </div><!-- .site-branding -->
                    <?php get_template_part( 'template-parts/main-menu' ); ?>
                </div><!-- .site-branding -->
                <div class="coblog-flex-col coblog-header-four-social coblog-search-user-cart">   
                    <div class="coblog-social-icon">
                        <span><?php esc_html_e( 'Follow Us', 'coblog' );?></span>
                        <?php get_template_part( 'template-parts/social-share' ); ?>
                    </div><!--/.coblog-topbar-info-->  
                    <?php get_template_part( 'template-parts/header/cart-search-user' );?>
                </div>   
            </div>   
        </div><!-- .container --> 
    </div><!-- .main-navigation-wrap --> 
    <?php get_template_part( 'template-parts/responsive-header' );?>
    <?php $coblog_enable_search = get_theme_mod( 'enable_search', 1 );?>
	<?php if($coblog_enable_search) { ?>
		<div class="coblog-header-search" style="display: none;">
			<div class="coblog-header-search-wrap">
				<?php echo get_search_form();?>
			</div><!-- Site search end -->
		</div><!-- Site search end -->
	<?php } ?>
</header><!-- #masthead -->        