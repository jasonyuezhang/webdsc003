var root_path_url = "http";
jQuery(document).ready(function($) { 
	root_path_url = $('link[rel="start"]').attr("href") + "/";
});

function is_touch_device() {
  return !!('ontouchstart' in window);
}

/*--------------------------------------------------
		  DROPDOWN MENU
---------------------------------------------------*/
/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

(function($){$.fn.superfish=function(op){var sf=$.fn.superfish,c=sf.c,$arrow=$(['<span class="',c.arrowClass,'"> &#187;</span>'].join("")),over=function(){var $$=$(this),menu=getMenu($$);clearTimeout(menu.sfTimer);$$.showSuperfishUl().siblings().hideSuperfishUl();},out=function(){var $$=$(this),menu=getMenu($$),o=sf.op;clearTimeout(menu.sfTimer);menu.sfTimer=setTimeout(function(){o.retainPath=($.inArray($$[0],o.$path)>-1);$$.hideSuperfishUl();if(o.$path.length&&$$.parents(["li.",o.hoverClass].join("")).length<1){over.call(o.$path);}},o.delay);},getMenu=function($menu){var menu=$menu.parents(["ul.",c.menuClass,":first"].join(""))[0];sf.op=sf.o[menu.serial];return menu;},addArrow=function($a){$a.addClass(c.anchorClass).append($arrow.clone());};return this.each(function(){var s=this.serial=sf.o.length;var o=$.extend({},sf.defaults,op);o.$path=$("li."+o.pathClass,this).slice(0,o.pathLevels).each(function(){$(this).addClass([o.hoverClass,c.bcClass].join(" ")).filter("li:has(ul)").removeClass(o.pathClass);});sf.o[s]=sf.op=o;$("li:has(ul)",this)[($.fn.hoverIntent&&!o.disableHI)?"hoverIntent":"hover"](over,out).each(function(){if(o.autoArrows){addArrow($(">a:first-child",this));}}).not("."+c.bcClass).hideSuperfishUl();var $a=$("a",this);$a.each(function(i){var $li=$a.eq(i).parents("li");$a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});});o.onInit.call(this);}).each(function(){var menuClasses=[c.menuClass];if(sf.op.dropShadows&&!($.browser.msie&&$.browser.version<7)){menuClasses.push(c.shadowClass);}$(this).addClass(menuClasses.join(" "));});};var sf=$.fn.superfish;sf.o=[];sf.op={};sf.IE7fix=function(){var o=sf.op;if($.browser.msie&&$.browser.version>6&&o.dropShadows&&o.animation.opacity!=undefined){this.toggleClass(sf.c.shadowClass+"-off");}};sf.c={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",arrowClass:"sf-sub-indicator",shadowClass:"sf-shadow"};sf.defaults={hoverClass:"sfHover",pathClass:"overideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},speed:"normal",autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};$.fn.extend({hideSuperfishUl:function(){var o=sf.op,not=(o.retainPath===true)?o.$path:"";o.retainPath=false;var $ul=$(["li.",o.hoverClass].join(""),this).add(this).not(not).removeClass(o.hoverClass).find(">ul").hide().css("visibility","hidden");o.onHide.call($ul);return this;},showSuperfishUl:function(){var o=sf.op,sh=sf.c.shadowClass+"-off",$ul=this.addClass(o.hoverClass).find(">ul:hidden").css("visibility","visible");sf.IE7fix.call($ul);o.onBeforeShow.call($ul);$ul.animate(o.animation,o.speed,function(){sf.IE7fix.call($ul);o.onShow.call($ul);});return this;}});})(jQuery);

/*--------------------------------------------------
	     ADDITIONAL CODE FOR DROPDOWN MENU
---------------------------------------------------*/
jQuery(document).ready(function($) {
    $('ul.menu').superfish({
        delay:       100,                            // one second delay on mouseout
        animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
        speed:       'fast',                          // faster animation speed
        autoArrows:  false                           // disable generation of arrow mark-up
    });

});

/*!
 * Pause jQuery plugin v0.1
 *
 * Copyright 2010 by Tobia Conforto <tobia.conforto@gmail.com>
 *
 * Based on Pause-resume-animation jQuery plugin by Joe Weitzel
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or(at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */
/* Changelog:
 *
 * 0.1    2010-06-13  Initial release
 */
