<?php
/**
 * magazineart Theme Customizer
 *
 * @package magazineart
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magazineart_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

    $wp_customize->get_control('background_color')->section = 'magazineart_color_options';
    $wp_customize->get_control('header_image')->section = 'magazineart_header_image';

    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector'        => '.site-title a',
        'render_callback' => 'magazineart_customize_partial_blogname',
      ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector'        => '.site-description',
        'render_callback' => 'magazineart_customize_partial_blogdescription',
      ) );
    $wp_customize->selective_refresh->add_partial( 'category_show_slider', array(
         'selector'            => '#slider',
         'container_inclusive' => true,
         'render_callback'     => 'magazineart_slider_style',
         'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
     ) );
     $wp_customize->selective_refresh->add_partial( 'slider_post_order_by', array(
          'selector'            => '#slider',
          'container_inclusive' => true,
          'render_callback'     => 'magazineart_slider_style',
          'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
      ) );
      $wp_customize->selective_refresh->add_partial( 'onof_auto_play', array(
           'selector'            => '#slider',
           'container_inclusive' => true,
           'render_callback'     => 'magazineart_slider_style',
           'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
       ) );
       $wp_customize->selective_refresh->add_partial( 'slide_to_show', array(
            'selector'            => '#slider',
            'container_inclusive' => true,
            'render_callback'     => 'magazineart_slider_style',
            'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
        ) );
     }
}
add_action('customize_register', 'magazineart_customize_register');

add_filter('customizer_widgets_section_args', 'magazineart_customizer_custom_widget_area', 10, 3);

function magazineart_customizer_custom_widget_area($section_args, $section_id, $sidebar_id) {

    if( $sidebar_id === 'home-sidebar-magazineart' ) {
        $section_args['panel'] = 'magazineart_home_options';
    }
    if( $sidebar_id === 'home-widgets-magazineart' ) {
        $section_args['panel'] = 'magazineart_home_options';
    }
    if( $sidebar_id === 'home-widgets-fullwidth-magazineart' ) {
        $section_args['panel'] = 'magazineart_home_options';
    }
    if( $sidebar_id === 'sidebar-headeradvertising' ) {
        $section_args['panel'] = 'magazineart_header_options';
    }

    return $section_args;
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magazineart_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magazineart_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magazineart_customize_preview_js()
{
    wp_enqueue_script('magazineart_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true);
}
add_action('customize_preview_init', 'magazineart_customize_preview_js');

/**
 * Enqueue script for custom customize control.
 */
function magazineart_customize_enqueue() {
	wp_enqueue_script( 'magazineart_customize_controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'magazineart_customize_enqueue' );
