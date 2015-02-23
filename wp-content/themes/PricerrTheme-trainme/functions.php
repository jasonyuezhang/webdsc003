<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

//session_start();

/* Custom timezone mod to ensure correct dates added by Carroll Yu */
date_default_timezone_set('America/Los_Angeles');

function PricerrTheme_load_textdomain()
{
	$locale = apply_filters('theme_locale', get_locale(), "PricerrTheme");
	load_textdomain("PricerrTheme", TEMPLATEPATH . '/languages/' . $locale . ".mo");
}

PricerrTheme_load_textdomain();

//----------------------------------------------
global $width_widget_categories, $height_widget_categories;
$width_widget_categories = 100;
$height_widget_categories = 100;

add_theme_support('post-thumbnails');
add_image_size('my_category_image_thing', $width_widget_categories, $height_widget_categories, true); //category images in the widget
add_image_size('thumb_picture_size', 155, 115, true); //grid view image
add_image_size('my_small_thumbnail_pricerr', 62, 50, true); //grid view image

//-----------------------------------------------

DEFINE("PricerrTheme_VERSION", "2.0.8");
DEFINE("PricerrTheme_RELEASE", "12 December 2013");

global $default_search;
$default_search = __("Begin to search by typing here...", 'PricerrTheme');

global $allowed_files_in_conversation;
$allowed_files_in_conversation = array('zip', 'rar', 'jpg', 'png', 'psd', 'gif', 'jpeg');

global $current_theme_locale_name;
$current_theme_locale_name = 'PricerrTheme';

global $default_search;
$default_search = __("Begin to search by typing here...", 'PricerrTheme');

global $category_url_link, $location_url_link, $jobs_url_thing;

$category_url_link = get_option("PricerrTheme_category_permalink");
$location_url_link = get_option("PricerrTheme_location_permalink");
$jobs_url_thing = get_option("PricerrTheme_jobs_permalink");

if (empty($category_url_link)) $category_url_link = 'section';
if (empty($location_url_link)) $location_url_link = 'location';
if (empty($jobs_url_thing)) $jobs_url_thing = 'jobs';

//------------------------------------------------------------------

include 'lib/first_run.php';
include 'lib/advanced_search.php';
include 'lib/blog_posts.php';
include 'lib/admin_menu.php';
include 'lib/post_new.php';
include 'lib/pay_for_job.php';
include 'lib/login_register/custom2.php';
include 'lib/my_account/my_account.php';
include 'lib/my_account/payments.php';
include 'lib/my_account/shopping.php';
include 'lib/my_account/sales.php';
include 'lib/my_account/private_messages.php';
include 'lib/my_account/personal_info.php';
include 'lib/my_account/reviews.php';
include 'lib/my_account/cancellation_answer.php';
include 'lib/cronjob.php';
include 'lib/all_categories.php';
include 'lib/all_locations.php';
// Custom file for testing cronjob by Carroll
//include 'lib/test.php';

include 'lib/widgets/browse-by-category.php';
include 'lib/widgets/browse-by-location.php';
include 'lib/widgets/latest-posted-jobs.php';
include 'lib/widgets/latest-featured-jobs.php';
include 'lib/widgets/request-widget.php';
include 'lib/widgets/category-with-images.php';

//include 'lib/social/social.php';
include 'classes/ip2locationlite.class.php';
include 'autosuggest.php';
//-----------------------------------------------------------------

add_action('admin_menu', 'PricerrTheme_admin_menu');
add_action('admin_head', 'PricerrTheme_admin_stylesheet');
add_action('init', 'PricerrTheme_create_post_type');
add_filter('wp_mail_from', 'PricerrTheme_mail_from');
add_filter('wp_mail_from_name', 'PricerrTheme_mail_from_name');
add_action('the_content', 'PricerrTheme_display_post_new_pg');
add_action('the_content', 'PricerrTheme_display_my_account_pg');
add_action('the_content', 'PricerrTheme_display_my_account_payments_pg');
add_action('the_content', 'PricerrTheme_display_my_account_shopping_pg');
add_action('the_content', 'PricerrTheme_display_my_account_sales_pg');
add_action('the_content', 'PricerrTheme_display_all_cats_pg');
add_action('the_content', 'PricerrTheme_display_adv_src_pg');
add_action('the_content', 'PricerrTheme_display_all_locs_pg');
add_action('the_content', 'PricerrTheme_display_my_account_priv_mess_pg');
add_action('the_content', 'PricerrTheme_display_my_account_cancel_req_pg');

add_action('the_content', 'PricerrTheme_display_my_account_pers_info_pg');
add_action('the_content', 'PricerrTheme_display_my_account_reviews_pg');
add_action('the_content', 'PricerrTheme_display_blog_posts_pg');
add_action('the_content', 'PricerrTheme_display_pay_for_job_pg');
add_action('wp_head', 'PricerrTheme_custom_css_thing');
add_filter('template_redirect', 'PricerrTheme_template_redirect');
add_action('widgets_init', 'PricerrTheme_framework_init_widgets');
add_action("manage_posts_custom_column", "PricerrTheme_my_custom_columns");
add_filter("manage_edit-job_columns", "PricerrTheme_my_jobs_columns");
add_action('save_post', 'PricerrTheme_save_custom_fields');
add_action('generate_rewrite_rules', 'PricerrTheme_rewrite_rules');
add_action('query_vars', 'PricerrTheme_add_query_vars');
add_action('draft_to_publish', 'PricerrTheme_run_when_post_published', 10, 1);
add_action('admin_notices', 'PricerrTheme_admin_notices');
add_action('init', 'PricerrTheme_register_my_menus');
add_action('wp_enqueue_scripts', 'PricerrTheme_add_theme_styles');
add_filter('request', 'PricerrTheme__myfeed_request');

add_action('after_setup_theme', 'remove_admin_bar');

/* disable the wpautop filter */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

/**
 * Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action('after_setup_theme', 'theme_setup');

if (!function_exists('theme_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * To override morphis_setup() in a child theme, add your own morphis_setup to your child theme's
	 * functions.php file.
	 *
	 * @uses load_theme_textdomain() For translation/localization support.
	 * @uses add_editor_style() To style the visual editor.
	 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
	 * @uses register_nav_menus() To add support for navigation menus.
	 * @uses add_custom_background() To add support for a custom background.
	 * @uses add_custom_image_header() To add support for a custom header.
	 * @uses register_default_headers() To register the default custom header images provided with the theme.
	 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
	 *
	 */

	function theme_setup()
	{
		/* Make theme available for translation.
     * Translations can be added to the /languages/ directory.
     *
     */
		load_theme_textdomain('theme', get_template_directory() . '/languages');

		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if (is_readable($locale_file)) {
			require_once($locale_file);
		}

		// Require Theme - NHP Theme Options Framework.
		//require( get_template_directory() . '/theme-options.php' );
		get_template_part('nhp', 'options');
	}
} // theme_setup
require_once(TEMPLATEPATH . '/includes/flickr-widget/flickr-widget.php');

require_once(TEMPLATEPATH . '/lib/widgets/about-us-widget.php');
require_once(TEMPLATEPATH . '/lib/widgets/who-are-we-widget.php');
require_once(TEMPLATEPATH . '/lib/widgets/video-widget.php');

$curr_theme = wp_get_theme(TEMPLATEPATH . '/css/style.css');
$theme_version = trim($curr_theme['Version']);
if (!$theme_version) {
	$theme_version = "1.0";
}

//Define constants:
define('SYSTEM_INCLUDES', TEMPLATEPATH . '/includes/');
define('SYSTEM_THEME', 'Fitness WP Template');
define('SYSTEM_THEME_SHORT', 'FitnessWP');
define('SYSTEM_ROOT', get_template_directory_uri());
define('SYSTEM_VAR_PREFIX', 'fitness_');

require_once(SYSTEM_INCLUDES . 'fitness_theme_functions.php');
require_once(SYSTEM_INCLUDES . 'fitness_shortcodes.php');
require_once(SYSTEM_INCLUDES . 'fitness_pagenavi.php');

//Load admin specific files:
if (is_admin()) {
	require_once(SYSTEM_INCLUDES . 'fitness_admin_functions.php');
	require_once(SYSTEM_INCLUDES . 'fitness_custom_fields.php');
}

add_theme_support('post-thumbnails');
add_theme_support('menus');

load_theme_textdomain(SYSTEM_THEME_SHORT, TEMPLATEPATH . '/languages');

// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('includes/multi-post-thumbnails.php');

// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) {
	global $NHP_Options;
	$options_theme = $NHP_Options['options'];
	$number_slides = $options_theme['number_slides'];

	$extra_images_no = $number_slides;
	if ($extra_images_no == "") {
		$extra_images_no = 20;
	}
	for ($i = 1; $i <= $extra_images_no; $i++) {
		new MultiPostThumbnails(array('label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'gallery_item'));
	}
}

if (!function_exists('add_theme_skins_and_styles')) {
	function add_theme_skins_and_styles($wp)
	{
		if (!empty($_GET['theme-styles']) && $_GET['theme-styles'] == 'css') {
			# get theme options
			header('Content-Type: text/css');
			get_template_part('css/theme-styles');
			exit;
		}
	}

	add_action('parse_request', 'add_theme_skins_and_styles');
}

/*-----------------------------------------------------------------------------------*/
/* Plugin Activation /
/-----------------------------------------------------------------------------------*/
require_once('includes/plugin-activation.php');

add_action('tgmpa_register', 'fitness_register_required_plugins');
function fitness_register_required_plugins()
{
	$plugins = array(
		array(
			'name' => 'Slider Revolution', // The plugin name
			'slug' => 'revslider', // The plugin slug (typically the folder name)
			'source' => get_template_directory_uri() . '/includes/plugins/revslider.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name' => 'Timetable', // The plugin name
			'slug' => 'timetable', // The plugin slug (typically the folder name)
			'source' => get_template_directory_uri() . '/includes/plugins/timetable.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name' => 'Woocommerce', // The plugin name
			'slug' => 'woocommerce', // The plugin slug (typically the folder name)
			'source' => get_template_directory_uri() . '/includes/plugins/woocommerce.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => false,
		),
		array(
			'name' => 'Last Tweets',
			'slug' => 'latest-tweets-widget',
			'required' => false,
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'fitness';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme.
		'default_path' => '', // Default absolute path to pre-packaged plugins
		'parent_menu_slug' => 'themes.php', // Default parent menu slug
		'parent_url_slug' => 'themes.php', // Default parent URL slug
		'menu' => 'install-required-plugins', // Menu slug
		'has_notices' => true, // Show admin notices or not
		'is_automatic' => true, // Automatically activate plugins after installation or not
		'message' => '', // Message to output right before the plugins table
		'strings' => array(
			'page_title' => __('Install Required Plugins', $theme_text_domain),
			'menu_title' => __('Install Plugins', $theme_text_domain),
			'installing' => __('Installing Plugin: %s', $theme_text_domain), // %1$s = plugin name
			'oops' => __('Something went wrong with the plugin API.', $theme_text_domain),
			'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
			'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
			'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
			'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
			'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
			'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
			'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
			'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
			'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
			'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins'),
			'return' => __('Return to Required Plugins Installer', $theme_text_domain),
			'plugin_activated' => __('Plugin activated successfully.', $theme_text_domain),
			'complete' => __('All plugins installed and activated successfully. %s', $theme_text_domain), // %1$s = dashboard link
			'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa($plugins, $config);
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below /
/-----------------------------------------------------------------------------------*/

add_theme_support('woocommerce');

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Remove add to cart button from the product loop
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 2);

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

ini_set('display_errors', false);
error_reporting(0);


//-------------------------------------------------
/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_containsTLD($string)
{
	preg_match(
		"/(AC($|\/)|\.AD($|\/)|\.AE($|\/)|\.AERO($|\/)|\.AF($|\/)|\.AG($|\/)|\.AI($|\/)|\.AL($|\/)|\.AM($|\/)|\.AN($|\/)|\.AO($|\/)|\.AQ($|\/)|\.AR($|\/)|\.ARPA($|\/)|\.AS($|\/)|\.ASIA($|\/)|\.AT($|\/)|\.AU($|\/)|\.AW($|\/)|\.AX($|\/)|\.AZ($|\/)|\.BA($|\/)|\.BB($|\/)|\.BD($|\/)|\.BE($|\/)|\.BF($|\/)|\.BG($|\/)|\.BH($|\/)|\.BI($|\/)|\.BIZ($|\/)|\.BJ($|\/)|\.BM($|\/)|\.BN($|\/)|\.BO($|\/)|\.BR($|\/)|\.BS($|\/)|\.BT($|\/)|\.BV($|\/)|\.BW($|\/)|\.BY($|\/)|\.BZ($|\/)|\.CA($|\/)|\.CAT($|\/)|\.CC($|\/)|\.CD($|\/)|\.CF($|\/)|\.CG($|\/)|\.CH($|\/)|\.CI($|\/)|\.CK($|\/)|\.CL($|\/)|\.CM($|\/)|\.CN($|\/)|\.CO($|\/)|\.COM($|\/)|\.COOP($|\/)|\.CR($|\/)|\.CU($|\/)|\.CV($|\/)|\.CX($|\/)|\.CY($|\/)|\.CZ($|\/)|\.DE($|\/)|\.DJ($|\/)|\.DK($|\/)|\.DM($|\/)|\.DO($|\/)|\.DZ($|\/)|\.EC($|\/)|\.EDU($|\/)|\.EE($|\/)|\.EG($|\/)|\.ER($|\/)|\.ES($|\/)|\.ET($|\/)|\.EU($|\/)|\.FI($|\/)|\.FJ($|\/)|\.FK($|\/)|\.FM($|\/)|\.FO($|\/)|\.FR($|\/)|\.GA($|\/)|\.GB($|\/)|\.GD($|\/)|\.GE($|\/)|\.GF($|\/)|\.GG($|\/)|\.GH($|\/)|\.GI($|\/)|\.GL($|\/)|\.GM($|\/)|\.GN($|\/)|\.GOV($|\/)|\.GP($|\/)|\.GQ($|\/)|\.GR($|\/)|\.GS($|\/)|\.GT($|\/)|\.GU($|\/)|\.GW($|\/)|\.GY($|\/)|\.HK($|\/)|\.HM($|\/)|\.HN($|\/)|\.HR($|\/)|\.HT($|\/)|\.HU($|\/)|\.ID($|\/)|\.IE($|\/)|\.IL($|\/)|\.IM($|\/)|\.IN($|\/)|\.INFO($|\/)|\.INT($|\/)|\.IO($|\/)|\.IQ($|\/)|\.IR($|\/)|\.IS($|\/)|\.IT($|\/)|\.JE($|\/)|\.JM($|\/)|\.JO($|\/)|\.JOBS($|\/)|\.JP($|\/)|\.KE($|\/)|\.KG($|\/)|\.KH($|\/)|\.KI($|\/)|\.KM($|\/)|\.KN($|\/)|\.KP($|\/)|\.KR($|\/)|\.KW($|\/)|\.KY($|\/)|\.KZ($|\/)|\.LA($|\/)|\.LB($|\/)|\.LC($|\/)|\.LI($|\/)|\.LK($|\/)|\.LR($|\/)|\.LS($|\/)|\.LT($|\/)|\.LU($|\/)|\.LV($|\/)|\.LY($|\/)|\.MA($|\/)|\.MC($|\/)|\.MD($|\/)|\.ME($|\/)|\.MG($|\/)|\.MH($|\/)|\.MIL($|\/)|\.MK($|\/)|\.ML($|\/)|\.MM($|\/)|\.MN($|\/)|\.MO($|\/)|\.MOBI($|\/)|\.MP($|\/)|\.MQ($|\/)|\.MR($|\/)|\.MS($|\/)|\.MT($|\/)|\.MU($|\/)|\.MUSEUM($|\/)|\.MV($|\/)|\.MW($|\/)|\.MX($|\/)|\.MY($|\/)|\.MZ($|\/)|\.NA($|\/)|\.NAME($|\/)|\.NC($|\/)|\.NE($|\/)|\.NET($|\/)|\.NF($|\/)|\.NG($|\/)|\.NI($|\/)|\.NL($|\/)|\.NO($|\/)|\.NP($|\/)|\.NR($|\/)|\.NU($|\/)|\.NZ($|\/)|\.OM($|\/)|\.ORG($|\/)|\.PA($|\/)|\.PE($|\/)|\.PF($|\/)|\.PG($|\/)|\.PH($|\/)|\.PK($|\/)|\.PL($|\/)|\.PM($|\/)|\.PN($|\/)|\.PR($|\/)|\.PRO($|\/)|\.PS($|\/)|\.PT($|\/)|\.PW($|\/)|\.PY($|\/)|\.QA($|\/)|\.RE($|\/)|\.RO($|\/)|\.RS($|\/)|\.RU($|\/)|\.RW($|\/)|\.SA($|\/)|\.SB($|\/)|\.SC($|\/)|\.SD($|\/)|\.SE($|\/)|\.SG($|\/)|\.SH($|\/)|\.SI($|\/)|\.SJ($|\/)|\.SK($|\/)|\.SL($|\/)|\.SM($|\/)|\.SN($|\/)|\.SO($|\/)|\.SR($|\/)|\.ST($|\/)|\.SU($|\/)|\.SV($|\/)|\.SY($|\/)|\.SZ($|\/)|\.TC($|\/)|\.TD($|\/)|\.TEL($|\/)|\.TF($|\/)|\.TG($|\/)|\.TH($|\/)|\.TJ($|\/)|\.TK($|\/)|\.TL($|\/)|\.TM($|\/)|\.TN($|\/)|\.TO($|\/)|\.TP($|\/)|\.TR($|\/)|\.TRAVEL($|\/)|\.TT($|\/)|\.TV($|\/)|\.TW($|\/)|\.TZ($|\/)|\.UA($|\/)|\.UG($|\/)|\.UK($|\/)|\.US($|\/)|\.UY($|\/)|\.UZ($|\/)|\.VA($|\/)|\.VC($|\/)|\.VE($|\/)|\.VG($|\/)|\.VI($|\/)|\.VN($|\/)|\.VU($|\/)|\.WF($|\/)|\.WS($|\/)|\.XN--0ZWM56D($|\/)|\.XN--11B5BS3A9AJ6G($|\/)|\.XN--80AKHBYKNJ4F($|\/)|\.XN--9T4B11YI5A($|\/)|\.XN--DEBA0AD($|\/)|\.XN--G6W251D($|\/)|\.XN--HGBK6AJ7F53BBA($|\/)|\.XN--HLCJ6AYA9ESC7A($|\/)|\.XN--JXALPDLP($|\/)|\.XN--KGBECHTV($|\/)|\.XN--ZCKZAH($|\/)|\.YE($|\/)|\.YT($|\/)|\.YU($|\/)|\.ZA($|\/)|\.ZM($|\/)|\.ZW)/i",
		$string,
		$M);
	$has_tld = (count($M) > 0) ? true : false;
	return $has_tld;
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_url_cleaner($url)
{
	$U = explode(' ', $url);

	$W = array();
	foreach ($U as $k => $u) {
		if (stristr($u, ".")) { //only preg_match if there is a dot    
			if (PricerrTheme_containsTLD($u) === true) {
				unset($U[$k]);
				return PricerrTheme_url_cleaner(implode(' ', $U));
			}
		}
	}
	return implode(' ', $U);
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_custom_taxonomy_count2($post_type, $tax_term, $taxonomy_name)
{
	$taxonomy = 'my_taxonomy'; // this is the name of the taxonomy
	$args = array(
		'post_type' => $post_type, 'posts_per_page' => '1',
		'meta_query' => array(
			array(
				'key' => 'closed',
				'value' => '0',
				'compare' => '='
			)
		),
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy_name,
				'field' => 'slug',
				'terms' => $tax_term)
		)
	);

	$my_query = new WP_Query($args);
	return $my_query->found_posts;
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_total_nr_of_listings()
{
	$query = new WP_Query("post_type=job&order=DESC&orderby=id&posts_per_page=-1&paged=1");
	return $query->post_count;
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_total_nr_of_open_listings()
{
	$query = new WP_Query("meta_key=closed&meta_value=0&post_type=job&order=DESC&orderby=id&posts_per_page=-1&paged=1");
	return $query->post_count;
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_total_nr_of_closed_listings()
{
	$query = new WP_Query("meta_key=closed&meta_value=1&post_type=job&order=DESC&orderby=id&posts_per_page=-1&paged=1");
	return $query->post_count;
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_country_code_of_ip($ip)
{
	global $wpdb;

	$s = "select * from " . $wpdb->prefix . "job_ipcache where ipnr='$ip'";
	$r = $wpdb->get_results($s);

	if (count($r) == 0) {

		$ipLite = new ip2location_lite;
		$ipLite->setKey(get_option('PricerrTheme_ip_key_db'));

		//Get errors and locations
		$locations = $ipLite->getCountry($ip);
		$ccode = $locations['countryCode'];

		$s = "insert into " . $wpdb->prefix . "job_ipcache (ipnr, country) values('$ip','$ccode')";
		$wpdb->query($s);

		return $ccode;
	}
	return $r[0]->country;
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/
if (!function_exists('PricerrTheme_get_user_level')) {
	function PricerrTheme_get_user_level($uid)
	{
		$user_level = get_user_meta($uid, 'user_level', true);
		if (empty($user_level)) {

			$PricerrTheme_default_level_nr = get_option('PricerrTheme_default_level_nr');
			if ($PricerrTheme_default_level_nr == "0") $user_level = 0;
			else $user_level = $PricerrTheme_default_level_nr;
		}
		return $user_level;
	}
}

if (!function_exists('PricerrTheme_show_badge_user')) {
	function PricerrTheme_show_badge_user($uid)
	{
		$user_level = PricerrTheme_get_user_level($uid);

		if ($user_level == "1") return '<div class="user_level1"></div>';
		if ($user_level == "2") return '<div class="user_level2"></div>';
		if ($user_level == "3") return '<div class="user_level3"></div>';

	}
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_show_badge_user2')) {
	function PricerrTheme_show_badge_user2($uid)
	{
		$user_badge = get_user_meta($uid, 'user_badge', true);
		if ($user_badge == "1") return '<div class="user_badge1"></div>';
		if ($user_badge == "2") return '<div class="user_badge2"></div>';
	}
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_show_badge_user_account_panel')) {
	function PricerrTheme_show_badge_user_account_panel($uid)
	{
		$user_level = PricerrTheme_get_user_level($uid);

		if ($user_level == "1") return '<div class="user_level1_u"></div>';
		if ($user_level == "2") return '<div class="user_level2_u"></div>';
		if ($user_level == "3") return '<div class="user_level3_u"></div>';


	}
}

/*************************************************************
 *
 *    ClassifiedTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_show_badge_user_account_panel2')) {
	function PricerrTheme_show_badge_user_account_panel2($uid)
	{
		$user_badge = get_user_meta($uid, 'user_badge', true);
		if ($user_badge == "1") return '<div class="user_badge1u"></div>';
		if ($user_badge == "2") return '<div class="user_badge2u"></div>';
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_parseHyperlinks($string)
{
	// Add <a> tags around all hyperlinks in $string
	return ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "[link_removed]", $string);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_parseEmails($string)
{
	// Add <a> tags around all email addresses in $string
	return ereg_replace("[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})", "[email_removed]", $string);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_is_home')) {
	function PricerrTheme_is_home()
	{
		if (isset($_GET['pay_for_item'])) return false;

		global $current_user, $wp_query;
		$p_action = $wp_query->query_vars['jb_action'];
		$job_category = $wp_query->query_vars['job_category'];

		if (!empty($job_category)) return true;

		if (!empty($p_action)) return false;
		if (is_home()) return true;
		return false;

	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_add_theme_styles()
{
	global $wp_query;
	//wp_register_style( 'bootstrap_style1', get_bloginfo('template_url').'/css/bootstrap_min.css', array(), '20120822', 'all' );
	//wp_register_script( 'social_pr', get_bloginfo('template_url').'/javascript/connect.js');


	global $wp_styles, $wp_scripts;
	//enqueing:
	//wp_enqueue_style( 'bootstrap_style1' );
	//wp_enqueue_script( 'social_pr' );

	$wp_styles->add_data('bootstrap_ie6', 'conditional', 'lte IE 7');
	//wp_enqueue_script('latest_jquery', 'http://code.jquery.com/jquery-latest.js', array('jquery'));

	wp_register_style('mega_menu_thing', get_bloginfo('template_url') . '/css/menu.css', array(), '20120822', 'all');
	wp_enqueue_script('jqueryhoverintent', get_bloginfo('template_url') . '/javascript/jquery.hoverIntent.minified.js', array('jquery'));
	wp_enqueue_script('dcjqmegamenu', get_bloginfo('template_url') . '/javascript/jquery.dcmegamenu.1.3.4.min.js', array('jquery'));

	wp_enqueue_script("custom", get_bloginfo('template_url') . '/javascript/custom.js', array('jquery'));

	wp_register_script("post_new_lesson", get_bloginfo('template_url') . '/javascript/post-new-lesson.js');

	$link_array = array('ajax_url' => admin_url('admin-ajax.php'));
	wp_localize_script('post_new_lesson', 'wp_links', $link_array);

	wp_enqueue_script('post_new_lesson');

	wp_enqueue_script('jqueryui_core', 'https://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js', array('jquery'));
	wp_enqueue_script('jqueryui_slide', 'https://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js', array('jquery'));

	wp_enqueue_script('jqueryhoverintent');
	wp_enqueue_script('dcjqmegamenu');
	wp_enqueue_style('mega_menu_thing');
	wp_enqueue_style('portalpage', get_template_directory_uri() . '/css/portalpage.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.css');
	wp_enqueue_style('glyphicons', get_template_directory_uri() . '/css/glyphicons.min.css');

	/* Base Stylesheet for datepicker and timepicker */
	wp_enqueue_style('bootstrap_js', get_template_directory_uri() . '/css/bootstrap-2.2.2.min.css');

	/* Bootstrap Style Datepicker */
	wp_enqueue_script('datepicker', get_template_directory_uri() . '/javascript/bootstrap-datepicker.js', array('jquery'));
	wp_enqueue_style('datepicker_style', get_template_directory_uri() . '/css/bootstrap-datepicker.css');

	/* Bootstrap Style Timepicker */
	wp_enqueue_script('timepicker', get_template_directory_uri() . '/javascript/bootstrap-timepicker.min.js', array('jquery'));
	wp_enqueue_style('timepicker_style', get_template_directory_uri() . '/css/bootstrap-timepicker.min.css');

	/* jQuery based star rating system */
	wp_enqueue_script('raty', get_template_directory_uri() . '/javascript/jquery.raty.js', array('jquery'));
	wp_enqueue_style('timepicker_style', get_template_directory_uri() . '/css/jquery.raty.css');
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme__myfeed_request($qv)
{
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types(array('name' => 'job'));
	return $qv;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_register_my_menus()
{
	register_nav_menu('Pricerr_top_menu_header', 'PricerrTheme Top Header Menu');
	register_nav_menu('primary-pricerr-main-header', 'Pricerr Big Main Menu');

}

/*************************************************************
 *
 *    PricerrTheme_wp_nav_menu create By Jason "Yue" Zhang
 *
 **************************************************************/

function PricerrTheme_wp_nav_menu($args = array())
{

	static $menu_id_slugs = array();

	$defaults = array('menu' => '', 'container' => 'div', 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '',
	                  'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	                  'depth' => 0, 'walker' => '', 'theme_location' => '', 'login' => false);

	$args = wp_parse_args($args, $defaults);
	/**
	 * Filter the arguments used to display a navigation menu.
	 *
	 * @since 3.0.0
	 *
	 * @param array $args Arguments from {@see wp_nav_menu()}.
	 */
	$args = apply_filters('wp_nav_menu_args', $args);
	$args = (object)$args;

	// Get the nav menu based on the requested menu
	$menu = wp_get_nav_menu_object($args->menu);

	// Get the nav menu based on the theme_location
	if (!$menu && $args->theme_location && ($locations = get_nav_menu_locations()) && isset($locations[$args->theme_location]))
		$menu = wp_get_nav_menu_object($locations[$args->theme_location]);

	// get the first menu that has items if we still can't find a menu
	if (!$menu && !$args->theme_location) {
		$menus = wp_get_nav_menus();
		foreach ($menus as $menu_maybe) {
			if ($menu_items = wp_get_nav_menu_items($menu_maybe->term_id, array('update_post_term_cache' => false))) {
				$menu = $menu_maybe;
				break;
			}
		}
	}

	// If the menu exists, get its items.
	if ($menu && !is_wp_error($menu) && !isset($menu_items))
		$menu_items = wp_get_nav_menu_items($menu->term_id, array('update_post_term_cache' => false));

	/*
     * If no menu was found:
     *  - Fall back (if one was specified), or bail.
     *
     * If no menu items were found:
     *  - Fall back, but only if no theme location was specified.
     *  - Otherwise, bail.
     */
	if ((!$menu || is_wp_error($menu) || (isset($menu_items) && empty($menu_items) && !$args->theme_location))
	    && $args->fallback_cb && is_callable($args->fallback_cb)
	)
		return call_user_func($args->fallback_cb, (array)$args);

	if (!$menu || is_wp_error($menu))
		return false;

	$nav_menu = $items = '';

	$show_container = false;
	if ($args->container) {
		/**
		 * Filter the list of HTML tags that are valid for use as menu containers.
		 *
		 * @since 3.0.0
		 *
		 * @param array The acceptable HTML tags for use as menu containers, defaults as 'div' and 'nav'.
		 */
		$allowed_tags = apply_filters('wp_nav_menu_container_allowedtags', array('div', 'nav'));
		if (in_array($args->container, $allowed_tags)) {
			$show_container = true;
			$class = $args->container_class ? ' class="' . esc_attr($args->container_class) . '"' : ' class="menu-' . $menu->slug . '-container"';
			$id = $args->container_id ? ' id="' . esc_attr($args->container_id) . '"' : '';
			$nav_menu .= '<' . $args->container . $id . $class . '>';
		}
	}

	// Set up the $menu_item variables
	_wp_menu_item_classes_by_context($menu_items);

	$sorted_menu_items = $menu_items_with_children = array();
	foreach ((array)$menu_items as $menu_item) {
		$sorted_menu_items[$menu_item->menu_order] = $menu_item;
		if ($menu_item->menu_item_parent) {
			$menu_items_with_children[$menu_item->menu_item_parent] = true;
		}
	}

	// Add the menu-item-has-children class where applicable
	$last_parent_node = 0;
	$counter = 0;
	if ($menu_items_with_children) {
		foreach ($sorted_menu_items as &$menu_item) {
			$counter++;
			if (isset($menu_items_with_children[$menu_item->ID])) {
				$menu_item->classes[] = 'menu-item-has-children';
				$last_parent_node = $counter;
			}
		}
	}

	unset($menu_items, $menu_item);

	if ($args->login) {

		if (!is_user_logged_in()) {
			/*
         * remove last item(My Account) and it's children items at header menu
         */
			foreach ($sorted_menu_items as $menu_item) {
				if ( ($menu_item->menu_item_parent == $sorted_menu_items[$last_parent_node]->ID) ) {
					unset($sorted_menu_items[$menu_item->menu_order]);
				}
			}
			unset($sorted_menu_items[$last_parent_node]);
		}
	}


	/**
	 * Filter the sorted list of menu item objects before generating the menu's HTML.
	 *
	 * @since 3.1.0
	 *
	 * @param array $sorted_menu_items The menu items, sorted by each menu item's menu order.
	 */

	$sorted_menu_items = apply_filters('wp_nav_menu_objects', $sorted_menu_items, $args);

	$items .= walk_nav_menu_tree($sorted_menu_items, $args->depth, $args);
	unset($sorted_menu_items);

	// Attributes
	if (!empty($args->menu_id)) {
		$wrap_id = $args->menu_id;
	} else {
		$wrap_id = 'menu-' . $menu->slug;
		while (in_array($wrap_id, $menu_id_slugs)) {
			if (preg_match('#-(\d+)$#', $wrap_id, $matches))
				$wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $wrap_id);
			else
				$wrap_id = $wrap_id . '-1';
		}
	}
	$menu_id_slugs[] = $wrap_id;

	$wrap_class = $args->menu_class ? $args->menu_class : '';

	/**
	 * Filter the HTML list content for navigation menus.
	 *
	 * @since 3.0.0
	 *
	 * @param string $items The HTML list content for the menu items.
	 * @param array $args Arguments from {@see wp_nav_menu()}.
	 */
	$items = apply_filters('wp_nav_menu_items', $items, $args);
	/**
	 * Filter the HTML list content for a specific navigation menu.
	 *
	 * @since 3.0.0
	 *
	 * @param string $items The HTML list content for the menu items.
	 * @param array $args Arguments from {@see wp_nav_menu()}.
	 */
	$items = apply_filters("wp_nav_menu_{$menu->slug}_items", $items, $args);

	// Don't print any markup if there are no items at this point.
	if (empty($items))
		return false;

	$nav_menu .= sprintf($args->items_wrap, esc_attr($wrap_id), esc_attr($wrap_class), $items);
	unset($items);

	if ($show_container)
		$nav_menu .= '</' . $args->container . '>';

	/**
	 * Filter the HTML content for navigation menus.
	 *
	 * @since 3.0.0
	 *
	 * @param string $nav_menu The HTML content for the navigation menu.
	 * @param array $args Arguments from {@see wp_nav_menu()}.
	 */
	$nav_menu = apply_filters('wp_nav_menu', $nav_menu, $args);

	if ($args->echo) {
		echo $nav_menu;
	} else {
		return $nav_menu;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_run_when_post_published($post)
{

	if ($post->post_type == 'job') {

		$under_review = get_post_meta($post->ID, 'under_review', true);

		if ($under_review == '1') {
			PricerrTheme_send_email_posted_job_approved($post->ID);
			update_post_meta($post->ID, 'under_review', '0');
		}
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_add_query_vars($public_query_vars)
{
	$public_query_vars[] = 'jb_action';
	$public_query_vars[] = 'orderid';
	$public_query_vars[] = 'step';
	$public_query_vars[] = 'my_second_page';
	$public_query_vars[] = 'third_page';
	$public_query_vars[] = 'username';
	$public_query_vars[] = 'pid';
	$public_query_vars[] = 'term_search'; //job_sort, job_category, page
	$public_query_vars[] = 'method';
	$public_query_vars[] = 'jobid';
	$public_query_vars[] = 'page';
	$public_query_vars[] = 'job_category';
	$public_query_vars[] = 'job_sort';
	$public_query_vars[] = 'job_tax';

	return $public_query_vars;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_get_user_profile_link')) {
	function PricerrTheme_get_user_profile_link($username, $paged = 1)
	{
		$using_permalinks = PricerrTheme_using_permalinks();
		if ($using_permalinks == false) {
			if ($paged == 1)
				return get_bloginfo('siteurl') . "/?jb_action=user_profile&username=" . $username;
			else
				return get_bloginfo('siteurl') . "/?jb_action=user_profile&username=" . $username . "&paged=" . $paged;
		} else {
			if ($paged == 1)
				return get_bloginfo('siteurl') . "/user-profile/" . $username . "/";
			else
				return get_bloginfo('siteurl') . "/user-profile/" . $username . "/paged/" . $paged . "/";
		}

	}
}

if (!function_exists('PricerrTheme_get_username')) {
	function PricerrTheme_get_username()
	{
		$_root_relative_current = untrailingslashit($_SERVER['REQUEST_URI']);
		$names = explode("/", $_root_relative_current);
		return $names[sizeof($names)-1];
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_browse_jobs_link($taxonomy, $term, $sort = 'auto', $page = 1, $term_search = '')
{
	$using_permalinks = PricerrTheme_using_permalinks();
	global $wp_query;
	$query_vars = $wp_query->query_vars;

	if (empty($term_search)) $term_search = $query_vars['term_search'];

	if ($using_permalinks == true) {
		if (empty($term_search)) return get_bloginfo('siteurl') . "/jobs/" . $taxonomy . "/" . $term . "/" . $sort . "/page/" . $page;
		else return get_bloginfo('siteurl') . "/jobs/" . $taxonomy . "/" . $term . "/" . $sort . "/page/" . $page . "/?term_search=" . $term_search;
	} else {
		if (empty($term_search)) return get_bloginfo('siteurl') . "/index.php?jb_action=jobs_total&job_sort=" . $sort . "&job_category=" . $term . "&job_tax=" . $taxonomy . "&page=" . $page;
		else return get_bloginfo('siteurl') . "/index.php?jb_action=jobs_total&job_sort=" . $sort . "&job_category=" . $term . "&job_tax=" . $taxonomy . "&page=" . $page . "&term_search=" . $term_search;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_rewrite_rules($wp_rewrite)
{
	global $category_url_link, $location_url_link;
	$new_rules = array(

		'page/([^/]+)/?$' => 'index.php?paged=' . $wp_rewrite->preg_index(1),
		'user-profile/([^/]+)/?$' => 'index.php?jb_action=user_profile&username=' . $wp_rewrite->preg_index(1),
		'user-profile/([^/]+)/paged/?([0-9]{1,})/?$' => 'index.php?jb_action=user_profile&username=' . $wp_rewrite->preg_index(1) . '&paged=' . $wp_rewrite->preg_index(2),
		'user-profile/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?jb_action=user_profile&username=' . $wp_rewrite->preg_index(1) . '&paged=' . $wp_rewrite->preg_index(2),

		'jobs/([^/]+)/([^/]+)/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?jb_action=jobs_total&job_sort=' . $wp_rewrite->preg_index(3)
		                                                       . '&job_category=' . $wp_rewrite->preg_index(2) . '&job_tax=' . $wp_rewrite->preg_index(1) . '&page=' . $wp_rewrite->preg_index(4),

		'jobs/([^/]+)/([^/]+)/([^/]+)/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?jb_action=jobs_total&job_sort=' . $wp_rewrite->preg_index(3)
		                                                               . '&job_category=' . $wp_rewrite->preg_index(2) . '&job_tax=' . $wp_rewrite->preg_index(1) . '&page=' . $wp_rewrite->preg_index(5) . '&term_search=' . $wp_rewrite->preg_index(4),


		$category_url_link . '/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?job_cat=' . $wp_rewrite->preg_index(1) . "&feed=" . $wp_rewrite->preg_index(2),
		$category_url_link . '/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?job_cat=' . $wp_rewrite->preg_index(1) . "&feed=" . $wp_rewrite->preg_index(2),
		$category_url_link . '/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?job_cat=' . $wp_rewrite->preg_index(1) . "&paged=" . $wp_rewrite->preg_index(2),
		$category_url_link . '/([^/]+)/?$' => 'index.php?job_cat=' . $wp_rewrite->preg_index(1)


	);

	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_my_jobs_columns($columns) //this function display the columns headings
{
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => __("Lesson Name", 'PricerrTheme'),
		"price" => __("Price", 'PricerrTheme'),
		"author" => __("Trainer", 'PricerrTheme'),
		"posted" => __("Posted On", 'PricerrTheme'),
		"closed" => __("Status", 'PricerrTheme'),
		"thumbnail" => __("Thumbnail", 'PricerrTheme'),
		"options" => __("Options", 'PricerrTheme')
	);
	return $columns;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_my_custom_columns($column)
{
	global $post;
	if ("ID" == $column) echo $post->ID; //displays title
	elseif ("description" == $column) echo $post->ID; //displays the content excerpt
	elseif ("posted" == $column) echo date('jS \of F, Y \<\b\r\/\>H:i:s', strtotime($post->post_date)); //displays the content excerpt
	elseif ("thumbnail" == $column) {
		echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/post.php?post=' . $post->ID . '&action=edit"><img class="image_class" src="' . PricerrTheme_get_first_post_image($post->ID, 65, 55) . '" width="65" height="55" /></a>'; //shows up our post thumbnail that we previously created.
	} elseif ("price" == $column) {
		echo PricerrTheme_get_show_price(get_post_meta($post->ID, 'job_cost', true));
	} elseif ("author" == $column) {
		echo $post->post_author;
	} elseif ("closed" == $column) {
		$closed = get_post_meta($post->ID, 'closed', true);
		if ($closed == "1") echo __("Closed", "PricerrTheme");
		else echo __("Open", "PricerrTheme");
	} elseif ("options" == $column) {
		echo '<div style="padding-top:20px">';
		echo '<a class="awesome" href="' . get_bloginfo('siteurl') . '/wp-admin/post.php?post=' . $post->ID . '&action=edit">Edit</a> | ';
		echo '<a class="awesome" href="' . get_permalink($post->ID) . '" target="_blank">View</a> | ';
		echo '<a class="trash" href="' . get_delete_post_link($post->ID) . '">Trash</a> ';
		echo '</div>';
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_save_custom_fields')) {
	function PricerrTheme_save_custom_fields($pid) {
		if (isset($_POST['fromadmin'])) {
			$post = get_post($pid);

			//------------------------------------------------------------------------

			update_post_meta($pid, 'instruction_box', trim($_POST['instruction_box']));

			$sts = get_option('PricerrTheme_get_total_extras');
			if (empty($sts)) $sts = 3;

			for ($k = 1; $k <= $sts; $k++) {
				$extra_price = trim($_POST['extra' . $k . '_price']);
				$extra_content = trim($_POST['extra' . $k . '_content']);


				if (!empty($extra_price) && is_numeric($extra_price) && !empty($extra_content)):

					update_post_meta($pid, 'extra' . $k . '_price', $extra_price);
					update_post_meta($pid, 'extra' . $k . '_content', $extra_content);
				else:
					update_post_meta($pid, 'extra' . $k . '_price', '');
					update_post_meta($pid, 'extra' . $k . '_content', '');

				endif;
			}


			//------------------------------------------------------------------------

			//$ttl = PricerrTheme_reomve_i_will($post->post_title);
			$title_variable = get_post_meta($pid, 'title_variable', true);

			if (!empty($ttl)) $ttl = $title_variable;

			$job_cost = htmlspecialchars($_POST['job_cost']);
			update_post_meta($pid, "title_variable", $ttl);


			//--------------------------------------------------------------------

			$PricerrTheme_enable_dropdown_values = get_option('PricerrTheme_enable_dropdown_values');
			$PricerrTheme_enable_free_input_box = get_option('PricerrTheme_enable_free_input_box');

			if ($PricerrTheme_enable_free_input_box == "yes")
				update_post_meta($pid, "price", $job_cost);
			else if ($PricerrTheme_enable_dropdown_values == "yes")
				update_post_meta($pid, "price", $job_cost);
			else {
				$prc = get_option('PricerrTheme_job_fixed_amount');
				update_post_meta($pid, "price", $prc);
			}

			//--------------------------------------------------------------------

			$ending = get_post_meta($pid, "ending", true);
			$views = get_post_meta($pid, "views", true);
			$closed = get_post_meta($pid, "closed", true);
			update_post_meta($pid, "shipping", trim($_POST['shipping']));


			if (empty($views)) update_post_meta($pid, "views", 0);


			if ($_POST['active'] == '1')
				update_post_meta($pid, "active", '1');
			else
				update_post_meta($pid, "active", '0');

			//--------------------------------------------

			if ($_POST['featureds'] == '1')
				update_post_meta($pid, "featured", '1');
			else
				update_post_meta($pid, "featured", '0');

			if ($_POST['closed'] == '1') {
				update_post_meta($pid, "closed", '1');
			} else {
				if ($closed == "1") update_post_meta($pid, "ending", time() + 30 * 24 * 3600);
				update_post_meta($pid, "closed", '0');

			}

			//---------------

			$PricerrTheme_featured_job_listing = get_option('PricerrTheme_featured_job_listing');
			if (empty($PricerrTheme_featured_job_listing)) $PricerrTheme_featured_job_listing = 30;

			update_post_meta($pid, 'featured_until', (current_time('timestamp', 0) + (3600 * 24 * $PricerrTheme_featured_job_listing)));

			//---------------

			if (isset($_POST['youtube_link'][3]))
				update_post_meta($pid, "youtube_link3", trim(htmlspecialchars($_POST['youtube_link3'])));
			else update_post_meta($pid, "youtube_link3", '');

			if (isset($_POST['youtube_link'][1]))
				update_post_meta($pid, "youtube_link1", trim(htmlspecialchars($_POST['youtube_link1'])));
			else update_post_meta($pid, "youtube_link1", '');

			if (isset($_POST['youtube_link'][2]))
				update_post_meta($pid, "youtube_link2", trim(htmlspecialchars($_POST['youtube_link2'])));
			else update_post_meta($pid, "youtube_link2", '');

			$mi_videos = 0;

			for ($i = 1; $i <= 3; $i++):

				$video_thing = get_post_meta($pid, 'youtube_link' . $i, true);
				if (empty($video_thing)) $mi_videos++;

			endfor;

			update_post_meta($pid, 'has_videos', '1');
			if ($mi_videos == 3) update_post_meta($pid, 'has_videos', '0');

		}
	}
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_admin_stylesheet()
{

	wp_enqueue_script("jquery-ui-widget");
	wp_enqueue_script("jquery-ui-mouse");
	wp_enqueue_script("jquery-ui-tabs");
	wp_enqueue_script("jquery-ui-datepicker");

	?>

	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/tipTip.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/admin.css" type="text/css"/>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/colorpicker.css" type="text/css"/>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout.css"/>
	<link type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/jquery.tipTip.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/idtabs.js"></script>


	<script type="text/javascript">
		<?php
			
			$tb = "tabs1";
			if(isset($_GET['active_tab'])) $tb = $_GET['active_tab']; 
		
		?>
		var $ = jQuery;
		jQuery(document).ready(function () {
			jQuery("#usual2 ul").idTabs("<?php echo $tb; ?>");
			jQuery(".tltp_cls").tipTip({maxWidth: "330"});
		});


	</script>


	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/colorpicker.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/eye.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/utils.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/layout.js?ver=1.0.2"></script>

<?php

}

function PricerrTheme_custom_css_thing()
{
	if (is_home()) {

		$opt = get_option('Pricerr_main_how_it_works');
		$asd = get_bloginfo('template_url') . '/images/main_graphic.jpg';
		if (!empty($opt)) $asd = $opt;

		?>
		<style type="text/css">
			.main-how-it-works {
				background: url('<?php echo $asd; ?>')
			}
		</style>
	<?php
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_post_new_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_post_new\]/", $content)) {
		ob_start();
		PricerrTheme_post_new_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_post_new\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_pay_for_job_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_pay_for_job_page\]/", $content)) {
		ob_start();
		PricerrTheme_pay_for_job_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_pay_for_job_page\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_blog_posts_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_blog_posts\]/", $content)) {
		ob_start();
		PricerrTheme_blog_posts_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_blog_posts\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_reviews_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_reviews\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_reviews_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_reviews\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_shopping_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_shopping\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_shopping_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_shopping\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_pers_info_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_personal_info\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_pers_info_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_personal_info\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_sales_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_sales\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_sales_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_sales\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

function PricerrTheme_get_adv_search_pagination_link($pg)
{

	$page_id = get_option('PricerrTheme_advanced_search_id');

	$using_perm = PricerrTheme_using_permalinks();
	if ($using_perm) $ssk = get_permalink(($page_id)) . "?pj=" . $pg;
	else $ssk = get_bloginfo('siteurl') . "/?page_id=" . ($page_id) . "&pj=" . $pg;

	$trif = '';
	foreach ($_GET as $key => $value) {
		if ($key != "pj" and $key != 'page_id' and $key != "custom_field_id")
			$trif .= '&' . $key . "=" . $value;
	}

	if (is_array($_GET['custom_field_id']))
		foreach ($_GET['custom_field_id'] as $values)
			$trif .= "&custom_field_id[]=" . $values;

	return $ssk . $trif;
}

function PricerrTheme_is_adv_src_pg()
{
	global $post;
	if ($post->ID == get_option('PricerrTheme_advanced_search_id')) return true;
	return false;
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_all_cats_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_all_categories\]/", $content)) {
		ob_start();
		PricerrTheme_all_cats_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_all_categories\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

function PricerrTheme_display_adv_src_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_search_jobs\]/", $content)) {
		ob_start();
		PricerrTheme_adv_src_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_search_jobs\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}


function PricerrTheme_display_all_locs_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_all_locations\]/", $content)) {
		ob_start();
		PricerrTheme_all_locs_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_all_locations\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

function PricerrTheme_get_custom_taxonomy_count($ptype, $pterm)
{
	global $wpdb;

	$s = "select * from " . $wpdb->prefix . "terms where slug='$pterm'";
	$r = $wpdb->get_results($s);
	$r = $r[0];

	$term_id = $r->term_id;


	//--------

	$s = "select * from " . $wpdb->prefix . "term_taxonomy where term_id='$term_id'";
	$r = $wpdb->get_results($s);
	$r = $r[0];

	$term_taxonomy_id = $r->term_taxonomy_id;


	//--------

	$s = "select distinct posts.ID from " . $wpdb->prefix . "term_relationships rel, $wpdb->postmeta wpostmeta, $wpdb->posts posts 
	 where rel.term_taxonomy_id='$term_taxonomy_id' AND rel.object_id = wpostmeta.post_id AND posts.ID = wpostmeta.post_id AND posts.post_status = 'publish' AND posts.post_type = 'job' AND wpostmeta.meta_key = 'closed' AND wpostmeta.meta_value = '0'";
	$r = $wpdb->get_results($s);


	return count($r);
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_priv_mess_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_priv_mess\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_priv_mess_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_priv_mess\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_cancel_req_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_answer_cancel\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_cancel_reqq_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_answer_cancel\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_payments_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account_payments\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_payments_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account_payments\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_display_my_account_pg($content = '')
{
	if (preg_match("/\[pricerr_theme_my_account\]/", $content)) {
		ob_start();
		PricerrTheme_my_account_area_function();
		$output = ob_get_contents();
		ob_end_clean();
		$output = str_replace('$', '\$', $output);
		return preg_replace("/(<p>)*\[pricerr_theme_my_account\](<\/p>)*/", $output, $content);

	} else {
		return $content;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_set_metaboxes()
{

	add_meta_box('job_images', 'Lesson Images', 'PricerrTheme_theme_job_images', 'job', 'advanced', 'high');
	add_meta_box('job_extra', 'Lesson Additional Services', 'PricerrTheme_theme_job_additional', 'job', 'advanced', 'high');
	add_meta_box('job_dets', 'Lesson Details', 'PricerrTheme_theme_job_dts', 'job', 'side', 'high');
	add_meta_box('job_instr', 'Seller Instructions', 'PricerrTheme_theme_job_instructions', 'job', 'advanced', 'high');
	do_action('PricerrTheme_set_meta_boxes');
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_theme_job_additional()
{
	global $post;
	$pid = $post->ID;
	?>


	<table width="100%">
		<?php

		$sts = get_option('PricerrTheme_get_total_extras');
		if (empty($sts)) $sts = 3;

		for ($k = 1; $k <= $sts; $k++) {


			?>
			<tr>
				<td width="200">
					<?php _e('For an extra', 'PricerrTheme'); ?><input type="text" size="3" name="extra<?php echo $k; ?>_price" value="<?php echo get_post_meta($pid, 'extra' . $k . '_price', true); ?>"/><?php echo PricerrTheme_get_currency(); ?>&nbsp;&nbsp;<?php _e('I will provide', 'PricerrTheme'); ?>:
				</td>
				<td>
					<textarea name="extra<?php echo $k; ?>_content" cols="40" rows="2"><?php echo get_post_meta($pid, 'extra' . $k . '_content', true); ?></textarea>
				</td>
			</tr>

		<?php } ?>

	</table>

<?php
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_theme_job_instructions()
{
	global $post;

	?>

	<textarea cols="60" rows="5" name="instruction_box"><?php echo get_post_meta($post->ID, 'instruction_box', true); ?></textarea>

<?php
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
if (!function_exists('PricerrTheme_theme_job_dts')) {
	function PricerrTheme_theme_job_dts()
	{
		global $post;

		$pid = $post->ID;
		$price = get_post_meta($pid, "price", true);
		$location = get_post_meta($pid, "Location", true);
		$f = get_post_meta($pid, "featured", true);
		$t = get_post_meta($pid, "closed", true);
		$active = get_post_meta($pid, "active", true);

		?>

		<ul id="post-new4">
			<input name="fromadmin" type="hidden" value="1"/>

			<li>
				<h2><?php echo __('Lesson Price', 'PricerrTheme'); ?>:</h2>
				<p>
					<?php
					$PricerrTheme_enable_dropdown_values = get_option('PricerrTheme_enable_dropdown_values');
					$PricerrTheme_enable_free_input_box = get_option('PricerrTheme_enable_free_input_box');


					if ($PricerrTheme_enable_free_input_box == "yes") {

						if (PricerrTheme_show_price_in_front() == true)
							echo PricerrTheme_get_currency();

						echo ' <input type="text" name="job_cost" class="do_input" value="' . get_post_meta($pid, 'job_cost', true) . '" size="5" /> ';

						if (PricerrTheme_show_price_in_front() == false)
							echo PricerrTheme_get_currency();

					} else if ($PricerrTheme_enable_dropdown_values == "yes") {
						echo PricerrTheme_get_variale_cost_dropdown('do_input', get_post_meta($pid, 'job_cost', true));
					} else
						echo PricerrTheme_get_show_price(get_option('PricerrTheme_job_fixed_amount'));
					?>

				</p>
			</li>

			<li>
				<h2><?php echo __('Youtube Video Link #1', 'PricerrTheme'); ?>:</h2>
				<p><input type="text" size="10" name="youtube_link1" class="do_input" value="<?php echo get_post_meta($pid, 'youtube_link1', true); ?>"/></p>
			</li>

			<li>
				<h2><?php echo __('Youtube Video Link #2', 'PricerrTheme'); ?>:</h2>
				<p><input type="text" size="10" name="youtube_link2" class="do_input" value="<?php echo get_post_meta($pid, 'youtube_link2', true); ?>"/></p>
			</li>

			<li>
				<h2><?php echo __('Youtube Video Link #3', 'PricerrTheme'); ?>:</h2>
				<p><input type="text" size="10" name="youtube_link3" class="do_input" value="<?php echo get_post_meta($pid, 'youtube_link3', true); ?>"/></p>
			</li>

			<?php

			$PricerrTheme_enable_shipping = get_option('PricerrTheme_enable_shipping');
			if ($PricerrTheme_enable_shipping == "yes"):

				?>

				<li>
					<h2><?php echo __('Requires shipping?', 'PricerrTheme'); ?>:</h2>

					<p>
						<?php if (PricerrTheme_show_price_in_front())
							echo PricerrTheme_get_currency(); ?>
						<input type="text" size="5" class="do_input" name="shipping" value="<?php echo(empty($shipping) ? get_post_meta($pid, 'shipping', true) : $shipping); ?>"/>
						<?php if (!PricerrTheme_show_price_in_front())
							echo PricerrTheme_get_currency(); ?> </p>
				</li>

			<?php endif; ?>

			<li>
				<h2><?php _e("Feature this job", 'PricerrTheme'); ?>:</h2>

				<p><input type="checkbox" value="1" name="featureds" <?php if ($f == '1') echo ' checked="checked" '; ?> /></p>
			</li>
			<li>
				<h2><?php _e("Active Lesson?", 'PricerrTheme'); ?>:</h2>
				<p><input type="checkbox" value="1" name="active" <?php if ($active == '1') echo ' checked="checked" '; ?> /></p>
			</li>
			<li>
				<h2><?php _e("Closed", 'PricerrTheme'); ?>:</h2>
				<p><input type="checkbox" value="1" name="closed" <?php if ($t == '1') echo ' checked="checked" '; ?> /></p>
			</li>
		</ul>
	<?php

	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_theme_job_images')) {
	function PricerrTheme_theme_job_images()
	{
		global $current_user;
		get_currentuserinfo();
		$cid = $current_user->ID;

		global $post;
		$pid = $post->ID;
		$cwd = str_replace('wp-admin', '', getcwd());

		$cwd .= 'wp-content/uploads';

		//echo get_template_directory();
		?>

		<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/lib/uploadify/jquery.uploadify-3.1.js"></script>
		<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/lib/uploadify/uploadify.css" type="text/css"/>

		<script type="text/javascript">

			function delete_this(id) {
				jQuery.ajax({
					method: 'get',
					url: '<?php echo get_bloginfo('siteurl');?>/index.php/?_ad_delete_pid=' + id,
					dataType: 'text',
					success: function (text) {
						jQuery('#image_ss' + id).remove();
					}
				});
				//alert("a");
			}
			jQuery(function () {

				jQuery("#fileUpload3").uploadify({
					height: 30,
					auto: true,
					swf: '<?php echo get_bloginfo('template_url'); ?>/lib/uploadify/uploadify.swf',
					uploader: '<?php echo get_bloginfo('template_url'); ?>/lib/uploadify/uploady.php',
					width: 120,
					fileTypeExts: '*.jpg;*.jpeg;*.gif;*.png',
					formData: {'ID':<?php echo $pid; ?>, 'author':<?php echo $cid; ?>},
					onUploadSuccess: function (file, data, response) {

						//alert(data);
						var bar = data.split("|");

						jQuery('#thumbnails').append('<div class="div_div" id="image_ss' + bar[1] + '" ><img width="70" class="image_class" height="70" src="' + bar[0] + '" /><a href="javascript: void(0)" onclick="delete_this(' + bar[1] + ')"><img border="0" src="<?php echo get_bloginfo('template_url'); ?>/images/delete_icon.png" border="0" /></a></div>');
					}
				});
			});
		</script>

		<style type="text/css">
			.div_div {
				margin-left: 5px;
				float: left;
				width: 110px;
				margin-top: 10px;
			}

		</style>

		<div id="fileUpload3">You have a problem with your javascript</div>
		<div id="thumbnails" style="overflow:hidden;margin-top:20px">

			<?php

			$args = array(
				'order' => 'ASC',
				'orderby' => 'post_date',
				'post_type' => 'attachment',
				'post_parent' => $pid,
				'post_mime_type' => 'image',
				'numberposts' => -1,
			);
			$i = 0;

			$attachments = get_posts($args);


			if ($attachments) {
				foreach ($attachments as $attachment) {
					$url = wp_get_attachment_url($attachment->ID);

					echo '<div class="div_div"  id="image_ss' . $attachment->ID .
					     '"><img width="70" class="image_class" height="70" src="' .
					     PricerrTheme_generate_thumb($url, 70, 70) . '" />
			<a href="javascript: void(0)" onclick="delete_this(\'' . $attachment->ID . '\')"><img border="0" src="' . get_bloginfo('template_url') . '/images/delete_icon.png" /></a>
			</div>';
				}
			}
			?>

		</div>

	<?php

	}
}


function PricerrTheme_generate_thumb2($img_ID, $width, $height, $cut = true)
{
	return PricerrTheme_wp_get_attachment_image($img_ID, array($width, $height));
}

function PricerrTheme_generate_thumb3($img_ID, $size_string)
{
	return PricerrTheme_wp_get_attachment_image($img_ID, $size_string);
}


function PricerrTheme_wp_get_attachment_image($attachment_id, $size = 'thumbnail', $icon = false, $attr = '')
{

	$html = '';

	$image = wp_get_attachment_image_src($attachment_id, $size, $icon);

	if ($image) {
		list($src, $width, $height) = $image;
		$hwstring = image_hwstring($width, $height);
		if (is_array($size))
			$size = join('x', $size);
		$attachment =& get_post($attachment_id);
		$default_attr = array(
			'src' => $src,
			'class' => "attachment-$size",
			'alt' => trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))), // Use Alt field first
			'title' => trim(strip_tags($attachment->post_title)),
		);
		if (empty($default_attr['alt']))
			$default_attr['alt'] = trim(strip_tags($attachment->post_excerpt)); // If not, Use the Caption
		if (empty($default_attr['alt']))
			$default_attr['alt'] = trim(strip_tags($attachment->post_title)); // Finally, use the title

		$attr = wp_parse_args($attr, $default_attr);
		$attr = apply_filters('wp_get_attachment_image_attributes', $attr, $attachment);
		$attr = array_map('esc_attr', $attr);
		$html = rtrim("<img $hwstring");

		$html = $attr['src'];
	}

	return $html;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/


function PricerrTheme_create_post_type()
{
	global $jobs_url_thing;

	$icn = get_bloginfo('template_url') . "/images/pricerr.gif";
	register_post_type('job',
		array(
			'labels' => array(
				'name' => __('Lessons', 'PricerrTheme'),
				'singular_name' => __('Lesson', 'PricerrTheme'),
				'add_new' => __('Add New Lesson', 'PricerrTheme'),
				'new_item' => __('New Lesson', 'PricerrTheme'),
				'edit_item' => __('Edit Lesson', 'PricerrTheme'),
				'add_new_item' => __('Add New Lesson', 'PricerrTheme'),
				'search_items' => __('Search Lessons', 'PricerrTheme')),
			'public' => true,
			'menu_position' => 5,
			'register_meta_box_cb' => 'PricerrTheme_set_metaboxes',
			'has_archive' => "all-jobs",
			'rewrite' => array('slug' => $jobs_url_thing . "/%job_cat%", 'with_front' => false),
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'_builtin' => false,
			'menu_icon' => $icn,
			'publicly_queryable' => true,
			'hierarchical' => false

		)
	);


	$icn = get_bloginfo('template_url') . "/images/pricerr.gif";
	register_post_type('request',
		array(
			'labels' => array(
				'name' => __('Requests', 'PricerrTheme'),
				'singular_name' => __('Request', 'PricerrTheme'),
				'add_new' => __('Add New Request', 'PricerrTheme'),
				'new_item' => __('New Request', 'PricerrTheme'),
				'edit_item' => __('Edit Request', 'PricerrTheme'),
				'add_new_item' => __('Add New Request', 'PricerrTheme'),
				'search_items' => __('Search Requests', 'PricerrTheme'),
			),
			'public' => true,
			'menu_position' => 5,
			// 'register_meta_box_cb' => 'PricerrTheme_set_metaboxes',
			'has_archive' => true,
			'rewrite' => true, 'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
			'_builtin' => false,
			'menu_icon' => $icn,
			'publicly_queryable' => true,
			'hierarchical' => false

		)
	);

	register_taxonomy('request_cat', 'request', array('hierarchical' => true, 'label' => __('Request Categories', 'PricerrTheme')));
	register_taxonomy('job_cat', 'job', array('hierarchical' => true, 'label' => __('Lesson Categories', 'PricerrTheme')));
	register_taxonomy('job_location', 'job', array('hierarchical' => true, 'label' => __('Lesson Locations', 'PricerrTheme')));
	//register_taxonomy( 'job_location', 'job', array( 'hierarchical' => true, 'label' => __('Locations') ) );
	add_post_type_support('job', 'author');
	//  add_post_type_support( 'job', 'custom-fields' );
	register_taxonomy_for_object_type('post_tag', 'job');

	flush_rewrite_rules();

}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_insert_pages($page_ids, $page_title, $page_tag, $parent_pg = 0)
{
	$opt = get_option($page_ids);
	if (!PricerrTheme_check_if_page_existed($opt)) {

		$post = array(
			'post_title' => $page_title,
			'post_content' => $page_tag,
			'post_status' => 'publish',
			'post_type' => 'page',
			'post_author' => 1,
			'ping_status' => 'closed',
			'post_parent' => $parent_pg);

		$post_id = wp_insert_post($post);

		update_post_meta($post_id, '_wp_page_template', 'pricerr-special-page-template.php');
		update_option($page_ids, $post_id);
	}
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_check_if_page_existed($pid)
{
	global $wpdb;
	$s = "select * from " . $wpdb->prefix . "posts where post_type='page' AND post_status='publish' AND ID='$pid'";
	$r = $wpdb->get_results($s);

	if (count($r) > 0) return true;
	return false;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_post_new_link()
{
	return get_permalink(get_option('PricerrTheme_post_new_page_id'));
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_blog_link()
{
	return get_permalink(get_option('PricerrTheme_blog_home_id'));
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_my_account_link()
{
	return get_permalink(get_option('PricerrTheme_my_account_page_id'));
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

add_filter('upload_mimes', 'PricerrTheme_custom_upload_mimes');

function PricerrTheme_custom_upload_mimes($existing_mimes = array())
{
	$existing_mimes['zip'] = 'application/zip';

	return $existing_mimes;
}

add_action('PricerrTheme_get_post', 'PricerrTheme_get_post_fnc');
add_action('PricerrTheme_get_post_thumbs', 'PricerrTheme_get_post_thumbs_fnc');

function PricerrTheme_get_post()
{
	do_action('PricerrTheme_get_post');
}


function PricerrTheme_get_post_thumbs()
{
	do_action('PricerrTheme_get_post_thumbs');
}

function PricerrTheme_show_stars_our_of_number($nr)
{
	$concat = '';
	for ($i = 1; $i <= $nr; $i++) {
		$concat .= ' <img src="' . get_bloginfo('template_url') . '/images/star_full.png" width="15" />';
	}

	for ($i = ($nr + 1); $i <= 5; $i++) {
		$concat .= ' <img src="' . get_bloginfo('template_url') . '/images/star_empty.png" width="15" />';
	}
	return $concat;
}

function PricerrTheme_show_rating_star_user($uid)
{
	$concat = '';
	$nr_ratings = 0;

	global $wpdb;
	$s = "select count(grade) cnt, sum(grade) smm from " . $wpdb->prefix . "job_ratings where uid='$uid' and awarded='1'";
	$r = $wpdb->get_results($s);

	if (count($r) > 0) {
		$nr_ratings = $r[0]->cnt;
		$sum = $r[0]->smm;

		if ($nr_ratings > 0) {

			if ($sum > 0)
				$sdd = ceil($sum / $nr_ratings);
			else $sdd = 1;

			for ($i = 1; $i <= $sdd; $i++) {
				$concat .= ' <img src="' . get_bloginfo('template_url') . '/images/star_full.png" width="15" />';
			}

			for ($i = $sdd + 1; $i <= 5; $i++) {
				$concat .= ' <img src="' . get_bloginfo('template_url') . '/images/star_empty.png" width="15" />';
			}
		} else {
			$concat = '';

			for ($i = 1; $i <= 5; $i++) {
				$concat .= ' <img src="' . get_bloginfo('template_url') . '/images/star_empty.png" width="15" />';
			}
		}
	} else {
		$concat = '';

		for ($i = 1; $i <= 5; $i++) {
			$concat .= ' <img src="' . get_bloginfo('template_url') . '/images/star_empty.png" width="15" />';
		}

	}

	return $concat . "  <a href='#feedback'>(" . $nr_ratings . ")</a>";
}

function PricerrTheme_get_post_thumbs_fnc()
{
	global $post;
	$pid = get_the_ID();
	$uid = $post->post_author;

	$prc = PricerrTheme_get_show_price(get_post_meta($pid, 'job_cost', true));
	$usr = get_userdata($uid);
	$flag = strtoupper(PricerrTheme_get_user_country($uid)) . " " . PricerrTheme_get_user_flag($uid);
	$userdata = get_userdata($uid);
	$featured = get_post_meta($pid, 'featured', true);

	//--------------------------------

	/* 	$pic_id = PricerrTheme_get_first_post_image_ID(get_the_ID());
	echo '<h1>' . $pic_id . '</h1><br />'; */
	//$pic_id = get_user_meta($uid, 'avatar', true);

	/* 	if (!isnull($pic_id)) $img = PricerrTheme_generate_thumb($pic_id, 155, 115);
	else $img = get_bloginfo('template_url') . '/images/nopic.jpg'; */

	$img = PricerrTheme_get_avatar($uid, 175, 175);

	?>

	<div class="post_thumb">

		<?php if ($featured == "1"): ?>
			<div class="feats1"></div>
		<?php endif; ?>

		<?php

		$instant = get_post_meta(get_the_ID(), 'instant', true);
		$max_days = get_post_meta(get_the_ID(), 'max_days', true);

		if ($instant == "1"): ?>
			<div class="instant1"></div>
		<?php elseif ($max_days == 1): ?>
			<div class="express1"></div>
		<?php endif; ?>

		<div class="thumbnail_image">
			<a href="<?php the_permalink() ?>">
				<img class="my_image" src="<?php echo $img ?>" width="155" height="115" alt="<?php the_title() ?>"/>
			</a>
		</div>
		<div class="user_ratings">
			<div class="padd10_m">
				<?php echo PricerrTheme_show_rating_star_user($post->post_author) ?>
			</div>
		</div>
		<div class="gridview_title">
			<div class="padd10_m">
				<?php

				$string_title = ucfirst(substr(get_the_title(), 0, 80));

				echo '<a class="grid_view_url_thing" href="' . get_permalink() . '">';
				echo sprintf(__('%s ... <br /><span class="no_bolds">Book me for %s</span>', 'PricerrTheme'), $string_title, $prc);
				echo '</a>';

				?>
			</div>
		</div>
		<div class="user_and_flag">
			<div class="padd10_m">
				<?php

				$link_user = PricerrTheme_get_user_profile_link($userdata->user_login);
				echo sprintf(__('Lesson Posted By: <a href="%s" class="grid_view_url_thing1">%s</a>', 'PricerrTheme'), $link_user, $userdata->user_login); ?>
				&nbsp; &nbsp;  <?php echo $flag ?>

			</div>
		</div>
	</div>

<?php
}

function PricerrTheme_get_current_view_grid_list()
{
	if ($_SESSION['view_tp'] == "grid") return "grid"; else return "list";
}

function PricerrTheme_get_current_how_to_use()
{
	if ($_SESSION['htu_cat'] == "trainer") return "trainer"; else return "student";
}

function PricerrTheme_get_current_order_by_thing()
{
	if ( empty($_SESSION['current_order']) ) return "post_date"; else return $_SESSION['current_order'];
}

function PricerrTheme_filter_switch_link_from_home_page($tp)
{
	return get_bloginfo('siteurl') . "?switch_filter=" . $tp . "&get_urls=" . urlencode(PricerrTheme_curPageURL());
}

function PricerrTheme_get_start_date_filter()
{
	if (empty($_SESSION['start_date_filter'])) return ""; else return $_SESSION['start_date_filter'];
}

function PricerrTheme_get_college_filter()
{
	if (empty($_SESSION['college_filter'])) return ""; else return $_SESSION['college_filter'];
}

function PricerrTheme_filter_change_start_date($start_date)
{
	return get_bloginfo('siteurl') . "?start_date_filter=" . $start_date . "&get_urls=" . urlencode(PricerrTheme_curPageURL());
}

function PricerrTheme_switch_link_from_home_page($tp)
{
	return get_bloginfo('siteurl') . "?switch_grd=" . $tp . "&get_urls=" . urlencode(PricerrTheme_curPageURL());
}

function PricerrTheme_switch_how_to_use_from_portal_page($htu_cat)
{
	return get_bloginfo('siteurl') . "?switch_htu=" . $htu_cat . "&get_urls=" . urlencode(PricerrTheme_curPageURL());
}

function PricerrTheme_curPageURL_me()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

/*****************************************************************************
 *
 *    Function - PricerrTheme -
 *
 *****************************************************************************/
function PricerrTheme_curPageURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}


if (!function_exists('PricerrTheme_get_post_fnc')) {
	function PricerrTheme_get_post_fnc()
	{

		$arr = array();
		$pid = get_the_ID();
		if ($arr[0] == "winner") $pay_this_me = 1;
		if ($arr[0] == "unpaid") $unpaid = 1;

		$ending = get_post_meta($pid, 'ending', true);
		$sec = $ending - time();

		$closed = get_post_meta($pid, 'closed', true);
		$featured = get_post_meta($pid, 'featured', true);

		$img_class = "image_class_pst";

		global $current_user;
		$post = get_post($pid);
		get_currentuserinfo();
		$uid = $current_user->ID;
		$prc = PricerrTheme_get_show_price2(get_post_meta(get_the_ID(), 'job_cost', true), 2);

		?>
		<div class="post" id="post-<?php the_ID(); ?>">

			<?php if ($featured == "1"): ?>
				<div class="featured"></div>
			<?php endif; ?>

			<div class="padd0 white-wrapper">
				<div class="image_holder">
					<a href="<?php the_permalink(); ?>"><img width="102" height="72" class="<?php echo $img_class; ?>" src="<?php echo PricerrTheme_get_avatar($post->post_author, 102, 72); ?>"/></a>
				</div>
				<div class="title_holder">
					<div class="ttl_holder_down">
						<h2><?php

							$days_needed = get_post_meta(get_the_ID(), 'max_days', true);
							$instant = get_post_meta(get_the_ID(), 'instant', true);

							if ($instant == 1) echo '<span class="instant_job_spn">' . __('Instant Delivery', 'PricerrTheme') . '</span>';
							else if ($days_needed == 1) echo '<span class="express_job_spn">' . __('Recent Lesson', 'PricerrTheme') . '</span>';
							?>
							<a class="title_of_job" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
								<?php

								echo ucfirst(strtolower($post->post_title));

								?></a></h2></div>

					<p class="mypostedon">
						<?php

						$usr = get_userdata($post->post_author);
						$flag = strtoupper(PricerrTheme_get_user_country($post->post_author)) . " " . PricerrTheme_get_user_flag($post->post_author);

						//----------------------------

						$reg = $usr->user_registered;
						$joined = PricerrTheme_prepare_seconds_to_words(time() - strtotime($reg));

						//----------------------------

						$max_days = get_post_meta(get_the_ID(), "max_days", true);
						$instant = get_post_meta(get_the_ID(), 'instant', true);

						if ($instant == "1") $del = __("Instant", "PricerrTheme");
						else {
							if ($max_days == 1) $del = __("24Hrs", "PricerrTheme");
							else
								$del = sprintf(__("%s days", "PricerrTheme"), $max_days);

						}

						echo '<span class="inline">';
						echo sprintf(__('<span class="spn_txt_diff">Trainer</span>: <a href="%s" class="title_of_job2">%s</a>', 'PricerrTheme'), PricerrTheme_get_user_profile_link($usr->user_login), $usr->user_login);
						echo '</span>';
						//echo '<span class="inline">';
						//echo sprintf(__('<span class="spn_txt_diff">From</span>: %s', 'PricerrTheme'), $flag);
						//echo '</span>';
						echo '<span class="inline">';
						echo sprintf(__('<span class="spn_txt_diff">Post Time</span>: %s', 'PricerrTheme'), get_the_time('F j, Y \a\t g:i A'));
						echo '</span>';
						//echo '<span class="inline">';
						//echo sprintf(__('<span class="spn_txt_diff">Delivery</span>: %s', 'PricerrTheme'), $del);
						//echo '</span>';

						?>
					</p>
				</div>
				<div class="order_now_new_btn">
					<a href="<?php echo get_permalink($pid); ?>" class="button btn-medium-large rounded grey"><?php
						echo sprintf(__('Train Me for %s', 'PricerrTheme'), intval(substr($prc,1,-1)) == 0 ? "Free" : $prc ); ?></a>
				</div>
			</div>
		</div>


	<?php
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_option_drop_down($arr, $name)
{
	$opts = get_option($name);
	$r = '<select name="' . $name . '">';
	foreach ($arr as $key => $value) {
		$r .= '<option value="' . $key . '" ' . ($opts == $key ? ' selected="selected" ' : "") . '>' . $value . '</option>';

	}
	return $r . '</select>';
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_currency()
{
	$c = trim(get_option('PricerrTheme_currency_symbol'));
	if (empty($c)) return get_option('PricerrTheme_currency');
	return $c;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_show_price($price, $cents = 2)
{
	$PricerrTheme_currency_position = get_option('PricerrTheme_currency_position');
	if ($PricerrTheme_currency_position == "front") return PricerrTheme_get_currency() . "" . PricerrTheme_formats($price, $cents);
	return PricerrTheme_formats($price, $cents) . "" . PricerrTheme_get_currency();

}

function PricerrTheme_get_show_price2($price, $cents = 2)
{
	$PricerrTheme_currency_position = get_option('PricerrTheme_currency_position');
	if ($PricerrTheme_currency_position == "front") return PricerrTheme_get_currency() . "" . PricerrTheme_formats_mm($price, $cents);
	return PricerrTheme_formats_mm($price, $cents) . "" . PricerrTheme_get_currency();

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_formats_mm($number, $cents = 1)
{
	if (is_float($number)) return PricerrTheme_formats($number, $cents);
	return $number;
}

function PricerrTheme_formats($number, $cents = 1)
{ // cents: 0=never, 1=if needed, 2=always

	$dec_sep = get_option('PricerrTheme_decimal_sum_separator');
	if (empty($dec_sep)) $dec_sep = '.';

	$tho_sep = get_option('PricerrTheme_thousands_sum_separator');
	if (empty($tho_sep)) $tho_sep = ',';

	//dec,thou

	if (is_numeric($number)) { // a number
		if (!$number) { // zero
			$money = ($cents == 2 ? '0' . $dec_sep . '00' : '0'); // output zero
		} else { // value
			if (floor($number) == $number) { // whole number
				$money = number_format($number, ($cents == 2 ? 2 : 0), $dec_sep, $tho_sep); // format
			} else { // cents
				$money = number_format(round($number, 2), ($cents == 0 ? 0 : 2), $dec_sep, $tho_sep); // format
			} // integer or decimal
		} // value
		return $money;
	} // numeric
} // formatMoney


function PricerrTheme_formats_special($number, $cents = 1)
{ // cents: 0=never, 1=if needed, 2=always

	$dec_sep = '.';
	$tho_sep = ',';

	//dec,thou

	if (is_numeric($number)) { // a number
		if (!$number) { // zero
			$money = ($cents == 2 ? '0' . $dec_sep . '00' : '0'); // output zero
		} else { // value
			if (floor($number) == $number) { // whole number
				$money = number_format($number, ($cents == 2 ? 2 : 0), $dec_sep, ''); // format
			} else { // cents
				$money = number_format(round($number, 2), ($cents == 0 ? 0 : 2), $dec_sep, ''); // format
			} // integer or decimal
		} // value
		return $money;
	} // numeric
} // formatMoney

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

add_action('wp_ajax_update_users_balance', 'PricerrTheme_update_users_balance');
add_action('wp_ajax_update_badge_user', 'PricerrTheme_update_badge_user');
add_action('wp_ajax_update_level_user', 'PricerrTheme_update_level_user');
add_action('wp_ajax_delete_post_image', 'PricerrTheme_delete_post_image');
add_action('wp_ajax_delete_post_video', 'PricerrTheme_delete_post_video');
add_action('wp_ajax_delete_post_extra', 'PricerrTheme_delete_post_extra');

if (!function_exists('PricerrTheme_update_badge_user')) {
	function PricerrTheme_update_badge_user()
	{
		if (current_user_can('manage_options')) {
			if ($_POST['action'] == "update_badge_user") {
				$uid = $_POST['uid'];

				$level0 = $_POST['level0'];
				$level1 = $_POST['level1'];
				$level2 = $_POST['level2'];

				if ($level1 == "1") update_user_meta($uid, 'user_badge', "1");
				if ($level2 == "1") update_user_meta($uid, 'user_badge', "2");
				if ($level0 == "1") update_user_meta($uid, 'user_badge', "0");
			}
		}
	}
}

if (!function_exists('PricerrTheme_update_level_user')) {
	function PricerrTheme_update_level_user()
	{
		if (current_user_can('manage_options')) {
			if ($_POST['action'] == "update_level_user") {
				$uid = $_POST['uid'];

				$level1 = $_POST['level1'];
				$level2 = $_POST['level2'];
				$level3 = $_POST['level3'];
				$level0 = $_POST['level0'];

				if ($level1 == "1") update_user_meta($uid, 'user_level', "1");
				if ($level2 == "1") update_user_meta($uid, 'user_level', "2");
				if ($level3 == "1") update_user_meta($uid, 'user_level', "3");
				if ($level0 == "1") update_user_meta($uid, 'user_level', "0");

			}
		}
	}
}

if (!function_exists('PricerrTheme_update_users_balance')) {
	function PricerrTheme_update_users_balance()
	{
		if (current_user_can('manage_options')) {
			if ($_POST['action'] == "update_users_balance") {
				$uid = $_POST['uid'];
				if (!empty($_POST['increase_credits'])) {
					if ($_POST['increase_credits'] > 0)
						if (is_numeric($_POST['increase_credits'])) {
							$cr = PricerrTheme_get_credits($uid);
							PricerrTheme_update_credits($uid, $cr + $_POST['increase_credits']);

							$reason = __('Payment received from Site Admin', 'PricerrTheme');
							PricerrTheme_add_history_log('1', $reason, $_POST['increase_credits'], $uid);

						}
				} else {
					if ($_POST['decrease_credits'] > 0)
						if (is_numeric($_POST['decrease_credits'])) {
							$cr = PricerrTheme_get_credits($uid);
							PricerrTheme_update_credits($uid, $cr - $_POST['decrease_credits']);

							$reason = __('Payment taken from Site Admin', 'PricerrTheme');
							PricerrTheme_add_history_log('0', $reason, $_POST['decrease_credits'], $uid);
						}

				}
				//echo auctionTheme_get_credits($uid);
				echo PricerrTheme_get_show_price(PricerrTheme_get_credits($uid));

			}
		}
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_post_meta($pid, $meta) {
	// Prevent change jobid on post new lesson page to get other post data
	if(PricerrTheme_post_auther_is_current_user($pid)) {
		return htmlspecialchars(trim(get_post_meta($pid, $meta, true)));
	}
	return "";
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_update_post_meta($pid, $meta, $value) {
	// Prevent change jobid on post new lesson page to get other post data
	if(PricerrTheme_post_auther_is_current_user($pid)) {
		update_post_meta($pid, $meta, $value);
	}
}

function PricerrTheme_get_post_data($pid, $meta) {
	return ( trim($_POST[$meta]) == true ) ? htmlspecialchars(trim(stripslashes($_POST[$meta]))) : PricerrTheme_get_post_meta($pid, $meta);
}

function PricerrTheme_post_auther_is_current_user($pid) {
	if ( is_wp_error(get_post_field('post_author', $pid)) ) { return false; }
	if (empty(wp_get_current_user()->ID)) { return false; }
	return (get_post_field('post_author', $pid) == wp_get_current_user()->ID);
}
/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_credits($uid) {
	$c = get_user_meta($uid, 'credits', true);
	if (empty($c)) {
		update_user_meta($uid, 'credits', "0");
		return 0;
	}
	return $c;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_update_credits($uid, $am) {
	update_user_meta($uid, 'credits', $am);
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_add_history_log($tp, $reason, $amount, $uid, $uid2 = '') {
	$tm = current_time('timestamp', 0);
	global $wpdb;

	$s = "insert into " . $wpdb->prefix . "job_payment_transactions (tp, reason, amount, uid, datemade, uid2)
	values('$tp','$reason','$amount','$uid','$tm','$uid2')";
	$wpdb->query($s);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_mail_from($old) {
	$PricerrTheme_email_addr_from = get_option('PricerrTheme_email_addr_from');
	$PricerrTheme_email_addr_from = trim($PricerrTheme_email_addr_from);

	if (empty($PricerrTheme_email_addr_from)) {
		return $PricerrTheme_email_addr_from;
	}

	return $old;
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_mail_from_name($old) {
	$PricerrTheme_email_name_from = get_option('PricerrTheme_email_name_from');
	$PricerrTheme_email_name_from = trim($PricerrTheme_email_name_from);

	if (empty($PricerrTheme_email_name_from)) {
		return $PricerrTheme_email_name_from;
	}

	return $old;
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_browse_pm_link($pg) {
	global $wpdb, $wp_rewrite, $wp_query;
	$third_page = $_GET['priv_act'];

	$using_perm = PricerrTheme_using_permalinks();

	if ($using_perm) $privurl_m = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')) . "?priv_act=inbox&pj=" . $pg;
	else $privurl_m = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_priv_mess_page_id') . "&priv_act=inbox&pj=" . $pg;
	return $privurl_m;
}


function PricerrTheme_get_browse_pm_link2($pg) {
	global $wpdb, $wp_rewrite, $wp_query;
	$third_page = $_GET['priv_act'];

	$using_perm = PricerrTheme_using_permalinks();

	if ($using_perm) $privurl_m = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')) . "?priv_act=sent-items&pj=" . $pg;
	else $privurl_m = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_priv_mess_page_id') . "&priv_act=sent-items&pj=" . $pg;
	return $privurl_m;
}

if (!function_exists('PricerrTheme_send_email')) {
	function PricerrTheme_send_email($recipients, $subject = '', $message = '') {

		$PricerrTheme_email_addr_from = get_option('PricerrTheme_email_addr_from');
		$PricerrTheme_email_name_from = get_option('PricerrTheme_email_name_from');

		if (empty($PricerrTheme_email_name_from)) $PricerrTheme_email_name_from = "Pricerr Theme";
		if (empty($PricerrTheme_email_addr_from)) $PricerrTheme_email_addr_from = "PricerrTheme@wordpress.org";

		$headers = 'From: ' . $PricerrTheme_email_name_from . ' <' . $PricerrTheme_email_addr_from . '>' . PHP_EOL;
		$PricerrTheme_allow_html_emails = get_option('PricerrTheme_allow_html_emails');
		if ($PricerrTheme_allow_html_emails != "yes") $html = false;
		else $html = true;


		if ($html) {
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: " . get_bloginfo('html_type') . "; charset=\"" . get_bloginfo('charset') . "\"\n";
			$mailtext = "<html><head><title>" . $subject . "</title></head><body>" . nl2br($message) . "</body></html>";
			return wp_mail($recipients, $subject, $mailtext, $headers);

		} else {
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: text/plain; charset=\"" . get_bloginfo('charset') . "\"\n";
			$message = preg_replace('|&[^a][^m][^p].{0,3};|', '', $message);
			$message = preg_replace('|&amp;|', '&', $message);
			$mailtext = wordwrap(strip_tags($message), 80, "\n");
			return wp_mail($recipients, $subject, $mailtext, $headers);
		}


	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_create_auto_draft($uid)
{
	$my_post = array();
	$my_post['post_title'] = 'Auto Draft';
	$my_post['post_type'] = 'job';
	$my_post['post_status'] = 'auto-draft';
	$my_post['post_author'] = $uid;
	return wp_insert_post($my_post, true);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_auto_draft($uid)
{
	global $wpdb;
	$querystr = "
		SELECT distinct wposts.*
		FROM $wpdb->posts wposts where
		wposts.post_author = '$uid' AND wposts.post_status = 'auto-draft'
		AND wposts.post_type = 'job'
		ORDER BY wposts.ID DESC LIMIT 1 ";

	$row = $wpdb->get_results($querystr, OBJECT);
	if (count($row) > 0) {
		$row = $row[0];
		return $row->ID;
	} else {
		return PricerrTheme_create_auto_draft($uid);
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_using_permalinks()
{
	global $wp_rewrite;
	if ($wp_rewrite->using_permalinks()) return true;
	else return false;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_post_new_with_pid_stuff_thg($pid)
{
	$using_perm = PricerrTheme_using_permalinks();
	if ($using_perm) {
		return get_permalink(get_option('PricerrTheme_post_new_page_id')) . "?jobid=" . $pid;
	} else {
		return get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_post_new_page_id') . "&jobid=" . $pid;
	}
}

function PricerrTheme_get_user_flag($uid)
{
	$opt = get_option('PricerrTheme_en_country_flags');


	if ($opt == 'yes') {
		$code = 'us';

		$ip = get_user_meta($uid, 'ip_reg', true);

		$code = PricerrTheme_get_country_code_of_ip($ip);
		$code = strtolower($code);

		if (empty($code)) $code = 'us';

		$code = apply_filters('PricerrTheme_code_country_ip', $code);

		return '<img src="' . get_bloginfo('template_url') . '/images/flags/' . $code . '.png" />';

	}
}

function PricerrTheme_get_user_country($uid)
{
	$opt = get_option('PricerrTheme_en_country_flags');


	if ($opt == 'yes') {
		$code = 'us';

		$ip = get_user_meta($uid, 'ip_reg', true);

		$code = PricerrTheme_get_country_code_of_ip($ip);
		$code = strtolower($code);

		if (empty($code)) $code = 'us';

		$code = apply_filters('PricerrTheme_code_country_ip', $code);

		return $code;

	}
}

add_filter('pre_get_posts', 'PricerrTheme_my_get_posts');
add_filter('pre_get_posts', 'PricerrTheme_posts_date_filter');

function PricerrTheme_my_get_posts($query)
{
	if (is_home() && $query->is_main_query()) {
		$query->set('post_type', array('job'));
	}
}

function PricerrTheme_posts_date_filter($query)
{
	if (is_tax() && $query->is_main_query()) {
		$query->set( 'meta_query', array(
			array(
				'key' => 'start_date',
				'value' => '2014-03-05'
			)
		));
	}
}

function Pricerr_sitemile_filter_ttl($title)
{
	global $skm_ttl;
	return "asd" . $skm_ttl;
}

function PricerrTheme_template_redirect()
{
	//---------
	global $wp_query, $wp_rewrite, $post;
	global $wp;

	$paagee = $wp_query->query_vars['my_custom_page_type'];
	$jb_action = $wp_query->query_vars['jb_action'];

	$post_parent = $post->post_parent;

	$my_pid = $post->ID;
	$PricerrTheme_post_new_page_id = get_option('PricerrTheme_post_new_page_id');
	$PricerrTheme_my_account_page_id = get_option('PricerrTheme_my_account_page_id');
	$PricerrTheme_my_account_priv_mess_page_id = get_option('PricerrTheme_my_account_priv_mess_page_id');
	$PricerrTheme_my_account_reviews_page_id = get_option('PricerrTheme_my_account_reviews_page_id');
	$PricerrTheme_my_account_sales_page_id = get_option('PricerrTheme_my_account_sales_page_id');
	$PricerrTheme_my_account_shopping_page_id = get_option('PricerrTheme_my_account_shopping_page_id');
	$PricerrTheme_my_account_payments_page_id = get_option('PricerrTheme_my_account_payments_page_id');
	$PricerrTheme_my_account_personal_info_page_id = get_option('PricerrTheme_my_account_personal_info_page_id');

	$PricerrTheme_pay_for_posting_job_page_id = get_option('PricerrTheme_pay_for_posting_job_page_id');

//    if (isset($_GET['get_subcats_for_me'])) {
//        $cat_id = $_POST['queryString'];
//        if (empty($cat_id)) {
//            echo "";
//        } else {
//            echo PricerrTheme_get_subcategories($cat_id ,null ,__('Select Subcategory', 'PricerrTheme'));
//        }
//        die();
//    }

	if (isset($_GET['get_subcats_for_me'])) {
		$cat_id = $_POST['queryString'];
		if (!empty($cat_id)) {
			echo PricerrTheme_get_categories_click(
				$cat_id,
				'job_subcat',
				'',
				'Select Subcategory',
				array(
					'do_input'
				,'post-new-textbox'
				)
			);
		} else {
			$html = '<select class="do_input post-new-textbox" >'
			        . '<option>' . __('Select Subcategory', 'PricerrTheme') . '</option>'
			        . '</select>';
			echo $html;
		}
		die();
	}

	global $wp_rewrite;

	if (isset($_GET['return_chained'])) {
		include 'lib/gateways/return_chained.php';
		die();
	}

	if ($my_pid == $PricerrTheme_my_account_page_id or $post_parent == $PricerrTheme_my_account_page_id or $PricerrTheme_pay_for_posting_job_page_id == $my_pid) {
		if (!is_user_logged_in()) {
			wp_redirect(PricerrTheme_login_url_with_redirect());
			exit;
		}
	}

	if (isset($_GET['switch_grd'])) {

		$_SESSION['view_tp'] = $_GET['switch_grd'];
		wp_redirect($_GET['get_urls']);
		die();

	}

	if (isset($_GET['switch_htu'])) {

		$_SESSION['htu_cat'] = $_GET['switch_htu'];
		wp_redirect($_GET['get_urls']);
		die();

	}

	if (isset($_GET['switch_filter'])) {

		$_SESSION['current_order'] = $_GET['switch_filter'];
		wp_redirect($_GET['get_urls']);
		die();

	}

	if (isset($_GET['start_date_filter'])) {

		$_SESSION['start_date_filter'] = $_GET['start_date_filter'];
		wp_redirect($_GET['get_urls']);
		die();

	}

	if (isset($_GET['college_filter'])) {

		$_SESSION['college_filter'] = $_GET['college_filter'];
		wp_redirect($_GET['get_urls']);
		die();

	}

	//-----------------------------------------------------------------------------------
//    if (isset($_GET['posting_new'])) {
//
//        $_SESSION['i_will'] = $_POST['i_will'];
//        $_SESSION['job_cost'] = $_POST['job_cost'];
//
//        wp_redirect(get_permalink(get_option('PricerrTheme_post_new_page_id')));
//        die();
//    }

	if ($jb_action == "cancel_job_request") {
		include('lib/cancel_job_request.php');
		die();
	}

	if ($jb_action == "pay_featured") {
		$method = $wp_query->query_vars['method'];

		include('lib/gateways/pay_listing_' . $method . '.php');
		die();
	}

	if ($jb_action == "user_profile") {
		include('lib/user_profile.php');
		die();
	}

	if ($jb_action == "purchase_this") {
		include('lib/purchase-this.php');
		die();
	}

	if ($jb_action == "request_mutual_cancelation") {
		include('lib/request_mutual_cancelation.php');
		die();
	}

	if ($jb_action == "close_job") {
		include('lib/close-job.php');
		die();
	}

	if ($jb_action == "edit_job") {
		include('lib/edit_job.php');
		die();
	}

	if ($jb_action == "mark_delivered") {
		include('lib/mark_delivered.php');
		die();
	}

	if ($jb_action == "mark_completed") {
		include('lib/mark_completed.php');
		die();
	}

	if ($jb_action == "submit_request") {
		include('lib/submit_request.php');
		die();
	}

	if ($jb_action == "deactivate_job") {
		include('lib/deactivate_job.php');
		die();
	}

	if ($jb_action == "activate_job") {
		include('lib/activate_job.php');
		die();
	}

	if ($jb_action == "chat_box") {
		include('lib/chat_box.php');
		die();
	}

	if ($jb_action == "delete_job") {
		include('lib/delete_job.php');
		die();
	}

	if (!empty($_GET['payment_response_listing'])) {
		$sk = $_GET['payment_response_listing'];
		include('lib/gateways/listing_response_' . $sk . '.php');
		die();
	}

	if ($jb_action == 'pay_featured_credits') {
		include('lib/gateways/pay_featured_listing_credits.php');
		die();
	}

	if (!empty($_GET['payment_response'])) {
		$sk = $_GET['payment_response'];
		include('lib/gateways/' . $sk . '.php');
		die();
	}

	if (!empty($_GET['pay_for_item'])) {
		$sk = $_GET['pay_for_item'];
		include('lib/gateways/' . $sk . '.php');
		die();
	}

	if (!empty($_GET['withdrawal_action'])) {
		$sk = $_GET['withdrawal_action'];
		include('lib/gateways/' . $sk . '.php');
		die();
	}

	// check if logged in when access the post new page
	if ($my_pid == $PricerrTheme_post_new_page_id) {
		if (!is_user_logged_in()) {
			wp_redirect(PricerrTheme_login_url_with_redirect());
			exit;
		}

		$set_ad = isset($_GET['jobid']) ?  0 : 1;
		global $current_user;
		get_currentuserinfo();

		if ($set_ad == 1) {
			$pid = PricerrTheme_get_auto_draft($current_user->ID);
			wp_redirect(PricerrTheme_post_new_with_pid_stuff_thg($pid));
		}

		include 'lib/post_new_post.php';
	}

	// check if logged in when accessing the my account page
	if ($my_pid == $PricerrTheme_my_account_page_id) {
		if (!is_user_logged_in()) {
			wp_redirect(PricerrTheme_login_url_with_redirect());
			exit;
		}
	}

	/*if ($wp->query_vars["post_type"] == "job")
	{
	     if(is_archive())
		 {
			 include 'archive-job.php';
			 die();
		 }		    
	     elseif (have_posts())
	     {
	         include('job.php');
	         die();
		 }
	     
	 }*/

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_login_url()
{
	return get_bloginfo('siteurl') . "/wp-login.php";
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_login_url_with_redirect()
{
	return PricerrTheme_login_url() . '?redirect_to=' . PricerrTheme_get_current_url();
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_variale_cost_dropdown($c = '', $pr = '')
{
	global $wpdb;

	$ss = "select * from " . $wpdb->prefix . "job_var_costs order by cost asc";
	$r = $wpdb->get_results($ss);
	$c = '<select name="job_cost" class="' . $c . '">';

	foreach ($r as $row) {
		$selected = "";
		if ($row->cost == $pr) $selected = "selected='selected'";
		$c .= '<option value="' . $row->cost . '" ' . $selected . '>' . PricerrTheme_get_show_price($row->cost) . '</option>';
	}

	return $c . '</select>';
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_get_categories_slug')) {
	function PricerrTheme_get_categories_slug($taxo, $selected = "", $include_empty_option = "", $ccc = "")
	{
		$args = "orderby=name&order=ASC&hide_empty=0&parent=0";
		$terms = get_terms($taxo, $args);

		$ret = '<select name="' . $taxo . '" class="' . $ccc . '" id="' . $ccc . '">';
		if (!empty($include_empty_option)) {

			if ($include_empty_option == "1") $include_empty_option = "Select";
			$ret .= "<option value=''>" . $include_empty_option . "</option>";
		}

		if (empty($selected)) $selected = -1;

		foreach ($terms as $term) {
			$id = $term->slug;
			$ide = $term->term_id;

			$ret .= '<option ' . ($selected == $id ? "selected='selected'" : " ") . ' value="' . $id . '">' . $term->name . '</option>';

			$args = "orderby=name&order=ASC&hide_empty=0&parent=" . $ide;
			$sub_terms = get_terms($taxo, $args);

			foreach ($sub_terms as $sub_term) {
				$sub_id = $sub_term->slug;
				$ret .= '<option ' . ($selected == $sub_id ? "selected='selected'" : " ") . ' value="' . $sub_id . '">&nbsp; &nbsp;|&nbsp;  ' . $sub_term->name . '</option>';

				$args2 = "orderby=name&order=ASC&hide_empty=0&parent=" . $sub_id;
				$sub_terms2 = get_terms($taxo, $args2);

				foreach ($sub_terms2 as $sub_term2) {
					$sub_id2 = $sub_term2->term_id;
					$ret .= '<option ' . ($selected == $sub_id2 ? "selected='selected'" : " ") . ' value="' . $sub_id2 . '">&nbsp; &nbsp; &nbsp; &nbsp;|&nbsp;  
				' . $sub_term2->name . '</option>';

				}

			}

		}

		$ret .= '</select>';

		return $ret;

	}
}


if (!function_exists('PricerrTheme_get_categories_slug_2_top_header')) {
	function PricerrTheme_get_categories_slug_2_top_header($taxo, $selected = "", $include_empty_option = "", $ccc = "")
	{
		$args = "orderby=name&order=ASC&hide_empty=0&parent=0";
		$terms = get_terms($taxo, $args);

		$ret = '<select name="' . $taxo . '" class="' . $ccc . '" id="' . $ccc . '">';
		if (!empty($include_empty_option)) {

			if ($include_empty_option == "1") $include_empty_option = "Select";
			$ret .= "<option value=''>" . $include_empty_option . "</option>";
		}

		if (empty($selected)) $selected = -1;

		foreach ($terms as $term) {
			$id = $term->slug;
			$ide = $term->term_id;

			$ret .= '<option ' . ($selected == $id ? "selected='selected'" : " ") . ' value="' . $id . '">' . $term->name . '</option>';

			$args = "orderby=name&order=ASC&hide_empty=0&parent=" . $ide;
			$sub_terms = get_terms($taxo, $args);

			foreach ($sub_terms as $sub_term) {
				$sub_id = $sub_term->slug;
				$ret .= '<option ' . ($selected == $sub_id ? "selected='selected'" : " ") . ' value="' . $sub_id . '">&nbsp; &nbsp;' . $sub_term->name . '</option>';

				$args2 = "orderby=name&order=ASC&hide_empty=0&parent=" . $sub_id;
				$sub_terms2 = get_terms($taxo, $args2);

				foreach ($sub_terms2 as $sub_term2) {
					$sub_id2 = $sub_term2->term_id;
					$ret .= '<option ' . ($selected == $sub_id2 ? "selected='selected'" : " ") . ' value="' . $sub_id2 . '">&nbsp; &nbsp; &nbsp; &nbsp;|&nbsp;  
				' . $sub_term2->name . '</option>';

				}

			}

		}

		$ret .= '</select>';

		return $ret;

	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_show_price_in_front()
{
	$opt = get_option('PricerrTheme_currency_position');
	if ($opt == "front") return true;
	return false;
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
if (!function_exists('PricerrTheme_get_categories')) {
	function PricerrTheme_get_categories($taxo, $selected = "", $include_empty_option = "", $ccc = "")
	{
		$args = "orderby=name&order=ASC&hide_empty=0&parent=0";
		$terms = get_terms($taxo, $args);

		$ret = '<select name="' . $taxo . '" class="' . $ccc . '" id="' . $ccc . '">';
		if (!empty($include_empty_option)) $ret .= "<option value=''>" . $include_empty_option . "</option>";

		if (empty($selected)) $selected = -1;

		foreach ($terms as $term) {
			$id = $term->term_id;

			$ret .= '<option ' . ($selected == $id ? "selected='selected'" : " ") . ' value="' . $id . '">' . $term->name . '</option>';

			$args = "orderby=name&order=ASC&hide_empty=0&parent=" . $id;
			$sub_terms = get_terms($taxo, $args);

			foreach ($sub_terms as $sub_term) {
				$sub_id = $sub_term->term_id;
				$ret .= '<option ' . ($selected == $sub_id ? "selected='selected'" : " ") . ' value="' . $sub_id . '">&nbsp; &nbsp;|&nbsp;  ' . $sub_term->name . '</option>';

				$args2 = "orderby=name&order=ASC&hide_empty=0&parent=" . $sub_id;
				$sub_terms2 = get_terms($taxo, $args2);

				foreach ($sub_terms2 as $sub_term2) {
					$sub_id2 = $sub_term2->term_id;
					$ret .= '<option ' . ($selected == $sub_id2 ? "selected='selected'" : " ") . ' value="' . $sub_id2 . '">&nbsp; &nbsp; &nbsp; &nbsp;|&nbsp; 
				 ' . $sub_term2->name . '</option>';

				}
			}
		}

		$ret .= '</select>';

		return $ret;

	}
}

if (!function_exists('PricerrTheme_get_categories_click')) {
	function PricerrTheme_get_categories_click($parent_id, $name, $selected = "", $empty_option = "", $class = "", $attributes = "")
	{
		$args = "orderby=name&order=ASC&hide_empty=0&parent=" . $parent_id;
		$terms = empty($args) ? array() : get_terms('job_cat', $args);
		// $terms = get_terms('job_cat', $args);

		$ret = '<select name="' . $name . '" class="' . implode(" ", $class) . '" ' . $attributes . '>';

		if (empty($selected)) {
			$selected = -1;
		}

		if (count($terms) > 0) {

			if (!empty($empty_option)) {
				$ret .= "<option value=''>" . __($empty_option, 'PricerrTheme') . "</option>";
			}

			foreach ($terms as $term) {
				$id = $term->term_id;
				$ret .= '<option ' . ($selected == $id ? "selected='selected'" : " ") . ' value="' . $id . '">' . $term->name . '</option>';
			}

		} elseif ($parent_id == 0) {
			$ret .= "<option value=''>" . __($empty_option, 'PricerrTheme') . "</option>";
		} else {
			$ret .= '<option>' . __('No Subcategory Available', 'PricerrTheme') . '</option>';
		}

		$ret .= '</select>';

		return $ret;
	}
}

if (!function_exists('PricerrTheme_get_subcategories')) {
	function PricerrTheme_get_subcategories($cat_id, $selected = "", $include_empty_option = "")
	{
		$args = "orderby=name&order=ASC&hide_empty=0&parent=" . $cat_id;
		$sub_terms = get_terms('job_cat', $args);

		$ret = '<select class="do_input post-new-textbox" name="subcat">';
		if (!empty($include_empty_option))  $ret .= '<option value="">' . $include_empty_option . '</option>';

		if (empty($selected)) $selected = -1;

		foreach ($sub_terms as $sub_term) {
			$sub_id = $sub_term->term_id;
			$ret .= '<option ' . ($selected == $sub_id ? "selected='selected'" : " ") . ' value="' . $sub_id . '">' . $sub_term->name . '</option>';
		}
		$ret .= "</select>";
		return $ret;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_framework_init_widgets()
{
	register_sidebar(array(
		'name' => __('PricerrTheme - Stretch Wide MainPage Sidebar', 'PricerrTheme'),
		'id' => 'main-stretch-area',
		'description' => __('This sidebar is site wide stretched in home page, just under the main menu area.', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('PricerrTheme - Footer Stretch Sidebar', 'PricerrTheme'),
		'id' => 'footer-stretch-area',
		'description' => __('This sidebar is site wide stretched sidebar, just above the footer area.', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('Single Page Sidebar', 'PricerrTheme'),
		'id' => 'single-widget-area',
		'description' => __('The sidebar area of the single blog post', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('Other Page Sidebar', 'PricerrTheme'),
		'id' => 'other-page-area',
		'description' => __('The sidebar area of any other page than the defined ones', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('Home Page Sidebar - Right', 'PricerrTheme'),
		'id' => 'home-right-widget-area',
		'description' => __('The right sidebar area of the homepage', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('Home Page Sidebar - Left', 'PricerrTheme'),
		'id' => 'home-left-widget-area',
		'description' => __('The left sidebar area of the homepage', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('First Footer Widget Area', 'PricerrTheme'),
		'id' => 'first-footer-widget-area',
		'description' => __('The first footer widget area', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	// Area 4, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => __('Second Footer Widget Area', 'PricerrTheme'),
		'id' => 'second-footer-widget-area',
		'description' => __('The second footer widget area', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	// Area 5, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => __('Third Footer Widget Area', 'PricerrTheme'),
		'id' => 'third-footer-widget-area',
		'description' => __('The third footer widget area', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	// Area 6, located in the footer. Empty by default.
	register_sidebar(array(
		'name' => __('Fourth Footer Widget Area', 'PricerrTheme'),
		'id' => 'fourth-footer-widget-area',
		'description' => __('The fourth footer widget area', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('PricerrTheme - Lesson Single Sidebar', 'PricerrTheme'),
		'id' => 'job-widget-area',
		'description' => __('The sidebar of the single auction page', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __('PricerrTheme - HomePage Area', 'PricerrTheme'),
		'id' => 'main-page-widget-area',
		'description' => __('The sidebar for the main page, just under the slider.', 'PricerrTheme'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="title widget-title">',
		'after_title' => '</h4>',
	));
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_i_will_strg()
{
	$opt = get_option('PricerrTheme_i_will_strg');
	if (empty($opt)) return __("I will provide", "PricerrTheme");

	return $opt;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_for_strg()
{
	$opt = get_option('PricerrTheme_for_strg');
	if (empty($opt)) return __("for", "PricerrTheme");

	return $opt;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_admin_notices()
{

	if (!function_exists('wp_pagenavi')) {
		echo '<div class="updated">
		   <p>For the <strong>Pricerr Theme</strong> you need to install the wp pagenavi plugin. 
		   Install it from <a href="http://wordpress.org/extend/plugins/wp-pagenavi"><strong>here</strong></a>.</p>
		</div>';
	}

	if (!function_exists('bcn_display')) {
		echo '<div class="updated">
		   <p>For the <strong>Pricerr Theme</strong> you need to install the Breadcrumb NavXT plugin. 
		   Install it from <a href="http://wordpress.org/extend/plugins/breadcrumb-navxt/"><strong>here</strong></a>.</p>
		</div>';
	}


}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_buyer_requests_cancellation($pid, $receiver, $message)
{
	$enable = get_option('PricerrTheme_emails_mutual_buyer_enable');
	$subject = get_option('PricerrTheme_emails_mutual_buyer_subject');
	$message = get_option('PricerrTheme_emails_mutual_buyer_message');

	if ($enable != "no"):

		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_link##', '##job_name##', '##buyer_message##');
		$replace = array($receiver->user_login, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name, $message);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;


		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

function PricerrTheme_send_email_when_seller_requests_cancellation($pid, $receiver, $message)
{
	$enable = get_option('PricerrTheme_emails_mutual_seller_enable');
	$subject = get_option('PricerrTheme_emails_mutual_seller_subject');
	$message = get_option('PricerrTheme_emails_mutual_seller_message');

	if ($enable != "no"):

		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##username##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_link##', '##job_name##', '##seller_message##');
		$replace = array($receiver->user_login, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name, $message);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;

		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_send_email_when_job_purchased_4_buyer($oid, $pid, $receiver, $sender = '')
{
	$enable = get_option('PricerrTheme_buyer_purchase_job_email_enable');
	$subject = get_option('PricerrTheme_buyer_purchase_job_email_subject');
	$message = get_option('PricerrTheme_buyer_purchase_job_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$sender = get_userdata($sender);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##receiver_username##', '##sender_username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##job_link##', '##job_name##');
		$replace = array($receiver->user_login, $sender->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_job_purchased_4_seller($oid, $pid, $receiver, $sender = '')
{
	$enable = get_option('PricerrTheme_seller_purchase_job_email_enable');
	$subject = get_option('PricerrTheme_seller_purchase_job_email_subject');
	$message = get_option('PricerrTheme_seller_purchase_job_email_message');

	if ($enable != "no"):

		$post = get_post($pid);

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$sender = get_userdata($sender);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##receiver_username##', '##sender_username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##job_link##', '##job_name##');
		$replace = array($receiver->user_login, $sender->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_buyer_closes_the_job($oid, $pid, $receiver, $sender = '')
{
	$enable = get_option('PricerrTheme_order_closed_by_seller_email_enable');
	$subject = get_option('PricerrTheme_order_closed_by_seller_email_subject');
	$message = get_option('PricerrTheme_order_closed_by_seller_email_message');

	if ($enable != "no"):

		$post = get_post($pid);
		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$sender = get_userdata($sender);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##receiver_username##', '##sender_username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##job_link##', '##job_name##');
		$replace = array($receiver->user_login, $sender->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_withdraw_requested($receiver, $method, $amount)
{
	$enable = get_option('PricerrTheme_withdraw_request_email_enable');
	$subject = get_option('PricerrTheme_withdraw_request_email_subject');
	$message = get_option('PricerrTheme_withdraw_request_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);


		$find = array('##username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##amount_withdrawn##', '##withdraw_method##');
		$replace = array($receiver->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $amount, $method);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_withdraw_completed($receiver, $method, $amount)
{
	$enable = get_option('PricerrTheme_withdraw_released_email_enable');
	$subject = get_option('PricerrTheme_withdraw_released_email_subject');
	$message = get_option('PricerrTheme_withdraw_released_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);

		$find = array('##username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##amount_withdrawn##', '##withdraw_method##');
		$replace = array($receiver->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $amount, $method);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_withdraw_rejected($receiver, $method, $amount)
{
	$enable = get_option('PricerrTheme_withdraw_rejected_email_enable');
	$subject = get_option('PricerrTheme_withdraw_rejected_email_subject');
	$message = get_option('PricerrTheme_withdraw_rejected_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);


		$find = array('##username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##amount_withdrawn##', '##withdraw_method##');
		$replace = array($receiver->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $amount, $method);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_send_email_posted_job_not_approved($pid)
{
	$enable = get_option('PricerrTheme_new_job_email_not_approved_enable');
	$subject = get_option('PricerrTheme_new_job_email_not_approved_subject');
	$message = get_option('PricerrTheme_new_job_email_not_approved_message');

	if ($enable != "no"):

		$post = get_post($pid);
		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);

		$find = array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_name##', '##job_link##');
		$replace = array($user->user_login, $user->user_email, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_name, get_permalink($pid));
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $user->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_posted_job_approved($pid)
{
	$enable = get_option('PricerrTheme_new_job_email_approved_enable');
	$subject = get_option('PricerrTheme_new_job_email_approved_subject');
	$message = get_option('PricerrTheme_new_job_email_approved_message');

	if ($enable != "no"):

		$post = get_post($pid);
		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_name##', '##job_link##');
		$replace = array($user->user_login, $user->user_email, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_name, $job_link);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $user->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_job_completed($oid, $pid, $receiver, $sender = '')
{
	$enable = get_option('PricerrTheme_job_completed_email_enable');
	$subject = get_option('PricerrTheme_job_completed_email_subject');
	$message = get_option('PricerrTheme_job_completed_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##receiver_username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##job_link##', '##job_name##');
		$replace = array($receiver->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_job_delivered($oid, $pid, $receiver, $sender = '')
{
	$enable = get_option('PricerrTheme_job_finished_email_enable');
	$subject = get_option('PricerrTheme_job_finished_email_subject');
	$message = get_option('PricerrTheme_job_finished_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##receiver_username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##job_link##', '##job_name##');
		$replace = array($receiver->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_new_PM($sender, $receiver, $subject2 = '', $message = '')
{
	$enable = get_option('PricerrTheme_private_message_email_enable');
	$subject = get_option('PricerrTheme_private_message_email_subject');
	$message = get_option('PricerrTheme_private_message_email_message');

	if ($enable != "no"):

		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$sender = get_userdata($sender);
		$cnv_lnk = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id'));


		$find = array('##receiver_username##', '##sender_username##', '##private_mess_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##subject_of_message##', '##message##');
		$replace = array($receiver->user_login, $sender->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $subject2, $message);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_feedback_left($pid, $sender, $receiver)
{
	$enable = get_option('PricerrTheme_feedback_received_seller_email_enable');
	$subject = get_option('PricerrTheme_feedback_received_seller_email_subject');
	$message = get_option('PricerrTheme_feedback_received_seller_email_message');


	if ($enable != "no"):
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$sender = get_userdata($sender);
		$cnv_lnk = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id'));

		$post = get_post($pid);
		$job_name = PricerrTheme_wrap_the_title($post->post_title, $pid);
		$job_link = get_permalink($pid);

		$find = array('##receiver_username##', '##sender_username##', '##private_mess_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##',
			'##my_account_url##', '##job_link##', '##job_name##');
		$replace = array($receiver->user_login, $sender->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $job_link, $job_name);
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_when_new_chat($pid, $oid, $sender, $receiver, $message = '')
{
	$enable = get_option('PricerrTheme_chat_order_email_enable');
	$subject = get_option('PricerrTheme_chat_order_email_subject');
	$message = get_option('PricerrTheme_chat_order_email_message');

	if ($enable != "no"):

		$post = get_post($pid);
		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));

		$receiver = get_userdata($receiver);
		$sender = get_userdata($sender);
		$cnv_lnk = get_bloginfo('siteurl') . "/my-account/private-messages/?priv_act=send";

		$postttl = PricerrTheme_wrap_the_title($post->post_title, $pid);

		$find = array('##receiver_username##', '##sender_username##', '##conversation_page_link##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_name##', '##job_link##');
		$replace = array($receiver->user_login, $sender->user_login, $cnv_lnk, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $postttl, get_permalink($pid));
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = $receiver->user_email;
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_posted_job_not_approved_admin($pid)
{
	$enable = get_option('PricerrTheme_new_job_email_not_approve_admin_enable');
	$subject = get_option('PricerrTheme_new_job_email_not_approve_admin_subject');
	$message = get_option('PricerrTheme_new_job_email_not_approve_admin_message');

	if ($enable != "no"):

		$post = get_post($pid);
		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));


		$find = array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_name##', '##job_link##');
		$replace = array($user->user_login, $user->user_email, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $post->post_title, get_permalink($pid));
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = get_bloginfo('admin_email');
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_send_email_posted_job_approved_admin($pid)
{
	$enable = get_option('PricerrTheme_new_job_email_approve_admin_enable');
	$subject = get_option('PricerrTheme_new_job_email_approve_admin_subject');
	$message = get_option('PricerrTheme_new_job_email_approve_admin_message');

	if ($enable != "no"):

		$post = get_post($pid);
		$user = get_userdata($post->post_author);
		$site_login_url = PricerrTheme_login_url();
		$site_name = get_bloginfo('name');
		$account_url = get_permalink(get_option('PricerrTheme_my_account_page_id'));


		$find = array('##username##', '##username_email##', '##site_login_url##', '##your_site_name##', '##your_site_url##', '##my_account_url##', '##job_name##', '##job_link##');
		$replace = array($user->user_login, $user->user_email, $site_login_url, $site_name, get_bloginfo('siteurl'), $account_url, $post->post_title, get_permalink($pid));
		$message = PricerrTheme_replace_stuff_for_me($find, $replace, $message);
		$subject = PricerrTheme_replace_stuff_for_me($find, $replace, $subject);

		//---------------------------------------------

		$email = get_bloginfo('admin_email');
		PricerrTheme_send_email($email, stripslashes($subject), stripslashes($message));

	endif;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function  PricerrTheme_replace_stuff_for_me($find, $replace, $subject)
{
	$i = 0;
	foreach ($find as $item) {
		$replace_with = $replace[$i];
		$subject = str_replace($item, $replace_with, $subject);
		$i++;
	}

	return $subject;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_get_users_links')) {
	function PricerrTheme_get_users_links()
	{

		global $wpdb, $post, $wp_rewrite, $wp_query, $current_user;
		$current_page = $wp_query->query_vars['my_second_page'];

		get_currentuserinfo();

		$my_pid = $post->ID;
		$post_new_id = get_option('PricerrTheme_post_new_page_id');
		$payments_id = get_option('PricerrTheme_my_account_payments_page_id');
		$account_id = get_option('PricerrTheme_my_account_page_id');
		$shopping_id = get_option('PricerrTheme_my_account_shopping_page_id');
		$sales_id = get_option('PricerrTheme_my_account_sales_page_id');
		$priv_mess_id = get_option('PricerrTheme_my_account_priv_mess_page_id');
		$pers_id = get_option('PricerrTheme_my_account_personal_info_page_id');
		$rev_id = get_option('PricerrTheme_my_account_reviews_page_id');

		if (empty($current_page)) $current_page = 'home';


		$uid = $current_user->ID;
		$PricerrTheme_get_unread_number_messages = PricerrTheme_get_unread_number_messages($uid);

		if ($PricerrTheme_get_unread_number_messages > 0) $sk = ' <span class="the_one_mess">' . $PricerrTheme_get_unread_number_messages . '</span>';
		else $sk = '';

		?>

		<div id="right-sidebar">
			<ul class="xoxo">
				<li class="widget-container widget_text" id="my-account-menu">
					<ul id="my-account-admin-menu">
						<li>
							<a href="<?php echo get_permalink($account_id); ?>" <?php if ($account_id == $my_pid) echo "class='active_link'"; ?>><?php _e("My Lessons", 'PricerrTheme'); ?></a>
						</li>
						<li>
							<a href="<?php echo PricerrTheme_post_new_link(); ?>" class="post-new-btn <?php if ($post_new_id == $my_pid) echo "active_link"; ?>"><?php _e("Post New Lesson", 'PricerrTheme'); ?></a>
						</li>
						<li>
							<a href="<?php echo get_permalink($payments_id); ?>" <?php if ($payments_id == $my_pid) echo "class='active_link'"; ?>><?php _e("Account Balance", 'PricerrTheme'); ?></a>
						</li>
						<li>
							<a href="<?php echo get_permalink($shopping_id); ?>" <?php if ($shopping_id == $my_pid) echo "class='active_link'"; ?>><?php _e("Enrolled Lessons", 'PricerrTheme'); ?></a>
						</li>
						<li>
							<a href="<?php echo get_permalink($sales_id); ?>" <?php if ($sales_id == $my_pid) echo "class='active_link'"; ?>><?php _e("Manage Lessons", 'PricerrTheme'); ?></a>
						</li>
						<li>
							<a href="<?php echo get_permalink($priv_mess_id); ?>" <?php if ($priv_mess_id == $my_pid) echo "class='active_link'"; ?>><?php printf(__("Private Messages %s", 'PricerrTheme'), $sk); ?></a>
						</li>
						<li>
							<a href="<?php echo get_permalink($pers_id); ?>" <?php if ($pers_id == $my_pid) echo "class='active_link'"; ?>><?php _e("Personal Info", 'PricerrTheme'); ?></a>
						</li>
						<li>
							<a href="<?php echo get_permalink($rev_id); ?>" <?php if ($rev_id == $my_pid) echo "class='active_link'"; ?>><?php _e("Reviews/Feedback", 'PricerrTheme'); ?></a>
						</li>
						<?php do_action('PricerrTheme_my_account_main_menu'); ?>

					</ul>


				</li>

				<?php dynamic_sidebar('other-page-area'); ?>

			</ul>
		</div>


	<?php
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_nr_active_jobs($uid)
{
	$meta = array(
		'key' => 'active',
		'value' => "1",
		//'type' => 'numeric',
		'compare' => '='
	);

	$args = array('posts_per_page' => '-1', 'post_type' => 'job', 'author' => $uid, 'meta_query' => array($meta));
	$q = new WP_Query($args);

	return $q->post_count;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_nr_inactive_jobs($uid)
{
	$meta = array(
		'key' => 'active',
		'value' => "0",
		//'type' => 'numeric',
		'compare' => '='
	);

	$args = array('posts_per_page' => '-1', 'post_status' => array('draft', 'publish'), 'post_type' => 'job', 'author' => $uid, 'meta_query' => array($meta));
	$q = new WP_Query($args);

	return $q->post_count;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_nr_in_review_jobs($uid)
{
	$meta = array(
		'key' => 'under_review',
		'value' => "1",
		//'type' => 'numeric',
		'compare' => '='
	);

	$args = array('posts_per_page' => '-1', 'post_status' => 'draft', 'post_type' => 'job', 'author' => $uid, 'meta_query' => array($meta));
	$q = new WP_Query($args);

	return $q->post_count;

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
if (!function_exists('PricerrTheme_get_post_small')) {
	function PricerrTheme_get_post_small($arr = '')
	{

		if ($arr[0] == "winner") $pay_this_me = 1;
		if ($arr[0] == "unpaid") $unpaid = 1;

		$ending = get_post_meta(get_the_ID(), 'ending', true);
		$sec = $ending - time();
		$closed = get_post_meta(get_the_ID(), 'closed', true);
		$active = get_post_meta(get_the_ID(), 'active', true);

		$featured = get_post_meta(get_the_ID(), 'featured', true);
		$paid = get_post_meta(get_the_ID(), 'paid', true);

		$post = get_post(get_the_ID());
		$featured = get_post_meta(get_the_ID(), 'featured', true);
		$under_review = get_post_meta(get_the_ID(), "under_review", true);

		$img_class = "image_class";
		$post = get_post(get_the_ID());

		global $current_user;
		get_currentuserinfo();
		$uid = $current_user->ID;



		?>
	<div class="post" id="post-<?php the_ID(); ?>">

		<?php if ($featured == "1"): ?>
		<!--<div class="featured-four"></div>-->
	<?php endif; ?>

		<div class="padd10_only">
			<div class="image_holder3">
				<a href="<?php the_permalink(); ?>"><img width="65" height="50" class="<?php echo $img_class; ?>" src="<?php echo PricerrTheme_get_first_post_image(get_the_ID(), 65, 50); ?>"/></a>
			</div>
			<div class="title_holder3"><h2><a href="<?php
					the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php
						the_title(); ?></a></h2><br/><?php
				if ($under_review == "1"): ?><span class="pending_review"><?php _e('Pending Review', 'PricerrTheme'); ?></span><?php endif;
				$PricerrTheme_new_job_listing_fee = get_option('PricerrTheme_new_job_listing_fee');
				if ($PricerrTheme_new_job_listing_fee > 0 and $paid == "0"):
					?><span class="pending_review"><?php
					_e('Listing fee not paid', 'PricerrTheme');
					?></span><?php
				endif; ?><a href="<?php
				bloginfo('siteurl'); ?>/?jb_action=delete_job&jobid=<?php the_ID(); ?>" class="del_job"><?php _e('Delete Lesson', 'PricerrTheme'); ?></a><a href="<?php
				bloginfo('siteurl'); ?>/?jb_action=edit_job&jobid=<?php the_ID(); ?>" class="edit_job"><?php _e('Edit Lesson', 'PricerrTheme'); ?></a><?php
				if ($active == "1"): ?><a href="<?php bloginfo('siteurl'); ?>/?jb_action=deactivate_job&jobid=<?php the_ID(); ?>" class="deactivate_job"><?php
					_e('Deactivate Lesson', 'PricerrTheme'); ?></a><?php else: ?><a href="<?php
			bloginfo('siteurl'); ?>/?jb_action=activate_job&jobid=<?php the_ID(); ?>" class="deactivate_job"><?php _e('Activate Lesson', 'PricerrTheme'); ?></a><?php
				endif;
				global $post;
				if ($featured == "0" or ($featured == "1" and $post->post_status != "publish")):

				$using_permalinks = PricerrTheme_using_permalinks();

				if ($using_permalinks) $rdrlnk = get_permalink(get_option('PricerrTheme_pay_for_posting_job_page_id')) . "?mkf=1&jobid=" . get_the_ID();
				else $rdrlnk = get_bloginfo('siteurl') . "/?mkf=1&page_id=" . get_option('PricerrTheme_pay_for_posting_job_page_id') . "&jobid=" . get_the_ID();

				?><!--<a href="<?php echo $rdrlnk; ?>" class="feature_job"><?php _e('Feature Lesson', 'PricerrTheme'); ?></a>--><?php
			endif;

			//<a href="#" class="show_status"><?php _e('Show Status','PricerrTheme');
			//</a> -->

			$using_permalinks = PricerrTheme_using_permalinks();

			if ($using_permalinks) $rdrlnk = get_permalink(get_option('PricerrTheme_pay_for_posting_job_page_id')) . "?jobid=" . get_the_ID();
			else $rdrlnk = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_pay_for_posting_job_page_id') . "&jobid=" . get_the_ID();

			if ($post->post_status == "draft" && $featured == "1" && $paid == "0")
				echo '<div class="not-published-yet">' . sprintf(__('Your lesson is not published yet. Please <b class="pay-feature"><a href="%s">pay the featured fee</a></strong> to publish.', 'PricerrTheme'), $rdrlnk) . '</div>';
			?></div></div></div><?php
	}
}
/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_small_post')) {
	function PricerrTheme_small_post()
	{
		$ending = get_post_meta(get_the_ID(), 'ending', true);
		$sec = $ending - time();
		$location = get_post_meta(get_the_ID(), 'Location', true);
		$featured = get_post_meta(get_the_ID(), 'featured', true);


		$price = get_post_meta(get_the_ID(), 'job_cost', true);
		$closed = get_post_meta(get_the_ID(), 'closed', true);

		?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="image_holder2">
				<?php if ($featured == "1"): ?>
					<div class="featured-three"></div>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>">
					<img width="62" height="50" class="image_class" src="<?php echo PricerrTheme_get_first_post_image2(get_the_ID(), 'my_small_thumbnail_pricerr'); ?>"/>
				</a>
			</div>
			<div class="title_holder2">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<p class="mypostedon2"><?php _e("Posted in", 'PricerrTheme'); ?> <?php echo get_the_term_list(get_the_ID(), 'job_cat', '', ', ', ''); ?></p>
			</div>
		</div>
	<?php
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_first_post_image($pid, $w = 100, $h = 100)
{

	//---------------------
	// build the exclude list
	$exclude = array();

	$args = array(
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => get_the_ID(),
		'meta_key' => 'another_reserved1',
		'meta_value' => '1',
		'numberposts' => -1,
		'post_status' => null,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = $attachment->ID;
			array_push($exclude, $url);
		}
	}

	//-----------------

	$args = array(
		'order' => 'ASC',
		'orderby' => 'post_date',
		'post_type' => 'attachment',
		'post_parent' => $pid,
		'exclude' => $exclude,
		'post_mime_type' => 'image',
		'post_status' => null,
		'numberposts' => 1,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = wp_get_attachment_url($attachment->ID);
			return PricerrTheme_generate_thumb($url, $w, $h);
		}
	} else {
		return get_bloginfo('template_url') . '/images/nopic.jpg';
	}
}


function PricerrTheme_get_first_post_image2($pid, $image_string_name)
{

	//---------------------
	// build the exclude list
	$exclude = array();

	$args = array(
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => get_the_ID(),
		'meta_key' => 'another_reserved1',
		'meta_value' => '1',
		'numberposts' => -1,
		'post_status' => null,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = $attachment->ID;
			array_push($exclude, $url);
		}
	}

	//-----------------

	$args = array(
		'order' => 'ASC',
		'orderby' => 'post_date',
		'post_type' => 'attachment',
		'post_parent' => $pid,
		'exclude' => $exclude,
		'post_mime_type' => 'image',
		'post_status' => null,
		'numberposts' => 1,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = wp_get_attachment_url($attachment->ID);
			return PricerrTheme_generate_thumb3($attachment->ID, $image_string_name);
		}
	} else {
		return get_bloginfo('template_url') . '/images/nopic.jpg';
	}
}


function PricerrTheme_get_first_post_image_ID($pid)
{
	//---------------------
	// build the exclude list
	$exclude = array();

	$args = array(
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => get_the_ID(),
		'meta_key' => 'another_reserved1',
		'meta_value' => '1',
		'numberposts' => -1,
		'post_status' => null,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = $attachment->ID;
			array_push($exclude, $url);
		}
	}

	//-----------------

	$args = array(
		'order' => 'ASC',
		'orderby' => 'post_date',
		'post_type' => 'attachment',
		'post_parent' => $pid,
		'exclude' => $exclude,
		'post_mime_type' => 'image',
		'post_status' => null,
		'numberposts' => 1,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			return $attachment->ID;
		}
	} else {
		return false;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_generate_thumb($img_url, $width, $height, $cut = true)
{

	require_once(ABSPATH . '/wp-admin/includes/image.php');
	$uploads = wp_upload_dir();
	$basedir = $uploads['basedir'] . '/';
	$exp = explode('/', $img_url);

	$nr = count($exp);
	$pic = $exp[$nr - 1];
	$year = $exp[$nr - 3];
	$month = $exp[$nr - 2];

	if ($uploads['basedir'] == $uploads['path']) {
		$img_url = $basedir . '/' . $pic;
		$ba = $basedir . '/';
		$iii = $uploads['url'];
	} else {
		$img_url = $basedir . $year . '/' . $month . '/' . $pic;
		$ba = $basedir . $year . '/' . $month . '/';
		$iii = $uploads['baseurl'] . "/" . $year . "/" . $month;
	}
	list($width1, $height1, $type1, $attr1) = getimagesize($img_url);

	//return $height;
	$a = false;
	if ($width == -1) {
		$a = true;

	}


	if ($width > $width1) $width = $width1 - 1;
	if ($height > $height1) $height = $height1 - 1;

	if ($a == true) {
		$prop = $width1 / $height1;
		$width = round($prop * $height);
	}

	$width = $width - 1;
	$height = $height - 1;


	$xxo = "-" . $width . "x" . $height;
	$exp = explode(".", $pic);
	$new_name = $exp[0] . $xxo . "." . $exp[1];

	$tgh = str_replace("//", "/", $ba . $new_name);

	if (file_exists($tgh)) return $iii . "/" . $new_name;


	$thumb = image_resize($img_url, $width, $height, $cut);

	if (is_wp_error($thumb)) return "is-wp-error";

	$exp = explode($basedir, $thumb);
	return $uploads['baseurl'] . "/" . $exp[1];
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_show_bought')) {
	function PricerrTheme_show_bought($row)
	{


		$pid = $row->pid;
		$post = get_post($row->pid);
		$max_days = get_post_meta($row->pid, 'max_days', true);
		$date_made = $row->date_made;
		$bought = date_i18n("D jS \of F Y", $date_made);
		$expected = date_i18n("D jS \of F Y", $date_made + (24 * 3600 * $max_days));
		$done_seller = $row->done_seller;
		$closed = $row->closed;

		global $current_user;
		get_currentuserinfo();
		$uid = $current_user->ID;

		$user = $row->uid;
		$user = get_userdata($user);

		$completed = 0;
		if ($row->done_buyer == 1) $completed = 1;
		$id = $row->id;

		$delivered = 0;
		if ($row->done_seller == 1) $delivered = 1;

		$can_be_closed = 0;
		$can_request_closed = 1;

		if ($uid == $row->uid) {
			$date_made = $row->date_made;
			$max_days = get_post_meta($row->pid, 'max_days', true) * 3600 * 24;
			$now = current_time('timestamp', 0);

			if ($date_made + $max_days < $now)
				$can_be_closed = 1;
		}

		if ($row->closed == 1) {
			$can_be_closed = 0;
			$can_request_closed = 0;
		}

		if ($row->completed == 1) {
			$can_be_closed = 0;
			$can_request_closed = 0;
		}
		?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="padd10_only white-wrapper">
			<div class="image_holder3">
				<a href="<?php echo get_permalink($pid); ?>"><img width="65" height="50" class="<?php
					echo $img_class; ?>" src="<?php echo PricerrTheme_get_first_post_image($pid, 65, 50); ?>"/></a>
			</div>
			<div class="title_holder3">
				<h2><?php

					$days_needed = get_post_meta($pid, 'max_days', true);
					$instant = get_post_meta($pid, 'instant', true);

					if ($instant == 1) {
						echo '<span class="instant_job_spn">' . __('Instant Delivery', 'PricerrTheme') . '</span>';
					} else if ($days_needed == 1) {
						echo '<span class="express_job_spn">' . __('Recent Lesson', 'PricerrTheme') . '</span>';
					}

					?><a href="<?php echo get_permalink($pid); ?>" rel="bookmark" title=""><?php

						echo PricerrTheme_wrap_the_title($post->post_title, $pid);

						?></a></h2>
				<div class="sold_on"><?php
					echo sprintf(__("Purchased on %s", "PricerrTheme"), $bought);
					?> &diams; <?php
					echo sprintf(__("Order ID: #%s", "PricerrTheme"), $row->id); ?></div><?php
				if ($completed == 0 && $done_seller == 1 && $closed != 1) {
					?><a href="<?php echo get_bloginfo('siteurl'); ?>/?jb_action=mark_completed&oid=<?php
					echo $row->id; ?>" class="show_status"><?php
					_e("Mark Completed", "PricerrTheme"); ?></a><?php
					// } elseif ($delivered != 1 && $closed != 1) { 
					?><!--<span style="font-size:10px;">
						<em><?php _e('Waiting for the seller to deliver.', 'PricerrTheme'); ?></em>
					</span>-->
				<?php }
				if ($can_request_closed == 1) {

					if ($row->request_cancellation_from_seller == 0 and $row->request_cancellation_from_buyer == 0) {
						?><a href="<?php echo get_bloginfo('siteurl'); ?>/?jb_action=request_mutual_cancelation&orderid=<?php
						echo $row->id; ?>" class="show_status"><?php
						_e("Request Mutual Cancelation", "PricerrTheme"); ?></a><?php
					} else {

						if ($row->accept_cancellation_request != -1) {

							if ($row->request_cancellation_from_seller == 1) {

								$using_perm = PricerrTheme_using_permalinks();
								if ($using_perm) {
									$lnk7 = get_permalink(get_option('PricerrTheme_my_account_mutual_cancellation')) . "?oid=" . $row->id;
								} else {
									$lnk7 = get_permalink(get_option('PricerrTheme_my_account_mutual_cancellation')) . "&oid=" . $row->id;
								}

								$ss = $row->message_to_buyer;
								$dt = date_i18n('d-M-Y H:i:s', $row->date_request_cancellation);

								printf(__('<div>The seller of this job has requested a mutual cancellation for this job on %s.</div><div>Seller\'s Message: <span class="en_em">%s</span></div><div><strong><a class="edit_job" href="%s">Answer this request</a></strong></div>', 'PricerrTheme'), $dt, $ss, $lnk7);

							}

							if ($row->request_cancellation_from_buyer == 1) {
								$dt = date_i18n('d-M-Y H:i:s', $row->date_request_cancellation);
								printf(__('<div>You have requested a mutual cancellation on this job on %s.</div><div>Waiting for seller\'s reply.</div><div class="padd5"></div>', 'PricerrTheme'), $dt);
							}
						}
					}
				}
				if ($can_be_closed == 1) {
					?><a href="<?php echo get_bloginfo('siteurl'); ?>/?jb_action=close_job&orderid=<?php
					echo $row->id; ?>" class="show_status"><?php _e("Cancel Lesson", "PricerrTheme"); ?></a><?php
				}

				$using_perm = PricerrTheme_using_permalinks();

				if ($using_perm) {
					$privurl_m = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')) . "/?";
				} else {
					$privurl_m = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_priv_mess_page_id') . "&";
				}

				?><a href="<?php echo $privurl_m; ?>priv_act=send&pid=<?php echo $row->pid; ?>&uid=<?php
				echo $post->post_author; ?>" class="show_status"><?php _e("Contact Trainer", "PricerrTheme");
					?></a><!--<a href="<?php bloginfo('siteurl'); ?>/?jb_action=chat_box&oid=<?php
				echo $row->id; ?>" class="show_buyer_notes" rel="<?php
				echo $id; ?>"><?php _e("Conversation Page", "PricerrTheme"); ?></a>--></div><?php

			$instruction_box = get_post_meta($pid, 'instruction_box', true);
			if (!empty($instruction_box)) {
				echo ' ' . sprintf(__('<div class="padd10_only content_holder3">Instructions for the buyer: %s</div>', 'PricerrTheme'), $instruction_box) . " <br/>";
			}

			$instant = get_post_meta($pid, 'instant', true);
			if ($instant == "1") {
				$args = array(
					'order' => 'ASC',
					'orderby' => 'post_date',
					'post_type' => 'attachment',
					'post_parent' => $pid,
					'post_mime_type' => 'application/zip',
					'numberposts' => -1,
				);
				$i = 0;

				$attachments = get_posts($args);

				if ($attachments) {
					foreach ($attachments as $attachment) {
						$url = wp_get_attachment_url($attachment->ID);
						$dnls = "<a href='" . $url . "' target='_blank'>" . $attachment->post_title . "</a>";
					}
				}

				echo ' ' . sprintf(__('Download File: <strong>%s</strong>', 'PricerrTheme'), $dnls) . " <br/>";

			}


			if ($row->extra1 == 1) {
				$extra_price = get_post_meta($pid, 'extra1_price', true);
				$extra_content = get_post_meta($pid, 'extra1_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra2 == 1) {
				$extra_price = get_post_meta($pid, 'extra2_price', true);
				$extra_content = get_post_meta($pid, 'extra2_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra3 == 1) {
				$extra_price = get_post_meta($pid, 'extra3_price', true);
				$extra_content = get_post_meta($pid, 'extra3_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra4 == 1) {
				$extra_price = get_post_meta($pid, 'extra4_price', true);
				$extra_content = get_post_meta($pid, 'extra4_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra5 == 1) {
				$extra_price = get_post_meta($pid, 'extra5_price', true);

				$extra_content = get_post_meta($pid, 'extra5_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra6 == 1) {
				$extra_price = get_post_meta($pid, 'extra6_price', true);
				$extra_content = get_post_meta($pid, 'extra6_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra7 == 1) {
				$extra_price = get_post_meta($pid, 'extra7_price', true);
				$extra_content = get_post_meta($pid, 'extra7_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra8 == 1) {
				$extra_price = get_post_meta($pid, 'extra8_price', true);
				$extra_content = get_post_meta($pid, 'extra8_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra9 == 1) {
				$extra_price = get_post_meta($pid, 'extra9_price', true);
				$extra_content = get_post_meta($pid, 'extra9_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra10 == 1) {
				$extra_price = get_post_meta($pid, 'extra10_price', true);
				$extra_content = get_post_meta($pid, 'extra10_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			?></div></div><?php
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_shooping_active_nr($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select id from " . $prefix . "job_orders where uid='$uid' AND done_seller='0' AND done_buyer='0' AND date_finished='0' AND closed='0'";

	$r = $wpdb->get_results($s);
	return count($r);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_shooping_review_nr($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select id from " . $prefix . "job_orders where uid='$uid' AND done_seller='1' AND done_buyer='0' AND closed='0'";

	$r = $wpdb->get_results($s);
	return count($r);


}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_shooping_cancelled_nr($uid)
{

	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select id from " . $prefix . "job_orders where uid='$uid' AND closed='1' order by id desc";

	$r = $wpdb->get_results($s);
	return count($r);


}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_shooping_completed_nr($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select id from " . $prefix . "job_orders where uid='$uid' AND completed='1' order by id desc";

	$r = $wpdb->get_results($s);
	return count($r);


}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_show_sale')) {
	function PricerrTheme_show_sale($row)
	{

		$pid = $row->pid;
		$post = get_post($row->pid);
		$max_days = get_post_meta($pid, 'max_days', true);
		$date_made = $row->date_made;
		$sold = date("D jS \of F Y", $date_made);
		$expected = date("D jS \of F Y", $date_made + (24 * 3600 * $max_days));

		global $current_user;
		get_currentuserinfo();
		$uid = $current_user->ID;

		$delivered = 0;
		if ($row->done_seller == 1) $delivered = 1;
		$id = $row->id;

		$closed = $row->closed;

		$completed = 0;
		if ($row->done_buyer == 1) $completed = 1;
		$can_request_closed = 1;

		if ($closed == 1) $can_request_closed = 0;

		//---------------------------------

		?><div class="post" id="post-<?php echo $id; ?>">
		<div class="padd10_only white-wrapper">
			<div class="image_holder3">
				<a href="<?php the_permalink(); ?>"><img width="65" height="50" class="<?php echo $img_class; ?>" src="<?php echo PricerrTheme_get_first_post_image($pid, 65, 50); ?>"/></a>
			</div>
			<div class="title_holder3">
				<h2><?php

					$days_needed = get_post_meta($pid, 'max_days', true);
					$instant = get_post_meta($pid, 'instant', true);

					if ($days_needed == 1) echo '<span class="express_job_spn">' . __('Recent Lesson', 'PricerrTheme') . '</span>';
					if ($instant == 1) echo '<span class="instant_job_spn">' . __('Instant Delivery', 'PricerrTheme') . '</span>';

					?><a href="<?php echo get_permalink($pid); ?>" rel="bookmark" title=""><?php

						echo PricerrTheme_wrap_the_title($post->post_title, $pid);

						?></a>
				</h2>
				<div class="sold_on">
					<?php echo sprintf(__("Sold on: %s", "PricerrTheme"), $sold);

					?> &diams; <?php echo sprintf(__("Order ID: #%s", "PricerrTheme"), $row->id);

					?>
				</div><?php

				if ($can_request_closed == 1) {

					if ($row->accept_cancellation_request != -1) {
						if ($row->request_cancellation_from_seller == 0 and $row->request_cancellation_from_buyer == 0) {

							?><a href="<?php echo get_bloginfo('siteurl'); ?>/?jb_action=request_mutual_cancelation&orderid=<?php
							echo $row->id; ?>" class="show_status"><?php
							_e("Request Mutual Cancelation", "PricerrTheme"); ?></a><?php
						}

						if ($row->request_cancellation_from_buyer == 1) {

							?><br/><?php

							$using_perm = PricerrTheme_using_permalinks();
							if ($using_perm) $lnk7 = get_permalink(get_option('PricerrTheme_my_account_mutual_cancellation')) . "?oid=" . $row->id;
							else $lnk7 = get_permalink(get_option('PricerrTheme_my_account_mutual_cancellation')) . "&oid=" . $row->id;

							$ss = $row->message_to_seller;
							$dt = date_i18n('d-M-Y H:i:s', $row->date_request_cancellation);

							printf(__('The buyer of this job has requested a mutual cancellation for this job on %s. <br/>Buyer\'s Message: <span class="en_em">%s</span> <br/><br/> <strong><a class="edit_job" href="%s">Answer this request</a></strong>', 'PricerrTheme'), $dt, $ss, $lnk7);


						}
						if ($row->request_cancellation_from_seller == 1) {
							$dt = date_i18n('d-M-Y H:i:s', $row->date_request_cancellation);

							printf(__('<div>You have requested a mutual cancellation on this job on %s.</div><div>Waiting for buyer\'s reply.</div><div class="padd5"></div>', 'PricerrTheme'), $dt);

						}
					}
				}

				if ($delivered == 0 && $closed != 1) {

					if ($row->request_cancellation_from_seller == 0 and $row->request_cancellation_from_buyer == 0) {

						?><a href="<?php echo get_bloginfo('siteurl'); ?>/?jb_action=mark_delivered&oid=<?php

						echo $row->id; ?>" class="show_status"><?php _e("Mark as Delivered", "PricerrTheme");

						?></a><a href="#" class="show_status cancel_order" rel="<?php

						echo $row->id; ?>"><?php _e("Cancel Order", "PricerrTheme"); ?></a><?php
					}
				} elseif ($completed != 1 && $closed != 1) {

					?><span style="font-size:10px;"><em> <?php _e('Waiting for the buyer to confirm.', 'PricerrTheme'); ?></em>
					</span><?php

				}

				?><a href="<?php echo get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')); ?>?priv_act=send&pid=<?php

				echo $row->pid; ?>&uid=<?php echo $row->uid; ?>" class="show_status"><?php
					_e("Contact Buyer", "PricerrTheme"); ?></a><!--<a href="<?php
				bloginfo('siteurl'); ?>?jb_action=chat_box&oid=<?php echo $row->id; ?>" class="show_buyer_notes" rel="<?php
				echo $id; ?>"><?php _e("Conversation Page", "PricerrTheme"); ?></a>--></div><?php

			$instruction_box = get_post_meta($pid, 'instruction_box', true);
			if (!empty($instruction_box)) {
				echo sprintf(__('<div class="padd10_only content_holder3">Instructions for the buyer: %s</div>', 'PricerrTheme'), $instruction_box);

			}

			$instant = get_post_meta($pid, 'instant', true);
			if ($instant == "1") {
				$args = array(
					'order' => 'ASC',
					'orderby' => 'post_date',
					'post_type' => 'attachment',
					'post_parent' => $pid,
					'post_mime_type' => 'application/zip',
					'numberposts' => -1,
				);
				$i = 0;

				$attachments = get_posts($args);

				if ($attachments) {
					foreach ($attachments as $attachment) {
						$url = wp_get_attachment_url($attachment->ID);
						$dnls = "<a href='" . $url . "' target='_blank'>" . $attachment->post_title . "</a>";
					}
				}

				echo ' ' . sprintf(__('Download File: <strong>%s</strong>', 'PricerrTheme'), $dnls) . " <br/>";

			}

			if ($row->extra1 == 1) {
				$extra_price = get_post_meta($pid, 'extra1_price', true);
				$extra_content = get_post_meta($pid, 'extra1_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra2 == 1) {
				$extra_price = get_post_meta($pid, 'extra2_price', true);
				$extra_content = get_post_meta($pid, 'extra2_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra3 == 1) {
				$extra_price = get_post_meta($pid, 'extra3_price', true);
				$extra_content = get_post_meta($pid, 'extra3_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra4 == 1) {
				$extra_price = get_post_meta($pid, 'extra4_price', true);
				$extra_content = get_post_meta($pid, 'extra4_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra5 == 1) {
				$extra_price = get_post_meta($pid, 'extra5_price', true);
				$extra_content = get_post_meta($pid, 'extra5_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra6 == 1) {
				$extra_price = get_post_meta($pid, 'extra6_price', true);
				$extra_content = get_post_meta($pid, 'extra6_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra7 == 1) {
				$extra_price = get_post_meta($pid, 'extra7_price', true);
				$extra_content = get_post_meta($pid, 'extra7_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra8 == 1) {
				$extra_price = get_post_meta($pid, 'extra8_price', true);
				$extra_content = get_post_meta($pid, 'extra8_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra9 == 1) {
				$extra_price = get_post_meta($pid, 'extra9_price', true);
				$extra_content = get_post_meta($pid, 'extra9_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			if ($row->extra10 == 1) {
				$extra_price = get_post_meta($pid, 'extra10_price', true);
				$extra_content = get_post_meta($pid, 'extra10_content', true);

				echo '<span class="my_extr_sh">' . $extra_content . " - " . PricerrTheme_get_show_price($extra_price) . "</span><br/>";
			}

			?></div>
		</div>
		<div class="close_order_div" id="cancel_order_div_id_<?php echo $row->id; ?>">
			<div class="padd10">

				<!-- <div class="box_title_special"><?php _e('Request Cancellation', 'PricerrTheme'); ?></div>
                        <form method="post"  action="<?php bloginfo('siteurl'); ?>/?jb_action=cancel_job_request">
                        <input type="hidden" value="<?php echo $row->id; ?>" name="orderid" />
                            <table>
                            <tr><td colspan="2"><?php

				_e('By using this option you are asking the buyer to cancel the order. If he agrees with this, and cancels the order, the money gets refunded into his account and
                            you will not get a bad review over it.', 'PricerrTheme');

				?></td></tr>
                            
                            <tr>
                            <td valign="top" width="120"><?php _e('Message for Buyer', 'PricerrTheme'); ?>:</td>
                            <td><textarea rows="3" cols="50" name="message_to_buyer" ></textarea></td>
                            </tr>
                            
                            <tr>
                            <td valign="top" width="120">&nbsp;</td>
                            <td><input type="submit" name="request_cancellation" value="<?php _e('Submit', 'PricerrTheme'); ?>" /></td>
                            </tr>
                            
                            </table>
                        </form> -->

				<div class="clear10"></div>

				<div class="box_title_special"><?php _e('Force Cancellation', 'PricerrTheme'); ?></div>
				<form method="post" action="<?php bloginfo('siteurl'); ?>/?jb_action=cancel_job_request">
					<input type="hidden" value="<?php echo $row->id; ?>" name="orderid"/>
					<table>
						<tr>
							<td colspan="2"><?php
								_e("By using this option you are forcing cancelling this order. ".
								   "The money gets refunded into the buyer's account, ".
								   "and you will get a bad review over the job.", 'PricerrTheme');
								?></td>
						</tr>
						<tr>
							<td valign="top" width="120">&nbsp;</td>
							<td><input type="submit" name="force_cancellation" value="<?php _e('Submit', 'PricerrTheme'); ?>"/></td>
						</tr>

					</table>
				</form>
			</div>
		</div>
	<?php
	}
}


/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_number_of_active_jobs($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select distinct orders.id from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where posts.post_author='$uid' AND posts.ID=orders.pid AND orders.done_seller='0' AND 
			 orders.done_buyer='0' AND orders.date_finished='0' AND orders.closed='0' order by orders.id desc";

	$r = $wpdb->get_results($s);
	return count($r);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_number_of_cencelled_jobs($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where posts.post_author='$uid' AND posts.ID=orders.pid AND orders.closed='1' order by orders.id desc";


	$r = $wpdb->get_results($s);
	return count($r);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/


function PricerrTheme_get_number_of_completed_jobs($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where posts.post_author='$uid' AND posts.ID=orders.pid AND orders.done_seller='1' AND 
			 orders.done_buyer='1' AND orders.closed='0' order by orders.id desc";


	$r = $wpdb->get_results($s);
	return count($r);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_number_of_delivered_jobs($uid)
{
	global $wpdb;
	$prefix = $wpdb->prefix;
	$s = "select distinct orders.id from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where posts.post_author='$uid' AND posts.ID=orders.pid AND orders.done_seller='1' AND 
			 orders.done_buyer='0' AND orders.closed='0' order by orders.id desc";


	$r = $wpdb->get_results($s);
	return count($r);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_reomve_i_will($title, $price)
{
	$title = str_replace(__("I will provide", "PricerrTheme"), "", $title);
	$title = str_replace(__("for", "PricerrTheme") . " " . get_option('PricerrTheme_currency_symbol') . $price, "", $title);
	$title = str_replace(__("for", "PricerrTheme") . " " . $price . get_option('PricerrTheme_currency_symbol'), "", $title);

	$title = str_replace(__("for", "PricerrTheme") . " " . get_option('PricerrTheme_currency_symbol') . $price, "", $title);
	$title = str_replace(__("for", "PricerrTheme") . " " . $price . get_option('PricerrTheme_currency_symbol'), "", $title);

	return trim($title);
}


function PricerrTheme_get_post_by_title($page_title, $output = OBJECT)
{
	global $wpdb;
	$post = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title = %s", $page_title));
	if ($post)
		return get_post($post, $output);

	return false;
}


function PricerrTheme_add_wrap_the_title($title, $pid)
{
	$post = get_post($pid);
	//$post = PricerrTheme_get_post_by_title($title);


	if ($post != false) {
		if ($post->post_type == "job") {

			$data = PricerrTheme_wrap_the_title($title, $post->ID);
			return $data;

		}
	}

	return $title;


}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_wrap_the_title($title, $pid)
{

	return $title;
}


add_filter('term_link', 'PricerrTheme_post_tax_link_filter_function', 1, 3);

function PricerrTheme_post_tax_link_filter_function($post_link, $id = 0, $leavename = FALSE)
{
	global $category_url_link;

	if (!PricerrTheme_using_permalinks()) return $post_link;
	return str_replace("job_cat", $category_url_link, $post_link);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
add_filter('post_type_link', 'PricerrTheme_post_type_link_filter_function', 1, 3);

function PricerrTheme_post_type_link_filter_function($post_link, $id = 0, $leavename = FALSE)
{
	global $category_url_link;

	if (strpos('%job_cat%', $post_link) === 'FALSE') {
		return $post_link;
	}
	$post = get_post($id);
	if (!is_object($post) || $post->post_type != 'job') {
		return str_replace("job_cat", $category_url_link, $post_link);
	}
	$terms = wp_get_object_terms($post->ID, 'job_cat');
	if (!$terms) {
		return str_replace('%job_cat%', 'uncategorized', $post_link);
	}
	return str_replace('%job_cat%', $terms[0]->slug, $post_link);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_avatar($uid, $w = 25, $h = 25)
{
	$av = get_user_meta($uid, 'avatar', true);
	if (empty($av)) return get_bloginfo('template_url') . "/images/noav.jpg";
	else return PricerrTheme_generate_thumb($av, $w, $h);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_register_new_user_sitemile($user_login, $user_password, $user_reppassword, $user_email) {

	$errors = new WP_Error();
	global $current_theme_locale_name;
	$sanitized_user_login = sanitize_user($user_login);
	$user_email = apply_filters('user_registration_email', $user_email);

	// Check the username
	if ($sanitized_user_login == '') {
		$errors->add('empty_username', __('<strong>ERROR</strong>: Please enter a username.', $current_theme_locale_name));
	} elseif (!validate_username($user_login)) {
		$errors->add('invalid_username', __('<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.', $current_theme_locale_name));
		$sanitized_user_login = '';
	} elseif (username_exists($sanitized_user_login)) {
		$errors->add('username_exists', __('<strong>ERROR</strong>: This username is already registered, please choose another one.', $current_theme_locale_name));
	}

	// Check the e-mail address
	$eduMailPattern = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@([_a-z0-9-]+\.)*([_a-z0-9-])*\.([a-z0-9])*$/';

	if ($user_email == '') {
		$errors->add('empty_email', __('<strong>ERROR</strong>: Please type your e-mail address.', $current_theme_locale_name));
	} elseif (!is_email($user_email)) {
		$errors->add('invalid_email', __('<strong>ERROR</strong>: The email address isn&#8217;t correct.', $current_theme_locale_name));
		$user_email = '';
	} elseif (email_exists($user_email)) {
		$errors->add('email_exists', __('<strong>ERROR</strong>: This email is already registered, please choose another one.', $current_theme_locale_name));
	} elseif (!preg_match($eduMailPattern, $user_email)) {
		$errors->add('email_exists', __('<strong>ERROR</strong>: Currently we only accept registrations with a valid ucsd or sdsu edu email, sorry.', $current_theme_locale_name));
	}

	// Check the password
	if ($user_password == '') {
		$errors->add('password_empty', __('<strong>ERROR</strong>: You can&#8217;t leave password empty', $current_theme_locale_name));
	} elseif (strlen($user_password) < 6) {
		$errors->add('password_tooshort', __('<strong>ERROR</strong>: The password is too short, use at least 6 characters.', $current_theme_locale_name));
	} elseif (strlen($user_password) > 20) {
		$errors->add('password_toolong', __('<strong>ERROR</strong>: The password is too long, use at most 20 characters.', $current_theme_locale_name));
	} elseif (strlen($user_password) > 20) {
		$errors->add('password_toolong', __('<strong>ERROR</strong>: The password is too long, use at most 20 characters.', $current_theme_locale_name));
	} elseif (strlen($user_password) > 20) {
		$errors->add('password_toolong', __('<strong>ERROR</strong>: The password is too long, use at most 20 characters.', $current_theme_locale_name));
	} elseif (strlen($user_password) > 20) {
		$errors->add('password_toolong', __('<strong>ERROR</strong>: The password is too long, use at most 20 characters.', $current_theme_locale_name));
	} elseif(!preg_match("#[0-9]+#", $user_password) || !preg_match("#[a-z]+#", $user_password) || !preg_match("#[A-Z]+#", $user_password)) {
		$errors->add('password_validation', __('<strong>ERROR</strong>: The password must include at least one number, one lowercase letter and one uppercase letter.', $current_theme_locale_name));
	} elseif($user_password != $user_reppassword) {
		$errors->add('password_notmatch', __('<strong>ERROR</strong>: The password does not match the repeat password confirmation.', $current_theme_locale_name));
	}

	do_action('register_post', $sanitized_user_login, $user_email, $errors);

	$errors = apply_filters('registration_errors', $errors, $sanitized_user_login, $user_email);

	if ($errors->get_error_code())
		return $errors;

	//$user_pass = wp_generate_password(12, false);
	$user_id = wp_create_user($sanitized_user_login, $user_password, $user_email);
	if (!$user_id) {
		$errors->add('registerfail', sprintf(__('<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !', $current_theme_locale_name), get_option('admin_email')));
		return $errors;
	}

	update_user_option($user_id, 'default_password_nag', true, true); //Set up the Password change nag.

	PricerrTheme_new_user_notification($user_id, $user_password);

	PricerrTheme_new_user_notification_admin($user_id);

	return $user_id;
}

add_filter('email_authenticate', 'PricerrTheme_allow_email_login', 20, 3);

function PricerrTheme_allow_email_login( $user, $username, $password ) {
	if ( is_email( $username ) ) {

		$user = get_user_by_email( $username );

		var_dump($username);
		echo "e: ";
		var_dump($user);

		asdfasdfas;

		if ( $user ) $username = $user->user_login;
	}
	return wp_authenticate_username_password( null, $username, $password );
}

function PricerrTheme_update_paypal_email_function($uid, $user_paypal_email)
{
	update_user_meta($uid, 'paypal_email', trim($user_paypal_email));
}

function PricerrTheme_update_avatar_function($uid, $avatar)
{
	$tmp_name = $avatar["tmp_name"];
	$name = $avatar["name"];

	$upldir = wp_upload_dir();
	$path = $upldir['path'];
	$url = $upldir['url'];

	$name = str_replace(" ", "", $name);

	if (getimagesize($tmp_name) > 0) {

		move_uploaded_file($tmp_name, $path . "/" . $name);
		update_user_meta($uid, 'avatar', $url . "/" . $name);

	}
}
/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_prepare_seconds_to_words')) {
	function PricerrTheme_prepare_seconds_to_words($seconds)
	{
		$res = PricerrTheme_seconds_to_words_new($seconds);
		if ($res == "Expired") return __('Expired', 'PricerrTheme');

		if ($res[0] == 0) return sprintf(__("%s hours, %s min, %s sec", 'PricerrTheme'), $res[1], $res[2], $res[3]);
		if ($res[0] == 1) {

			$plural = $res[1] > 1 ? __('days', 'PricerrTheme') : __('day', 'PricerrTheme');
			return sprintf(__("%s %s, %s hours, %s min", 'PricerrTheme'), $res[1], $plural, $res[2], $res[3]);
		}
	}
}
/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_seconds_to_words_new($seconds)
{
	if ($seconds < 0) return 'Expired';

	/*** number of days ***/
	$days = (int)($seconds / 86400);
	/*** if more than one day ***/
	$plural = $days > 1 ? 'days' : 'day';
	/*** number of hours ***/
	$hours = (int)(($seconds - ($days * 86400)) / 3600);
	/*** number of mins ***/
	$mins = (int)(($seconds - $days * 86400 - $hours * 3600) / 60);
	/*** number of seconds ***/
	$secs = (int)($seconds - ($days * 86400) - ($hours * 3600) - ($mins * 60));
	/*** return the string ***/
	if ($days == 0 || $days < 0) {
		$arr[0] = 0;
		$arr[1] = $hours;
		$arr[2] = $mins;
		$arr[3] = $secs;
		return $arr; //sprintf("%d hours, %d min, %d sec", $hours, $mins, $secs);
	} else {
		$arr[0] = 1;
		$arr[1] = $days;
		$arr[2] = $hours;
		$arr[3] = $mins;

		return $arr; //sprintf("%d $plural, %d hours, %d min", $days, $hours, $mins);
	}

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_job_rating($pid)
{
	global $wpdb;
	$query = "select distinct ratings.grade, ratings.id ratid from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders, 
					" . $wpdb->prefix . "posts posts where posts.ID=orders.pid AND 
					 ratings.awarded='1' AND orders.id=ratings.orderid AND posts.ID='$pid' ";
	$r = $wpdb->get_results($query);

	$total = count($r);
	$good = 0;

	foreach ($r as $row) {
		$good += $row->grade;
	}

	if ($total == 0) return 0;

	$prc = round($good / $total, 2);
	$xx = round((100 * $prc) / 5);

	return $xx;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_orders_in_queue($pid)
{
	global $wpdb;
	$pref = $wpdb->prefix;
	$s = "select orders.uid from ".$pref."job_orders orders where orders.pid='$pid' " .
	     "AND orders.date_finished='0' and request_cancellation='0' AND force_cancellation='0' ".
	     "AND accept_cancellation_request='0'";

	$r = $wpdb->get_results($s);

	return count($r);
}

function PricerrTheme_user_enrolled_check($pid, $uid)
{
	global $wpdb;
	$pref = $wpdb->prefix;
	$s = "select orders.uid from ".$pref."job_orders orders where orders.pid='$pid' AND orders.uid='$uid' " .
	     "AND orders.date_finished='0' and request_cancellation='0' AND force_cancellation='0' ".
	     "AND accept_cancellation_request='0'";

	$r = $wpdb->get_results($s);

	return count($r);
}

function PricerrTheme_avatar_list($pid)
{
	global $wpdb;
	$pref = $wpdb->prefix;
	$s = "select orders.uid from ".$pref."job_orders orders where orders.pid='$pid' " .
	     "AND orders.date_finished='0' and request_cancellation='0' AND force_cancellation='0' ".
	     "AND accept_cancellation_request='0'";

	$r = $wpdb->get_results($s);

	foreach ($r as $el) {
		$user_id = $el->uid;
		echo '<a class="avatar-list" href="'.PricerrTheme_get_user_profile_link(get_userdata($user_id)->user_login).'" title="'.get_userdata($user_id)->user_login.'">';
		echo '<img width="50" height="50" border="0" src="'.PricerrTheme_get_avatar($user_id, 50, 50).'"/>';
		echo '</a>';
	}
}
/*************************************************************
 *
 *    Custom start/end date retrieval funcs added by Carroll Yu
 *
 **************************************************************/

function PricerrTheme_get_post_start_date($pid)
{
	return get_post_meta($pid, 'start_date', true);
}

function PricerrTheme_get_post_start_time($pid)
{
	return get_post_meta($pid, 'start_time', true);
}

function PricerrTheme_get_post_end_date($pid)
{
	return get_post_meta($pid, 'end_date', true);
}

function PricerrTheme_get_post_end_time($pid)
{
	return get_post_meta($pid, 'end_time', true);
}

function PricerrTheme_get_post_total_space($pid)
{
	return get_post_meta($pid, 'space_total', true);
}

function PricerrTheme_get_post_available_space($pid)
{
	return get_post_meta($pid, 'space_available', true);
}

function PricerrTheme_get_post_location($pid)
{
	return get_post_meta($pid, 'job_location', true) . " at " . strtoupper(get_post_meta($pid, 'college', true));
}

function PricerrTheme_get_post_start_datetime($pid)
{
	$start_date = get_post_meta($pid, 'start_date', true);
	$start_date_obj = DateTime::createFromFormat('m/d/Y', $start_date);

	$start_time = get_post_meta($pid, 'start_time', true);

	return $start_date_obj->format('M d, Y') . ' ' . $start_time;
}

function PricerrTheme_get_post_end_datetime($pid)
{
	$end_date = get_post_meta($pid, 'end_date', true);
	$end_date_obj = DateTime::createFromFormat('m/d/Y', $end_date);

	$end_time = get_post_meta($pid, 'end_time', true);

	return $end_date_obj->format('M d, Y') . ' ' . $end_time;
}

function PricerrTheme_get_post_datetime($pid)
{
	$start_date = get_post_meta($pid, 'start_date', true);
	$start_date_obj = DateTime::createFromFormat('m/d/Y', $start_date);

	$start_time = get_post_meta($pid, 'start_time', true);

	$end_date = get_post_meta($pid, 'end_date', true);
	$end_date_obj = DateTime::createFromFormat('m/d/Y', $end_date);

	$end_time = get_post_meta($pid, 'end_time', true);

	$end_date = "";
	if ($start_date_obj->format('y') != $end_date_obj->format('y')) {
		$end_date = $end_date_obj->format('l, M d, Y');
		$end_date .= ' ';
	} else if ($start_date_obj->format('m') != $end_date_obj->format('m')
	           || $start_date_obj->format('d') != $end_date_obj->format('d')) {
		$end_date = $end_date_obj->format('l, M d');
		$end_date .= ' ';
	}

	return $start_date_obj->format('l, M d, Y') . ' ' . $start_time . ' - ' . $end_date . $end_time;
}

function PricerrTheme_get_post_space_total($pid)
{
	$sp = get_post_meta($pid, 'space_total', true);

	return $sp;
}

function PricerrTheme_get_post_space_available($pid)
{
	$sp = get_post_meta($pid, 'space_available', true);

	return $sp;
}

function PricerrTheme_check_post_active($pid)
{
	$a = get_post_meta($pid, 'active', true);

	return $a;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_avg_lesson_rating($pid) {
	global $wpdb;
	$query = "select AVG(ratings.grade) as grade from " . $wpdb->prefix . "job_ratings ratings " .
	         "where ratings.awarded='1' AND ratings.pid = '$pid' ";
	$r = $wpdb->get_results($query);

	return round($r[0]->grade, 2);
}

function PricerrTheme_get_avg_trainer_rating($uid)  {
	global $wpdb;
	$query = "select AVG(ratings.grade) as grade from " . $wpdb->prefix . "job_ratings ratings " .
	         "where ratings.awarded='1' AND ratings.uid = '$uid' ";
	$r = $wpdb->get_results($query);

	return round($r[0]->grade, 2);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_likes_nr($pid)
{
	global $wpdb;
	$s = "select * from " . $wpdb->prefix . "job_likes where pid='$pid'";
	$r = $wpdb->get_results($s);

	return count($r);

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_post_images($pid, $limit = -1)
{
	//---------------------
	// build the exclude list
	$exclude = array();

	$args = array(
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => get_the_ID(),
		'meta_key' => 'another_reserved1',
		'meta_value' => '1',
		'numberposts' => -1,
		'post_status' => null,
	);
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = $attachment->ID;
			array_push($exclude, $url);
		}
	}

	$arr = array();

	$args = array(
		'order' => 'ASC',
		'orderby' => 'post_date',
		'post_type' => 'attachment',
		'post_parent' => $pid,
		'exclude' => $exclude,
		'post_mime_type' => 'image',
		'numberposts' => $limit,
	);
	$i = 0;

	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$url = wp_get_attachment_url($attachment->ID);
			array_push($arr, array("id" => $attachment->ID, "url" => $url));
		}
		return $arr;
	}
	return false;
}

function PricerrTheme_delete_post_image() {
	if (isset($_REQUEST)) {
		$res = wp_delete_attachment($_REQUEST['id']);
		if (!$res) {
			$imgArray = PricerrTheme_get_post_images($pid);
			foreach($imgArray as $img) {
				echo "<div class='img-uploaded-data' img-id='"
				     . $img['id'] . "' img-url='"
				     . $img["url"] . "'></div>";
			}
		}
	}
	die();
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_google_map($atts, $content = null) {
	/*******************************************************************************************************************
	 * GOOGLE MAP                                                                                                     *
	 *                                                                    *
	 *******************************************************************************************************************/
	global $NHP_Options;
	$options_theme = $NHP_Options->options;
	$choose_global_color = $options_theme['choose_global_color'];
	?>
	<script>
		(function($){
			$.fn.extend({
				fitness_google_map: function(options) {

					var defaults = {
						//google_api: 'AIzaSyDs8JCxbOANzW9db8UG1LLNDmSq4DUNv4w',
						location: '',
						zoom: 4,
					};

					var options = $.extend(defaults, options);

					return this.each(function() {
						var o = options;
						var obj = $(this);

						var obj_id = obj.attr("id");

						var wait = setInterval(function() {
							if( $("#" + obj_id).is(":visible") ) {
								clearInterval(wait);
								// This piece of code will be executed
								var obj_class = obj.attr("class");
								var geocoder;
								var map;
								geocoder = new google.maps.Geocoder();
								//alert("usao2")
								var latlng = new google.maps.LatLng(40, 40); // starting default location

								var customColor = [
									{
										featureType: "all",
										stylers: [
											{ "hue": <?php echo '"'.$choose_global_color.'"'; ?> }
										]
									},
								];

								var myOptions = {
									zoom: o.zoom,
									styles: customColor,
									center: latlng,
									mapTypeId: google.maps.MapTypeId.ROADMAP,
									zoomControl: true,
									zoomControlOptions: {
										style: google.maps.ZoomControlStyle.DEFAULT
									},
									scaleControl: true,
								}
								map = new google.maps.Map(document.getElementById(obj_id), myOptions);
								var address = o.location;
								geocoder.geocode( { 'address': address}, function(results, status) {

									if (status == google.maps.GeocoderStatus.OK) {
										map.setCenter(results[0].geometry.location);
										var marker = new google.maps.Marker({
											map: map,
											position: results[0].geometry.location
										});
									} else {
										alert("Geocode was not successful for the following reason: " + status);
									}

								});

							}
						}, 200);


					}); // return this.each
				}
			});
		})(jQuery);
	</script>
	<?php
	$location = $atts['location'];
	$zoom = $atts['zoom'];
	$unique_id =  $location . $zoom ;
	$unique_id = preg_replace("/[^A-Za-z0-9]/", '', $unique_id);
	$html = "";
	$html .= '<div class="one"><div class="google-map" id="' . $unique_id  .'"></div></div>';
	$html .= '<script type="text/javascript">jQuery(document).ready(function($){';
	$html .= '$("#' . $unique_id .'").fitness_google_map({location: "' . $location . '", zoom:' . $zoom . '});';
	$html .= '});</script>';

	return $html;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_postmeta($pid, $meta_key)
{
	global $wpdb;

	$s = "select *"
	     . " from " . $wpdb->prefix . "postmeta"
	     . " where post_id='" . $pid . "'"
	     . " AND meta_key LIKE '%" . $meta_key . "%'"
	     . " ORDER BY meta_key";

	$res = $wpdb->get_results($s);

	return $res;
}

function PricerrTheme_delete_postmeta($pid, $meta_key)
{
	global $wpdb;

	$res = $wpdb->delete($wpdb->prefix . "postmeta", array('post_id'=>$pid, 'meta_key'=>$meta_key), array('%d', '%s'));

	return $res;
}

function PricerrTheme_delete_post_video() {
	if (isset($_REQUEST)) {
		$pid = $_REQUEST['pid'];
		$res = PricerrTheme_delete_postmeta($pid, "youtube_link_" . $_REQUEST['id']);
		if (empty($res)) {
			$videoArray = PricerrTheme_get_postmeta($pid, "youtube_link_");
			foreach($videoArray as $video) {
				$pieces = explode("_", $video->meta_key);
				$id = end($pieces);
				echo "<div id='video-uploaded-" . $id . "' class='video-uploaded-data' video-id='"
				     . $id . "' video-url='"
				     . $video->meta_value . "'></div>";
			}
		}
	}
	die();
}

function PricerrTheme_delete_post_extra() {
	if (isset($_REQUEST)) {
		$pid = $_REQUEST['pid'];
		$res_price = PricerrTheme_delete_postmeta($pid, "extra_price_" . $_REQUEST['id']);
		$res_content = PricerrTheme_delete_postmeta($pid, "extra_content_" . $_REQUEST['id']);
		if (empty($res_price) && empty($res_content)) {
			echo "<p>Deletion Failed</p>";
		}
	}
	die();
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_allow_me_ext($ext)
{
	global $allowed_files_in_conversation;

	foreach ($allowed_files_in_conversation as $r)
		if ($ext == $r) {
			return true;
		}
	return false;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_unread_number_messages($uid)
{
	global $wpdb;
	$s = "select * from " . $wpdb->prefix . "job_pm where user='$uid' and show_to_destination='1' and rd='0'";
	$r = $wpdb->get_results($s);
	return count($r);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_get_userid_from_username($user)
{
	$user = get_userdatabylogin($user);

	if (empty($user->ID)) return false;

	return $user->ID;
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/
function PricerrTheme_isValidEmail($email)
{
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_get_order_row_obj($oid)
{
	global $wpdb;
	$s = "select distinct * from " . $wpdb->prefix . "job_orders where id='$oid'";
	$r = $wpdb->get_results($s);

	return $r[0];

}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *    Function Name: is_login_page
 *    Usage: Detect if the current page is login page
 *
 **************************************************************/
if (!function_exists('PricerrTheme_get_current_url')) {
	function PricerrTheme_get_current_url() {
		$_root_relative_current = untrailingslashit($_SERVER['REQUEST_URI']);
		$current_url = set_url_scheme('http://' . $_SERVER['HTTP_HOST'] . $_root_relative_current);
		return $current_url;
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *    Function Name: is_login_page
 *    Usage: Detect if the current page is login page
 *
 **************************************************************/
if (!function_exists('PricerrTheme_is_login_page')) {
	function PricerrTheme_is_login_page() {

		$result = stripos( PricerrTheme_get_current_url(), esc_url(wp_login_url()) );
		$result2 = stripos( PricerrTheme_get_current_url(), '?action=register' );

		if ( ($result === false) || ($result2 !== false) ) {
			return 0;
		} else {
			$result3 = stripos(PricerrTheme_get_current_url(), 'action=lostpassword');
			if ( $result3 === false ) {
				return 99;
			} else {
				return 1;
			}
		}

	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *    Function Name: is_registration_page
 *    Usage: Detect if the current page is register page
 *
 **************************************************************/
if (!function_exists('PricerrTheme_is_registration_page')) {
	function PricerrTheme_is_registration_page() {
		return (PricerrTheme_get_current_url() == esc_url(wp_registration_url()));
	}
}

if (!function_exists('PricerrTheme_is_user_profile_page')) {
	function PricerrTheme_is_user_profile_page()
	{
		return preg_match("/^http\:\/\/([A-z0-9_\-\.]+\/)+user\-profile\/([A-z0-9_-]+)$/", PricerrTheme_get_current_url());
	}
}

if (!function_exists('PricerrTheme_is_edit_job_page')) {
	function PricerrTheme_is_edit_job_page()
	{
		return preg_match("/^http\:\/\/([A-z0-9_\-\.]+\/)+\?jb_action=/", PricerrTheme_get_current_url());
	}
}

if (!function_exists('PricerrTheme_is_myaccount_page')) {
	function PricerrTheme_is_myaccount_page() {
		return preg_match("/my\-account/", PricerrTheme_get_current_url());
	}
}

if (!function_exists('PricerrTheme_mark_completed')) {
	function PricerrTheme_mark_completed($orderid, $ok_without_uid = '')
	{

		global $current_user, $wpdb;
		get_currentuserinfo;

		$s = "select distinct * from " . $wpdb->prefix . "job_orders where id='$orderid'";
		$r = $wpdb->get_results($s);
		$row = $r[0];
		$post = get_post($row->pid);
		$pid_d = $row->pid;
		$tm = current_time('timestamp', 0);

		do_action('PricerrTheme_do_when_completed', $row);

		if ($ok_without_uid == 1) $ok_gen = 1;
		else {
			if ($row->uid == $current_user->ID) $ok_gen = 1;
			else $ok_gen = 0;
		}

		if ($ok_gen == 1) // && $row->completed == "0")
		{
			$tm = current_time('timestamp', 0);
			$s = "update " . $wpdb->prefix . "job_orders set done_buyer='1', completed='1', date_completed='$tm' where id='$orderid' ";
			$wpdb->query($s);

			//------------------

			PricerrTheme_send_email_when_job_completed($orderid, $pid_d, $post->post_author);

			//------------------

			$raw_amount = $row->mc_gross;
			$percent_taken = get_option('PricerrTheme_percent_fee_taken');

			$percent_taken = apply_filters('PricerrTheme_apply_filters_here_mark_compl', $percent_taken, $pid_d);

			if (empty($percent_taken)) $amount_fee = round(get_option('PricerrTheme_solid_fee_taken'), 2);
			else $amount_fee = round(($percent_taken * $raw_amount) / 100, 2);


			$current_cash = PricerrTheme_get_credits($post->post_author);
			PricerrTheme_update_credits($post->post_author, $current_cash + $raw_amount - $amount_fee);

			$reason = sprintf(__('Payment received for job: <a href="%s">%s</a>', 'PricerrTheme'), get_permalink($post->ID), $post->post_title);
			PricerrTheme_add_history_log('1', $reason, $raw_amount, $post->post_author);

			$reason = sprintf(__('Fee taken for job: <a href="%s">%s</a>', 'PricerrTheme'), get_permalink($post->ID), $post->post_title);
			PricerrTheme_add_history_log('0', $reason, $amount_fee, $post->post_author);

			$s = "update " . $wpdb->prefix . "job_orders set admin_fee='$amount_fee' where id='$orderid' ";
			$wpdb->query($s);

			//---------------

			$g2 = "insert into " . $wpdb->prefix . "job_admin_earnings (orderid, pid, admin_fee, datemade) values('$orderid','$pid_d','$amount_fee','$tm')";
			$wpdb->query($g2);

			//emails

			//------------------

			$g1 = "insert into " . $wpdb->prefix . "job_chatbox (datemade, uid, oid, content) values('$tm','-2','$orderid','$ccc')";
			$wpdb->query($g1);
			return 1;
		}
		return 0;

	}
}
/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

function PricerrTheme_colorbox_stuff()
{
	echo '<link media="screen" rel="stylesheet" href="' . get_bloginfo('template_url') . '/css/colorbox.css" />';
	/*echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>'; */
	echo '<script src="' . get_bloginfo('template_url') . '/javascript/jquery.colorbox.js"></script>';

	?>

	<script>
		var $ = jQuery;
		jQuery(document).ready(function () {

			jQuery("a[rel='image_gal1']").colorbox();
			jQuery("a[rel='image_gal2']").colorbox();

			jQuery("#report-this-link").click(function () {

				if (jQuery("#report-this").css('display') == 'none')
					jQuery("#report-this").show('slow');
				else
					jQuery("#report-this").hide('slow');

				return false;
			});

			jQuery("#contact_seller-link").click(function () {

				if (jQuery("#contact-seller").css('display') == 'none')
					jQuery("#contact-seller").show('slow');
				else
					jQuery("#contact-seller").hide('slow');

				return false;
			});


			jQuery('.like_this_job').click(function () {

				var pid = jQuery(this).attr('rel');

				jQuery.ajax({
					type: "POST",
					url: "<?php echo get_bloginfo('siteurl'); ?>/",
					data: "like_this_job=" + pid,
					success: function (msg) {

						//alert("asd");
						jQuery("#lk-stuff" + pid).html('<a href="#" class="unlike_this_job" rel="' + pid + '"><?php echo addslashes(__("Unlike this Lesson","PricerrTheme")); ?></a>');

					}
				});

				return false;
			});


			jQuery('.unlike_this_job').click(function () {

				var pid = jQuery(this).attr('rel');

				jQuery.ajax({
					type: "POST",
					url: "<?php echo get_bloginfo('siteurl'); ?>/",
					data: "unlike_this_job=" + pid,
					success: function (msg) {

						jQuery("#lk-stuff" + pid).html('<a href="#" class="like_this_job" rel="' + pid + '"><?php echo addslashes(__("Like this Lesson","PricerrTheme")); ?></a>');

					}
				});

				return false;
			});
		});
	</script>

<?php
}

add_action('wp_head', 'PricerrTheme_colorbox_stuff');

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (!function_exists('PricerrTheme_get_post_blog')) {
	function PricerrTheme_get_post_blog()
	{

		$arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . get_the_ID());

		if ($arrImages) {
			$arrKeys = array_keys($arrImages);
			$iNum = $arrKeys[0];
			$sThumbUrl = wp_get_attachment_thumb_url($iNum);
			$sImgString = '<a href="' . get_permalink() . '">' .
			              '<img class="image_class" src="' . $sThumbUrl . '" width="100" height="100" />' .
			              '</a>';
		} else {
			$sImgString = '<a href="' . get_permalink() . '">' .
			              '<img class="image_class" src="' . PricerrTheme_get_avatar(the_author_meta('ID')) . '" width="100" height="100" />' .
			              '</a>';
		}

		?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="padd10">
				<div class="image_holder" style="width:120px">
					<?php echo $sImgString; ?>
				</div>
				<div class="title_holder" style="width:510px">
					<h2>
						<a href="<?php the_permalink() ?>" rel="bookmark"
						   title="Permanent Link to <?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<p class="mypostedon">
						Posted on <?php the_time('F jS, Y') ?>  by <?php the_author() ?>
					</p>
					<p class="blog_post_preview"> <?php the_excerpt(); ?></p>
					<a href="<?php the_permalink() ?>" class="post_bid_btn">Read More</a>
				</div>
			</div>
		</div>
	<?php
	}
}

/*************************************************************
 *
 *    PricerrTheme (c) sitemile.com - function
 *
 **************************************************************/

if (isset($_POST['rate_me'])) {
	global $wpdb;
	$tm = current_time('timestamp', 0);
	$reason = addslashes($_POST['reason']);

	if (!is_user_logged_in()) exit;

	if (isset($_POST['uprating'])) {
		$grade = $_POST['uprating'];
		$id = $_POST['ids'];

		$s = "update " . $wpdb->prefix . "job_ratings set grade='$grade', reason='$reason', awarded='1' ,datemade='$tm' where id='$id'";
		$wpdb->query($s);

		$s_sql = "select * from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders  where ratings.id='$id' AND orders.id=ratings.orderid";
		$r_sql = $wpdb->get_results($s_sql);
		$r_sql = $r_sql[0];
		$pid = $r_sql->pid;

		$rating = get_post_meta($pid, 'rating', true);
		if (empty($rating)) $rating = 0;

		$rating = $rating + 1;

		update_post_meta($pid, 'rating', $rating); // number of rating for post
//	    update_post_meta($pid, 'rating_score', PricerrTheme_get_avg_lesson_rating($pid));
//	    // avg

		global $current_user;
		get_currentuserinfo();
		$uid = $current_user->ID;
		$post = get_post($pid);

		$s = "update " . $wpdb->prefix . "job_ratings set uid='" . $post->post_author . "', pid='" . $pid . "' where id='$id'";
		$wpdb->query($s);

//	    $s = "UPDATE " .  $wpdb->prefix . "postmeta meta INNER JOIN " .  $wpdb->prefix . "posts post" .
//			" ON meta.post_id = post.ID SET meta.meta_value = '". PricerrTheme_get_avg_trainer_rating($uid) .
//	         "' WHERE meta_key = 'trainer_score' AND post.post_author = '" . $uid . "' ";
//	    $wpdb->query($s);

		PricerrTheme_send_email_when_feedback_left($pid, $uid, $post->post_author);
	}

	exit;
}

// =========================================================
global $wpdb;

if (isset($_POST['unlike_this_job'])) {
	if (!is_user_logged_in()) exit;

	global $current_user;
	get_currentuserinfo();
	$uid = $current_user->ID;
	$tm = time();
	$pid = $_POST['unlike_this_job'];


	$likes = get_post_meta($pid, 'likes', true);
	if (empty($likes)) $likes = 0; else $likes = $likes - 1;

	update_post_meta($pid, 'likes', $likes);


	global $wpdb;
	$s = "delete from " . $wpdb->prefix . "job_likes where pid='$pid' AND uid='$uid'";
	$wpdb->query($s);

	exit;
}


if (isset($_POST['like_this_job'])) {
	if (!is_user_logged_in()) exit;

	global $current_user;
	get_currentuserinfo();
	$uid = $current_user->ID;
	$tm = time();
	$pid = $_POST['like_this_job'];

	$likes = get_post_meta($pid, 'likes', true);
	if (empty($likes)) $likes = 1; else $likes = $likes + 1;

	update_post_meta($pid, 'likes', $likes);

	global $wpdb;
	$s = "insert into " . $wpdb->prefix . "job_likes (pid,uid,date_made) values('$pid','$uid','$tm')";
	$wpdb->query($s);

	exit;
}


//============================================================

if (isset($_POST['submit_prepare_continue'])) {
	$i_will = trim(htmlspecialchars($_POST['i_will']));

	if (isset($_POST['job_cost'])) {
		$job_cost = trim(htmlspecialchars($_POST['job_cost']));
		$_SESSION['job_cost'] = $job_cost;
	}

	$_SESSION['i_will'] = $i_will;
	wp_redirect(get_permalink(get_option('PricerrTheme_post_new_page_id')));
	exit;
}

//------------------------------------------------------------

if (isset($_GET['_ad_delete_pid'])) {
	if (is_user_logged_in()) {
		$pid = $_GET['_ad_delete_pid'];
		$pstpst = get_post($pid);
		global $current_user;
		get_currentuserinfo();

		if ($pstpst->post_author == $current_user->ID) {
			wp_delete_post($_GET['_ad_delete_pid']);
			echo "done";
		}
	}
	exit;
}

//-=================== delete PMs ============================

global $wpdb;

if (isset($_GET['confirm_message_deletion'])) {
	$return = $_GET['return'];
	$messid = $_GET['id'];

	global $wpdb, $current_user;
	get_currentuserinfo();
	$uid = $current_user->ID;

	$s = "select * from " . $wpdb->prefix . "job_pm where id='$messid' AND (user='$uid' OR initiator='$uid')";
	$r = $wpdb->get_results($s);

	if (count($r) > 0) {
		$row = $r[0];

		if ($row->initiator == $uid) {
			$s = "update " . $wpdb->prefix . "job_pm set show_to_source='0' where id='$messid'";
			$wpdb->query($s);

		} else {
			$s = "update " . $wpdb->prefix . "job_pm set show_to_destination='0' where id='$messid'";
			$wpdb->query($s);
		}

		$using_perm = PricerrTheme_using_permalinks();

		if ($using_perm) $privurl_m = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')) . "/?";
		else $privurl_m = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_priv_mess_page_id') . "&";


		if ($return == "inbox") wp_redirect($privurl_m . "priv_act=inbox");
		else if ($return == "outbox") wp_redirect($privurl_m . "priv_act=sent-items");
		else if ($return == "home") wp_redirect($privurl_m);
		else wp_redirect(get_permalink(get_option('PricerrTheme_my_account_page_id')));

	} else wp_redirect(get_permalink(get_option('PricerrTheme_my_account_page_id')));

}
?>