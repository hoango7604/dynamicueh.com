<?php // About magazineart


// Add About magazine art Page
function magazineart_about_page() {
	$theme_data	 = wp_get_theme();
	add_theme_page( esc_html__( 'About Magazine Art', 'magazine-art' ), esc_html__( 'About Magazine Art', 'magazine-art' ), 'edit_theme_options', 'about-magazineart', 'magazineart_about_page_output' );
}
add_action( 'admin_menu', 'magazineart_about_page' );

// Render About magazineart HTML
function magazineart_about_page_output() {
	$theme_data	 = wp_get_theme();
?>
	<div class="wrap">

		<div class="welcome-text">
			<h1>
			<?php /* translators: %s theme name */
				printf( esc_html__( 'Welcome to %s', 'magazine-art' ), esc_html( $theme_data->Name ) );
			?>
			</h1>

			<p>
				<?php /* translators: %s theme name */
					echo '<p>';
						esc_html_e( 'Version : ', 'magazine-art' ); 	echo esc_html($theme_data->version);
					echo '</p>';
				?>
				<br><br><a href="<?php echo esc_url('https://revethemes.site/magartdemo/demo1'); ?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e( 'Theme Demo Preview', 'magazine-art' ); ?></a>
			</p>
		</div>

		<div class="theme-review">
			<h3>
				<?php esc_html_e( 'Are You a Helpful Person?', 'magazine-art' ); ?>
			</h3>
			<div>
				<p><?php esc_html_e( 'We are grateful that you\'ve decided to join the Magazine Art family. If we could take 2 mins of your time, we\'d really appreciate if you could leave a review. By spreading the love, we can create even greater free stuff in the future!', 'magazine-art' ); ?></p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/magazine-art/reviews/#new-post') ?>" target="_blank">
					<?php esc_html_e( 'Leave a Review', 'magazine-art' ); ?>
					<span class="dashicons dashicons-star-filled"></span>
				</a>
			</div>
		</div>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'magazineart_tab_1'; ?>

		<div class="nav-tab-wrapper">
			<a href="<?php echo esc_url('?page=about-magazineart&tab=magazineart_tab_1');?>" class="nav-tab <?php echo esc_attr($active_tab) == 'magazineart_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'magazine-art' ); ?>
			</a>
			<a href="<?php echo esc_url('?page=about-magazineart&tab=magazineart_tab_4');?>" class="nav-tab <?php echo esc_attr($active_tab) == 'magazineart_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'magazine-art' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'magazineart_tab_1' ):  ?>

			<div class="three-columns-wrap">
				<br>
				<div class="column-width-3">
					<h3><?php esc_html_e( 'Documentation', 'magazine-art' ); ?></h3>
					<p>
					<?php /* translators: %s theme name */
						printf( esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use %s.', 'magazine-art' ), esc_html( $theme_data->Name ) );
					?>
					</p>
					<a target="_blank" href="<?php echo esc_url('https://revethemes.site/docs/magazine-art-documentation/'); ?>" class="button button-primary docs"><?php esc_html_e( 'Read Full Documentation', 'magazine-art' ); ?></a>
				</div>
				<br>
				<div class="column-width-3">
					<h3><?php esc_html_e( 'Demo Content', 'magazine-art' ); ?></h3>
					<p>
						<?php esc_html_e( 'Install the Demo Content in 2 clicks. Just click the button below to install demo import plugin and wait a bit to be redirected to the demo import page.', 'magazine-art' ); ?>
					</p>

					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) : ?>
						<a href="<?php echo admin_url( '/themes.php?page=pt-one-click-demo-import' ); ?>" class="button button-primary demo-import"><?php esc_html_e( 'Go to Import page', 'magazine-art' ); ?></a>
					<?php elseif ( magazineart_check_installed_plugin( 'one-click-demo-import', 'one-click-demo-import' ) ) : ?>
						<button class="button button-primary demo-import" id="magazineart-demo-content-act"><?php esc_html_e( 'Activate Demo Import Plugin', 'magazine-art' ); ?></button>
					<?php else: ?>
						<button class="button button-primary demo-import" id="magazineart-demo-content-inst"><?php esc_html_e( 'Install Demo Import Plugin', 'magazine-art' ); ?></button>
					<?php endif; ?>
				</div>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'magazine-art' ); ?></h3>
					<p>
					<?php /* translators: %s theme name */
						printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'magazine-art' ), esc_html( $theme_data->Name ) );
					?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Start Customizing', 'magazine-art' ); ?></a>
				</div>

			</div>


	<?php elseif ( $active_tab == 'magazineart_tab_4' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-width-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'magazine-art' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'magazine-art' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wordpress.org/support/theme/magazine-art'); ?>"><?php esc_html_e( 'Go to Support Forums', 'magazine-art' ); ?></a>
					</p>
				</div>


			</div>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end magazineart_about_page_output


// Check if plugin is installed
function magazineart_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}




// Install/Activate Demo Import Plugin
function magazineart_plugin_auto_activation() {

	// Get the list of currently active plugins (Most likely an empty array)
	$active_plugins = (array) get_option( 'active_plugins', array() );

	array_push( $active_plugins, 'one-click-demo-import/one-click-demo-import.php' );

	// Set the new plugin list in WordPress
	update_option( 'active_plugins', $active_plugins );

}
add_action( 'wp_ajax_magazineart_plugin_auto_activation', 'magazineart_plugin_auto_activation' );

// Import Plugin Data
function magazineart_import_demo_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Import Demo Data', 'magazine-art' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/about/import/magazineart-demo.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/about/import/magazineart-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/about/import/magazineart-customizer.dat'
		)
	);
}
add_filter( 'pt-ocdi/import_files', 'magazineart_import_demo_files' );

function magazineart_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Primary Navigation(Header)', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'magazineart_after_import_setup' );
// Disable PT after Import Notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );


// enqueue ui CSS/JS
function magazineart_enqueue_about_page_scripts($hook) {

	if ( 'appearance_page_about-magazineart' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'magazineart-about-page-css', get_theme_file_uri( '/inc/about/css/about-page.css' ), array(), '1.6.5' );

	// Demo Import
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	wp_enqueue_script( 'magazineart-about-page-css', get_theme_file_uri( '/inc/about/js/about-page.js' ), array(), '1.6.5' );

}
add_action( 'admin_enqueue_scripts', 'magazineart_enqueue_about_page_scripts' );
