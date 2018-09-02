<?php

function risana_customizer_config() {
	
    $url  = get_stylesheet_directory_uri() . '/lib/kirki/';

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => __( 'Background Color', 'risana' ),
        'background-image' => __( 'Background Image', 'risana' ),
        'no-repeat' => __( 'No Repeat', 'risana' ),
        'repeat-all' => __( 'Repeat All', 'risana' ),
        'repeat-x' => __( 'Repeat Horizontally', 'risana' ),
        'repeat-y' => __( 'Repeat Vertically', 'risana' ),
        'inherit' => __( 'Inherit', 'risana' ),
        'background-repeat' => __( 'Background Repeat', 'risana' ),
        'cover' => __( 'Cover', 'risana' ),
        'contain' => __( 'Contain', 'risana' ),
        'background-size' => __( 'Background Size', 'risana' ),
        'fixed' => __( 'Fixed', 'risana' ),
        'scroll' => __( 'Scroll', 'risana' ),
        'background-attachment' => __( 'Background Attachment', 'risana' ),
        'left-top' => __( 'Left Top', 'risana' ),
        'left-center' => __( 'Left Center', 'risana' ),
        'left-bottom' => __( 'Left Bottom', 'risana' ),
        'right-top' => __( 'Right Top', 'risana' ),
        'right-center' => __( 'Right Center', 'risana' ),
        'right-bottom' => __( 'Right Bottom', 'risana' ),
        'center-top' => __( 'Center Top', 'risana' ),
        'center-center' => __( 'Center Center', 'risana' ),
        'center-bottom' => __( 'Center Bottom', 'risana' ),
        'background-position' => __( 'Background Position', 'risana' ),
        'background-opacity' => __( 'Background Opacity', 'risana' ),
        'ON' => __( 'ON', 'risana' ),
        'OFF' => __( 'OFF', 'risana' ),
        'all' => __( 'All', 'risana' ),
        'cyrillic' => __( 'Cyrillic', 'risana' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'risana' ),
        'devanagari' => __( 'Devanagari', 'risana' ),
        'greek' => __( 'Greek', 'risana' ),
        'greek-ext' => __( 'Greek Extended', 'risana' ),
        'khmer' => __( 'Khmer', 'risana' ),
        'latin' => __( 'Latin', 'risana' ),
        'latin-ext' => __( 'Latin Extended', 'risana' ),
        'vietnamese' => __( 'Vietnamese', 'risana' ),
        'serif' => _x( 'Serif', 'font style', 'risana' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'risana' ),
        'monospace' => _x( 'Monospace', 'font style', 'risana' ),
    );	

	$args = array(
  
        // Change the logo image. (URL) Point this to the path of the logo file in your theme directory
        // The developer recommends an image size of about 250 x 250
        
		'logo_image'   => '',
  
        // The color of active menu items, help bullets etc.
        'color_active' => '#95c837',
		
		// Color used on slider controls and image selects
		'color_accent' => '#e7e7e7',
	
        // Color used for secondary elements and desable/inactive controls
        'color_light'  => '#e7e7e7',
  
        // Color used for button-set controls and other elements
        'color_select' => '#34495e',
		 
        // For the parameter here, use the handle of your stylesheet you use in wp_enqueue
        'stylesheet_id' => 'customize-styles', 
		
        // Only use this if you are bundling the plugin with your theme (see above)
        'url_path'     => get_template_directory_uri() . '/lib/kirki/',

        'textdomain'   => 'risana',
		
        'i18n'         => $strings,		
	);
	return $args;
}
add_filter( 'kirki/config', 'risana_customizer_config' );


/**
 * Create the customizer panels and sections
 */
add_action( 'customize_register', 'risana_add_panels_and_sections' ); 
function risana_add_panels_and_sections( $wp_customize ) {

	//Add panels

	$wp_customize->add_panel('slider',               array( 'title' => __( 'Slider', 'risana' ),                  'description' => __( 'Slides details', 'risana' ),          'priority' => 140));
	$wp_customize->add_panel('wub',                  array( 'title' => __( 'Why us Box', 'risana' ),               'description' => '',                                         'priority' => 180));	
	
    // Add Sections
	
    $wp_customize->add_section('general',        array('title' => __('General Settings', 'risana'),            'description' => '',    'priority' => 130,));
    $wp_customize->add_section('homebox',        array('title' => __('Home Box', 'risana'),                    'description' => '',    'priority' => 130,));	
	$wp_customize->add_section('promo',          array('title' => __('About Risana Theme', 'risana'),          'description' => '',    'priority' => 190,));
	
	// slider sections
		
	$wp_customize->add_section('slide1',              array('title' => __('Slide 1', 'risana'),                   'description' => '',             'panel' => 'slider',		'priority' => 140,));
	$wp_customize->add_section('slide2',              array('title' => __('Slide 2', 'risana'),                   'description' => '',             'panel' => 'slider',		'priority' => 140,));
	
}


