$(function() {
    "use strict";

	//Loader
	$(function preloaderLoad() {
        if($('.preloader').length){
            $('.preloader').delay(1000).fadeOut(200);
        }
        $(".preloader_disabler").on('click', function() {
            $("#preloader").hide();
        });
    });


	// Range Slider Script
	$(".js-range-slider").ionRangeSlider({
		type: "double",
		min: 0,
		max: 1000,
		from: 200,
		to: 500,
		grid: true
	});


	// Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Bottom To Top Scroll Script
	$(window).on('scroll', function() {
		var height = $(window).scrollTop();
		if (height > 100) {
			$('#back2Top').fadeIn();
		} else {
			$('#back2Top').fadeOut();
		}
	});










	$('document').ready(function(){
		if (window.location.hash === "#_=_"){
			history.replaceState
				? history.replaceState(null, null, window.location.href.split("#")[0])
				: window.location.hash = "";
		}
	})



});
