<?php
/**
 *
 *
 * @package magazine art
 */
 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }
 // Do not proceed if Kirki does not exist.
 if ( ! class_exists( 'Kirki' ) ) {
 	return;
 }

 function magazineart_kirki_config() {

 	$args = array(
         'url_path'       => get_template_directory_uri() . '/inc/kirki/',
         'disable_loader' => true,
     );
 	return $args;
 }
 add_filter( 'kirki/config', 'magazineart_kirki_config' );

 /**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'magazine_art', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);
 /*=============================================>>>>>
 = adding panel =
 ===============================================>>>>>*/


 Kirki::add_panel( 'upgradepro_options', array(
     'priority'    => 10,
     'title'       => esc_attr__( 'About Theme', 'magazine-art' ),
     'description' => esc_attr__( 'This panel will provide all info about the Theme.', 'magazine-art' ),
     'icon' => 'dashicons-warning'

 ) );
Kirki::add_panel( 'magazineart_site_appearance', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Appearance', 'magazine-art' ),
    'description' => esc_attr__( 'This panel will provide all Site layout and Background color typography options of the Theme.', 'magazine-art' ),
) );

Kirki::add_panel( 'magazineart_header_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Header Settings', 'magazine-art' ),
    'description' => esc_attr__( 'This panel site header options', 'magazine-art' ),
) );


Kirki::add_panel( 'magazineart_home_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Home sections', 'magazine-art' ),
    'description' => esc_attr__( 'This panel will provide home page sections options', 'magazine-art' ),
) );
Kirki::add_panel( 'magazineart_post_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Post options', 'magazine-art' ),
    'description' => esc_attr__( 'This panel will provide all Post options of the Theme.', 'magazine-art' ),
) );
Kirki::add_panel( 'magazineart_socialshare_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Social Icon and Share', 'magazine-art' ),
    'description' => esc_attr__( 'This panel will provide Social icon and Share options of the Theme.', 'magazine-art' ),
) );

Kirki::add_panel( 'magazineart_footer_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Footer options', 'magazine-art' ),
    'description' => esc_attr__( 'This panel footer options of the Theme.', 'magazine-art' ),
) );
/*=============================================>>>>>
= adding section =
===============================================>>>>>*/
Kirki::add_section( 'magazine_upgradepro_options', array(
    'priority'       => 1,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
) );


Kirki::add_section( 'magazineart_color_options', array(
    'title'          =>esc_attr__( 'Color', 'magazine-art' ),
     'panel'          => 'magazineart_site_appearance', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-admin-customizer'
) );

Kirki::add_section( 'magazineart_layout_site', array(
    'title'          =>esc_attr__( 'Site Layout', 'magazine-art' ),
     'panel'          => 'magazineart_site_appearance', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-welcome-widgets-menus'
) );

