$(window).load(function () {
	$('#instafeed').masonry({
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	  gutter: '.gutter-sizer',
	  percentPosition: true
	});
});