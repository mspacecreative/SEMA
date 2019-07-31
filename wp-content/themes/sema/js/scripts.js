jQuery(document).ready(function($) {
		
		function googleMapHeight() {
			$('.google-map iframe').height($('.email-optin').outerHeight());
		}
		
		function checkSize() {
		    if (window.matchMedia('(min-width: 1600px)').matches) {
		        $('#main-header .container').wrap('<div class="wide-header-container"></div>');
		    }
		}
		
		// BODY FADE IN/OUT ON NAV CLICK
		$('#et-top-navigation a').click( function() {
			var nav = $(this); 
			if( nav.length > 0 ) {
				if( nav.attr('href') == '#' ) {
					//console.log(nav);
					$(this).click(
						function(e) {
							e.preventDefault();
						}
					);
				}
			} else {
				$('body').fadeOut('slow');
			}
		});
		
		// MAIN NAV HASH TAG FIX
		$('#et-top-navigation a').each( function() {
			var nav = $(this); 
			if( nav.length > 0 ) {
				if( nav.attr('href') == '#' ) {
					//console.log(nav);
					$(this).click(
						function(e) {
							e.preventDefault();
						}
					);
				}
			}
		});
		
		function connectivityTop() {
			//$('.connectivity-graphic').css('top', $('.et_pb_section_1').outerHeight());
			$('.page .connectivity-graphic, .single .connectivity-graphic').css('top', - $('header').height());
		}
		
		function footerHeight() {
			$('.footer-below').css('height', $(window).height() - $('#page-container').outerHeight());
		}
		
		function shadowCoverWidth() {
			$('.shadow-cover').css('width', $('.entry-title').outerWidth() + 30);
		}
		
		function heroHeight() {
			$('.hero').height($(window).height());
		}
		
		$(document).ready(function () {
			heroHeight();
			footerHeight();
			shadowCoverWidth();
			connectivityTop();
			checkSize();
			
			$('body').fadeIn('slow');
			
			$('span.sub-toggle').click(function (){
			  $(this).next().toggleClass('show');
			  $(this).children().toggleClass('fa-angle-down fa-angle-up');
			});
			
			if($('.entry-title, .hero').hasClass('version-2')) {
				$('body').addClass('alt-row-layout');
			}
		});
		
		$(window).load(function () {
			connectivityTop();
			googleMapHeight();
		});
		
		$(window).resize(function () {
			heroHeight();
			footerHeight();
			shadowCoverWidth();
			connectivityTop();
			googleMapHeight();
			checkSize();
		});
		
		if ($(".hero").length) {
    		$(window).scroll(function() {
    		    /*
    		    if ($(this).scrollTop() > $(window).height() / 2) {
    		        $('.hero .et_pb_column').addClass('fade');
    		    } else {
    		        $('.hero .et_pb_column').removeClass('fade');
    		    }
    		    
    		    $('.hero .et_pb_column').css("opacity", 1 - $(window).scrollTop() / 500);
    		    var offsetTop = $('.hero .et_pb_column').offset().top;
    		    $('.hero .et_pb_column').css("opacity", 1 - ($(window).scrollTop() - offsetTop + 250) / 500);
    		    */
    			if($('#health-check .animated').hasClass('go')) {
    				$('html,body').css('overflow-x', 'inherit');
    			}
    		});
		}
		
		// MOBILE NAVIGATION
		$('#top-menu-nav li.menu-item-has-children a').after('<span class="sub-toggle"><i class="fa fa-angle-down"></i></span>');
		
		$('.read-bio').click(function () {
			$(this).siblings('.bio-overlay').toggleClass('show');
			$(this).siblings('.bio-overlay').children().children('i').toggleClass('show');
			$('header').css('z-index', '99');
		});
		
		$('.close-button').click(function () {
			$(this).parent().parent('.bio-overlay').toggleClass('show');
			$(this).toggleClass('show');
		});
		
		$('.bio-overlay').click(function () {
			if($(this).hasClass('show')) {
				$('.close-button, .bio-overlay').removeClass('show');
			}
		});
		
		$('.hide-on-desktop').on('click touch', function() {
            $(this).unbind("mouseenter mouseleave");
        });
		
});
