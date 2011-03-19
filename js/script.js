jQuery.noConflict();

jQuery(function(){
	 
	// Fixes for ie
   jQuery('aside li:last-child').css("border-bottom","none", "margin-bottom", 0, "padding-bottom", 0);
   jQuery('#social li').css("border-bottom", "1px solid #e4e4e4");
   jQuery('header nav li li:last-child a').css("border-bottom:", "none", "padding-bottom", 0);
   jQuery('#single_post p:last-child').css("margin-bottom", 0);
   jQuery(' #comments ol ul li:last-child').css("border", "none", "padding-bottom", 0);
   
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

	jQuery("a[rel='gallery']").prettyPhoto({theme: 'light_square', show_title: false});

});