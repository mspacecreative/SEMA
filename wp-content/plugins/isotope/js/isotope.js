(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		var iso = new Isotope(".grid", {
		  itemSelector: ".resource-item",
		  percentPosition: true,
		  masonry: {
		      // use element for option
		      columnWidth: '.grid-sizer',
		      gutter: '.gutter-sizer',
		    }
		});
		
		// bind filter button click
		var filtersElem = document.querySelector(".filters-button-group");
		filtersElem.addEventListener("click", function(event) {
		  // only work with buttons
		  if (!matchesSelector(event.target, "button")) {
		    return;
		  }
		  var filterValue = event.target.getAttribute("data-filter");
		  // use matching filter function
		  filterValue = filterFns[filterValue] || filterValue;
		  iso.arrange({ filter: filterValue });
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
	});
	
})(jQuery, this);