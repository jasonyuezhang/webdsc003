// closure to avoid namespace collision
(function(){
	// creates the plugin
	tinymce.create('tinymce.plugins.shortcodes_options', {
		// creates control instances based on the control's id.
		// our button's id is "system_shortcodes_button"
		createControl : function(id, controlManager) {
			if (id == 'system_shortcodes_button') {
				// creates the button
					
				var button = controlManager.createButton('system_shortcodes_button', {
					title : 'Shortcodes', // title of the button
					image : '../wp-content/themes/fitness/includes/fitness_shortcodes.ico',
					
					onclick : function() {
						
						var shortcodes_visible = jQuery("#fitness_shortcodes_menu_holder").length;
						
						if (shortcodes_visible){
							jQuery("#fitness_shortcodes_menu_holder").remove();
						}
						else{
							jQuery("#content_toolbargroup").append("<div id='fitness_shortcodes_menu_holder'></div>");							

						
						
                 	

                       	

						
                        jQuery('#fitness_shortcodes_menu_holder').load('../wp-content/themes/fitness/includes/fitness_shortcodes_popup.html#fitness_shortodes_popup', function(){


							var y = parseInt(jQuery("#content_system_shortcodes_button").offset().top) - 25;	
							var x = parseInt(jQuery("#content_system_shortcodes_button").offset().left) - parseInt(jQuery("#adminmenuwrap").width()) + 10;
							jQuery("#fitness_shortcodes_menu_holder").css({top: y, left: x})
						
							jQuery("#close_fitness_shortcodes_popup").click(function(){
								jQuery("#fitness_shortcodes_menu_holder").remove();
							});
							
							
							jQuery("#fitness_graph_container").click(function(){
                                var shortcode = "[fitness_graph_container]delete this text and insert graph bars[/fitness_graph_container]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_graph").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Sliding Graph', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_graph-form' );                            
                            })
							
							jQuery("#fitness_google_map").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Map', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_google_map-form' );                            
                            })
							
							jQuery("#fitness_center_title").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Centered title', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_center_title-form' );                            
                            })
							
							jQuery("#fitness_icon_boxes").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Icon boxes', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_icon_boxes-form' );                            
                            })
							
							jQuery("#fitness_icons").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Icons', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_icons-form' );                            
                            })
							
							jQuery("#fitness_boxed_text").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Boxed text', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_boxed_text-form' );                            
                            })
							
							jQuery("#fitness_divider").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Divider shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_divider-form' );                            
                            })
							
							jQuery("#fitness_border_divider").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Border divider shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_border_divider-form' );                            
                            })
							
							jQuery("#fitness_buttons").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Buttons shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_buttons-form' );                            
                            })
							
							jQuery("#fitness_highlights").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Highlighted text shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_highlights-form' );                            
                            })
							
							jQuery("#fitness_dropcaps").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Dropcap shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_dropcaps-form' );                            
                            })
							
							jQuery("#fitness_blockquotes").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Blockquote shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_blockquotes-form' );                            
                            })
							
							jQuery("#fitness_toggle").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Toggle element shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_toggle-form' );                            
                            })
							
							jQuery("#fitness_gallery").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Gallery items', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_gallery-form' );                            
                            })
							
							jQuery("#fitness_team_member").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Team member section', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_team_member-form' );                            
                            })
							
							jQuery("#fitness_pricing").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Pricing section', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_pricing-form' );                            
                            })
							
							jQuery("#fitness_grid").click(function(){
                                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                                W = W - 80;
                                H = H - 84;
                                tb_show( 'Grid wrapper', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=shortcodes_grid-form' );                            
                            })
							
							jQuery("#fitness_contact").click(function(){
                                var shortcode = "[fitness_contact]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_social_icons").click(function(){
                                var shortcode = "[fitness_social_icons]twitter, http://twitter.com/user, facebook, https://www.facebook.com/userthemes[/fitness_social_icons]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_1-1").click(function(){
                                var shortcode = "[one]<h3>Dummy</h3> Content[/one]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_1-3x1-3x1-3").click(function(){
                                var shortcode = "[one_third]<h3>Dummy</h3> Content[/one_third] [one_third]<h3>Dummy</h3> Content[/one_third] [one_third_last]<h3>Dummy</h3> Content[/one_third_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_1-3x2-3").click(function(){
                                var shortcode = "[one_third]<h3>Dummy</h3> Content[/one_third] [two_thirds_last]<h3>Dummy</h3> Content[/two_thirds_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_2-3x1-3").click(function(){
                                var shortcode = "[two_thirds]<h3>Dummy</h3> Content[/two_thirds] [one_third_last]<h3>Dummy</h3> Content[/one_third_last] "
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_1-2x1-2").click(function(){
                                var shortcode = "[one_half]<h3>Dummy</h3> Content[/one_half] [one_half_last]<h3>Dummy</h3> Content[/one_half_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							
							jQuery("#fitness_1-4x1-4x1-4x1-4").click(function(){
                                var shortcode = "[one_fourth]<h3>Dummy</h3> Content[/one_fourth] [one_fourth]<h3>Dummy</h3> Content[/one_fourth] [one_fourth]<h3>Dummy</h3> Content[/one_fourth] [one_fourth_last]<h3>Dummy</h3> Content[/one_fourth_last]"
								tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);                            
                            })
							

							
							
							
							
							
                        }) // end of jQuery('#fitness_shortcodes_menu_holder').load
                       
					   } //end of else (if visible) 

					} // end of var button = controlManager.createButton('system_shortcodes_button' onClick
				}); // end of var button = controlManager.createButton('system_shortcodes_button', {
				
				return button;
			} // end of if (id == 'system_shortcodes_button') {

			return null;
		} // end of createControl : function(id, controlManager) {
	});	// end of tinymce.create('tinymce.plugins.shortcodes_options', {
		
	// registers the plugin. DON'T MISS THIS STEP!!!
	tinymce.PluginManager.add('shortcodes_options', tinymce.plugins.shortcodes_options);
	
								
	
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked


		
/////////////////////
//      GRAPH      //
/////////////////////
		var name0 = 'graph';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_template.php?name=" + name0 + "&fields[]=Title&fields[]=Percent&defaults[]=Graph&defaults[]=55&types[]=text&types[]=text&descriptions[]=Insert title&descriptions[]=Insert percent to fill bar&submit=Insert graph", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name0 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'Title'    : 'Graph',
					'Percent'  : '55'
				    };
			    var shortcode = '[fitness_' + name0;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name0 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	

