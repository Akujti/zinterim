<?php
/**
 * The header for our theme
 *
 * @subpackage lz-real-blog
 * @since 1.0
 * @version 0.3
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lz-real-blog' ); ?></a>

	<div class="top-header">
		<div class="container">	
			<div class="row">
				<div class="col-lg-6 col-md-8">	
					<div class="top">
						<?php if( get_theme_mod( 'lz_real_blog_mail','' ) != '') { ?>	
					        <span><a href="mailto:<?php echo esc_attr( get_theme_mod('lz_real_blog_mail','')); ?>"><i class="far fa-envelope"></i><span class="col-org"><?php echo esc_html( get_theme_mod('lz_real_blog_mail','')); ?></span></a></span>
					    <?php } ?>
				   		<?php if( get_theme_mod( 'lz_real_blog_location','' ) != '') { ?>		
					       <span><a href="tel:<?php echo esc_attr( get_theme_mod('lz_real_blog_location','')); ?>"> <i class="fas fa-phone"></i><span class="col-org"><?php echo esc_html( get_theme_mod('lz_real_blog_location','')); ?></span></a></span>
					    <?php } ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-4">
					<div class="social-icons">
						<?php if( get_theme_mod( 'lz_real_blog_facebook_url','' ) != '') { ?>
			              <a href="<?php echo esc_url( get_theme_mod( 'lz_real_blog_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','lz-real-blog' );?></span></a>
			            <?php } ?>
			            <?php if( get_theme_mod( 'lz_real_blog_linkedin_url','' ) != '') { ?>
			              <a href="<?php echo esc_url( get_theme_mod( 'lz_real_blog_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','lz-real-blog' );?></span></a>
			            <?php } ?>
			            <?php if( get_theme_mod( 'lz_real_blog_insta_url','' ) != '') { ?>
			              <a href="<?php echo esc_url( get_theme_mod( 'lz_real_blog_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','lz-real-blog' );?></span></a>
			            <?php } ?>
			            <?php if( get_theme_mod( 'lz_real_blog_twitter_url','' ) != '') { ?>
			              <a href="<?php echo esc_url( get_theme_mod( 'lz_real_blog_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','lz-real-blog' );?></span></a>
			            <?php } ?>
			            <?php if( get_theme_mod( 'lz_real_blog_pinterest_url','' ) != '') { ?>
			              <a href="<?php echo esc_url( get_theme_mod( 'lz_real_blog_pinterest_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','lz-real-blog' );?></span></a>
			            <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<header id="header">
		<div class="logo">
	        <?php if ( has_custom_logo() ) : ?>
		        <div class="site-logo"><?php the_custom_logo(); ?></div>
		    <?php endif; ?>
            <?php if (get_theme_mod('lz_real_blog_show_site_title',true)) {?>
		        <?php $blog_info = get_bloginfo( 'name' ); ?>
		        <?php if ( ! empty( $blog_info ) ) : ?>
		            <?php if ( is_front_page() && is_home() ) : ?>
			            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		        	<?php else : ?>
	            		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		            <?php endif; ?>
		        <?php endif; ?>
		    <?php }?>
        	<?php if (get_theme_mod('lz_real_blog_show_tagline',true)) {?>
		        <?php
		        $description = get_bloginfo( 'description', 'display' );
		        if ( $description || is_customize_preview() ) :
		          ?>
			        <p class="site-description">
			            <?php echo esc_html($description); ?>
			        </p>
		        <?php endif; ?>
		    <?php }?>
	    </div>
	    <div class="menu-section">
			<div class="container">
				<div class="main-top">
					<div class="row padd0">
						<div class=" col-lg-11 col-md-11 col-10">
							<?php if (has_nav_menu('primary')){ ?>
								<div class="toggle-menu responsive-menu">
						            <button onclick="lz_real_blog_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','lz-real-blog'); ?></span></button>
						        </div>
								<div id="sidelong-menu" class="nav sidenav">
					                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'lz-real-blog' ); ?>">
					                  	<?php 
					                    wp_nav_menu( array( 
					                      'theme_location' => 'primary',
					                      'container_class' => 'main-menu-navigation clearfix' ,
					                      'menu_class' => 'clearfix',
					                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
					                      'fallback_cb' => 'wp_page_menu',
					                    ) ); 
					                  	?>
					                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="lz_real_blog_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','lz-real-blog'); ?></span></a>
					                </nav>
					            </div>
					        <?php }?>
						</div>
						<div class="search-box col-lg-1 col-md-1 col-2">
							<button  onclick="lz_real_blog_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
	        			</div>        			
				     	<div class="clearfix"></div>   
					</div>
					<div class="search-outer">
						<div class="search-inner">
				        	<?php get_search_form(); ?>
			        	</div>
			        	<button onclick="lz_real_blog_search_close()" class="search-close"><i class="fas fa-times"></i></button>
			        </div>    	
				</div>
			</div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">