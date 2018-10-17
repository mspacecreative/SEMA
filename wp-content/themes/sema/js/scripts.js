function footerHeight() {
	$('.footer-below').css('height', $(window).height() - $('body').height());
}

function heroHeight() {
	$('.hero').height($(window).height());
}

$(document).ready(function () {
	heroHeight();
	footerHeight();
});

$(window).resize(function () {
	heroHeight();
	footerHeight();
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
});

// SMOOTH SCROLLING
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });