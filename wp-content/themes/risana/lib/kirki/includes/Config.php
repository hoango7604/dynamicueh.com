<?php

namespace Kirki;

class Config {

	/** @var array The configuration values for Kirki */
	private $config = null;

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Get a configuration value
	 *
	 * @param string $key     The configuration key we are interested in
	 * @param string $default The default value if that configuration is not set
	 *
	 * @return mixed
	 */
	public function get( $key, $default='' ) {

		$cfg = $this->get_all();
		return isset( $cfg[$key] ) ? $cfg[$key] : $default;

	}

	/**
	 * Get a configuration value or throw an exception if that value is mandatory
	 *
	 * @param string $key     The configuration key we are interested in
	 *
	 * @return mixed
	 */
	public function getOrThrow( $key ) {

		$cfg = $this->get_all();
		if ( isset( $cfg[$key] ) ) {
			return $cfg[$key];
		}

		throw new RuntimeException( sprintf( "Configuration key %s is mandatory and has not been specified", $key ) );

	}

	/**
	 * Get the configuration options for the Kirki customizer.
	 *
	 * @uses 'kirki/config' filter.
	 */
	public function get_all() {

		if ( is_null( $this->config ) ) {

			// Get configuration from the filter
			$this->config = apply_filters( 'kirki/config', array() );

			// Merge a default configuration with the one we got from the user to make sure nothing is missing
			$default_config = array(
				'stylesheet_id' => 'kirki-styles',
				'capability'    => 'edit_theme_options',
				'logo_image'    => '',
				'description'   => '',
				'url_path'      => '',
				'options_type'  => 'theme_mod',
			);
			$this->config = array_merge( $default_config, $this->config );

			$this->config['logo_image']  = esc_url_raw( $this->config['logo_image'] );
			$this->config['description'] = esc_html( $this->config['description'] );
			$this->config['url_path']    = esc_url_raw( $this->config['url_path'] );

			// Get the translation strings.
			$this->config['i18n'] = ( ! isset( $this->config['i18n'] ) ) ? array() : $this->config['i18n'];
			$this->config['i18n'] = array_merge( $this->translation_strings(), $this->config['i18n'] );

		}

		return $this->config;

	}

	/**
	 * The i18n strings
	 */
	public function translation_strings() {

		$strings = array(
			'background-color'      => __( 'Background Color',         'risana' ),
			'background-image'      => __( 'Background Image',         'risana' ),
			'no-repeat'             => __( 'No Repeat',                'risana' ),
			'repeat-all'            => __( 'Repeat All',               'risana' ),
			'repeat-x'              => __( 'Repeat Horizontally',      'risana' ),
			'repeat-y'              => __( 'Repeat Vertically',        'risana' ),
			'inherit'               => __( 'Inherit',                  'risana' ),
			'background-repeat'     => __( 'Background Repeat',        'risana' ),
			'cover'                 => __( 'Cover',                    'risana' ),
			'contain'               => __( 'Contain',                  'risana' ),
			'background-size'       => __( 'Background Size',          'risana' ),
			'fixed'                 => __( 'Fixed',                    'risana' ),
			'scroll'                => __( 'Scroll',                   'risana' ),
			'background-attachment' => __( 'Background Attachment',    'risana' ),
			'left-top'              => __( 'Left Top',                 'risana' ),
			'left-center'           => __( 'Left Center',              'risana' ),
			'left-bottom'           => __( 'Left Bottom',              'risana' ),
			'right-top'             => __( 'Right Top',                'risana' ),
			'right-center'          => __( 'Right Center',             'risana' ),
			'right-bottom'          => __( 'Right Bottom',             'risana' ),
			'center-top'            => __( 'Center Top',               'risana' ),
			'center-center'         => __( 'Center Center',            'risana' ),
			'center-bottom'         => __( 'Center Bottom',            'risana' ),
			'background-position'   => __( 'Background Position',      'risana' ),
			'background-opacity'    => __( 'Background Opacity',       'risana' ),
			'ON'                    => __( 'ON',                       'risana' ),
			'OFF'                   => __( 'OFF',                      'risana' ),
			'all'                   => __( 'All',                      'risana' ),
			'cyrillic'              => __( 'Cyrillic',                 'risana' ),
			'cyrillic-ext'          => __( 'Cyrillic Extended',        'risana' ),
			'devanagari'            => __( 'Devanagari',               'risana' ),
			'greek'                 => __( 'Greek',                    'risana' ),
			'greek-ext'             => __( 'Greek Extended',           'risana' ),
			'khmer'                 => __( 'Khmer',                    'risana' ),
			'latin'                 => __( 'Latin',                    'risana' ),
			'latin-ext'             => __( 'Latin Extended',           'risana' ),
			'vietnamese'            => __( 'Vietnamese',               'risana' ),
			'serif'                 => _x( 'Serif', 'font style',      'risana' ),
			'sans-serif'            => _x( 'Sans Serif', 'font style', 'risana' ),
			'monospace'             => _x( 'Monospace', 'font style',  'risana' ),
		);

		return $strings;

	}

}
