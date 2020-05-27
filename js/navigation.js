/**
 * navigation.js
 *
 * Initiates the bigSlide navigation menu for mobile.
 */
jQuery(document).ready(function($) {
	$('.menu-toggle').bigSlide({
		menu: '#mobile-nav-wrap',
		push: '.push',
		shrink: '.shrink',
		hiddenThin: '.hiddenThin',
		side: 'right',
		menuWidth: '100%',
		speed: '300',
		state: 'closed',
		activeBtn: 'active',
		easyClose: false,
		saveState: false,
		beforeOpen: function() {
			$('#page').addClass('mobile-is-visible');
		},
		afterOpen: function() {},
		beforeClose: function() {
			$('#page').removeClass('mobile-is-visible');
		},
		afterClose: function() {}
	});
});