function risana_custom_setting( $controls ) {

	  $infofont = __( 'Select a icons in this list http://fontello.com/ and enter the code', "risana");

     // General Settings	 
	 
	  $controls[] = array('label' => __('Title Blog Page', "risana"),                 'setting' => 'title_blog_page',       'type' => 'text',            'description' => '',        'default' => '',                   'section'     => 'general');	 
	  $controls[] = array('label' => __('Copyrights text', "risana"),                 'setting' => 'copyrights',            'type' => 'text',            'description' => '',        'default' => '',                  'section'     => 'general');  

     // Home Box 


	  $controls[] = array('label' => __('Why us Title', "risana"),                    'setting' => 'wut',             'type' => 'text',         'description' => '',      'default' => __( 'Why us!', "risana"),     'section'     => 'homebox');	 
	  $controls[] = array('label' => __('Why us Content', "risana"),                  'setting' => 'wuc',             'type' => 'textarea',      'description' => '',     'default' => __( '', "risana"),     'section'     => 'homebox');	 

	  
	  $controls[] = array('label' => __('Select Page', "risana"),              		'setting' => 'circles_box_page_1',           'type' => 'dropdown-pages',          'description' => '',            'default' => '0',                         'sanitize_callback'	=> 'risana_sanitize_integer',   'section'     => 'homebox');	
	  $controls[] = array('label' => __('Box Icon', "risana"),               		    'setting' => 'circles_box_image_1',          'type' => 'text',                    'description' => $infofont,     'default' => 'heartbeat',            'section'     => 'homebox');  
 	 
	  $controls[] = array('label' => __('Select Page', "risana"),              		'setting' => 'circles_box_page_2',           'type' => 'dropdown-pages',          'description' => '',            'default' => '0',                         'sanitize_callback'	=> 'risana_sanitize_integer',   'section'     => 'homebox');	
	  $controls[] = array('label' => __('Box Icon', "risana"),                 		'setting' => 'circles_box_image_2',          'type' => 'text',                    'description' => $infofont,     'default' => 'stethoscope',            'section'     => 'homebox');  
 	 
	  $controls[] = array('label' => __('Select Page', "risana"),              		'setting' => 'circles_box_page_3',           'type' => 'dropdown-pages',          'description' => '',            'default' => '0',                         'sanitize_callback'	=> 'risana_sanitize_integer',   'section'     => 'homebox');	
	  $controls[] = array('label' => __('Box Icon', "risana"),                 		'setting' => 'circles_box_image_3',          'type' => 'text',                    'description' => $infofont,     'default' => 'ambulance',            'section'     => 'homebox');  
 	 
	  $controls[] = array('label' => __('Select Page', "risana"),              		'setting' => 'circles_box_page_4',           'type' => 'dropdown-pages',          'description' => '',            'default' => '0',                         'sanitize_callback'	=> 'risana_sanitize_integer',   'section'     => 'homebox');	
	  $controls[] = array('label' => __('Box Icon', "risana"),                 		'setting' => 'circles_box_image_4',          'type' => 'text',                    'description' => $infofont,     'default' => 'medkit',            'section'     => 'homebox');  

	  $controls[] = array('label' => __('Home Slug Text', "risana"),                 'setting' => 'home_slug_text',   'type' => 'textarea',       'description' => '',        'default' => '',                 'section'     => 'homebox');  
	  	  
     // Slide 1
	 
	 $controls[] = array('label' => __('Select Page Content For Slider', 'risana'),      'setting' => 'slider_content_1',        	 'type' => 'dropdown-pages',    	  'default' => 0,    'sanitize_callback'	=> 'risana_sanitize_integer',   'section' => 'slide1',             'description' => ''); 
	 $controls[] = array('label' => __('Button Text', "risana"),                         'setting' => 'slider_button_text_1',   	 'type' => 'text',                    'description' => '',     'default' => 'Read More',            'section'     => 'slide1');  
 

	 $controls[] = array('label' => __('Select Page Content For Slider', 'risana'),      'setting' => 'slider_content_2',          'type' => 'dropdown-pages',          'default' => 0,    'sanitize_callback'	=> 'risana_sanitize_integer',   'section' => 'slide2',             'description' => '');
	 $controls[] = array('label' => __('Button Text', "risana"),                         'setting' => 'slider_button_text_2',      'type' => 'text',                    'description' => '',     'default' => 'Read More',            'section'     => 'slide2');  	 


	
	// Promo
	 $controls[] = array('label' => __( 'Risana Promo', 'risana' ),                   'setting' => 'custompromo',              'type' => 'promo',                                                                         'section' => 'promo',              'priority' => 10);
	 	
     return $controls;
}
add_filter( 'kirki/controls', 'risana_custom_setting' );

function risana_sanitize_integer( $input ) {
	
    if( is_numeric( $input ) ) {  return intval( $input ); }
	
}


