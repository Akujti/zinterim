<?php
/**
 * blogrid Theme Customizer
 *
 * @package blogrid
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogrid_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section('header_image')->title = __( 'Header Settings', 'blogrid' );
	$wp_customize->get_section('colors')->title = __( 'Background Color', 'blogrid' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blogrid_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blogrid_customize_partial_blogdescription',
		) );
	}


	/* New Section */
	$wp_customize->add_section( 'upper_widgets', array(
		'title'      => __('Upper Widgets','blogrid'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'upperwidgets_frontpage_only', array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'upperwidgets_frontpage_only', array(
		'label'    => __( 'Only show upper widgets on front page', 'blogrid' ),
		'section'  => 'upper_widgets',
		'priority' => 1,
		'settings' => 'upperwidgets_frontpage_only',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'upperwidgets_bg_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_bg_color', array(
		'label'       => __( 'Background Colors', 'blogrid' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_bg_color',
	) ) );


	$wp_customize->add_setting( 'upperwidgets_title_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_title_color', array(
		'label'       => __( 'Title Colors', 'blogrid' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_title_color',
	) ) );
	$wp_customize->add_setting( 'upperwidgets_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_text_color', array(
		'label'       => __( 'Text Colors', 'blogrid' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_text_color',
	) ) );
	$wp_customize->add_setting( 'upperwidgets_link_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_link_color', array(
		'label'       => __( 'Link Colors', 'blogrid' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_link_color',
	) ) );
	$wp_customize->add_setting( 'upperwidgets_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_border_color', array(
		'label'       => __( 'Border Colors', 'blogrid' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_border_color',
	) ) );



	/* New Section */

	$wp_customize->add_setting( 'only_show_header_frontpage', array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'only_show_header_frontpage', array(
		'label'    => __( 'Only show header image on front page', 'blogrid' ),
		'section'  => 'header_image',
		'priority' => 1,
		'settings' => 'only_show_header_frontpage',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'header_img_text', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'header_img_text', array(
		'label'    => __( "Title", 'blogrid' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'header_img_text_tagline', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'header_img_text_tagline', array(
		'label'    => __( "Tagline", 'blogrid' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
	) );

	$wp_customize->add_setting( 'header_img_textcolor', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_img_textcolor', array(
		'label'       => __( 'Text Color', 'blogrid' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'header_img_textcolor',
	) ) );




	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label'       => __( 'Logo Color', 'blogrid' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'header_textcolor',
	) ) );

	/* New Section */
	$wp_customize->add_section( 'navigation_settings', array(
		'title'      => __('Navigation Settings','blogrid'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'navigation_background_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
		'label'       => __( 'Background Color', 'blogrid' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_background_color',
	) ) );

	$wp_customize->add_setting( 'navigation_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_text_color', array(
		'label'       => __( 'Link Color', 'blogrid' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_text_color',
	) ) );

	$wp_customize->add_setting( 'navigation_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_border_color', array(
		'label'       => __( 'Border Color', 'blogrid' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_border_color',
	) ) );

	/* New Section */
	$wp_customize->add_section( 'sidebar_settings', array(
		'title'      => __('Sidebar Settings','blogrid'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'hide_sidebar_full_width', array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'hide_sidebar_full_width', array(
		'label'    => __( 'Hide Sidebar (Full-width mode)', 'blogrid' ),
		'section'  => 'sidebar_settings',
		'priority' => 1,
		'settings' => 'hide_sidebar_full_width',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'sidebar_bg_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_bg_color', array(
		'label'       => __( 'Background Color', 'blogrid' ),
		'section'     => 'sidebar_settings',
		'priority'   => 1,
		'settings'    => 'sidebar_bg_color',
	) ) );


	$wp_customize->add_setting( 'sidebar_headline_color', array(
		'default'           => '#9e9e9e',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_headline_color', array(
		'label'       => __( 'Headline Color', 'blogrid' ),
		'section'     => 'sidebar_settings',
		'priority'   => 1,
		'settings'    => 'sidebar_headline_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_link_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_link_color', array(
		'label'       => __( 'Link Color', 'blogrid' ),
		'section'     => 'sidebar_settings',
		'priority'   => 1,
		'settings'    => 'sidebar_link_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_text_color', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text_color', array(
		'label'       => __( 'Text Color', 'blogrid' ),
		'section'     => 'sidebar_settings',
		'priority'   => 1,
		'settings'    => 'sidebar_text_color',
	) ) );


	/* New Section */
	$wp_customize->add_section( 'footer_settings', array(
		'title'      => __('Footer Settings','blogrid'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'footer_headline_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_headline_color', array(
		'label'       => __( 'Headline Color', 'blogrid' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_headline_color',
	) ) );
	$wp_customize->add_setting( 'footer_text_color', array(
		'default'           => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
		'label'       => __( 'Text Color', 'blogrid' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_text_color',
	) ) );
	$wp_customize->add_setting( 'footer_link_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
		'label'       => __( 'Link Color', 'blogrid' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_link_color',
	) ) );
	$wp_customize->add_setting( 'footer_border_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border_color', array(
		'label'       => __( 'Border Color', 'blogrid' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_border_color',
	) ) );

	$wp_customize->add_setting( 'footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
		'label'       => __( 'Background Color', 'blogrid' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_background_color',
	) ) );
	$wp_customize->add_setting( 'footer_copyright_text', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'footer_copyright_text', array(
		'label'    => __( "Copyright Text", 'blogrid' ),
		'description' => __( 'Replaces the copyright text in the footer.', 'blogrid' ),
		'section'  => 'footer_settings',
		'type'     => 'text',
		'priority' => 1,
	) );




	/* New Section */
	$wp_customize->add_section( 'blog_feed_settings', array(
		'title'      => __('Blog Feed Settings','blogrid'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'blogfeed_bg_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogfeed_bg_color', array(
		'label'       => __( 'Background Color', 'blogrid' ),
		'section'     => 'blog_feed_settings',
		'priority'   => 1,
		'settings'    => 'blogfeed_bg_color',
	) ) );

	$wp_customize->add_setting( 'blogfeed_headline_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogfeed_headline_color', array(
		'label'       => __( 'Headline Color', 'blogrid' ),
		'section'     => 'blog_feed_settings',
		'priority'   => 1,
		'settings'    => 'blogfeed_headline_color',
	) ) );

	$wp_customize->add_setting( 'blogfeed_byline_color', array(
		'default'           => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogfeed_byline_color', array(
		'label'       => __( 'Byline Color', 'blogrid' ),
		'section'     => 'blog_feed_settings',
		'priority'   => 1,
		'settings'    => 'blogfeed_byline_color',
	) ) );
	$wp_customize->add_setting( 'blogfeed_text_color', array(
		'default'           => '#656565',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogfeed_text_color', array(
		'label'       => __( 'Text Color', 'blogrid' ),
		'section'     => 'blog_feed_settings',
		'priority'   => 1,
		'settings'    => 'blogfeed_text_color',
	) ) );

	$wp_customize->add_setting( 'blogfeed_buttontext_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blogfeed_buttontext_color', array(
		'label'       => __( 'Button Text Color', 'blogrid' ),
		'section'     => 'blog_feed_settings',
		'priority'   => 1,
		'settings'    => 'blogfeed_buttontext_color',
	) ) );



	/* New Section */
	$wp_customize->add_section( 'postpage_settings', array(
		'title'      => __('Posts/Page Settings','blogrid'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'postpage_bg_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_bg_color', array(
		'label'       => __( 'Background Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_bg_color',
	) ) );


	$wp_customize->add_setting( 'postpage_headline_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_headline_color', array(
		'label'       => __( 'Headline Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_headline_color',
	) ) );

	$wp_customize->add_setting( 'postpage_byline_color', array(
		'default'           => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_byline_color', array(
		'label'       => __( 'Byline Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_byline_color',
	) ) );

	$wp_customize->add_setting( 'postpage_text_color', array(
		'default'           => '#949494',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_text_color', array(
		'label'       => __( 'Text Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_text_color',
	) ) );
	$wp_customize->add_setting( 'postpage_link_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_link_color', array(
		'label'       => __( 'Link Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_link_color',
	) ) );

	$wp_customize->add_setting( 'postpage_buttonbg_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_buttonbg_color', array(
		'label'       => __( 'Button Background Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_buttonbg_color',
	) ) );

	$wp_customize->add_setting( 'postpage_buttontext_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_buttontext_color', array(
		'label'       => __( 'Button Text Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_buttontext_color',
	) ) );

	$wp_customize->add_setting( 'postpage_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_border_color', array(
		'label'       => __( 'Border Color', 'blogrid' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_border_color',
	) ) );


}
add_action( 'customize_register', 'blogrid_customize_register' );




if(! function_exists('blogrid_customizer_css_final_output' ) ):
	function blogrid_customizer_css_final_output(){
		?>

		<style type="text/css">
			<?php if ( get_theme_mod( 'hide_sidebar_full_width' ) == '1' ) : ?>
aside#secondary {display:none;}.featured-content{width:100%;margin-right:0px;}
			<?php endif; ?>

			body, .site, .swidgets-wrap h3, .post-data-text { background: <?php echo esc_attr(get_theme_mod( 'website_background_color')); ?>; }
			.site-title a, .site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
			.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?> !important; }
			.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
			#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
			#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6, #secondary .widget h4 a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
			#secondary, #secondary .widget, #secondary .widget p, #secondary .widget li, .widget time.rpwe-time.published { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
			#secondary .swidgets-wrap, #secondary .widget ul li, .featured-sidebar .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.site-info, .footer-column-three input.search-submit, .footer-column-three p, .footer-column-three li, .footer-column-three td, .footer-column-three th, .footer-column-three caption { color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
			.footer-column-three h3, .footer-column-three h4, .footer-column-three h5, .footer-column-three h6, .footer-column-three h1, .footer-column-three h2, .footer-column-three h4, .footer-column-three h3 a { color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
			.footer-column-three a, .footer-column-three li a, .footer-column-three .widget a, .footer-column-three .sub-arrow { color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
			.footer-column-three h3:after { background: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
			.site-info, .widget ul li, .footer-column-three input.search-field, .footer-column-three input.search-submit { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
			.site-footer { background-color: <?php echo esc_attr(get_theme_mod( 'footer_background_color')); ?>; }
			.content-wrapper h2.entry-title a, .content-wrapper h2.entry-title a:hover, .content-wrapper h2.entry-title a:active, .content-wrapper h2.entry-title a:focus, .archive .page-header h1, .blogposts-list h2 a, .blogposts-list h2 a:hover, .blogposts-list h2 a:active, .search-results h1.page-title { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_headline_color')); ?>; }
			.blogposts-list .post-data-text, .blogposts-list .post-data-text a, .content-wrapper .post-data-text *{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_byline_color')); ?>; }
			.blogposts-list p { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_text_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttonbg_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttontext_color')); ?>; }
			.archive .page-header h1, .search-results h1.page-title, .blogposts-list.fbox, span.page-numbers.dots, .page-numbers li a, .page-numbers.current { border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.blogposts-list .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.page .comments-area .comment-author, .page .comments-area .comment-author a, .page .comments-area .comments-title, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single  .comments-area .comment-author, .single .comments-area .comment-author a, .single .comments-area .comments-title, .single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .single .content-area th, .search-no-results h1, .error404 h1 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline_color')); ?>; }
			.single .post-data-text, .page .post-data-text, .page .post-data-text a, .single .post-data-text a, .comments-area .comment-meta .comment-metadata a, .single .post-data-text * { color: <?php echo esc_attr(get_theme_mod( 'postpage_byline_color')); ?>; }
			.page .content-area p, .page article, .page .content-area table, .page .content-area dd, .page .content-area dt, .page .content-area address, .page .content-area .entry-content, .page .content-area li, .page .content-area ol, .single .content-area p, .single article, .single .content-area table, .single .content-area dd, .single .content-area dt, .single .content-area address, .single .entry-content, .single .content-area li, .single .content-area ol, .search-no-results .page-content p { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.single .entry-content a, .page .entry-content a, .comment-content a, .comments-area .reply a, .logged-in-as a, .comments-area .comment-respond a { color: <?php echo esc_attr(get_theme_mod( 'postpage_link_color')); ?>; }
			.comments-area p.form-submit input { background: <?php echo esc_attr(get_theme_mod( 'postpage_buttonbg_color')); ?>; }
			.error404 .page-content p, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.page .comments-area, .page article.fbox, .page article tr, .page .comments-area ol.comment-list ol.children li, .page .comments-area ol.comment-list .comment, .single .comments-area, .single article.fbox, .single article tr, .comments-area ol.comment-list ol.children li, .comments-area ol.comment-list .comment, .error404 main#main, .error404 .search-form label, .search-no-results .search-form label, .error404 input.search-submit, .search-no-results input.search-submit, .error404 main#main, .search-no-results section.fbox.no-results.not-found{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .post-data-divider, .page .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .comments-area p.form-submit input, .page .comments-area p.form-submit input { color: <?php echo esc_attr(get_theme_mod( 'postpage_buttontext_color')); ?>; }
			.bottom-header-wrapper { padding-top: <?php echo esc_attr(get_theme_mod( 'banner_img_top_padding')); ?>px; }
			.bottom-header-wrapper { padding-bottom: <?php echo esc_attr(get_theme_mod( 'banner_img_padding_bottom')); ?>px; }
			.bottom-header-wrapper { background: <?php echo esc_attr(get_theme_mod( 'imagebanner_background_color')); ?>; }
			.bottom-header-wrapper *{ color: <?php echo esc_attr(get_theme_mod( 'imagebanner_text_color')); ?>; }
			.header-widget a, .header-widget li a, .header-widget i.fa { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_link_color')); ?>; }
			.header-widget, .header-widget p, .header-widget li, .header-widget .textwidget { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_text_color')); ?>; }
			.header-widget .widget-title, .header-widget h1, .header-widget h3, .header-widget h2, .header-widget h4, .header-widget h5, .header-widget h6{ color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_title_color')); ?>; }
			.header-widget.swidgets-wrap, .header-widget ul li, .header-widget .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_border_color')); ?>; }
			.bottom-header-title, .bottom-header-paragraph{ color: <?php echo esc_attr(get_theme_mod( 'header_img_textcolor')); ?>; }

			#secondary .widget-title-lines:after, #secondary .widget-title-lines:before { background: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }


			.header-widgets-wrapper .swidgets-wrap{ background: <?php echo esc_attr(get_theme_mod( 'upperwidgets_bg_color')); ?>; }
			.top-nav-wrapper, .primary-menu .pmenu, .super-menu, #smobile-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			#secondary .widget li, #secondary input.search-field, #secondary div#calendar_wrap, #secondary .tagcloud, #secondary .textwidget{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_bg_color')); ?>; }
			#secondary .swidget { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.archive article.fbox, .search-results article.fbox, .blog article.fbox { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_bg_color')); ?>; }


			.comments-area, .single article.fbox, .page article.fbox { background: <?php echo esc_attr(get_theme_mod( 'postpage_bg_color')); ?>; }
		</style>
	<?php }
	add_action( 'wp_head', 'blogrid_customizer_css_final_output' );
endif;

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogrid_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogrid_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogrid_customize_preview_js() {
	wp_enqueue_script( 'blogrid-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blogrid_customize_preview_js' );