// header options
Kirki::add_section( 'magazineart_topbar_options', array(
    'title'          =>esc_attr__( 'Top Bar Options', 'magazine-art' ),
     'panel'          => 'magazineart_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

Kirki::add_section( 'magazineart_header_options', array(
    'title'          =>esc_attr__( 'Header Options', 'magazine-art' ),
     'panel'          => 'magazineart_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

Kirki::add_section( 'magazineart_header_image', array(
    'title'          =>esc_attr__( 'Header Background image', 'magazine-art' ),
     'panel'          => 'magazineart_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

Kirki::add_section( 'magazineart_header_menu', array(
    'title'          =>esc_attr__( 'Menu style', 'magazine-art' ),
     'panel'          => 'magazineart_header_options', // Not typically needed.
    'priority'       => 1,
    'icon' => 'dashicons-menu'
) );

// slider options
Kirki::add_section( 'magazineart_slider_notice', array(
    'title'          =>esc_attr__( 'Notice ', 'magazine-art' ),
    'panel'          => 'magazineart_home_options', // Not typically needed.
    'priority'       => 0,
    'type'           => 'expanded',
    'capability'     => 'edit_theme_options',
) );
Kirki::add_section( 'magazineart_fontpage_layout', array(
    'title'          =>esc_attr__( 'Fontpage Post setting ', 'magazine-art' ),
    'panel'          => 'magazineart_home_options', // Not typically needed.
    'priority'       => 0,
    'capability'     => 'edit_theme_options',
) );
Kirki::add_section( 'magazineart_slider_settings', array(
    'title'          =>esc_attr__( 'Slider Options ', 'magazine-art' ),
     'panel'          => 'magazineart_home_options', // Not typically needed.
    'priority'       => 0,
    'icon' => 'dashicons-format-gallery'
) );

Kirki::add_section( 'magazineart_postlayout_settings', array(
    'title'          =>esc_attr__( 'Category and Blog Post ', 'magazine-art' ),
     'panel'          => 'magazineart_post_options', // Not typically needed.
    'priority'       => 3,
) );
Kirki::add_section( 'magazineart_singlepost_settings', array(
    'title'          =>esc_attr__( 'Single Post ', 'magazine-art' ),
    'panel'          => 'magazineart_post_options', // Not typically needed.
    'priority'       => 3,
) );
Kirki::add_section( 'magazineart_relatedpost_settings', array(
    'title'          =>esc_attr__( 'Related post ', 'magazine-art' ),
    'panel'          => 'magazineart_post_options', // Not typically needed.
    'priority'       => 3,
) );
Kirki::add_section( 'magazineart_page_settings', array(
    'title'          =>esc_attr__( 'Page setting ', 'magazine-art' ),
     'panel'          => 'magazineart_post_options', // Not typically needed.
    'priority'       => 3,
) );

Kirki::add_section( 'magazineart_socialshare_settings', array(
    'title'          =>esc_attr__( 'social share setting ', 'magazine-art' ),
     'panel'          => 'magazineart_socialshare_options', // Not typically needed.
    'priority'       => 3,
    'type' 			=> 'expanded',
) );

Kirki::add_section( 'magazineart_footer_settings', array(
    'title'          =>esc_attr__( 'Footer Options ', 'magazine-art' ),
     'panel'          => 'magazineart_footer_options', // Not typically needed.
    'priority'       => 3,
    'icon' => 'dashicons-feedback'
) );



$socialarray = array(
		'' => esc_attr__('Please Select', 'magazine-art'),
		'facebook' =>esc_attr__('Facebook', 'magazine-art'),
    'instagram' => esc_attr__('Instagram', 'magazine-art'),
    'linkedin'=> esc_attr__('LinkedIn', 'magazine-art'),
    'pinterest' => esc_attr__('Pinterest', 'magazine-art'),
		'dribbble' => esc_attr__('Dribbble', 'magazine-art'),
		'twitter' => esc_attr__('Twitter', 'magazine-art'),
		'google' => esc_attr__('google plus', 'magazine-art'),
		'skype' => esc_attr__('skype', 'magazine-art'),
		'youtube' => esc_attr__('Youtube', 'magazine-art'),
		'flickr' => esc_attr__('Flickr', 'magazine-art'),
		'vk' => esc_attr__('vk', 'magazine-art'),
		'rss' => esc_attr__('RSS', 'magazine-art'),
		'tumblr' => esc_attr__('Tumblr', 'magazine-art'),
		'instagram' => esc_attr__('Instagram', 'magazine-art'),
		'xing' => esc_attr__('Xing', 'magazine-art'),
    'linkedin'=> esc_attr__('LinkedIn', 'magazine-art'),
);

/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function magazine_art_kirki_add_field( $args ) {
	Kirki::add_field( 'magazine_art', $args );
}

magazine_art_kirki_add_field( array(
	'type'        => 'custom',
	'settings'    => 'magazineart_link_pro',
	'section'     => 'magazine_upgradepro_options',
	'default'     => '<a class="button button-primary" target="_blank" href="' . esc_url( 'https://revethemes.site/magazine-art-pro/' ) . '">'.esc_html__( 'Upgrade To Pro', 'magazine-art' ).'</a>',
	'priority'    => 10,
) );

$magazineart_primary_color = get_theme_mod('magazineart_primary_color', '#93bf3d');
if ( 225 > ariColor::newColor( $magazineart_primary_color )->luminance ) {
  $text_color_primary = '#fff';
} else {
$text_color_primary = '#0a0a0a';
}
magazine_art_kirki_add_field( array(
    'type' => 'color',
    'settings' => 'magazineart_primary_color',
    'label' => esc_attr__('Primary Color', 'magazine-art'),
    'section' => 'magazineart_color_options',
    'default' => '#93bf3d',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
  			array(
  					'element' => '.woocommerce span.onsale,#blog-content .navigation .nav-links .current,.menu-wrap .dropdown.menu a::before,.label,.label:hover,.label:focus,#burger span,.search-submit',
  					'property' => 'background',
  					'units' => ''
  			),
        array(
            'element' => '.label-border.red ,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce div.product p.price,.woocommerce ul.products li.product .price ins, .woocommerce ul.products li.product .price,.menu-wrap .dropdown.menu a:hover,a,.post-pagination-wrap .nav-links .nav-previous h4:hover,.post-pagination-wrap .nav-links i,.post-pagination-wrap .nav-links .nav-next h4:hover',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => '.btn-read:hover,.comment-form .form-submit input#submit, a.box-comment-btn, .comment-form .form-submit input[type="submit"],.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce ul.products li.product .button:hover,#blog-content .navigation .nav-links a.page-numbers:hover,.post-single-cat,.label-border.red:hover,.single-post-title h1:after,.scroll_to_top',
            'property' => 'background-color',
            'units' => ''
        ),

        array(
            'element' => '.btn-read:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.label-border.red',
            'property' => 'border-color',
            'units' => ''
        ),

        array(
            'element' => '.btn-read:hover,.comment-form .form-submit input#submit, a.box-comment-btn, .comment-form .form-submit input[type="submit"],.label-border.red:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce span.onsale,.woocommerce ul.products li.product .button:hover,#blog-content .navigation .nav-links a.page-numbers:hover,#blog-content .navigation .nav-links .current,.post-single-cat,.post-single-cat:hover,.label,.label-border.red:hover,.label:hover,.scroll_to_top,.scroll_to_top:hover,.search-submit',
            'property' => 'color',
            'value_pattern' =>$text_color_primary,
        ),
        array(
            'element' => '.label',
            'property' => 'box-shadow',
            'value_pattern' => 'inset 0 0 1em '. Kirki_Color::get_rgba($magazineart_primary_color, 0.5) .', 0 0 1em '. Kirki_Color::get_rgba($magazineart_primary_color, 0.5) .''
        ),
        array(
            'element' => '.label:hover,.label-border.red:hover',
            'property' => 'box-shadow',
            'value_pattern' => 'inset 0 0 0 '. Kirki_Color::get_rgba($magazineart_primary_color, 0.5) .', 0 0 1.5em '. Kirki_Color::get_rgba($magazineart_primary_color, 0.7) .''
        ),
        array(
            'element' => '.label-border.red',
            'property' => 'box-shadow',
            'value_pattern' => 'inset 0 0 0.2em '. Kirki_Color::get_rgba($magazineart_primary_color, 0.4) .', 0 0 0.2em '. Kirki_Color::get_rgba($magazineart_primary_color, 0.4) .''
        ),

  	),
));

magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'postitle_hover_color',
	'label'       => __( 'Post Title Hover color', 'magazine-art' ),
	'section'     => 'magazineart_color_options',
	'default'     => '#93bf3d',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.post-title a.post-title-link:hover',
					'property' => 'color',
					'units' => ''
			),
	),

) );

magazine_art_kirki_add_field( array(
	'type'        => 'switch',
	'settings'    => 'magazineart_layout_site_box',
	'label'       => esc_attr__( 'Box/Full Site', 'magazine-art' ),
	'section'     => 'magazineart_layout_site',
	'default'     => '2',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Box', 'magazine-art' ),
		'off' => esc_attr__( 'Full', 'magazine-art' ),
	),
) );
/*=============================================>>>>>
= Top Bar Options =
===============================================>>>>>*/
magazine_art_kirki_add_field( array(
	'type'        => 'switch',
	'settings'    => 'topbar_menu_onof',
	'label'       => esc_attr__( 'Enable/Disable top Bar', 'magazine-art' ),
	'section'     => 'magazineart_topbar_options',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'magazine-art' ),
		'off' => esc_attr__( 'Disable', 'magazine-art' ),
	),
) );