(function() {
    var $ = jQuery,
        pauseId = 'jQuery.pause',
        uuid = 1,
        oldAnimate = $.fn.animate,
        anims = {};

    function now() { return new Date().getTime(); }

    $.fn.animate = function(prop, speed, easing, callback) {
        var optall = $.speed(speed, easing, callback);
        optall.complete = optall.old; // unwrap callback
        return this.each(function() {
            // check pauseId
            if (! this[pauseId])
                this[pauseId] = uuid++;
            // start animation
            var opt = $.extend({}, optall);
            oldAnimate.apply($(this), [prop, $.extend({}, opt)]);
            // store data
            anims[this[pauseId]] = {
                run: true,
                prop: prop,
                opt: opt,
                start: now(),
                done: 0
            };
        });
    };

    $.fn.pause = function() {
        return this.each(function() {
            // check pauseId
            if (! this[pauseId])
                this[pauseId] = uuid++;
            // fetch data
            var data = anims[this[pauseId]];
            if (data && data.run) {
                data.done += now() - data.start;
                if (data.done > data.opt.duration) {
                    // remove stale entry
                    delete anims[this[pauseId]];
                } else {
                    // pause animation
                    $(this).stop();
                    data.run = false;
                }
            }
        });
    };

    $.fn.resume = function() {
        return this.each(function() {
            // check pauseId
            if (! this[pauseId])
                this[pauseId] = uuid++;
            // fetch data
            var data = anims[this[pauseId]];
            if (data && ! data.run) {
                // resume animation
                data.opt.duration -= data.done;
                data.done = 0;
                data.run = true;
                data.start = now();
                oldAnimate.apply($(this), [data.prop, $.extend({}, data.opt)]);
            }
        });
    };
})();

/*--------------------------------------------------
 ADDITIONAL CODE FOR POST NEW LABEL
 ---------------------------------------------------*/
//jQuery(document).ready(function($) {
//    $('#new-label').hover(function() {
//        /*$("#new-label").toggle('slide', {direction: 'right'}, 280);*/
//        $(".new-post").toggleClass('new-post-active');
//    });
//    $('.new-post').hover(function() {
//        /*$("#new-label").toggle('slide', {direction: 'right'}, 280);*/
//        $(".new-post").toggleClass('new-post-active');
//    });
//});

/*--------------------------------------------------
    ADDITIONAL CODE FOR POST NEW LABEL
---------------------------------------------------*/
jQuery(document).ready(function($) {
    $('.login-textbox').focus(function() {
        $(this).parent().children('label').toggleClass('login-textbox-icon-focus');
    }).blur(function() {
        $(this).parent().children('label').toggleClass('login-textbox-icon-focus');
    });

    $('.register-textbox').focus(function() {
        $(this).parent().parent().find('label').toggleClass('register-label-focus');
    }).blur(function() {
        $(this).parent().parent().find('label').toggleClass('register-label-focus');
    });
});

/*--------------------------------------------------
 DATE PICKER AND TIME PICKER
 ---------------------------------------------------*/
jQuery(document).ready(function($) {
    $('.input-daterange').datepicker({
        startDate: String((new Date()).getDate()),
        autoclose: true
    });
    $('#start_time').timepicker({
        minuteStep: 5,
        showInputs: false
    });
    $('#end_time').timepicker({
        minuteStep: 5,
        showInputs: false
    });
    $('#date-filter').datepicker({
        autoclose: true
    });
});

/*--------------------------------------------------
 DATE FILTER ON TAXONOMY PAGE
 ---------------------------------------------------*/
jQuery(document).ready(function($) {
    jQuery('#filter-clear').css({
        'visibility' : function() {
            return jQuery('#date-filter').val().trim() == "" ? 'hidden' : 'visible';
        }
    });
    $('#date-filter').change(function () {
        if ($(this).val().trim()) {
            $('#filter-clear').css('visibility', 'visible');
        } else {
            $('#filter-clear').css('visibility', 'hidden');
        }
        $('#date-filter-search').attr('href', function() {
            var str = $(this).attr('href');
            var pos1 = str.indexOf('start_date_filter=') + 18;
            var pos2 = str.indexOf('&get_urls=');
            return [str.slice(0, pos1),
                $('#date-filter').val(),
                str.slice(pos2)].join('');
        });
    });
    $('#filter-clear').click(function($) {
        $('#date-filter').val('');
        $(this).css('visibility', 'hidden');
    });
});

