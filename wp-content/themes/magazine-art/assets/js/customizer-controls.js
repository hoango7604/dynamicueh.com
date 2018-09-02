/**
 * File customizer-controls.js
 *
 * The file for generic customizer controls.
 *
 * @package magazineart
 */

jQuery( document ).ready(
	function () {
		'use strict';

		jQuery( '.focus-customizer-main-bgimage' ).on( 'click', function ( e ) {
			e.preventDefault();
			wp.customize.section( 'background_image' ).focus();
		} );

		jQuery( '.focus-customizer-social-icontop' ).on( 'click', function ( e ) {
			e.preventDefault();
			wp.customize.panel( 'magazineart_socialshare_options' ).focus();
		} );

		jQuery( '.focus-customizer-menu-topbar' ).on( 'click', function ( e ) {
			e.preventDefault();
			wp.customize.section( 'menu_locations' ).focus();
		} );


	}
);

jQuery(window).bind('load', function(){
//REPLACE DUMMY CONTENT BUTTON FUNCTIONALITY

	wp.customize.previewer.bind( 'focus-mainwidgets', function(){
		wp.customize.section( 'sidebar-widgets-home-widgets-magazineart' ).focus();
		});
		wp.customize.previewer.bind( 'focus-homeside_widgets', function(){
			wp.customize.section( 'sidebar-widgets-home-sidebar-magazineart' ).focus();
			});


});

(function() {
	wp.customize.bind( 'ready', function() {

		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		wp.customize.section( 'sidebar-widgets-home-widgets-fullwidth-magazineart', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight', { expanded: isExpanding });
			} );
		} );
	});
})( jQuery );


(function() {
	wp.customize.bind( 'ready', function() {

		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		wp.customize.section( 'sidebar-widgets-home-widgets-magazineart', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight-main', { expanded: isExpanding });
			} );
		} );
		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		wp.customize.section( 'sidebar-widgets-home-sidebar-magazineart', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight-mainside', { expanded: isExpanding });
			} );
		} );

		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		wp.customize.section( 'sidebar-widgets-magazineart-footer_sidebar', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight-footerwidgets', { expanded: isExpanding });
			} );
		} );

		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		wp.customize.panel( 'magazineart_header_options', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight-header_options', { expanded: isExpanding });
			} );
		} );

		wp.customize.section( 'magazineart_fontpage_layout', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
				wp.customize.previewer.send( 'section-highlight-fontpage_layout', { expanded: isExpanding });
			} );
		} );

		// Navigating to a URL in the Customizer Preview when a Section is Expanded
		(function ( api ) {
				api.section( 'static_front_page', function( section ) {
						section.expanded.bind( function( isExpanded ) {
								var url;
								if ( isExpanded ) {
										url = api.settings.url.home;
										api.previewer.previewUrl.set( url );
								}
						} );
				} );
		} ( wp.customize ) );

		// Navigating to a URL in the Customizer Preview when a Section is Expanded
		(function ( api ) {
				api.panel( 'magazineart_home_options', function( section ) {
						section.expanded.bind( function( isExpanded ) {
								var url;
								if ( isExpanded ) {
										url = api.settings.url.home;
										api.previewer.previewUrl.set( url );
								}
						} );
				} );
		} ( wp.customize ) );
	});
})( jQuery );