magazine_art_kirki_add_field( array(
	'type'        => 'custom',
	'settings'    => 'add_social_icontop',
	'section'     => 'magazineart_topbar_options',
  'default'     => '<button type="button" class="button menu-shortcut focus-customizer-social-icontop" >' . esc_html__( 'Add Social Icon', 'magazine-art' ) . '</button>',
) );

magazine_art_kirki_add_field( array(
	'type'        => 'custom',
	'settings'    => 'add_menu_topbar',
	'section'     => 'magazineart_topbar_options',
  'default'     => '<button type="button" class="button menu-shortcut focus-customizer-menu-topbar" >' . esc_html__( 'Add menu', 'magazine-art' ) . '</button>',
) );
$topbar_dbg_color = get_theme_mod('topbar_dbg_color', '#fff');
if ( 225 > ariColor::newColor( $topbar_dbg_color )->luminance ) {
  $text_color_topbar = '#fff';
} else {
$text_color_topbar = '#0a0a0a';
}

magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'topbar_dbg_color',
	'label'       => __( 'topbar background color', 'magazine-art' ),
	'section'     => 'magazineart_topbar_options',
	'default'     => '#fff',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.top-header',
					'property' => 'background',
					'units' => ''
			),
      array(
          'element' => '.top-header .top-bar-left .menu a',
          'property' => 'color',
          'value_pattern' =>$text_color_topbar,
      )
	),

) );
magazine_art_kirki_add_field( array(
	'type'        => 'slider',
	'settings'    => 'topbar_text_size',
	'label'       => esc_attr__( 'Text Size', 'magazine-art' ),
	'section'     => 'magazineart_topbar_options',
	'default'     => 12,
	'choices'     => array(
		'min'  => '0',
		'max'  => '100',
		'step' => '1',
	),
  'transport' => 'auto',
  'output' => array(
      array(
          'element' => '.top-header .menu a',
          'property' => 'font-size',
          'units' => 'px'
      )),
) );

