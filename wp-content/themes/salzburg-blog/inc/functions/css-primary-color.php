<?php
/**
 * Generate the CSS for the selected primary color.
 *
 * @package Salzburg Blog
 */
function salzburg_primary_color_css() {
	$primary_color = salzburg_get_theme_option( 'primary_color' );

	$css = '
		.hero-link {
			background-color:' . sanitize_hex_color( $primary_color ) . ';
		}

		blockquote,
		.page-header {
			border-left: 8px solid ' . sanitize_hex_color( $primary_color ) . ';
		}

		abbr[title],
		acronym {
			border-bottom: 2px dotted ' . sanitize_hex_color( $primary_color ) . ';
		}

		mark,
		ins,
		.loop-vertical .entry-terms a,
		.entry-terms a:hover,
		.entry-terms a:focus,
		.entry-tags-wrapper .entry-terms-list-item a:hover,
		.entry-tags-wrapper
		.entry-terms-list-item
		a:focus
		.entry-content
		.wp-block-button
		.wp-block-button__link:not(.has-background),
		.hero .entry-terms a,
		.hero-link,
		.entry-content .wp-block-button .wp-block-button__link:not(.has-background) {
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.comment-metadata a:hover,
		.comment-metadata a:focus,
		.widget a,
		.loop-minimal-one .article-container:hover,
		.entry-content .entry-meta a:hover,
		.entry-content .entry-meta a:focus {
			border-color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.comment-respond textarea:focus,
		.comment-respond input:focus {
			border: 1px solid ' . sanitize_hex_color( $primary_color ) . ';
		}

		.form-submit input {
			border: 1px solid ' . sanitize_hex_color( $primary_color ) . ';
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.post-password-form input[type="submit"],
		.search-submit {
			border-color: ' . sanitize_hex_color( $primary_color ) . ';
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.post-password-form input[type="submit"] {
			border: 2px solid ' . sanitize_hex_color( $primary_color ) . ';
		}

		.page-numbers.prev:hover,
		.page-numbers.next:hover {
			border: 1px solid ' . sanitize_hex_color( $primary_color ) . ';
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.page-numbers:hover:not(.current):not(.dots) {
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
			border: 1px solid ' . sanitize_hex_color( $primary_color ) . ';
		}

		.menu-toggle {
			border: 1px solid ' . sanitize_hex_color( $primary_color ) . ';
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.calendar_wrap a {
			border-bottom: 2px solid ' . sanitize_hex_color( $primary_color ) . ';
		}

		.site-title a,
		.site-info a:hover,
		.site-info a:focus,
		.entry-title a:hover,
		.entry-content a,
		.entry-content .widget-area a:hover,
		.entry-content .widget-area a:focus,
		.loop-minimal-one .entry-link:hover .entry-continue-reading,
		.loop-minimal-one .entry-link:focus .entry-continue-reading,
		.next-post-link:hover,
		.next-post-linl:focus,
		.posted-meta-author-url,
		.mejs-horizontal-volume-slide:hover,
		.mejs-horizontal-volume-slide:focus,
		.widget_meta a:hover,
		.widget_meta a:focus,
		.widget_pages a:hover,
		.widget_pages a:focus,
		.widget_tag_cloud a:hover,
		.widget_tag_cloud a:focus,
		.widget_recent_entries a:hover,
		.widget_recent_entries a:focus,
		.widget_archive a:hover,
		.widget_archive a:focus,
		.widget_nav_menu a:hover,
		.widget_nav_menu a:focus,
		.widget_categories a:hover,
		.widget_categories a:focus,
		.widget_recent_comments a:hover,
		.widget_recent_comments a:focus,
		.logged-in-as a:hover,
		.logged-in-as a:focus,
		.comment a:hover,
		.comment a:focus,
		.primary-menu .menu-item.current-menu-item > a,
		.primary-menu .menu-item a:hover,
		.primary-menu .menu-item a:focus,
		.primary-menu .menu-item.focus a,
		.primary-menu .sub-menu .menu-item a:hover,
		.search-phrase {
			color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.primary-menu .menu-item:focus-within a:hover,
		.primary-menu .menu-item:focus-within a:focus,
		.primary-menu .menu-item:focus-within a .menu-item.focus a:hover,
		.primary-menu .menu-item:focus-within a .menu-item.focus a:focus {
			color: ' . sanitize_hex_color( $primary_color ) . ';
		}

		.loop .entry-terms a {
			background-color: ' . sanitize_hex_color( $primary_color ) . ';
		}
	';

	return apply_filters( 'yocto_primary_color_css', $css );
}
