<?php
/**
 * Magazine art functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Magazine art
 * @since Magazine art 1.0
 */
 define( 'MAGAZINEART_VERSION', '1.1.73' );

 define( 'MAGAZINEART_PHP_INCLUDE', trailingslashit( get_template_directory() ) . 'inc/' );

 /**
  * Checks whether woocommerce is active or not
  *
  * @return boolean
  */
 function magazineart_is_woocommerce_active() {
  if ( class_exists( 'woocommerce' ) ) {
    return true;
  } else {
    return false;
  }
 }

 require_once(MAGAZINEART_PHP_INCLUDE . 'menu.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'loop-hooks.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'template-class.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'custom-header.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'kirki/kirki.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'customizer.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'kirki-customizer.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'about/about-theme.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'meta-boxes.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'slider-class.php');



  if ( magazineart_is_woocommerce_active() ) {
    require_once(MAGAZINEART_PHP_INCLUDE . 'woocommerce.php');
 }


 /** widgets */
 require_once(MAGAZINEART_PHP_INCLUDE . 'widgets/latest-posts-list.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'widgets/latest-posts-classic.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'widgets/latest-posts-news.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'widgets/recent-posts-thum.php');
 require_once(MAGAZINEART_PHP_INCLUDE . 'widgets/category-posts-thum.php');


if (! function_exists('magazineart_setup_theme')) :
//**************magazineart SETUP******************//
function magazineart_setup_theme()
{

/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
    add_theme_support('title-tag');


    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    //Register Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation(Header)', 'magazine-art'),
        'top-menu'    => esc_html__('Top Bar(Header)', 'magazine-art')
    ));

    // Declare WooCommerce support
    add_theme_support('woocommerce');

		// Add theme support for woocommerce product gallery added in WooCommerce 3.0.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

    //Custom Background
    $args = array(
    'default-color' => 'f7f7f7',
);
    add_theme_support('custom-background', $args);

    /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support(
      'post-formats', array(
        'video',
        'image',
        'gallery',
        'audio',
      )
    );
    /*
         * Enable support for custom Header image.
         *
         *  @since advance
         */
    $args = array(
            'flex-width'    => true,
            'flex-height'   => true,
            'header-text'   => false,
    );
    add_theme_support('custom-header', $args);

    //Post Thumbnail
    add_theme_support('post-thumbnails');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
    /*

    /*
         * Enable support for custom logo.
         *
         *  @since magazineart
         */


    $defaults = array(
        'height'      => 100,
        'width'      => 220,
        'flex-width'  => true,
				'flex-height'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support('custom-logo', $defaults);

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // Add featured image sizes
    //
    // Sizes are optimized and cropped for landscape aspect ratio
    // and optimized for HiDPI displays on 'small' and 'medium' screen sizes.
    add_image_size('magazineart-small', 110, 85, true); // name, width, height, crop
    add_image_size('magazineart-news-big', 370, 370, true);
		add_image_size('magazineart-list-post', 400, 350, true);
    add_image_size('magazineart-large', 750, 400, true);
    add_image_size('magazineart-xlarge', 1440, 400, true);
		add_image_size('magazineart-slider', 1440, 500, true);
    add_image_size('magazineart-slider2', 750, 450, true);

    // Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => 'strong blue',
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => 'lighter blue',
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => 'very light gray',
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => 'very dark gray',
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			)
		) );
    // Define and register starter content to showcase the theme on new sites.
  	$starter_content = array(
  		'widgets'     => array(
  			// Place three core-defined widgets in the sidebar area.
  			'home-widgets-fullwidth-magazineart' => array(
  				'magazineart_latest_post_news',
  				'magazineart_latest_post_news',
  				'magazineart_latest_post_news',
  			),

  			// Add the core-defined business info widget to the footer 1 area.
  			'home-widgets-magazineart' => array(
  				'magazineart_latest_post_list',
          'magazineart_post_classic',
  			),

  			// Put two core-defined widgets in the footer 2 area.
  			'home-sidebar-magazineart' => array(
  				'magazineart_latest_post_thum',
    			),
  		),
      'posts' => array(
          'home',
          'blog' ,
      ),
  		// Default to a static front page and assign the front and posts pages.
  		'options'     => array(
  			'show_on_front'  => 'page',
  			'page_on_front'  => '{{home}}',
  			'page_for_posts' => '{{blog}}',
  		),


  		// Set up nav menus for each of the two areas registered in the theme.
  		'nav_menus'   => array(
  			// Assign a menu to the "top" location.
  			'primary'    => array(
  				'name'  => __( 'Primary Navigation(Header)', 'magazine-art' ),
  				'items' => array(
  					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
  					'page_blog',
  				),
  			),


  		),
  	);

  	/**
  	 * Filters magazine art array of starter content.
  	 *
  	 * @since magazine art 1.1
  	 *
  	 * @param array $starter_content Array of starter content.
  	 */
  	$starter_content = apply_filters( 'magazineart_starter_content', $starter_content );

  	add_theme_support( 'starter-content', $starter_content );

    // Theme Activation Notice
  	global $pagenow;

  	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
  		add_action( 'admin_notices', 'magazineart_activation_notice' );
  	}
}
endif; // magazineart_setup
add_action('after_setup_theme', 'magazineart_setup_theme');


