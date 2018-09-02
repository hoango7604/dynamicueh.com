jQuery(document).ready(function($) {
  /* call foundation */
  $(document).foundation();

  new WOW().init();
  $(".box-comment-active").click(function() {
    $(".box-comment-btn-wrap").addClass("animated fadeOut is-hidden");
    $(".comment-respond").addClass("active animated fadeIn");
  });

  // Hide Header on on scroll down
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = $('.menu-outer').outerHeight();

  $(window).scroll(function(event){
      didScroll = true;
  });

  setInterval(function() {
      if (didScroll) {
          hasScrolled();
          didScroll = false;
      }
  }, 250);

  function hasScrolled() {
      var st = $(this).scrollTop();

      // Make sure they scroll more than delta
      if(Math.abs(lastScrollTop - st) <= delta)
          return;

      // If they scrolled down and are past the navbar, add class .nav-up.
      // This is necessary so you never see what is "behind" the navbar.
      if (st > lastScrollTop && st > navbarHeight){
          // Scroll Down
          $('.menu-outer.is-stuck').removeClass('nav-down').addClass('nav-up');
      } else {
          // Scroll Up
          if(st + $(window).height() < $(document).height()) {
              $('.menu-outer').removeClass('nav-up').addClass('nav-down');
          }
      }

      lastScrollTop = st;
  }
  // scrollup
  jQuery(window).bind("scroll", function() {
    if (jQuery(this).scrollTop() > 800) {
      jQuery(".scroll_to_top").fadeIn('slow');
    } else {
      jQuery(".scroll_to_top").fadeOut('fast');
    }
  });
  jQuery(".scroll_to_top").click(function() {
    jQuery("html, body").animate({
      scrollTop: 0
    }, "slow");
    return false;
  });

});
/* --------------------------------------------
JS END
-------------------------------------------- */
( function( $ ) {
	'use strict';

  /* Flexslider ---------------------*/
	function slickSliderSetup() {

    // Main slider
    $('.slick-slider').not('.slick-initialized').slick({
      slidesToShow: 1,
      pauseOnHover: false,
      autoplaySpeed: 4000,
      adaptiveHeight: false,
      speed: 400,
      prevArrow: '<div  class="magazineart-slider-nav magazineart-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
      nextArrow: '<div  class="magazineart-slider-nav magazineart-slider-next "><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
      responsive: [{
        breakpoint: 1023,
        settings: {
          adaptiveHeight: true,
          slidesToShow: 1,
          slidesToScroll:1,
        }
      }, ]
    });
  }

  $( window ).load( slickSliderSetup );
	$( document ).ajaxComplete( slickSliderSetup );

})( jQuery );