/////////////////////
//  GOOGLE MAP     //
/////////////////////
		var name11 = 'google_map';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_template.php?name=" + name11 + "&fields[]=location&fields[]=zoom&defaults[]=Chicago&defaults[]=15&types[]=text&types[]=text&descriptions[]=Insert address, or city&descriptions[]=Zoom level&submit=Insert map", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name11 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'location'    : 'Chicago',
					'zoom'    : '15'
				    };
			    var shortcode = '[fitness_' + name11;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name11 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});
		
/////////////////////
// CENTER    TITLE //
/////////////////////
		var name12 = 'center_title';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_template.php?name=" + name12 + "&fields[]=title&fields[]=subtitle&defaults[]=Title&defaults[]=Subtitle&types[]=text&types[]=text&descriptions[]=Title&descriptions[]=Subtitle&submit=Insert Centered Title", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name12 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'title'    : 'title',
					'subtitle'  : 'subtitle'
				    };
			    var shortcode = '[fitness_' + name12;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name12 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//   ICON BOXES    //
/////////////////////
		var name2 = 'icon_boxes';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_icon_boxes.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name2 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				


					var icon_0 = table.find('#shortcodes_' + name2 + '-icon_0').val();
					var url_0 = table.find('#shortcodes_' + name2 + '-url_0').val();
					var target_0 = table.find('#shortcodes_' + name2 + '-target_0').val();
					var caption_0 = table.find('#shortcodes_' + name2 + '-caption_0').val();
					var about_0 = table.find('#shortcodes_' + name2 + '-about_0').val();
					
					var icon_1 = table.find('#shortcodes_' + name2 + '-icon_1').val();
					var url_1 = table.find('#shortcodes_' + name2 + '-url_1').val();
					var target_1 = table.find('#shortcodes_' + name2 + '-target_1').val();
					var caption_1 = table.find('#shortcodes_' + name2 + '-caption_1').val();
					var about_1 = table.find('#shortcodes_' + name2 + '-about_1').val();
					
					var icon_2 = table.find('#shortcodes_' + name2 + '-icon_2').val();
					var url_2 = table.find('#shortcodes_' + name2 + '-url_2').val();
					var target_2 = table.find('#shortcodes_' + name2 + '-target_2').val();
					var caption_2 = table.find('#shortcodes_' + name2 + '-caption_2').val();
					var about_2 = table.find('#shortcodes_' + name2 + '-about_2').val();
					
					var icon_3 = table.find('#shortcodes_' + name2 + '-icon_3').val();
					var url_3 = table.find('#shortcodes_' + name2 + '-url_3').val();
					var target_3 = table.find('#shortcodes_' + name2 + '-target_3').val();
					var caption_3 = table.find('#shortcodes_' + name2 + '-caption_3').val();
					var about_3 = table.find('#shortcodes_' + name2 + '-about_3').val();

					var shortcode = '[fitness_icon_boxes_container]';
					
					shortcode += ' [fitness_icon_box icon="' + icon_0 + '" url="' + url_0 + '" target="' + target_0 + '" caption="' + caption_0 + '"] ';
					shortcode += about_0;
					shortcode += ' [/fitness_icon_box]';
					
					shortcode += ' [fitness_icon_box icon="' + icon_1 + '" url="' + url_1 + '" target="' + target_1 + '" caption="' + caption_1 + '"] ';
					shortcode += about_1;
					shortcode += ' [/fitness_icon_box]';
					
					shortcode += ' [fitness_icon_box icon="' + icon_2 + '" url="' + url_2 + '" target="' + target_2 + '" caption="' + caption_2 + '"] ';
					shortcode += about_2;
					shortcode += ' [/fitness_icon_box]';
					
					shortcode += ' [fitness_icon_box icon="' + icon_3 + '" url="' + url_3 + '" target="' + target_3 + '" caption="' + caption_3 + '"] ';
					shortcode += about_3;
					shortcode += ' [/fitness_icon_box]';

					shortcode += ' [/fitness_icon_boxes_container]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
		
		