//jQuery(window).load(function() {
//    jQuery('#filter-clear').css({
//        'visibility' : function() {
//            return jQuery('#date-filter').val().trim() == "" ? 'hidden' : 'visible';
//        }
//    });
//});

/*--------------------------------------------------
 Display Avatar Image From Local Machine
 ---------------------------------------------------*/
function createObjectURL(object) {
    return (window.URL) ? window.URL.createObjectURL(object) : window.webkitURL.createObjectURL(object);
}

function revokeObjectURL(url) {
    return (window.URL) ? window.URL.revokeObjectURL(url) : window.webkitURL.revokeObjectURL(url);
}

/*--------------------------------------------------
 Register Avatar
 ---------------------------------------------------*/
jQuery(document).ready(function($) {
    $('#user_avatar').change(function() {
        $('#avatar-img').attr('src', createObjectURL(this.files[0]));
    });
});

/*--------------------------------------------------
 nav-search change content
 ---------------------------------------------------*/

jQuery(document).ready(function($) {
    $("#searchDropdownBox").change(function(){
        var Search_Str = this.options[this.selectedIndex].innerHTML;
        $("#nav-search-in-content").text($('<div/>').html(Search_Str).text());
    });
});

/*--------------------------------------------------
 Toggle Breadcrumb Title -- all dom need to be loaded
 ---------------------------------------------------*/
//jQuery(window).load(function () {
//    jQuery(".ordinary-title").css({
//        'left' : function (index) {
//            jQuery(this).find("a").each(function () {
//                index += jQuery(this).outerWidth();
//                if (jQuery(this).parent().parent().is("span")) {
//                    index += 10;
//                } else {
//                    index += 20;
//                }
//            });
//            jQuery(this).find('span>span>span:last-child>a:last-child').each(function () {
//                index += 10;
//            });
//            return -(index-4);
//            // index-4 for correct the indent for safari browser
//        },
//        'visibility' : 'visible'
//    }).click( function() {
//        var $breadcrumb = jQuery(this);
//
//        var $atags_length = 0;
//        jQuery(this).find("a").each(function () {
//            $atags_length += jQuery(this).outerWidth();
//            if (jQuery(this).parent().is("span")) {
//                $atags_length += 10;
//            } else {
//                $atags_length += 20;
//            }
//        });
//        jQuery(this).find('span>span>span:last-child>a:last-child').each(function () {
//            $atags_length += 10;
//        });
//        $breadcrumb.animate({
//            left: parseInt($breadcrumb.css('left'),10) == 0 ?
//                -($atags_length-4) : 0
//            // $atags_length-4 for correct the indent for safari browser
//        });
//    });
//});

/***************************************************
	    GALLERY ITEM IMAGE HOVER
***************************************************/
jQuery(window).load(function(){
						   
	jQuery(".gallery-grid ul li .item-info-overlay").hide();
	
	if( is_touch_device() ){
		jQuery(".gallery-grid ul li").click(function(){
												  
			var count_before = jQuery(this).closest("li").prevAll("li").length;
			var this_opacity = jQuery(this).find(".item-info-overlay").css("opacity");
			var this_display = jQuery(this).find(".item-info-overlay").css("display");

			if ((this_opacity == 0) || (this_display == "none")) {
				jQuery(this).find(".item-info-overlay").fadeTo(250, 1);
			} else {
				jQuery(this).find(".item-info-overlay").fadeTo(250, 0);
			}
			
			jQuery(this).closest("ul").find("li:lt(" + count_before + ") .item-info-overlay").fadeTo(250, 0);
			jQuery(this).closest("ul").find("li:gt(" + count_before + ") .item-info-overlay").fadeTo(250, 0);
		});
	} else {
			jQuery(".gallery-grid ul li").hover(function(){
				jQuery(this).find(".item-info-overlay").fadeTo(250, 1);
				}, function() {
					jQuery(this).find(".item-info-overlay").fadeTo(250, 0);		
			});
    }
});

/***************************************************
	  DUPLICATE H3 & H4 IN GALLERY
***************************************************/
jQuery(window).load(function(){
						  
	jQuery(".item-info").each(function(i){
		jQuery(this).next().prepend(jQuery(this).html())
	});
});

/***************************************************
	     TOGGLE STYLE
***************************************************/
jQuery(document).ready(function($) {
								
	$(".toggle-container").hide(); 
	$(".trigger").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});
	$(".trigger").click(function(){
		$(this).next(".toggle-container").slideToggle();
	});
});

