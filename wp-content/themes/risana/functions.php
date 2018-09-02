<?php/** * Risana functions and definitions * * @package Risana */ /*----------------------------*//*	Adding customizer with kirki/*----------------------------*/include_once( trailingslashit(get_template_directory()) . '/lib/customizer.php' );include_once( trailingslashit(get_template_directory()) . '/lib/kirki/kirki.php' );/** * Set the content width based on the theme's design and stylesheet. * * @see http://developer.wordpress.com/themes/content-width/Enqueue */ function risana_content_width() {	$GLOBALS['content_width'] = apply_filters( 'risana_content_width', 1200 );}add_action( 'after_setup_theme', 'risana_content_width', 0 );/**
 * Theme support and thumbnail sizes
*/if( ! function_exists( 'risana_theme_setup' ) ) {	function risana_theme_setup() {			/*		 * Make theme available for translation.		 * Translations can be filed in the /languages/ directory.		 * If you're building a theme based on BuildPress, use a find and replace		 */		 		load_theme_textdomain( 'risana', get_template_directory() . '/lang' );		// Add default posts and comments RSS feed links to head.		add_theme_support( 'automatic-feed-links' );				// Add default title support		add_theme_support( 'title-tag' ); 					// Custom Backgrounds		add_theme_support( 'custom-background', array(			'default-color' => 'ffffff',		) );		// Add default logo support		        add_theme_support( 'custom-logo' );						/**		 * Enable support for Post Thumbnails on posts and pages.		 *		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails		 */		 		add_theme_support('post-thumbnails');		set_post_thumbnail_size( 150, 150, true);				add_image_size('risana-photo-thumbs', 280, 170, true);		add_image_size('risana-photo-medium', 570, 380, true);		add_image_size('risana-photo-big', 800, 600, true);							// Menus		add_theme_support( 'menus' );        register_nav_menu( 'risana-menu', _x( 'Top Menu', 'backend', 'risana' ) );						// Add theme support for Semantic Markup		add_theme_support( 'html5', array(			'search-form',			'comment-form',			'comment-list',			'gallery',			'caption'		) );		// add excerpt support for pages		add_post_type_support( 'page', 'excerpt' );		// Add CSS for the TinyMCE editor		add_editor_style();	}	add_action( 'after_setup_theme', 'risana_theme_setup' );}/** * Enqueue CSS stylesheets */ if( ! function_exists( 'risana_enqueue_styles' ) ) {	function risana_enqueue_styles() {			// owl theme		wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), '1.0' );						// owl carousel		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0' );				// owl transitions		wp_enqueue_style( 'owl-transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css', array(), '1.0' );						// font awesome		wp_enqueue_style( 'awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '1.0' );		// main style	    wp_enqueue_style( 'risana-style', get_stylesheet_uri() );			}	add_action( 'wp_enqueue_scripts', 'risana_enqueue_styles' );}/** * Enqueue JS scripts */ if( ! function_exists( 'risana_enqueue_scripts' ) ) {	function risana_enqueue_scripts() {		// modernizr		wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/modernizr.js', array('jquery'), null );						// owl carousel for sliders		wp_enqueue_script( 'carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), null );		// html5		wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js' ); 		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );				// mediaqueries		wp_enqueue_script( 'mediaqueries', get_template_directory_uri() . '/assets/js/css3-mediaqueries.js' );		wp_script_add_data( 'mediaqueries', 'conditional', 'lt IE 9' );						// main for script js		wp_enqueue_script( 'risana-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null );							// for nested comments		if ( is_singular() && comments_open() ) {			wp_enqueue_script( 'comment-reply' );		}	}	add_action( 'wp_enqueue_scripts', 'risana_enqueue_scripts' );}if ( ! function_exists( 'risana_the_custom_logo' ) ) :/** * Displays custom logo. */function risana_the_custom_logo() {	if ( function_exists( 'the_custom_logo' ) ) {		the_custom_logo();	}}endif;/** * Register sidebars for Risana * * @package Risana */ function risana_sidebars() {	// Blog Sidebar		register_sidebar(array(		'name' => __( 'Blog Sidebar', "risana"),		'id' => 'blog-sidebar',		'description' => __( 'Sidebar on the blog layout.', "risana"),		'before_widget' => '<div id="%1$s" class="widget %2$s">',		'after_widget' => '</div>',		'before_title' => '<h3 class="widget-title">',		'after_title' => '</h3>'	));		// Footer Sidebar		register_sidebar(array(		'name' => __( 'Footer Widget Area 1', "risana"),		'id' => 'footer-widget-area-1',		'description' => __( 'The footer widget area 1', "risana"),		'before_widget' => '<div id="%1$s" class="widget %2$s"> ',		'after_widget' => '</div>',		'before_title' => '<div class="widget-title">',		'after_title' => '</div>'	));		register_sidebar(array(		'name' => __( 'Footer Widget Area 2', "risana"),		'id' => 'footer-widget-area-2',		'description' => __( 'The footer widget area 2', "risana"),		'before_widget' => '<div id="%1$s" class="widget %2$s"> ',		'after_widget' => '</div>',		'before_title' => '<div class="widget-title">',		'after_title' => '</div>'	));		register_sidebar(array(		'name' => __( 'Footer Widget Area 3', "risana"),		'id' => 'footer-widget-area-3',		'description' => __( 'The footer widget area 3', "risana"),		'before_widget' => '<div id="%1$s" class="widget %2$s"> ',		'after_widget' => '</div>',		'before_title' => '<div class="widget-title">',		'after_title' => '</div>'	));	}add_action( 'widgets_init', 'risana_sidebars' );// Create List Postif ( ! function_exists( 'risana_get_list_posts' ) ) :	function risana_get_list_posts($n) {			global $wp_query;				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;				$args = array(			'post_type' => 'post',			'orderby' => 'date',			'order' => 'DESC',			'posts_per_page' => $n		);				$wp_query->query( $args );				return new WP_Query( $args );	}endif; // Create Function Creditsif ( ! function_exists( 'risana_credits' ) ) :	function risana_credits() {		$text = sprintf( __('Theme created by <a href="%s">ThemesTune</a>. Powered by <a href="%s">WordPress.org</a>', 'risana'), esc_url('http://www.themestune.com'), esc_url('http://wordpress.org/'));		echo apply_filters( 'risana_credits_text', $text) ;	}endif; add_action( 'risana_display_credits', 'risana_credits' );?>