/////////////////////
//        ICONS    //
/////////////////////
		var name32 = 'icons';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_icons.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name32 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				


					var icons = table.find('#shortcodes_' + name32).val();

					shortcode = ' [fitness_icons icons="' + icons + '"]';
				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	

	

/////////////////////
//     DIVIDER     //
/////////////////////
		var name4 = 'divider';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_template.php?name=" + name4 + "&fields[]=height&defaults[]=80&types[]=text&descriptions[]=Insert height of blank space&submit=Insert empty space", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name4 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    height    : '80'
				    };
			    var shortcode = '[fitness_' + name4;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name4 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});
		
/////////////////////
//  BORDER DIVIDER //
/////////////////////
		var name5 = 'border_divider';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_template.php?name=" + name5 + "&fields[]=top&fields[]=bottom&defaults[]=40&defaults[]=40&types[]=text&types[]=text&descriptions[]=Insert height of empty space above the divider&descriptions[]=Insert height of empty space below the divider&submit=Insert Border Divider", function(data){

		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button

		    form.find('#shortcodes_' + name5 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
			    var options = { 
				    'top'    : '40',
					'bottom'  : '40'
				    };
			    var shortcode = '[fitness_' + name5;
			    
			    for( var index in options) {
				    var value = table.find('#shortcodes_' + name5 + '-' + index).val();
				    
				    // attaches the attribute to the shortcode only if it's different from the default value
				    if ( value !== options[index] )
					    shortcode += ' ' + index + '="' + value + '"';
			    }			    
			    shortcode += ']';			    
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});
		

/////////////////////
//     BUTTONS     //
/////////////////////
		var name6 = 'buttons';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_buttons.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name6 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				


					var text = table.find('#shortcodes_' + name6 + '-text').val();
					var url = table.find('#shortcodes_' + name6 + '-url').val();
					var target = table.find('#shortcodes_' + name6 + '-target').val();
					var size = table.find('#shortcodes_' + name6 + '-size').val();
					var style = table.find('#shortcodes_' + name6 + '-style').val();
					var color = table.find('#shortcodes_' + name6 + '-color').val();


					shortcode = ' [fitness_button text="' + text + '" url="' + url + '" target="' + target  +  '" size="' + size + '" style="' + style  + '" color="' + color + '"]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
	
/////////////////////
//    HIGHLIGHTS   //
/////////////////////
		var name7 = 'highlights';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_highlights.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name7 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var text = table.find('#shortcodes_' + name7 + '-text').val();
					var style = table.find('#shortcodes_' + name7 + '-style').val();

					shortcode = ' [fitness_highlight style="' + style  + '"]' + text + '[/fitness_highlight]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//    DROPCAPS     //
/////////////////////
		var name31 = 'dropcaps';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_dropcaps.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name31 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var letter = table.find('#shortcodes_' + name31 + '-letter').val();
					var style = table.find('#shortcodes_' + name31 + '-style').val();

					shortcode = ' [fitness_dropcaps style="' + style  + '"]' + letter + '[/fitness_dropcaps]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});		
		
		
