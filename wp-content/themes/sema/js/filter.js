/*jQuery(function($){
		$('#filter').submit(function(){
			var filter = $('#filter');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					filter.find('button').text('Processing...'); // changing the button label
					$('#response').css('opacity', '.25');
					$('.product-loading').addClass('visible');
				},
				success:function(data){
					filter.find('button').text('Apply filter'); // changing the button label back
					$('#response').html(data).css('opacity', '1'); // insert data
					$('.product-loading').removeClass('visible');
				}
			});
			return false;
		});
	});*/
	
	var $mainContent = $('#et-main-area'),
	$cat_links = $('ul#menu-resources-filter-menu li a');
	$cat_links.on('click', function (e) {
		e.preventDefault();
		$el = $(this);
		var value = $el.attr("href");
		$mainContent.animate({opacity: "0.5"});
		$mainContent.load(value + " #main-content", function () {
			$mainContent.animate({opacity: "1"});
		});
	});