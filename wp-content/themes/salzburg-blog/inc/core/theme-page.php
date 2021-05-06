<?php
/**
 * Adding theme option page with Getting started tab
 *
 * @package Salzburg Blog
 */
add_action('admin_menu', 'salzburg_theme_pages');
function salzburg_theme_pages() {
	add_theme_page(
		esc_html__( 'Welcome to Salzburg', 'salzburg-blog' ),
		esc_html__( 'Welcome to Salzburg', 'salzburg-blog' ),
		'manage_options',
		'salzburg-welcome-page',
		'salzburg_welcome_page_content'
	);
}

function salzburg_welcome_page_content() { ?>
	<div class="wrap about-wrap">
		<h1><?php esc_html_e( 'Salzburg Theme Options', 'salzburg-blog' ); ?></h1>
		<p class="about-text"><?php esc_html_e( 'Salzburg is a minimal and elegant blogging theme. Simple and clean but powerful at the same time. Provides you with fast loading speed, clean code and options that you need to customise your blog.', 'salzburg-blog' ); ?></p>
		<?php settings_errors(); ?>

		<?php
			$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'getting_started';
		?>

		<h2 class="nav-tab-wrapper">
			<a href="?page=salzburg-welcome-page&tab=getting_started" class="nav-tab <?php echo $active_tab == 'getting_started' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Getting started', 'salzburg-blog' ); ?></a>
		</h2>

		<div>
			<h3><?php esc_html_e( 'View Demo', 'salzburg-blog' ); ?></h3>
			<p><?php esc_html_e( 'View our demo and see the great things you will be able to do using Salzburg!', 'salzburg-blog' ); ?></p>
			<p>
				<a class="button button-primary" target="_blank" href="<?php echo esc_url( 'https://demo.humblethemes.com/salzburg/' ); ?>"><?php esc_html_e( 'View Demo', 'salzburg-blog' ); ?></a>
			</p>
			<hr>

			<h3><?php esc_html_e( 'Read Full Documentation Before Start', 'salzburg-blog' ); ?></h3>
			<p><?php esc_html_e( 'Please check our full documentation for detailed information on how to Setup and Use Salzburg.', 'salzburg-blog' ); ?></p>
			<p>
				<a target="_blank" href="<?php echo esc_url( 'https://docs.humblethemes.com/salzburg/' ); ?>"><?php esc_html_e( 'Documentation', 'salzburg-blog' ); ?></a>
			</p>
			<hr>

			<h3><?php esc_html_e( 'Go to Customizer', 'salzburg-blog' ); ?></h3>
			<p><?php esc_html_e( 'All Setting, Theme Options, Widgets and Menus are available via Customize screen. Have a quick look or start customization!', 'salzburg-blog' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Go to Customizer', 'salzburg-blog' ); ?></a>
			</p>
		</div>
	</div>

<?php
}