/*
** Notice after Theme Activation and Update.
*/
function magazineart_activation_notice() {

	$theme_data	 = wp_get_theme();

	echo '<div class="notice notice-success is-dismissible">';

		echo '<h1>';
			/* translators: %s theme name */
			printf( esc_html__( 'Welcome to %s', 'magazine-art' ), esc_html( $theme_data->Name ) );
		echo '</h1>';

		echo '<p>';
			/* translators: %1$s: theme name, %2$s link */
			printf( __( 'Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'magazine-art' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=about-magazineart' ) ) );
		echo '</p>';

		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=about-magazineart' ) ) .'" class="button button-primary button-hero">';
			/* translators: %s theme name */
			printf( esc_html__( 'Get started with %s', 'magazine-art' ), esc_html( $theme_data->Name ) );
		echo '</a></p>';

	echo '</div>';
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function magazineart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magazineart_content_width', 640 );
}

add_action( 'after_setup_theme', 'magazineart_content_width', 0 );


//enqueue css and js

function magazineart_scripts()
{
  $magazineart = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fonts/css/font-awesome'.$magazineart.'.css', 'font_awesome', true);
		wp_enqueue_style('main_magazineart', get_template_directory_uri() . '/assets/css/main'.$magazineart.'.css', 'main_magazineart', true);
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', 'animate_css', true);

    wp_enqueue_style('magazineart-style', get_stylesheet_uri());
    // js
    wp_enqueue_script('magazineart_main_js', get_template_directory_uri().'/assets/js/main'.$magazineart.'.js', array('jquery'), true);
    wp_enqueue_script('magazineart_library', get_template_directory_uri().'/assets/js/library'.$magazineart.'.js', array('jquery'), true);

    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }

}
add_action('wp_enqueue_scripts', 'magazineart_scripts');


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function magazineart_widgets_init()
{
    register_sidebar(array(
    'name'          => __('Blog Sidebar ', 'magazine-art'),
    'id'            => 'right-sidebar',
    'description'   => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'magazine-art'),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-24 medium-12 large-24"><div class="widget_wrap ">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
    ));
    register_sidebar(array(
    'name'          => __('Footer Widgets', 'magazine-art'),
    'id'            => 'magazineart-footer_sidebar',
    'description'   => __('Add widgets here to appear in your footer.', 'magazine-art'),
    'before_widget' => '<div id="%1$s" class="widget %2$s footer_widgets_warp cell small-24 medium-12 large-8 align-self-top " ><div class="widget_wrap ">',
    'after_widget'  => '</div></div>',
    'before_title'  => '<div class="widget-title "> <h3>',
    'after_title'   => '</h3></div>'
    ));
    register_sidebar(array(
    'name'          => __('Home Widgets area fullwidth', 'magazine-art'),
    'id'            => 'home-widgets-fullwidth-magazineart',
    'description'   => __('Home widgets area fullwidth (Under slider)', 'magazine-art'),
    'before_widget' => '<div id="%1$s" class="widget %2$s home_widget_wrap fullwidth">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
    ));
		register_sidebar(array(
    'name'          => __('Home Widgets area', 'magazine-art'),
    'id'            => 'home-widgets-magazineart',
    'description'   => __('Home widgets area', 'magazine-art'),
    'before_widget' => '<div id="%1$s" class="widget %2$s home_widget_wrap">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => ''
    ));

		register_sidebar(array(
		'name'          => __('Home sidebar Widgets', 'magazine-art'),
		'id'            => 'home-sidebar-magazineart',
		'description'   => __('Home Right Sidebar', 'magazine-art'),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-item cell small-24 medium-12 large-24"><div class="widget_wrap home_sidebar ">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-title "> <h3>',
		'after_title'   => '</h3></div>'
		));
    register_sidebar(array(
    'name'          => __('Header advertising area ', 'magazine-art'),
    'id'            => 'sidebar-headeradvertising',
    'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title hide">',
    'after_title'   => '</h3>'
    ));


}

