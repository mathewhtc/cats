jQuery( document ).ready(function() {/*
	* Replace all SVG images with inline SVG
	*/
	jQuery('img.svg').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
		
		jQuery.get(imgURL, function(data) {
		// Get the SVG tag, ignore the rest
		var $svg = jQuery(data).find('svg');
		
		// Add replaced image's ID to the new SVG
		if(typeof imgID !== 'undefined') {
		$svg = $svg.attr('id', imgID);
		}
		// Add replaced image's classes to the new SVG
		if(typeof imgClass !== 'undefined') {
		$svg = $svg.attr('class', imgClass+' replaced-svg');
		}
		
		// Remove any invalid XML tags as per http://validator.w3.org
		$svg = $svg.removeAttr('xmlns:a');
		
		// Replace image with new SVG
		$img.replaceWith($svg);
		
		}, 'xml');
	});
	
	jQuery('#footer-link').hover(
		function() {
			jQuery(this).after('<div id="hicats"><img src="/gangnam-style_007.gif"></div>');
		}, function(){
			jQuery('#hicats').remove();
		});
	
	// search
	jQuery('html').click(function(e) {
		if(jQuery(e.target).hasClass('open-search')){
			jQuery('.search-holder').addClass('show');
		} else if(jQuery(e.target).hasClass('open-nav')){
			jQuery('.nav-holder').addClass('show');
		} else if(jQuery(e.target).hasClass('close-nav')){
			jQuery('.nav-holder').removeClass('show');
		} else {
			if(jQuery(e.target).closest('.search-holder').length == 0){
				jQuery('.search-holder').removeClass('show');
			}
			if(jQuery(e.target).closest('.nav-holder').length == 0){
				jQuery('.nav-holder').removeClass('show');
			}
		}
	});
	
	if(jQuery('.guide-nav-container').length > 0){
		jQuery(".guide-nav-container").height( jQuery("#guide-content").height() );
	}
	
	if(jQuery('#bgvid').length > 0){
		vpw = jQuery(window).width();
		vph = jQuery(window).height() - 32;
		jQuery('#bgvid').css({"min-height" : vph , "min-width" : vpw});
		jQuery('#hero').css({"height" : vph , "width" : vpw});
		jQuery('.bubbles-popup').each(function(){
			jQuery(this).css({"height" : vph , "width" : vpw});
		})
	}
	
	jQuery('.bubbles').click(function(e){
		var bubbleId = jQuery(this).attr('id');
		jQuery('#' + bubbleId + '-popup').addClass('show');
	})
	jQuery('.close-btn').click(function(){
		jQuery(this).parent('.bubbles-popup').removeClass('show');
	})
	
});