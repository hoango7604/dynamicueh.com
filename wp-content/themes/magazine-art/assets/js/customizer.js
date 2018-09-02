/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {

  // Collect information from customize-controls.js about which panels are opening.
  wp.customize.bind('preview-ready', function() {

    // Initially hide the theme option placeholders on load
    $('.panel-placeholder.fullwidth').hide();

    wp.customize.preview.bind('section-highlight', function(data) {

      // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
      if (true === data.expanded) {
        $('.panel-placeholder.fullwidth').slideDown("slow");
        $('.panel-focus-fullwidth').addClass('panel-placeholder-focus');

        Foundation.SmoothScroll.scrollToLoc('#fullwidth-home_top', {
          threshold: 50,
          duration: 400,
          offset: 100
        }, function() {
          console.log('scrolled');
        });
        // If we've left the panel, hide the placeholders and scroll back to the top.
      } else {
        // Don't change scroll when leaving - it's likely to have unintended consequences.
        $('.panel-placeholder.fullwidth').fadeOut("slow");
        $('.panel-focus-fullwidth').removeClass('panel-placeholder-focus');

      }
    });

    // Initially hide the theme option placeholders on load
    $('.panel-placeholder.home').hide();

    wp.customize.preview.bind('section-highlight-main', function(data) {

      // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
      if (true === data.expanded) {
        $('.panel-focus-main').addClass('panel-placeholder-focus');

        $('.panel-placeholder.home').slideDown("slow");
        Foundation.SmoothScroll.scrollToLoc('#homesiderbar-stick', {
          threshold: 50,
          duration: 400,
          offset: 100
        }, function() {
          console.log('scrolled');
        });

        // If we've left the panel, hide the placeholders and scroll back to the top.
      } else {
        $('.panel-focus-main').removeClass('panel-placeholder-focus');

        // Don't change scroll when leaving - it's likely to have unintended consequences.
        $('.panel-placeholder.home').fadeOut("slow");
      }
    });

    wp.customize.preview.bind('section-highlight-header_options', function(data) {
      // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
      if (true === data.expanded) {
        Foundation.SmoothScroll.scrollToLoc('#mainwarp-header', {
          threshold: 50,
          duration: 400,
          offset: 100
        }, function() {
          console.log('scrolled');
        });

        // If we've left the panel, hide the placeholders and scroll back to the top.
      }
    });
    wp.customize.preview.bind('section-highlight-fontpage_layout', function(data) {
      // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
      if (true === data.expanded) {
        Foundation.SmoothScroll.scrollToLoc('#blog-content', {
          threshold: 50,
          duration: 400,
          offset: 100
        }, function() {
          console.log('scrolled');
        });

        // If we've left the panel, hide the placeholders and scroll back to the top.
      }
    });

    wp.customize.preview.bind('section-highlight-mainside', function(data) {

      // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
      if (true === data.expanded) {
        $('.panel-placeholder.home-side').slideDown("slow");

        // If we've left the panel, hide the placeholders and scroll back to the top.
      } else {
        // Don't change scroll when leaving - it's likely to have unintended consequences.
        $('.panel-placeholder.home-side').fadeOut("slow");
      }
    });

    wp.customize.preview.bind('section-highlight-footerwidgets', function(data) {

      // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
      if (true === data.expanded) {
        $('.top-footer-wrap').addClass('panel-placeholder-focus');
        $('.panel-placeholder.footerwidgets').slideDown("slow");
        Foundation.SmoothScroll.scrollToLoc('#footer', {
          threshold: 50,
          duration: 400,
          offset: 100
        }, function() {
          console.log('scrolled');
        });

        // If we've left the panel, hide the placeholders and scroll back to the top.
      } else {
        $('.top-footer-wrap').removeClass('panel-placeholder-focus');

        // Don't change scroll when leaving - it's likely to have unintended consequences.
        $('.panel-placeholder.footerwidgets').fadeOut("slow");
      }
    });

  });
  // Site title and description.
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('.site-title a').text(to);
    });
  });
  wp.customize('blogdescription', function(value) {
    value.bind(function(to) {
      $('.site-description').text(to);
    });
  });


  wp.customize('magazineart_footertext', function(value) {
    value.bind(function(to) {
      $('.footer-copy .top-bar-left p').text(to);
    });
  });
}(jQuery));

jQuery(window).ready(function() {
  jQuery('.main_widgets').on('click', function(e) {
    e.preventDefault();
    wp.customize.preview.send('focus-mainwidgets');
  });

  jQuery('.homeside_widgets').on('click', function(e) {
    e.preventDefault();
    wp.customize.preview.send('focus-homeside_widgets');
  });

});
