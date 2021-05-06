<?php
/**
 * faq customizer
 */
class faq_Customizer {

    function __construct() {
        add_action( 'customize_register', array($this, 'register_control') );

    }

    function register_control( $wp_customize ) {

        // logo
        $wp_customize->add_section( 'faq_theme_options', array(
            'title'             => __( 'FAQ Theme Options', 'faq' ),
            'priority'          => 9,
            'description'       => __( 'Upload your logo (dimension : 220 X 50)', 'faq' ),
        ) );

        $wp_customize->add_setting( 'faq_logo', array(
            'default'           => '',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'faq_sanitize_cb',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'faq_logo', array(
            'label'             => __( 'Upload Logo', 'faq' ),
            'section'           => 'faq_theme_options',
            'settings'          => 'faq_logo',
        ) ) );



        $wp_customize->add_setting( 'sidebar_categories', array(
            'default'           => 'true',
            'sanitize_callback' => 'faq_sanitize_checkbox',
        ) );

        $wp_customize->add_control('sidebar_categories',array(
            'type'              => 'radio',
            'label'             => __( 'Show Sidebar Categories', 'faq' ),
            'section'           => 'faq_theme_options',
                    'choices'   => array(
                            1       => 'Yes',
                            0       => 'No',
        ) ) );



    }

}

new faq_Customizer();


/**
 * Theme Customizer sanitization callback function
 */
function faq_sanitize_cb( $input ) {
    return wp_kses_post( $input );
}

// radio checkbox
function faq_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