/*=============================================>>>>>
= Header Options =
===============================================>>>>>*/

magazine_art_kirki_add_field( array(
	'type'        => 'spacing',
	'settings'    => 'header_main_padding',
	'label'       => __( 'Main Header height', 'magazine-art' ),
	'section'     => 'magazineart_header_options',
	'transport' => 'auto',
	'default'     => array(
			'top'    => '30px',
			'bottom' => '30px',
			'left'   => '10px',
			'right'  => '10px',
		),
	'output' => array(
			array(
					'element' => '.banner-warp',
					'property' => 'padding',
			)
	),
) );


magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'header_solidbg_color',
	'label'       => __( 'background color', 'magazine-art' ),
	'section'     => 'magazineart_header_options',
	'default'     => '#fff',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.header-wrap,.mobile-header,.mobile-header .title-bar',
					'property' => 'background',
					'units' => ''
			)
	),

) );

magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'header_titledic_text',
	'label'       => __( 'Title And description color', 'magazine-art' ),
	'section'     => 'magazineart_header_options',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.header-wrap .banner-warp .site-branding p,.site-branding h1 a,.mobile-header .site-title,.mobile-header .site-description',
					'property' => 'color',
					'units' => ''
			)
	),

) );


magazine_art_kirki_add_field( array(
	'type'        => 'switch',
	'settings'    => 'sticky_menu_onof',
	'label'       => esc_attr__( 'Enable/Disable sticky Menu', 'magazine-art' ),
	'section'     => 'magazineart_header_menu',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'magazine-art' ),
		'off' => esc_attr__( 'Disable', 'magazine-art' ),
	),
) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'search_icon_menubar',
	'label'       => esc_attr__( 'show/hide search icon Menu bar', 'magazine-art' ),
	'section'     => 'magazineart_header_menu',
	'default'     => true,

) );
magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'menu_text_color',
	'label'       => esc_attr__( 'Menu Text color', 'magazine-art' ),
	'section'     => 'magazineart_header_menu',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.multilevel-offcanvas .menu li a, .multilevel-offcanvas .submenu ul li a, .multilevel-offcanvas .submenu,.multilevel-offcanvas.is-open .close-button,.menu-outer .menu-icon::after,.menu-wrap .dropdown.menu a,.offcanvas-trigger,button.search-button',
					'property' => 'color',
					'units' => ''
			),
			array(
					'element' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right > a::after',
					'property' => 'border-left-color',
					'units' => ''
			),
      array(
          'element' => '.multilevel-offcanvas .submenu-toggle::after',
          'property' => 'border-top-color',
          'units' => ''
      )
	),

) );

magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'menu_hover_color',
	'label'       => esc_attr__( 'Menu hover color', 'magazine-art' ),
	'section'     => 'magazineart_header_menu',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
    array(
        'element' => '.menu-wrap .dropdown.menu a::before',
        'property' => 'background',
        'units' => ''
    ),
    array(
        'element' => '.menu-wrap .dropdown.menu a:hover,button.search-button:hover,button.search-button:focus',
        'property' => 'color',
        'units' => ''
    ),
	),

) );


magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'menu_bg_color',
	'label'       => __( 'Menu background color', 'magazine-art' ),
	'section'     => 'magazineart_header_menu',
	'default'     => '#fcfcfc',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.menu-outer,.menu-wrap .is-dropdown-submenu-parent .submenu li a,.multilevel-offcanvas.off-canvas.is-transition-overlap.is-open',
					'property' => 'background-color',
					'units' => ''
			)
	),

) );

/*=============================================>>>>>
= Home Page layout =
===============================================>>>>>*/

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'onoff_latestpost_home',
	'label'       => esc_attr__( 'Hide/Latest post Home page', 'magazine-art' ),
	'section'     => 'magazineart_fontpage_layout',
	'default'     => true,
  'active_callback' => array(
      array(
          'setting' => 'show_on_front',
          'operator' => '==',
          'value' => 'posts'
      )
  ),
) );

magazine_art_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'layout_font_post',
    'label' => esc_html__('Layout font page post', 'magazine-art'),
    'section' => 'magazineart_fontpage_layout',
    'default' => 'content1',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/archive--list.jpg',
        'content2' => get_template_directory_uri() . '/images/archive--classic.jpg',
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));

magazine_art_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position_fontpost',
    'label' => esc_html__('Layout Sidebar', 'magazine-art'),
    'section' => 'magazineart_fontpage_layout',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'full' => get_template_directory_uri() . '/images/layout--full.jpg',
        'left' => get_template_directory_uri() . '/images/layout--left.jpg',
        'right' => get_template_directory_uri() . '/images/layout--right.jpg',
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_on_front',
            'operator' => '==',
            'value' => 'posts'
        )
    ),
));
/*=============================================>>>>>
= slider options =
===============================================>>>>>*/



/* Slider */

magazine_art_kirki_add_field( array(
	'type'        => 'select',
	'settings'    => 'slider_style',
	'label'       => __( 'Select Slider Style', 'magazine-art' ),
	'section'     => 'magazineart_slider_settings',
	'default'     => 'style2',
	'multiple'    => 1,
	'choices'     => array(
		'style1' => esc_attr__( 'style 1', 'magazine-art' ),
		'style2' => esc_attr__( 'style 2', 'magazine-art' ),
	),
) );

magazine_art_kirki_add_field( array(
	'type'        => 'number',
	'settings'    => 'slide_to_show',
	'label'       => esc_attr__( 'Slide to show', 'magazine-art' ),
	'section'     => 'magazineart_slider_settings',
	'default'     => 3,
  'transport'   => 'postMessage',
	'choices'     => array(
		'min'  => 1,
		'max'  => 6,
		'step' => 1,
	),
  'active_callback' => array(
      array(
          'setting' => 'slider_style',
          'operator' => '==',
          'value' => 'style2'
      )
  )
) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'sticky_checkbox_slider',
	'label'       => esc_attr__( 'Hide sticky Post', 'magazine-art' ),
	'section'     => 'magazineart_slider_settings',
	'default'     => false,
) );
magazine_art_kirki_add_field( array(
	'type'        		=> 'custom',
	'settings'    		=> 'slider_notice_hight',
	'label'       		=> esc_html__( 'Notice', 'magazine-art' ),
	'section'     		=> 'magazineart_slider_settings',
	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Slider height should be 1440 x 600 px', 'magazine-art' ) . '</div>',
	'priority'    		=> 1,
  'active_callback' => array(
      array(
          'setting' => 'slider_style',
          'operator' => '==',
          'value' => 'style1'
      )
  )
	));
  magazine_art_kirki_add_field( array(
  	'type'        		=> 'custom',
  	'settings'    		=> 'slider_notice_hight',
  	'label'       		=> esc_html__( 'Notice', 'magazine-art' ),
  	'section'     		=> 'magazineart_slider_settings',
  	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Slider height should be 720 x 450 px', 'magazine-art' ) . '</div>',
  	'priority'    		=> 1,
    'active_callback' => array(
        array(
            'setting' => 'slider_style',
            'operator' => '==',
            'value' => 'style2'
        )
    )
  	));

