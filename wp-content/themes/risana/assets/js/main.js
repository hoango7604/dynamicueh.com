/* Main scripts file. */

window.mp = {
	Behavior: {},
	Settings: {},
	Functions: {},
	runBehaviors: function() {}
};

jQuery.fn.extend({
	makeClass: function(className) {
		for (var i = 0, len = this.length; i < len; i++) {
			this.removeClass(className);
			this.addClass(className);
		}
	}
});

/**
 * Default (base) behavior
 */
mp.Behavior.default = function(context) {
	jQuery('html').removeClass('no-js');
}

/**
 * Execute all Behaviors.
 */
mp.runBehaviors = function(context) {
	if (typeof context == 'undefined') context = document;
	var behaviors = Object.keys(mp.Behavior);
	for (var i = 0, len = behaviors.length; i < len; i++) {
		mp.Behavior[behaviors[i]](context);
	}
}
/**
 * Run All behaviors on document ready.
 */
jQuery(document).ready(function() {
	mp.runBehaviors(document);
});


(function($) {
	/**
	* Slider on top main page
	*/
	mp.Behavior.homeHeaderSlider = function(context) {
		var $sliderContainer = $('#home-header-slider');
		if($sliderContainer.length) {
            $sliderContainer.owlCarousel({
                items:1,
                responsive: true,
                itemsDesktop: [979,1],
                itemsDesktopSmall: [979,1],
                itemsTablet: [768,1],
                itemsTabletSmall: 1,
                itemsMobile: 1
            });

		}
	}

	mp.Behavior.newsSlider = function(context) {
		var $sliderContainer = $('#news-slider');
		if($sliderContainer.length) {
            $sliderContainer.owlCarousel({
                items:3,
                responsive: true,
                itemsDesktop: [979,3],
                itemsDesktopSmall: [979,2],
                itemsTablet: [768,1],
                itemsTabletSmall: 1,
                itemsMobile: 1,
				navigation : true,
				navigationText : ["",""],
				pagination : false
			});
		}
	}

	mp.Behavior.showMobileMenu = function(context){
		var $showMobileLink = $('.show-mobile-menu', context);
		if($showMobileLink.length) {
			$showMobileLink.on('click', function(){
				$(this).next('ul').toggle();
			});
		}
	}

	mp.Behavior.showSearchBlock = function(context){
		var $searchBlockLink = $('.show-search', context);
		if($searchBlockLink.length) {
			$searchBlockLink.on('click', function(){
				$(this).toggleClass('active');
				$('.search-box').toggleClass('active');
			});
		}
	}
})(jQuery)
