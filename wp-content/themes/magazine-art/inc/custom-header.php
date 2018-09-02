<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package magazine-art
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses magazineart_header_style()
 */
function magazineart_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'magazineart_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'flex-height'            => true,
		'width'            => 2000,
		'height'           => 230,
		'wp-head-callback'       => '',
	) ) );
}
add_action( 'after_setup_theme', 'magazineart_custom_header_setup' );
