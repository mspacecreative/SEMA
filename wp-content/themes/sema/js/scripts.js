(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		function connectivityTop() {
			$('.connectivity-graphic').css('top', $('.et_pb_section_0').outerHeight());
		}
		
		function footerHeight() {
			$('.footer-below').css('height', $(window).height() - $('body').height());
		}
		
		function shadowCoverWidth() {
			$('.shadow-cover').css('width', $('.entry-title').outerWidth() + 30);
			$('.entry-title').after('<div class="shadow-cover"></div>');
		}
		
		function heroHeight() {
			$('.hero').height($(window).height());
		}
		
		$(document).ready(function () {
			heroHeight();
			footerHeight();
			shadowCoverWidth();
			connectivityTop();
			
			$('span.sub-toggle').click(function (){
			  $(this).next().toggleClass('show');
			  $(this).children().toggleClass('fa-angle-down fa-angle-up');
			});
		});
		
		$(window).resize(function () {
			heroHeight();
			footerHeight();
			shadowCoverWidth();
			connectivityTop();
		});
		
		$(window).scroll(function() {
		    if ($(this).scrollTop() > $(window).height() / 2) {
		        $('.hero .et_pb_column').addClass('fade');
		    } else {
		        $('.hero .et_pb_column').removeClass('fade');
		    }
		});
		
		$(window).scroll(function(){
		    $('.hero .et_pb_column').css("opacity", 1 - $(window).scrollTop() / 500);
		    var offsetTop = $('.hero .et_pb_column').offset().top;
		    $('.hero .et_pb_column').css("opacity", 1 - ($(window).scrollTop() - offsetTop + 250) / 500);
			if($('.animated').hasClass('go')) {
				$('body').css('overflow-x', 'inherit');
			}
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
		
	});
	
})(jQuery, this);