magazine_art_kirki_add_field( array(
    'type' => 'select',
    'settings' => 'category_show_slider',
    'label' => esc_attr__('Select Category', 'magazine-art'),
    'section' => 'magazineart_slider_settings',
    'priority' => 10,
    'multiple' => 999,
    'transport'   => 'postMessage',
    'choices' =>Kirki_Helper::get_terms( array('taxonomy' => 'category') ),
));



magazine_art_kirki_add_field( array(
    'type' => 'select',
    'settings' => 'slider_post_order_by',
    'label' => esc_attr__('Show post orderby', 'magazine-art'),
    'section' => 'magazineart_slider_settings',
    'default' => 'date',
    'priority' => 10,
    'transport'   => 'postMessage',
    'choices' => array(
        'none' => esc_attr__('None', 'magazine-art'),
        'date' => esc_attr__('Date', 'magazine-art'),
        'ID' => esc_attr__('ID', 'magazine-art'),
        'author' => esc_attr__('Author', 'magazine-art'),
        'title' => esc_attr__('Title', 'magazine-art'),
        'rand' => esc_attr__('Random', 'magazine-art')
    )
));

$slide_title_bgcolor = get_theme_mod('slide_title_bgcolor', 'rgba(0, 0, 0, .7)');
if ( 225 > ariColor::newColor( $slide_title_bgcolor )->luminance ) {
  $text_color_slider = '#fff';
} else {
$text_color_slider = '#0a0a0a';
}

magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'slide_title_bgcolor',
	'label'       => __( 'Slider title background color', 'magazine-art' ),
	'section'     => 'magazineart_slider_settings',
	'default'     => 'rgba(0, 0, 0, .7)',
  'transport'   => 'auto',
  'choices'     => array(
		'alpha' => true,
	),
  'output'      => array(
    array(
      'element' => '.slider-post-wrap .slider-content,.slider-post-wrap .entry-meta',
      'property' => 'background',
      'units'   => '',
    ),
    array(
      'element' => '.slider-post-wrap .slider-content h3 a,.slider-post-wrap .entry-meta h3 a',
      'property' => 'color',
      'value_pattern'   => $text_color_slider,
    ),
  ),
) );


magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'onof_slider_cat',
	'label'       => esc_attr__( 'Show/Hide Slider Category', 'magazine-art' ),
	'section'     => 'magazineart_slider_settings',
	'default'     => true,
  'transport'   => 'auto',
  'output' => array(
	array(
		'element'       => '#slider .slider-content .label  ',
		'property'      => 'display',
		'value_pattern' => 'none',
		'exclude'       => array( true ),
	),
),
) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'onof_auto_play',
	'label'       => esc_attr__( 'On/Off Auto Play', 'magazine-art' ),
	'section'     => 'magazineart_slider_settings',
	'default'     => true,
  'transport'   => 'postMessage',

) );
/*=============================================>>>>>
= Blog ,category page options =
===============================================>>>>>*/


magazine_art_kirki_add_field( array(
	'type'        => 'spacing',
	'settings'    => 'post_subheader_padding',
	'label'       => __( 'Post Page Sub-Header height', 'magazine-art' ),
	'section'     => 'magazineart_postlayout_settings',
	'transport' => 'auto',
	'default'     => array(
			'top'    => '20px',
			'bottom' => '20px',
			'left'   => '15px',
			'right'  => '15px',
		),
	'output' => array(
			array(
					'element' => '.sub_banner .top-bar',
					'property' => 'padding',
			)
	),
) );

$color_setting_subheader_blog = get_theme_mod('color_setting_subheader_blog', '#e8e8e8');
if ( 225 > ariColor::newColor( $color_setting_subheader_blog )->luminance ) {
  $text_color_subheader_blog = '#fff';
} else {
$text_color_subheader_blog = '#0a0a0a';
}
magazine_art_kirki_add_field( array(
	'type'        => 'color',
	'settings'    => 'color_setting_subheader_blog',
	'label'       => __( 'Sub Header Color', 'magazine-art' ),
	'description' => esc_attr__( 'Change Blog ,category,archive etc sub header background color ', 'magazine-art' ),
	'section'     => 'magazineart_postlayout_settings',
	'default'     => '#e8e8e8',
  'transport'   => 'auto',
  'choices'     => array(
    'alpha' => true,
  ),
  'output'      => array(
    array(
      'element' => '.sub_banner',
      'property' => 'background',
      'units'   => '',
    ),
    array(
      'element' => '.sub_banner h3.subheader,.sub_banner .breadcrumbs li,.sub_banner .breadcrumbs a,.sub_banner h2.subheader',
      'property' => 'color',
      'value_pattern'   => $text_color_subheader_blog,
    ),
  ),
) );