/////////////////////
//    BLOCKQUOTES  //
/////////////////////
		var name8 = 'blockquotes';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_blockquotes.php", function(data){
		
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name8 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var text = table.find('#shortcodes_' + name8 + '-text').val();
					var align = table.find('#shortcodes_' + name8 + '-align').val();

					shortcode = ' [fitness_blockquote align="' + align  + '"]' + text + '[/fitness_blockquote]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
///////////////////////////////
//    TOGGLE ACCORDION       //
///////////////////////////////
		var name9 = 'toggle';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_toggle.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name9 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
					var text = table.find('#shortcodes_' + name9 + '-text').val();
					var caption = table.find('#shortcodes_' + name9 + '-caption').val();
					var collapsable = table.find('#shortcodes_' + name9 + '-collapsable').val();

					shortcode = ' [fitness_toggle collapsable="' + collapsable + '" caption="' + caption  + '"]' + text + '[/fitness_toggle]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	

/////////////////////
//    GALLERY    //
/////////////////////
		var name21 = 'gallery';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_gallery.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name21 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				

					var title = table.find('#shortcodes_' + name21 + '-title').val();
					var cat_id = table.find('#shortcodes_' + name21 + '-cat_id').val();
					var no = table.find('#shortcodes_' + name21 + '-no').val();
					var show_filters = table.find('#shortcodes_' + name21 + '-show_filters').val();
					var columns = table.find('#shortcodes_' + name21 + '-columns').val();
					var shape = table.find('#shortcodes_' + name21 + '-shape').val();


					shortcode = ' [fitness_gallery title="' + title + '" cat_id="' + cat_id + '" no="' + no + '" show_filters="' + show_filters + '" columns="' + columns + '"]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//   TEAM MEMBER   //
/////////////////////
		var name22 = 'team_member';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_team_member.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name22 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				

					var member_name = table.find('#shortcodes_' + name22 + '-member_name').val();
					var member_position = table.find('#shortcodes_' + name22 + '-member_position').val();
					var member_img_src = table.find('#shortcodes_' + name22 + '-member_img_src').val();
					var member_social_list = table.find('#shortcodes_' + name22 + '-member_social_list').val();
					var member_columns = table.find('#shortcodes_' + name22 + '-member_columns').val();
					var member_text = table.find('#shortcodes_' + name22 + '-member_text').val();


					shortcode = ' [fitness_team_member member_name="' + member_name + '" member_position="' + member_position + '" member_img_src="' + member_img_src + '" member_social_list="' + member_social_list + '" member_columns="' + member_columns + '"]' + member_text + '[/fitness_team_member]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//   PRICING   //
/////////////////////
		var name25 = 'pricing';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_pricing.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name25 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				

					var pricing_name = table.find('#shortcodes_' + name25 + '-pricing_name').val();
					var pricing_value = table.find('#shortcodes_' + name25 + '-pricing_value').val();
					var pricing_local_currency = table.find('#shortcodes_' + name25 + '-pricing_local_currency').val();
					var pricing_columns = table.find('#shortcodes_' + name25 + '-pricing_columns').val();
					var pricing_advantages = table.find('#shortcodes_' + name25 + '-pricing_advantages').val();
					var pricing_text = table.find('#shortcodes_' + name25 + '-pricing_text').val();


					shortcode = ' [fitness_pricing pricing_name="' + pricing_name + '" pricing_value="' + pricing_value + '" pricing_local_currency="' + pricing_local_currency + '" pricing_text="' + pricing_text + '" pricing_columns="' + pricing_columns + '" pricing_advantages="' + pricing_advantages + '"][/fitness_pricing]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
/////////////////////
//   GRID          //
/////////////////////
		var name24 = 'grid';
	
		jQuery.get("../wp-content/themes/fitness/includes/shortcodes_grid.php", function(data){
		   var form = jQuery(data);
		   var table = form.find('table');
	       form.appendTo('body').hide();
		   		// handles the click event of the submit button
		    form.find('#shortcodes_' + name24 + '-submit').click(function(){
			    // defines the options and their default values
			    // again, this is not the most elegant way to do this
			    // but well, this gets the job done nonetheless
				

					var grid_columns = table.find('#shortcodes_' + name24 + '-grid_columns').val();



					shortcode = ' [fitness_grid grid_columns="' + grid_columns + '"]insert images here[/fitness_grid]';

				
				
			    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);			    
			    tb_remove();
		    });
		});	
		
		
/////////////////////////////////////////////		
		
		
		

	});

})()

jQuery(window).load(function() {

})