add_action('widgets_init', 'magazineart_widgets_init');

/**
 * Populate frontpage widgets areas with default widgets
 */
 add_action( 'after_switch_theme', 'magazineart_populate_with_default_widgets' );

function magazineart_populate_with_default_widgets() {

	$magazineart_sidebars = array ( 'home-widgets-fullwidth-magazineart' => 'home-widgets-fullwidth-magazineart' );

	$active_widgets = get_option( 'sidebars_widgets' );


		if ( empty ( $active_widgets[ $magazineart_sidebars['home-widgets-fullwidth-magazineart'] ] ) ) {

      $counter = 1;

		$active_widgets['home-widgets-fullwidth-magazineart'][0] = 'magazineart_category_thum-'. $counter ;


			$category_thum_content[ $counter ] = array(
        'category' => 1,
        'category_img1'=> get_template_directory_uri(). "/images/360x360.jpg",
        'label' => 'News',
        'category2' => 1,
        'category_img2'=> get_template_directory_uri(). "/images/360x360.jpg",
        'label2' => 'Topics',
        'category3' => 1,
        'category_img3'=> get_template_directory_uri(). "/images/360x360.jpg",
        'label3' => 'Article',
			);


		update_option( 'widget_magazineart_category_thum', $category_thum_content );

    $counter++;
    $active_widgets['home-widgets-fullwidth-magazineart'][] = 'magazineart_latest_post_news-'. $counter;

    $latest_post_news_content[  $counter ] = array(
      'title' => 'LIFESTYLE',
      'category' => 'show_option_all',
      'number_posts' => 4,
      'sticky_posts' => false,

    );

  update_option( 'widget_magazineart_latest_post_news', $latest_post_news_content );

  $counter++;
  $active_widgets['home-widgets-fullwidth-magazineart'][] = 'magazineart_latest_post_news-'. $counter;

  $latest_post_news_content[  $counter ] = array(
    'title' => 'FASHION',
    'category' => 'show_option_all',
    'number_posts' => 4,
    'sticky_posts' => false,

  );

update_option( 'widget_magazineart_latest_post_news', $latest_post_news_content );

$counter++;
$active_widgets['home-widgets-fullwidth-magazineart'][] = 'magazineart_latest_post_news-'. $counter;

$latest_post_news_content[  $counter ] = array(
  'title' => 'TRENDING',
  'category' => 'show_option_all',
  'number_posts' => 4,
  'sticky_posts' => false,

);

update_option( 'widget_magazineart_latest_post_news', $latest_post_news_content );


  update_option( 'sidebars_widgets', $active_widgets );


}

}
