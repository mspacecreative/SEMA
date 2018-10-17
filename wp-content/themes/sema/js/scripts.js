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