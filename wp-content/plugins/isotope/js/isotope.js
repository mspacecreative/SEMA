(function ($) {
	$(window).load(function() {
	    $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
	});
	
    var $grid = $('.iso-grid').isotope( {
        itemSelector: ".resource-item",
    	percentPosition: true,
    	masonry: {
            columnWidth: '.grid-sizer',
    		gutter: '.gutter-sizer',
        }
	});
	
	function sticktothetop() {
        var window_top = $(window).scrollTop() + $('header').height() + 10;
        var top = $('#stick-here, #stick-here-mobile').offset().top;
        if (window_top > top) {
            $('.filters-button-group, .mobile-filter').addClass('fixed');
            $('#stick-here').css('height', $('#main-header').height() + 55);
            $('#stick-here-mobile').css('height', $(this).siblings('.mobile-filter').outerHeight());
            $('.filters-button-group, .mobile-filter').css('top', $('#main-header').height());
            if ( $('.mobile-filter').css('display') == 'block' ) {
                $('.filters-button-group').css('top', $('#main-header').height() + $('.mobile-filter').outerHeight());
            }
        } else {
            $('.filters-button-group, .mobile-filter').removeClass('fixed');
            $('#stick-here').css('height', '0');
            $('#stick-here-mobile').css('height', '0');
        }
    }
    
    $(window).scroll(function() {
        sticktothetop();
    });
    
    $(window).resize(function() {
        sticktothetop();
    });
    
    $('.mobile-filter button').click(function() {
        $(this).parent().siblings('.filters-button-group').slideToggle();
    });
		
	// filter functions
	var filterFns = {};
	
	// filter items on button click
    $('.filters-button-group').on( 'click', 'button', function() {
      var filterValue = $(this).attr('data-filter');
      // use filter function if value matches
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({ filter: filterValue });
    });
		
	// change is-checked class on buttons
	var buttonGroups = document.querySelectorAll(".button-group");
	for (var i = 0, len = buttonGroups.length; i < len; i++) {
	    var buttonGroup = buttonGroups[i];
		radioButtonGroup(buttonGroup);
	}
		
	function radioButtonGroup(buttonGroup) {
	    buttonGroup.addEventListener("click", function(event) {
    		// only work with buttons
    		if (!matchesSelector(event.target, "button")) {
    		      return;
    		}
    		buttonGroup.querySelector(".is-checked").classList.remove("is-checked");
    		event.target.classList.add("is-checked");
		});
	}
})(jQuery);