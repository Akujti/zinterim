<header id="masthead" class="site-header coblog-header-three">
    <div class="coblog-header-wrap d-none d-lg-block">
        <div class="container">
            <div class="coblog-flex-wrap">
                <div class="coblog-social-icon coblog-flex-col">
                    <?php get_template_part( 'template-parts/social-share' );?>
                </div>
                <div class="coblog-site-branding coblog-flex-col">
                    <?php get_template_part( 'template-parts/logo' );?>
                </div><!-- .site-branding -->
                <div class="coblog-social-icon coblog-flex-col coblog-search-user-cart">
                    <?php get_template_part( 'template-parts/header/cart-search-user' );?>
                </div>
            </div><!-- .coblog-flex-wrap -->
        </div><!-- .container -->
    </div><!--/.coblog-header-wrap-->
    <div class="main-navigation-wrap site-branding d-none d-lg-block">       
        <div class="container">    
            <div class="coblog-flex-wrap coblog-menu-wrap header-three-menu"> 
                <div class="coblog-flex-col">  
                    <?php get_template_part( 'template-parts/main-menu' ); ?>
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