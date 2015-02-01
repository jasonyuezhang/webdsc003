jQuery(document).ready(function($)
{
	var header_h = jQuery("#header-wrapper").height() + 0;
	var menu_h = jQuery("#menu").height();
	var speed = 500;
	var logo2_url = jQuery("link[rel='alternate']").attr("href");
	var logo2_link = jQuery("link[rel='start']").attr("href");
	
	var scroll_critical = parseInt(header_h - menu_h);
	var window_y = 0;
	var menu_left_margin = 100;
	menu_left_margin = parseInt(jQuery(".header").css("width")) - parseInt(jQuery("ul.menu").width());
	
	window_y = jQuery(window).scrollTop();
	var $logo2_link = jQuery("<a/>", {"href": logo2_link})
	var $logo2 = jQuery("<img />", {"src" : logo2_url, "class" : "logo2"}).appendTo($logo2_link);
	
	
	if ( (window_y > scroll_critical) && !(is_touch_device()) ) header_transform();
	
	function header_transform(){
		//alert("head transform")
			window_y = jQuery(window).scrollTop();
			var wp_admin_height = "0px";
			if (jQuery("#wpadminbar").length > 0){
				wp_admin_height = parseInt(jQuery("#wpadminbar").height()) + "px";
			}
			if (window_y > scroll_critical) {
				if (!(jQuery("#header-wrapper").hasClass("fixed"))){
						jQuery("#header-wrapper").hide();
						jQuery("#wrapper").css("margin-top", header_h + "px");
						jQuery("#header-wrapper").addClass("fixed").css("top", wp_admin_height);
						jQuery("#header-wrapper").fadeIn(500);
						$logo2_link.fadeIn().appendTo(".header");
				}

				
			} else {
				if ((jQuery("#header-wrapper").hasClass("fixed"))){
					jQuery("#header-wrapper").fadeOut(500, function(){
						jQuery("#header-wrapper").removeClass("fixed");
						jQuery("#wrapper").css("margin-top", "");
						jQuery("#header-wrapper").fadeIn(300)
					});
					
					$logo2_link.fadeOut().remove();
				}

			}
	}

	jQuery(window).scroll(function(){
		if (!(is_touch_device())) header_transform();			

	})
});