<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */
//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'nhp-opts'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');









/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = true;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$args['google_api_key'] = '***';

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
$args['intro_text'] = __('', 'nhp-opts');

//Setup custom links in the footer for share icons
$args['share_icons']['facebook'] = array(
										'link' => 'http://www.facebook.com/jared.sousa.dias',
										'title' => 'Find me on Facebook', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_320_facebook.png'
										);
										
$args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/jaredsdias',
										'title' => 'Folow me on Twitter', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
										);

//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'twenty_eleven';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Fitness Theme Options', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'nhp_theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 27;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$args['allow_sub_menu'] = false;
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-1',
							'title' => __('Theme Information 1', 'nhp-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'nhp-opts')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-2',
							'title' => __('Theme Information 2', 'nhp-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'nhp-opts')
							);

//Set the Help Sidebar for the options page - no sidebar by default										
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'nhp-opts');



$sections = array();
				
$sections[] = array(
				'title' => __('General Settings', 'nhp-opts'),
				'desc' => __('<p class="description">Control and configure the general setup of your theme. See the documentation attached in the zip file for how to get started with Theme.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_280_settings.png',
				'fields' => array(
				array(
						'id' => 'choose_global_color',
						'type' => 'color',
						'title' => __('Choose Global Color', 'nhp-opts'), 
						'sub_desc' => __('Only color validation can be done on this field type', 'nhp-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'nhp-opts'),
						'std' => '#57CA8E'
						),
				array(
						'id' => 'logo_top',
						'type' => 'upload',
						'title' => __('Upload your Logo', 'nhp-opts'), 
						'sub_desc' => __('You can upload your logo here. A plain text logo of the blog name will be placed here if you have not uploaded any image for the logo.', 'nhp-opts'),
						'desc' => __('Click Browse and upload your logo, and then click Insert into Post. .PNG and .JPG allowed. Optimal image height is 40px.', 'nhp-opts')
						),
				array(
						'id' => 'logo_scroll',
						'type' => 'upload',
						'title' => __('Logo for Fixed Menu (activated on scroll)', 'nhp-opts'), 
						'sub_desc' => __('You can upload your logo here. A plain text logo of the blog name will be placed here if you have not uploaded any image for the logo.', 'nhp-opts'),
						'desc' => __('Click Browse and upload your logo, and then click Insert into Post. .PNG and .JPG allowed. Optimal image height is 40px.', 'nhp-opts')
						),
				array(
						'id' => 'favicon_set',
						'type' => 'upload',
						'title' => __('Upload your Favicon', 'nhp-opts'), 
						'sub_desc' => __('You can upload your Favicon here.', 'nhp-opts'),
						'desc' => __('Click Browse and upload your Favicon. <strong>.PNG format is recommended.</strong>', 'nhp-opts')
						),
				array(
						'id' => 'scroll_control',
						'type' => 'button_set',
						'title' => __('Show Pinned menu on scroll', 'nhp-opts'), 
						'sub_desc' => __('Enable this option to lock the menu at the top when there rollover.', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('1' => 'No','2' => 'Yes'),
						'std' => '1'
						),
				array(
						'id' => 'bg_global_custom',
						'type' => 'upload',
						'title' => __('Background Image/Pattern Upload', 'nhp-opts'), 
						'sub_desc' => __('You can upload your image/pattern here. If you have uploaded your pattern here, then the selected pattern from the above Background Pattern will be overriden.', 'nhp-opts'),
						'desc' => __('Click Browse and upload your image, and then click <strong>Insert into Post</strong>. .PNG and .JPG allowed. You can find more patterns at <a href="http://subtlepatterns.com/" target="_blank">SubtlePatterns.com</a>.', 'nhp-opts'),
						'std' => ''
						),
				array(
						'id' => 'tile_image',
						'type' => 'button_set',
						'title' => __('Tile image', 'nhp-opts'), 
						'sub_desc' => __('If no is selected, image will be stretched.', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('1' => 'No','2' => 'Yes'),
						'std' => '1'
						),
				array(
						'id' => 'boxed_or_stretched',
						'type' => 'radio_img',
						'title' => __('Boxed or Stretched style', 'nhp-opts'), 
						'sub_desc' => __('Choose the format that works best for you.', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array(
										'boxed' => array('title' => 'Boxed', 'img' => 'images/align-none.png'),
										'stretched' => array('title' => 'Stretched', 'img' => 'images/align-left.png')
											),
						'std' => 'stretched'
						),						
				array(
						'id' => 'google_fonts',
						'type' => 'text',
						'title' => __('Google Font Family', 'nhp-opts'),
						'sub_desc' => __('Select the font for the theme.', 'nhp-opts'),
						'desc' => __('Go to <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts directory</a> and grab the code between h1 { and }', 'nhp-opts'),
						),
				array(
						'id' => 'google_fonts_url',
						'type' => 'text',
						'title' => __('URL for Google Font', 'nhp-opts'),
						'sub_desc' => __('Select the font for the theme.', 'nhp-opts'),
						'desc' => __('Go to <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts web page</a>.', 'nhp-opts'),
						),
				array(
						'id' => 'custom_javascript',
						'type' => 'textarea',
						'title' => __('Custom JavaScript', 'nhp-opts'), 
						'sub_desc' => __('You can add your own custom JavaScript here.', 'nhp-opts'),
						'desc' => __('Enter your custom JavaScript code here.', 'nhp-opts'),
						'validate' => 'html',
						),
				array(
						'id' => 'custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'nhp-opts'), 
						'sub_desc' => __('You can add your own custom CSS here.', 'nhp-opts'),
						'desc' => __('Enter your custom CSS code here.', 'nhp-opts'),
						'validate' => 'html',
						),
				array(
						'id' => 'custom_analytics',
						'type' => 'textarea',
						'title' => __('Google Analytics tracking code', 'nhp-opts'), 
						'sub_desc' => __('You can add your own code here.', 'nhp-opts'),
						'desc' => __('Paste your Google Analytics tracking code here. This will be added into the footer template of your theme.', 'nhp-opts'),
						),
				array(
						'id' => 'number_slides',
						'type' => 'text',
						'title' => __('Number of Extra images for slides', 'nhp-opts'),
						'sub_desc' => __('This must be numeric.', 'nhp-opts'),
						'desc' => __('This is the number of images that will show on the slider.', 'nhp-opts'),
						'validate' => 'numeric',
						'std' => '15',
						'class' => 'small-text'
						),
				array(
						'id' => 'panel_samples',
						'type' => 'button_set',
						'title' => __('Show Panel on Site', 'nhp-opts'), 
						'sub_desc' => __('Show panel with style options (like on our live preview)', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('1' => 'No','2' => 'Yes'),
						'std' => '1'
						),
					)
				);
				

$sections[] = array(
				'title' => __('Header', 'nhp-opts'),
				'desc' => __('<p class="description">Here, you can edit settings of your Header.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_030_pencil.png',
				'fields' => array(
				array(
						'id' => 'call',
						'type' => 'text',
						'title' => __('Phone', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Phone.', 'nhp-opts'),
						),
				array(
						'id' => 'email',
						'type' => 'text',
						'title' => __('Email', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Email.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_aim',
						'type' => 'text',
						'title' => __('Aim', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_apple',
						'type' => 'text',
						'title' => __('Apple', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_behance',
						'type' => 'text',
						'title' => __('Behance', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_blogger',
						'type' => 'text',
						'title' => __('Blogger', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_cargo',
						'type' => 'text',
						'title' => __('Cargo', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_delicious',
						'type' => 'text',
						'title' => __('Delicious', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_deviantart',
						'type' => 'text',
						'title' => __('Deviantart', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_digg',
						'type' => 'text',
						'title' => __('Digg', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_dopplr',
						'type' => 'text',
						'title' => __('Dopplr', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_dribbble',
						'type' => 'text',
						'title' => __('Dribbble', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_ember',
						'type' => 'text',
						'title' => __('Ember', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_evernote',
						'type' => 'text',
						'title' => __('Evernote', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_facebook',
						'type' => 'text',
						'title' => __('Facebook', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_flickr',
						'type' => 'text',
						'title' => __('Flickr', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_forrst',
						'type' => 'text',
						'title' => __('Forrst', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_github',
						'type' => 'text',
						'title' => __('Github', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_google',
						'type' => 'text',
						'title' => __('Google', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_googleplus',
						'type' => 'text',
						'title' => __('Google Plus', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_gowalla',
						'type' => 'text',
						'title' => __('Gowalla', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_groveshark',
						'type' => 'text',
						'title' => __('Groveshark', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_html5',
						'type' => 'text',
						'title' => __('Html5', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_icloud',
						'type' => 'text',
						'title' => __('iCloud', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_lastfm',
						'type' => 'text',
						'title' => __('Lastfm', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_linkedin',
						'type' => 'text',
						'title' => __('Linkedin', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_metacafe',
						'type' => 'text',
						'title' => __('Metacafe', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_mixx',
						'type' => 'text',
						'title' => __('Mixx', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_myspace',
						'type' => 'text',
						'title' => __('Myspace', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_netvibes',
						'type' => 'text',
						'title' => __('Netvibes', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_newsvine',
						'type' => 'text',
						'title' => __('Newsvine', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_orkut',
						'type' => 'text',
						'title' => __('Orkut', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_paypal',
						'type' => 'text',
						'title' => __('Paypal', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_picasa',
						'type' => 'text',
						'title' => __('Picasa', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_pinterest',
						'type' => 'text',
						'title' => __('Pinterest', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_plurk',
						'type' => 'text',
						'title' => __('Plurk', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_posterous',
						'type' => 'text',
						'title' => __('Posterous', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_reddit',
						'type' => 'text',
						'title' => __('Reddit', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_rss',
						'type' => 'text',
						'title' => __('RSS', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_skype',
						'type' => 'text',
						'title' => __('Skype', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_stumbleupon',
						'type' => 'text',
						'title' => __('Stumbleupon', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_technorati',
						'type' => 'text',
						'title' => __('Technorati', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_tumblr',
						'type' => 'text',
						'title' => __('Tumblr', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_twitter',
						'type' => 'text',
						'title' => __('Twitter', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_vimeo',
						'type' => 'text',
						'title' => __('Vimeo', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_wordpress',
						'type' => 'text',
						'title' => __('Wordpress', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_yahoo',
						'type' => 'text',
						'title' => __('Yahoo', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_yelp',
						'type' => 'text',
						'title' => __('Yelp', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_youtube',
						'type' => 'text',
						'title' => __('Youtube', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_zerply',
						'type' => 'text',
						'title' => __('Zerply', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				array(
						'id' => 'hsn_zootool',
						'type' => 'text',
						'title' => __('Zootool', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Profile.', 'nhp-opts'),
						),
				
					)
				
				);
				
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_030_pencil.png',
				'title' => __('Footer', 'nhp-opts'),
				'desc' => __('<p class="description">Here, you can edit settings on your blog.</p>', 'nhp-opts'),
				'fields' => array(
				array(
						'id' => 'footer_text',
						'type' => 'text',
						'title' => __('Footer Text', 'nhp-opts'),
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('Enter your Text.', 'nhp-opts'),
						),
					)
				);
				
				
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_119_adjust.png',
				'title' => __('Blog Settings', 'nhp-opts'),
				'desc' => __('<p class="description">Here, you can edit settings on your blog.</p>', 'nhp-opts'),
				'fields' => array(
				array(
						'id' => 'show_blog_categories',
						'type' => 'button_set',
						'title' => __('Show categories on blog page', 'nhp-opts'), 
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('no' => 'No','yes' => 'Yes'),
						'std' => 'no'
						),
				array(
						'id' => 'show_blog_categories_single_page',
						'type' => 'button_set',
						'title' => __('Show categories on blog single page', 'nhp-opts'), 
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('no' => 'No','yes' => 'Yes'),
						'std' => 'no'
						),
				array(
						'id' => 'show_sharing_options',
						'type' => 'button_set',
						'title' => __('Show sharing options', 'nhp-opts'), 
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('no' => 'No','yes' => 'Yes'),
						'std' => 'no'
						),
				array(
						'id' => 'show_tags_page',
						'type' => 'button_set',
						'title' => __('Show tags on blog page', 'nhp-opts'), 
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('no' => 'No','yes' => 'Yes'),
						'std' => 'no'
						),
				array(
						'id' => 'show_tags_page_single',
						'type' => 'button_set',
						'title' => __('Show tags on blog single page', 'nhp-opts'), 
						'sub_desc' => __('', 'nhp-opts'),
						'desc' => __('', 'nhp-opts'),
						'options' => array('no' => 'No','yes' => 'Yes'),
						'std' => 'no'
						),
					)
				);
				
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_298_hospital.png',
				'title' => __('Support', 'nhp-opts'),
				'desc' => __('<p class="description">Welcome to the Support Center.<br /><br />Hey, thanks for purchasing one of our premium files! If you are having trouble getting setup, we go do our best to answer your queries as soon as possible. The bulk of our team is based in the Brazil (GMT) so please be aware of any time difference. Support covers getting setup, trouble using any features, and bug fixes. Regretfully we cannot provide support for modifications or 3rd party plugins.<br /><br /></p><a href="http://jaredsdias.com/support" target="_blank">http://jaredsdias.com/support</a>', 'nhp-opts'),
				'fields' => array(
					)
				);
				
				
	$tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Trainer');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}else{
		$theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'css/style.css');
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Trainer'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'nhp-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Trainer:</strong> ', 'nhp-opts').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'nhp-opts').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'nhp-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'nhp-opts'),
					'content' => $theme_info
					);
	
	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
		$tabs['theme_docs'] = array(
						'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',
						'title' => __('Documentation', 'nhp-opts'),
						'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))
						);
	}//if

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>