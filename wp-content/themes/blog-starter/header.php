<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blog-starter' ); ?></a>
	<?php
	if (function_exists('wp_body_open')) {
        wp_body_open();
    }else {
    	do_action( 'wp_body_open' );
    }
	blog_starter_preloader();
	 ?>
<div id="page" class="site">
<?php
$getheaderlayout = get_theme_mod( 'header_layout', 'one' );
get_template_part( 'template-parts/header/header', $getheaderlayout );
?>
<div id="content" class="site-content">