magazine_art_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'layout_page_gen',
    'label' => esc_html__('Post Layout', 'magazine-art'),
    'section' => 'magazineart_postlayout_settings',
    'default' => 'content1',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/archive--list.jpg',
        'content2' => get_template_directory_uri() . '/images/archive--classic.jpg',
    )
));

magazine_art_kirki_add_field( array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position_gen',
    'label' => esc_html__('Layout Sidebar', 'magazine-art'),
    'section' => 'magazineart_postlayout_settings',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'full' => get_template_directory_uri() . '/images/layout--full.jpg',
        'left' => get_template_directory_uri() . '/images/layout--left.jpg',
        'right' => get_template_directory_uri() . '/images/layout--right.jpg',
    )
));


magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_cat_box',
	'label'       => esc_attr__( 'Show/hide Category', 'magazine-art' ),
	'section'     => 'magazineart_postlayout_settings',
	'default'     => true,
) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_date_au_box',
	'label'       => esc_attr__( 'Show/hide Date and author', 'magazine-art' ),
	'section'     => 'magazineart_postlayout_settings',
	'default'     => true,

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_share_box',
	'label'       => esc_attr__( 'Show/hide share icon', 'magazine-art' ),
	'section'     => 'magazineart_postlayout_settings',
	'default'     => true,

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_button_readmore',
	'label'       => esc_attr__( 'Show/hide read more button', 'magazine-art' ),
	'section'     => 'magazineart_postlayout_settings',
	'default'     => false,

) );

/*=============================================>>>>>
= Related Post =
===============================================>>>>>*/


magazine_art_kirki_add_field( array(
    'type' => 'switch',
    'settings' => 'show_single_related',
    'label' => esc_attr__('Related Post', 'magazine-art'),
    'section' => 'magazineart_relatedpost_settings',
    'default' => '1',
    'priority' => 10,
    'choices' => array(
        'on' => esc_attr__('Enable', 'magazine-art'),
        'off' => esc_attr__('Disable', 'magazine-art')
    )
));
magazine_art_kirki_add_field( array(
    'type' => 'text',
    'settings' => 'related_post_title',
    'label' => esc_attr__('Related Post title', 'magazine-art'),
    'section' => 'magazineart_relatedpost_settings',
    'default' => esc_attr__('You Might Also Like', 'magazine-art'),
    'priority' => 10,
    'transport' => 'postMessage',
    'js_vars' => array(
        array(
            'element' => '.single-post-box-related .block-title h3 ',
            'function' => 'html'
        )
    )
));
/*=============================================>>>>>
= single Post =
===============================================>>>>>*/
magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_featuredimg_box',
	'label'       => esc_attr__( 'Show/hide featured image', 'magazine-art' ),
	'section'     => 'magazineart_singlepost_settings',
	'default'     => true,
) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_author_boxsingle',
	'label'       => esc_attr__( 'Show/hide author box', 'magazine-art' ),
	'section'     => 'magazineart_singlepost_settings',
	'default'     => true,

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'checkbox_share_boxsingle',
	'label'       => esc_attr__( 'Show/hide share icon', 'magazine-art' ),
	'section'     => 'magazineart_singlepost_settings',
	'default'     => true,

) );
/*=============================================>>>>>
= social share =
===============================================>>>>>*/
magazine_art_kirki_add_field( array(
	'type'        		=> 'custom',
	'settings'    		=> 'social_icons_header',
	'label'       		=> esc_html__( 'Social Icon', 'magazine-art' ),
	'section'     		=> 'magazineart_socialshare_settings',
	'default'     		=> '<div style="padding: 3px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Setup your social icon for social profile', 'magazine-art' ) . '</div>',
	'priority'    		=> 1,

));
magazine_art_kirki_add_field( array(
    'type' => 'repeater',
    'label' => esc_attr__('Add social icon', 'magazine-art'),
    'section' => 'magazineart_socialshare_settings',
    'priority' => 10,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Social', 'magazine-art'),
        'field' => 'social_icon'
    ),
    'settings' => 'social_icons_top',
    'fields' => array(
        'social_icon' => array(
            'type' => 'select',
            'label' => esc_attr__('Icon', 'magazine-art'),
            'default' => '',
            'choices' =>$socialarray,
        ),
        'social_url' => array(
            'type' => 'url',
            'label' => esc_attr__('Link URL', 'magazine-art'),
            'default' => ''
        ),
    )
));
magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialicon_topbar',
	'label'       => esc_attr__( 'show/hide social icon top bar', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => true,

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialicon_menubar',
	'label'       => esc_attr__( 'show/hide social icon Menu bar', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => false,

) );


