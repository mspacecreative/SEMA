(function($) {
		
		function googleMapHeight() {
			$('.google-map iframe').height($('.email-optin').outerHeight());
		}
		
		function checkSizes() {
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
		
		// TRIGGER CHAT BOT ON CUSTOM BUTTON CLICK
		$('.chat-now-button').on('click', () => {
			// check if Hubspot chat is installed
			if (window.hubspot_live_messages_running && window.hubspot && window.hubspot.messages) {
				window.hubspot.messages.EXPERIMENTAL_API.requestWidgetOpen();
			} else {
				console.log('Please install HubSpot WordPress plugin');
			}
		});
		
		// CLOSE VIDEO OVERLAY BUTTON
		$('.close-video').click(function () {
			$(this).parent().parent().prev().parent().fadeOut();
			player.stopVideo();
			
			$('body').removeClass('move');
		});
		
		// RE-POSITION HEADER ON CLICK
		$('.open-explainer').click(function () {
			$('body').addClass('move');
		});
		
		$('#view-video, .open-explainer').click(function () {
			$('body').addClass('move');
			$('.video-overlay').fadeIn();
			player.playVideo();
		});
		
		$('.video-overlay').click(function() {
			$('body').removeClass('move');
			$(this).fadeOut();
			player.stopVideo();
		});
		
		// HIDE/SHOW HEADER ON SCROLL
		var didScroll;
		var lastScrollTop = 0;
		var delta = 5;
		var navbarHeight = $('header').outerHeight();
			
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
			        $('header, .hamburger, .filters-button-group, .mobile-filter').addClass('nav-up').removeClass('nav-down');
			    } else {
			        // Scroll Up
			        if(st + $(window).height() < $(document).height()) {
			            $('header, .hamburger, .filters-button-group, .mobile-filter').removeClass('nav-up').addClass('nav-down');
			    }
			}
			    
			lastScrollTop = st;
		}
})(jQuery);
