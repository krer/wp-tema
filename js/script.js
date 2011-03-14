$.noConflict();

(function($){
	
	// MouseOver Events	
	$('.thumb').hover(function(){
		$('img', this).fadeTo("fast", 0.35).addClass('box-hover');},
		function(){
		$('img', this).fadeTo("fast", 1).removeClass('box-hover');
	});

	$('.thumb_video').hover(function(){
		$('img', this).fadeTo("fast", 0.35).addClass('box-hover');},
		function(){
		$('img', this).fadeTo("fast", 1).removeClass('box-hover');
	});

	$("a[rel='gallery']").fancybox();

})($);
