jQuery.noConflict();

jQuery(function(){

	// MouseOver Events
	jQuery('.thumb').hover(function(){
		jQuery('img', this).fadeTo("fast", 0.35).addClass('box-hover');},
	function(){
		jQuery('img', this).fadeTo("fast", 1).removeClass('box-hover');
	});

	jQuery('.thumb_video').hover(function(){
		jQuery('img', this).fadeTo("fast", 0.35).addClass('box-hover');},
	function(){
		jQuery('img', this).fadeTo("fast", 1).removeClass('box-hover');
	});

	jQuery("a[rel='gallery']").fancybox();

});