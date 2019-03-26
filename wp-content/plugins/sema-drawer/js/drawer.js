$(function () {
	if ( $('#drawer').hasClass('visible') ) {
		
	}
	
	if ($.cookie('hide-after-click') == 'yes') {
	    $('.hide-on-click').removeClass('hidden');
	}
	
	$('.drawer-close').click(function() {
		if (!$('.hide-on-click').is('hidden')) {
		    $('.hide-on-click').removeClass('visible');
		    $('.hide-on-click').addClass('hidden');
		
		    $.cookie('hide-after-click', 'yes', {expires: 7 });
		 }
	});
	
});

$(window).load(function() {
	$('#drawer').prependTo('header');
});