/***************************************************
	     ACCORDION
***************************************************/
jQuery(document).ready(function($){	
	$('.trigger-button').click(function() {
		$(".trigger-button").removeClass("active")
	 	$('.accordion').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).next().slideDown('normal');
			$(this).addClass("active");
		 } 
	 });
	$('.accordion').hide();
});

/***************************************************
	  			SLIDING GRAPH
***************************************************/
(function($){
    $.fn.extend({
        //plugin name - animatemenu
        fitness_sliding_graph: function(options) {
 
            var defaults = {
                speed: 1000
            };
            
            function isScrolledIntoView(id){
                var elem = "#" + id;
                var docViewTop = $(window).scrollTop();
                var docViewBottom = docViewTop + $(window).height();

                if ($(elem).length > 0){
                    var elemTop = $(elem).offset().top;
                    var elemBottom = elemTop + $(elem).height();
                }

                return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
                  && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
            }

            function sliding_horizontal_graph(id, speed){
                //alert(id);
                $("#" + id + " li span").each(function(i){
                    var j = i + 1;
                    var cur_li = $("#" + id + " li:nth-child(" + j + ") span");
                    var w = cur_li.attr("class");
                    cur_li.animate({width: w + "%"}, speed);
                })
            }

            function graph_init(id, speed){
                $(window).scroll(function(){
                    if (isScrolledIntoView(id)){
                        sliding_horizontal_graph(id, speed);
                    }
                    else{
                        //$("#" + id + " li span").css("width", "0");
                    }
                })

                if (isScrolledIntoView(id)){
                    sliding_horizontal_graph(id, speed);
                }
            }

            var options = $.extend(defaults, options);
         
            return this.each(function() {
                  var o = options;
                  var obj = $(this); 
				  graph_init(obj.attr("id"), o.speed);

            }); // return this.each
        }
    });
})(jQuery);

/*--------------------------------------------------
	     ADDITIONAL CODE GRID LIST
---------------------------------------------------*/
(function($){
    $.fn.extend({
        fitness_last_last_row: function() {
            return this.each(function() {
			  		$(this).each(function(){
						var no_of_items = $(this).find("li").length;
						var no_of_cols = Math.round($(this).width() / $(this).find(":first").width() );
						var no_of_rows = Math.ceil(no_of_items / no_of_cols);
						var last_row_start = (no_of_rows - 1) * no_of_cols - 1;						
						if (last_row_start < (no_of_cols - 1)) {
							last_row_start = 0;
							$(this).find("li:eq(" + last_row_start + ")").addClass("last-row");
						}
						$(this).find("li:nth-child(" + no_of_cols + "n+ " + no_of_cols + ")").addClass("last");
						$(this).find("li:gt(" + last_row_start + ")").addClass("last-row");
						
						
						
					}) 
            }); // return this.each
        }
    });
})(jQuery);

jQuery(document).ready(function($) {
	$('.grid.clients').each(function(){
		$(this).find('li > *').each(function(){
			var this_href = $(this).attr('href');
			var this_target = $(this).attr('target');
			if (this_target == undefined) this_target = '';
			$(this).parents(".grid.clients").append('<li><a href="' + this_href + '" target="' + this_target + '">' + $(this).html() + '</a></li>');
		})
		$(this).find('li:first').remove();
		$(this).find('img').removeAttr("height");
		
        // additional code if images aren't with same dimensions
        var li_max = 0;
        $(this).find("li").each(function(){
            var li_h = $(this).height();
            if (li_h > li_max) li_max = li_h;
        })
        if (li_max == 0) {
            $(this).find("li").css("height", "auto");
        } else {
            $(this).find("li").css("height", li_max + "px");
        }

        $(this).find("li").each(function(){
            var li_h = $(this).height();
            var img_h = $(this).find("img").height();
            if (img_h < li_h) {
              var top_margin = parseInt((li_h - img_h) / 2)
              $(this).find("img").css("margin-top", top_margin + "px")
            }
        })
	})
	$('.grid').fitness_last_last_row();
})