magazine_art_kirki_add_field( array(
	'type'        		=> 'custom',
	'settings'    		=> 'social_share_header',
	'label'       		=> esc_html__( 'Social share', 'magazine-art' ),
	'section'     		=> 'magazineart_socialshare_settings',
	'default'     		=> '<div style="padding: 3px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Enable and disable your social share icon in post', 'magazine-art' ) . '</div>',
));
magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_facebook',
	'label'       => esc_attr__( 'Facebook', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-facebook',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),
) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_twitter',
	'label'       => esc_attr__( 'Twitter', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-twitter',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_google',
	'label'       => esc_attr__( 'Google+', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-google',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_pinterest',
	'label'       => esc_attr__( 'Pinterest', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => true,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-pinterest',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );

magazine_art_kirki_add_field( array(
	'type'        => 'checkbox',
	'settings'    => 'socialshare_linkedin',
	'label'       => esc_attr__( 'LinkedIn', 'magazine-art' ),
	'section'     => 'magazineart_socialshare_settings',
	'default'     => false,
  'output'      => array(
       array(
           'element'       => '.post-social-share .btn-linkedin',
           'property'      => 'display',
           'value_pattern' => 'none',
           'exclude'       => array( true ),
       ),
   ),

) );
/*=============================================>>>>>
= Footer Options =
===============================================>>>>>*/
$magazineart_widgets_bgcolor = get_theme_mod('magazineart_widgets_bgcolor', '#fff');
if ( 225 > ariColor::newColor( $magazineart_widgets_bgcolor )->luminance ) {
  $text_color_fotwid = '#fff';
} else {
$text_color_fotwid = '#0a0a0a';
}
magazine_art_kirki_add_field( array(
    'type' => 'color',
    'settings' => 'magazineart_widgets_bgcolor',
    'label' => esc_attr__('Widgets background color', 'magazine-art'),
    'section' => 'magazineart_footer_settings',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .top-footer-wrap',
            'property' => 'background-color',
            'units' => ''
        ),
        array(
            'element' => '.top-footer-wrap .widget-title h3,.top-footer-wrap .widget_wrap  ul,.top-footer-wrap .widget_wrap ul li,.top-footer-wrap .widget_wrap ul li a,.top-footer-wrap .widget_wrap p,.top-footer-wrap .widget_wrap .tagcloud a',
            'property' => 'color',
            'value_pattern' =>$text_color_fotwid,
        ),
        array(
            'element' => '.top-footer-wrap .widget_wrap .tagcloud a',
            'property' => 'border-color',
            'value_pattern' =>$text_color_fotwid,
        ),
    )

));



/*----------- Footer COPYRIGHT options -----------*/
$magazineart_copyright_bgcolor = get_theme_mod('magazineart_copyright_bgcolor', '#242424');
if ( 225 > ariColor::newColor( $magazineart_copyright_bgcolor )->luminance ) {
  $text_color_copyright = '#fff';
} else {
$text_color_copyright = '#0a0a0a';
}
magazine_art_kirki_add_field( array(
    'type' => 'color',
    'settings' => 'magazineart_copyright_bgcolor',
    'label' => esc_attr__('Copyright background color', 'magazine-art'),
    'section' => 'magazineart_footer_settings',
    'default' => '#242424',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .footer-copyright-wrap',
            'property' => 'background-color',
            'units' => ''
        ),
        array(
            'element' => '.copy-text,#footer .footer-copyright-wrap,.footer-copyright-text p,.footer-copyright-wrap a',
            'property' => 'color',
            'value_pattern' =>$text_color_copyright,
        ),

    )

));

magazine_art_kirki_add_field( array(
    'type' => 'textarea',
    'transport'   => 'postMessage',
    'settings' => 'magazineart_footertext',
    'label' => __('Copyright text', 'magazine-art'),
    'section' => 'magazineart_footer_settings',
    'priority' => 10,

	));
