<?php
//about theme info
add_action( 'admin_menu', 'lz_real_blog_gettingstarted' );
function lz_real_blog_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'lz-real-blog'), esc_html__('About Theme', 'lz-real-blog'), 'edit_theme_options', 'lz_real_blog_guide', 'lz_real_blog_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function lz_real_blog_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'lz_real_blog_admin_theme_style');

//guidline for about theme
function lz_real_blog_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'lz-real-blog' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to LZ Real Blog WordPress Theme', 'lz-real-blog' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'lz-real-blog' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'lz-real-blog' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'lz-real-blog' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'lz-real-blog' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'lz-real-blog' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'lz-real-blog' ); ?> <a href="<?php echo esc_url( LZ_REAL_BLOG_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'lz-real-blog' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'LZ Real Blog is a stylish and creative WordPress blog theme to serve every niche in the blogging field. Different types of blogs like food bog, travel and adventure blog, lifestyle blog, technology blog, sports blog, craft blog, fashion blog and many more types are supported by this theme. This multipurpose theme can be used as a professional portfolio or landing page. Apart from this it can also be used for online magazines, journals, biography and resumes. It is essentially a writers theme with the intent of focusing the content. The theme is responsive and cross-browser compatible. As easy customization is facilitated, you can tweak various elements of the theme. It is designed with banners and sliders. Among various other sections, testimonial section and newsletter area are main part of the theme. The theme is SEO-friendly and enables faster page loading for a great user experience. It can be translated into various languages for more user influx. This WordPress blog theme has social media icons for sharing of the site content introducing it to wider audience. It is built on Bootstrap framework for easy setting up of the site. This theme has the perfect professional look maintained through clean and secure coding.', 'lz-real-blog')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Blog Theme', 'lz-real-blog' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'lz-real-blog'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( LZ_REAL_BLOG_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'lz-real-blog'); ?></a>
			<a href="<?php echo esc_url( LZ_REAL_BLOG_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'lz-real-blog'); ?></a>
			<a href="<?php echo esc_url( LZ_REAL_BLOG_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'lz-real-blog'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/real-blog.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'lz-real-blog'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'lz-real-blog'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'lz-real-blog'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>