/***************************************************
	  SELECT MENU ON SMALL DEVICES
***************************************************/
jQuery(document).ready(function($){
								
	var $menu_select = $("<select />");	
	$('<option />', {"selected": "selected", "value": "", "text": "Site Navigation"}).appendTo($menu_select);
	$menu_select.appendTo("#primary-menu");
	
	$('#primary-menu ul li a').each(function(){
		var menu_url = $(this).attr("href");
		var menu_text = $(this).text();
		if ($(this).parents("li").length == 2) { menu_text = '- ' + menu_text; }
		if ($(this).parents("li").length == 3) { menu_text = "-- " + menu_text; }
		if ($(this).parents("li").length > 3) { menu_text = "--- " + menu_text; }
		$("<option />", {"value": menu_url, "text": menu_text}).appendTo($menu_select)
	})
	
	field_id = "#primary-menu select";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   window.location = value;
		//go
		
	});
})


/***************************************************
	  ADD MASK LAYER
***************************************************/
jQuery(window).load(function(){						
	var $item_mask = jQuery("<div />", {"class": "item-mask"});
	jQuery("ul.shaped .item-container, ul.comment-list .avatar").append($item_mask)
})

/***************************************************
	  WORDPRESS RELATED
***************************************************/
function javascript_excerpt(string, no_of_words){
	var excerpt = "";
	var string_array = new Array();
	string_array = string.split(" ");
	for (i = 0 ; i < no_of_words ; i++){
		excerpt += string_array[i] + " ";
	}
	return excerpt + "...";
}

jQuery(document).ready(function($){
	//adding class to A element of current LI
	$("li.current-menu-ancestor a:first, li.current-menu-item a:first").addClass("current");
	$("li.current-menu-item a").addClass("current-submenu");
	
	// icon boxes fix for 3 icons
	var icon_boxes_4_h2 = $("ul.grid.row4.services li:nth-child(4) h2").html();
	var icon_boxes_4_p = $("ul.grid.row4.services li:nth-child(4) p:last-child").html();
	//alert(icon_boxes_4_h2 + " | " + icon_boxes_4_p)
	if (icon_boxes_4_h2 == "" && icon_boxes_4_p == ""){
		$("ul.grid.row4.services").removeClass("row4").addClass("row3");
		$("ul.grid.row3.services li:last").remove();
		$("ul.grid.row3.services li:last").addClass("last");
	}

	$("ul#gallery-nav span:last").remove();
	
	var cols = 3;
	var i = 0;
	$(".team").each(function(){
		i++;
		$(this).find(".social-personal span:last").remove();
		if ($(this).hasClass("one-fourth")) cols = 4;
		if ($(this).hasClass("one-third")) cols = 3;
		if ($(this).hasClass("one-half")) cols = 2;
		remainder = i % cols
		if (i % cols == 0) $(this).addClass("last");
	})
	
	var cols = 3;
	var i = 0;
	$(".pricing").each(function(){
		i++;
		$(this).find(".pricing_advantages span:last").remove();
		if ($(this).hasClass("one-fourth")) cols = 4;
		if ($(this).hasClass("one-third")) cols = 3;
		if ($(this).hasClass("one-half")) cols = 2;
		remainder = i % cols
		if (i % cols == 0) $(this).addClass("last");
	})
})
jQuery(document).ready(function($){
	// next prev gallery items links
	$("ul.item-nav li a").each(function(){
		var title = $(this).html();
		$(this).attr("title", title);
	})
})

/***************************************************
	  Scroll to top
***************************************************/

jQuery(document).ready(function($){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

/***************************************************
	  Check path
***************************************************/

jQuery(document).ready(function($){
	
	$('.check_path').each(function(){
		var icon_path = $(this).attr("src");
		if (icon_path.substr(0, 10) == "wp-content") {
			$(this).attr("src", root_path_url + ""+ icon_path);
		}
	});
});

(function($){

$(window).load(function() {

	var short_title = "";
	var i = 0;
	var j = 0;
	var heights = new Array();
	
	$("#thumbs li .item-info h3 a").each(function(){
		heights[i] = $(this).height();
		i++;
	})
	heights.sort(function(a,b){return a-b});
	var min_height = heights[0];
	i = 0;
	$("#thumbs li .item-info h3 a").each(function(){
		item_info_height = $(this).height();
		if (item_info_height > min_height){
			item_info_height = 0;
			var long_title = $(this).html();
			while(item_info_height <= min_height){
				i++;
				
				item_info_height = $(this).html(javascript_excerpt(long_title, i)).height();
				//alert(javascript_excerpt(long_title, i));
				$(this).html("");
			}
				//alert(javascript_excerpt(long_title, i - 1))	
				$(this).html(javascript_excerpt(long_title, i-2))
        }
    })
})
})(jQuery);