<?php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config( 'salzburg_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

// ----------------------------------------------------------------------------------------------
// Colors
// ----------------------------------------------------------------------------------------------
require get_template_directory() . '/inc/theme-options/partials/colors/index.php';
require get_template_directory() . '/inc/theme-options/partials/colors/primary-color.php';
require get_template_directory() . '/inc/theme-options/partials/colors/body-background.php';

// ----------------------------------------------------------------------------------------------
// Layouts
// ----------------------------------------------------------------------------------------------
require get_template_directory() . '/inc/theme-options/partials/layouts/index.php';
require get_template_directory() . '/inc/theme-options/partials/layouts/homepage.php';
require get_template_directory() . '/inc/theme-options/partials/layouts/single-post.php';
require get_template_directory() . '/inc/theme-options/partials/layouts/page.php';

// ----------------------------------------------------------------------------------------------
// Typography
// ----------------------------------------------------------------------------------------------
require get_template_directory() . '/inc/theme-options/partials/typography/index.php';
require get_template_directory() . '/inc/theme-options/partials/typography/font-families.php';
require get_template_directory() . '/inc/theme-options/partials/typography/font-sizes.php';
