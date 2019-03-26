$(document).ready(function() {
	
	if ($.cookie('notice') == 'closed') {
	    $('.hide-on-click').hide();
	  } else {
	    $('.hide-on-click').show();
	  }
	    // Show or hide on load depending on cookie 
	 
	  $('.drawer-close').click(function(e) {
	    e.preventDefault();
	    $.cookie('notice','closed');
	    $(this).parent().fadeOut();
	  });
	    // Simple close link to hide the notice until cookies are cleared
	 
	  /*$('a.open').click(function(e) {
	    e.preventDefault();
	    $.cookie('notice','open');
	    $('.notice').show();
	  });*/
	    // Opener link to show the notice again
	
});