<div class="coblog-topbar coblog-five-topbar">
    <div class="container">
        <div class="coblog-flex-wrap">
            <div class="coblog-flex-col coblog-topbar-short-note">
                <?php $topbar_short_note = get_theme_mod( 'topbar_short_note', __('FREE Returns. Standard Shipping Orders $99+', 'coblog') );
                echo esc_html($topbar_short_note);
                ?>
            </div><!--/.coblog-flex-col-->    
            <?php  if ( has_nav_menu( 'topbar-menu' ) ) : ?>
                <div class="coblog-flex-col coblog-topbar-menu">
                    <?php get_template_part( 'template-parts/topbar-menu' ); ?>
                </div><!--/.coblog-flex-col-->
            <?php endif; ?>     
        </div><!--/.row-->
    </div><!-- .container -->
</div>
<header id="masthead" class="site-header coblog-header-five">
    <div class="main-navigation-wrap site-branding d-none d-lg-block">       
        <div class="container">    
            <div class="coblog-flex-wrap coblog-menu-wrap"> 
                <div class="coblog-site-branding coblog-flex-col">
                    <?php get_template_part( 'template-parts/logo' );?>
                </div><!-- .site-branding -->
                <?php get_template_part( 'template-parts/main-menu' ); ?>
                <div class="coblog-flex-col coblog-search-user-cart">   
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