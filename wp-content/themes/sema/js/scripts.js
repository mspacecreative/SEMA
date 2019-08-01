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
		
		//Chat Now Button
		$('.chat-now-button').click(function (e) {
			e.preventDefault();
			$('body').addClass('open-chat-window');
			
			if ( $('body').hasClass('open-chat-window') ) {
				$('.shadow').addClass('active');
			}
			
			$('.fade-slide-transition-container div').html('<div class="VisitorWidgetStyleWrapper__WidgetStyleWrapper-hGFLTF bqinXb"><div class="chat-widget VisitorWidgetStyleWrapper__WidgetContentStyleWrapper-hhXkzi hPiHDd"><div class="widget-background-panel undefined  WidgetHeaderStyleWrapper__BackgroundPanelContent-gNemvK XTqzB" style="background-color: rgb(71, 93, 121);"><div class="WidgetHeaderStyleWrapper__FullHeightDiv-gSyZSt dLyUzm"><div class="WidgetHeaderThreadListButton__ShowThreadListButtonWrapper-jGRPqJ dUloFS"><div class="ShowThreadListButton__ThreadButtonPlaceholder-dZbzwu imQdbM"></div></div><div class="WidgetHeaderAvatarWrapper__Wrapper-kIHJua gulsW"><div><div class="ChatHeadGroup__ChatHeadGroupWrapper-dXPXxb fLRWiT"><div class="chat-head chat-head"><div class="chat-head-avatar AvatarWrapper-hhMvHp cCCAIw" style="border: 2px solid rgb(255, 255, 255); background: rgb(255, 255, 255); border-radius: 50%; z-index: 0; width: 32px;"><div class="AvatarContentHolder__ContentHolder-iWmAjV ePtMzl" type="contact"><svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="SVGWrapper-fuxyRA djMoRW"></svg></div></div></div></div></div><div class="p-x-3 WidgetHeaderAvatarWrapper__HeaderTextWrapper-gUYvPY dBaRif"><h5 class="WidgetHeaderAvatarWrapper__HeaderName-iKdoZf hWJIZj"><span class="private-truncated-string"><span class="private-truncated-string__inner"><span><span class="widget-header-name p-y-0">Jordan</span></span></span></span></h5></div></div></div></div><div class="VisitorWidget__WidgetBodyDiv-jgRvfb btgxZb"><div class="ChatArea-iaZEnZ dhbhKc"><div class="messages-scroll-container" style="flex-grow: 1;"><div class="messages-container flex-column add-flex-grow p-x-6"><span class="fade-slide-transition-container"><div class="p-top-4" aria-live="assertive" role="alert" tab-index="0"><div><span class="text-center m-y-2"><p class="m-bottom-0"><small class="private-microcopy is--text--help">August 1</small></p></span><div class="m-bottom-2" data-selenium-test="" data-selenium-message-selector="1564668321352"><div class="chat-message m-top-1 chat-message-content recipient justify-start"><div class="align-end widget-avatar-wrapper"><div role="button" class="private-clickable private-avatar private-avatar--xs UIClickable__StyledClickable-ixYjyx jlaeYK" tabindex="0"><img alt="" class="private-image img-circle private-image--circle" src="https://api.hubapi.com/hubsettings/v1/avatar/hash/48f48a780bd1611a4b6264fac6351586/100"></div></div><div class="chat-bubble selenium-test-marker-chat-bubble recipient-text first-in-group last-in-group initial-chat-message"><div class="chat-bubble-content flex-column"><span>Want to see for yourself? Check out the Sema Snapshot - <a href="https://semasoftware.com/snapshot/" target="_blank" rel="noopener noreferrer">https://semasoftware.com/snapshot</a>, a short report that provides a clear insight into the actionable metrics available to you.
			
			Got any questions? I'm happy to help.
			</span></div></div></div><div class="align-end p-left-7"><small data-selenium-message-status="UNPUBLISHED" class="private-microcopy text-left VisitorMessageFooterText-lcwHvm lbENAb"></small></div></div></div></div><div class=""></div></span></div></div><div></div><div><div class="ChatArea__ChatFooterWrapper-huXGtq TbXjV"><div class="input-container m-bottom-2 no-branding"><div class="private-flex UIFlex__StyledFlex-bPSRBQ iZjQoL" direction="column" wrap="nowrap"><div class="width-100"></div><div class="private-flex width-100 UIFlex__StyledFlex-bPSRBQ gAZVGb" direction="row" wrap="nowrap"><div class="private-flex__child UIBox__StyledBox-fTEPdL jwBMUA"><div class="private-form__set private-form__set--legacy private-form__set--no-label"><div class="private-form__control-wrapper"><div class="private-form__input-wrapper"><textarea tabindex="0" placeholder="Write a message" id="uid-ctrl-29" class="form-control private-form__control private-text-area widget-textarea message-box UIExpandingTextArea__StyledTextArea-iGojIA ekyPFO private-form__control--unstyled private-text-area--no-resize" style="height: 42px;"></textarea></div></div></div></div><div class="display-flex flex-row m-left-1"><div class="disabled MessageFooterButtonWrapper__ButtonWrapper-cZhcuD iNkzzg" color="#475D79"><button color="#475D79" aria-label="send message" type="button" aria-disabled="true" class="uiButton private-button private-button--default private-button__link private-button--icon-only chat-send-button SendButton-hLIKGA qGLXc disabled private-button--disabled private-button--non-responsive" data-button-use="link" tabindex="-1" aria-pressed="false" style="color: rgb(71, 93, 121);"><span class="MessageFooterSendButton__IconStyles-fEfVFW dXvnuc"><span class="private-icon private-icon__high m-right-0" data-icon-name="send"><span class="UIIcon__IconContent-kJgGvp crtbEU" aria-hidden="true"></span></span></span></button></div></div></div></div></div></div></div></div></div></div></div>');
		});
});
