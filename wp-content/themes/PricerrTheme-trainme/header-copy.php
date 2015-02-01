<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

global $wp_query;
$query_vars = $wp_query->query_vars;

$job_category = $query_vars['job_category'];
$page = $query_vars['page'];
$my_page = $page;
$job_sort = $query_vars['job_sort'];
$job_tax = $query_vars['job_tax'];
$term_search = $query_vars['term_search'];

if (empty($term_search)) $term_search = $_GET['term_search'];


?>

<!DOCTYPE html>
<html>
<head>

<?php
global $NHP_Options;
$options_theme = $NHP_Options->options;
?>
<link rel='stylesheet' type='text/css' data-name="demo-style" href="<?php echo home_url(); ?>/?theme-styles=css"/>
<?php $logo_top = $options_theme['logo_top']; ?>
<?php $logo_scroll = $options_theme['logo_scroll']; ?>
<?php $google_fonts = $options_theme['google_fonts']; ?>
<?php $google_fonts_url = $options_theme['google_fonts_url']; ?>
<?php $custom_analytics = $options_theme['custom_analytics']; ?>
<?php $favicon_set = $options_theme['favicon_set']; ?>

<title>
    <?php

    $separator="|";
    global $is_profile_pg;

    if (($job_tax == "category" or $job_tax == "location") and !empty($job_category)) {
        $tt = get_term_by('slug', $job_category, 'job_cat');
        if ($job_tax == "location") $tt = get_term_by('slug', $job_category, 'job_location');

        global $skm_ttl;
        $skm_ttl = sprintf(__('All posted lessons in %s - %s', 'PricerrTheme'), $tt->name, get_bloginfo('name'));
        echo $skm_ttl;

    } elseif ($is_profile_pg == 1) {

        global $usrusr;
        echo __("User Profile", 'PricerrTheme') . " - " . $usrusr . " - " . get_bloginfo('name');

    } elseif(is_front_page()) {

        bloginfo('name');

    } elseif (is_single() or is_page() or is_home()){

        bloginfo('name');
        wp_title($separator,true,' ');

    } elseif (is_404()) {

        bloginfo('name');
        echo " $separator ";
        _e('404 error - page not found', SYSTEM_THEME);

    } else {

        bloginfo('name');
        wp_title($separator,true,' ');

    }

    ?>
</title>
<!--<title>
    <?php
/*
    global $is_profile_pg;

    if (($job_tax == "category" or $job_tax == "location") and !empty($job_category)) {
        $tt = get_term_by('slug', $job_category, 'job_cat');
        if ($job_tax == "location") $tt = get_term_by('slug', $job_category, 'job_location');

        global $skm_ttl;
        $skm_ttl = sprintf(__('All posted lessons in %s - %s', 'PricerrTheme'), $tt->name, get_bloginfo('name'));
        echo $skm_ttl;

    } elseif ($is_profile_pg == 1) {
        global $usrusr;
        echo __("User Profile", 'PricerrTheme') . " - " . $usrusr . " - " . get_bloginfo('name');
    } else
        wp_title(' ', true);
*/
    ?>
</title>-->

<meta name="SYSTEM_VAR_PREFIX" content="<?php echo SYSTEM_VAR_PREFIX; ?>"/>
<meta name="SYSTEM_THEME" content="<?php echo SYSTEM_THEME; ?>"/>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
<link rel='start' href='<?php echo home_url(); ?>'>
<link rel='alternate' href='<?php echo $logo_scroll; ?>'>
<link rel="profile" href="http://gmpg.org/xfn/11"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
<meta name="viewport" content="width=device-width"/>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
<!--<link rel="shortcut icon" href="<?php echo $favicon_set; ?>"/>-->
<?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow"/><?php } ?>

<?php echo $google_fonts_url ?>
<style type="text/css">
    <!--
    h1, h2, h3, h4, h5, h6 ul.products li.product h3, h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, #primary-menu ul li a, .section-title .title, .section-title .title a, .section-title h1.title span, .section-title p, #footer h3, .services h2, .item-info h3, .item-info-overlay h3, #contact-intro h1.title, #contact-intro p, .widget h3.title, .post-title h2.title, .post-title h2.title a {
    <?php echo $google_fonts?>
    }

    -->
</style>

<?php echo $custom_analytics; ?>

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

<!--<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<?php wp_enqueue_script("jquery"); ?>

<?php

wp_head();

?>

<?php do_action('PricerrTheme_before_head_tag_open'); ?>
<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/javascript/my-script.js"></script>
<!-- ########################################### -->

<script type="text/javascript">
    function suggest(inputString) {
        if (inputString.length == 0) {
            jQuery('#suggestions').fadeOut();
        } else {
            jQuery('#big-search').addClass('load');
            jQuery.post("<?php bloginfo('siteurl'); ?>/wp-admin/admin-ajax.php?action=autosuggest_it", {queryString: "" + inputString + ""}, function (data) {
                if (data.length > 0) {
                    var stringa = data.charAt(data.length - 1);
                    if (stringa == '0') data = data.slice(0, -1);
                    else data = data.slice(0, -2);
                    jQuery('#suggestions').css("width", jQuery(".search_left.textbox").width()).fadeIn();
                    jQuery('#suggestionsList').html(data);
                    jQuery('#big-search').removeClass('load');
                }
            });
        }
    }
    function fill(thisValue) {
        jQuery('#big-search').val(thisValue);
        setTimeout("jQuery('#suggestions').fadeOut();", 600);
    }
    jQuery(document).ready(function () {
        jQuery(".expnd_col").click(function () {
            var rels = jQuery(this).attr('rel');
            jQuery("#term_submenu" + rels).toggle();
            return false;
        });
        jQuery("#big-search").blur(function () {
            jQuery('#suggestions').fadeOut();
        });
	    jQuery('#college-filter').change(function () {
		    var college = jQuery(this).val();
		    window.location.href = "<?php echo get_bloginfo('siteurl'); ?>" +
		    "?college_filter=" + college + "&get_urls=" +
		    "<?php echo PricerrTheme_curPageURL(); ?>";
	    });
    });
    jQuery(window).resize(function() {
        jQuery('#suggestions').css("width", jQuery(".search_left.textbox").width());
    });
</script>
<?php

$PricerrTheme_color_for_footer = get_option('PricerrTheme_color_for_footer');
if (!empty($PricerrTheme_color_for_footer)) {
    echo '<style> #footer { background:#' . $PricerrTheme_color_for_footer . ' }</style>';
}


$PricerrTheme_color_for_bk = get_option('PricerrTheme_color_for_bk');
if (!empty($PricerrTheme_color_for_bk)) {
    echo '<style> body { background:#' . $PricerrTheme_color_for_bk . ' }</style>';
}

$PricerrTheme_color_for_top_links = get_option('PricerrTheme_color_for_top_links');
if (!empty($PricerrTheme_color_for_top_links)) {
    echo '<style> .top-links { background:#' . $PricerrTheme_color_for_top_links . ' }</style>';
}


//----------------------

$PricerrTheme_home_page_layout = get_option('PricerrTheme_home_page_layout');
if (PricerrTheme_is_home()):
    if ($PricerrTheme_home_page_layout == "4"):
        echo '<style>#content { float:right } #right-sidebar { float:left; }</style>';
    endif;

    if ($PricerrTheme_home_page_layout == "5"):
        echo '<style>#content { width:100%; }  </style>';
    endif;

    if ($PricerrTheme_home_page_layout == "3"):
        echo '<style>#content { width:480px } .title_holder { width:345px; } #left-sidebar{	margin-right:15px; width:230px}
				 .i_will_mainbox{ width:240px } .how-does-it-work-btn { top:30% }
				.post_thumb { width:240px } .order_now_new_btn { margin-bottom:15px } </style>';
    endif;


    if ($PricerrTheme_home_page_layout == "2"):
        echo '<style>#content { width:480px } #left-sidebar{ float:right } #left-sidebar{ margin-right:15px; width:230px } .title_holder { width:345px; }
				 .i_will_mainbox{ width:240px } .how-does-it-work-btn { top:30% }
				.order_now_new_btn { margin-bottom:15px } .post_thumb { width:240px }
				</style>';
    endif;

    if ($PricerrTheme_home_page_layout == "1"):
        echo '<style> .post_thumb { width:180px; }
							.title_holder { width:455px } </style>';
    endif;

endif;

?>

<?php

global $wpdb, $wp_rewrite, $wp_query;
$username = $wp_query->query_vars['username'];

if (is_tax() or is_archive() or !empty($username) or is_tag() or PricerrTheme_is_adv_src_pg()) {

    $opt = get_option('PricerrTheme_taxonomy_page_with_sdbr');
    if ($opt != "no") {
        echo '<style> .post_thumb { width:180px; }
							.title_holder { width:445px } </style>';

    } else {
        echo '<style> #content { width:100% } </style>';
    }
}

$PricerrTheme_enable_second_footer = get_option('PricerrTheme_enable_second_footer');
if ($PricerrTheme_enable_second_footer == "yes") {
    echo '<style>#footer { margin-top:0px; }</style>';
}

$Pricerr_main_how_it_works_img_img = get_option('Pricerr_main_how_it_works_img_img');
if (!empty($Pricerr_main_how_it_works_img_img)) {
    echo '<style>.main_graphic { background: url(' . $Pricerr_main_how_it_works_img_img . ') center;}</style>';
}

?>

<!-- ########################################## -->

</head>
<body <?php body_class(); ?> >
    <div class="all-wrapper">
        <div id="header-wrapper">
            <div class="header clear">
                <?php
                $logo = get_option('PricerrTheme_logo_url');
                if (empty($logo)) $logo = get_bloginfo('template_url') . '/images/logo.png';
                ?>
                <div id="logo">
                    <a href="<?php bloginfo('siteurl'); ?>">
                        <img src="<?php echo $logo; ?>"/>
                    </a>
                </div>
                <div id="primary-menu">
                    <?php

                        PricerrTheme_wp_nav_menu(array('theme_location' => 'primary-menu',
                            'container' => false,
                            'menu_class' => 'menu',
                            'menu_id' => '',
                            'fallback_cb' => 'header_fallback',
                            'login' => true
                        ));
                    ?>
                </div>
                <!--END PRIMARY MENU-->
                <!-- middle-header-bg -->
            </div>
            <!-- END HEADER -->
            <?php
            $hide_title = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX . "hide_title", true);
            if (!empty($hide_title) || $hide_title != "yes") { ?>
                <div class="section-title clear">
                    <div class="control-size rewidth-subtitle">
                        <div class="one">
                            <?php
                            /* Abandoned Breadcrumb Title
                            if (function_exists('bcn_display')) {
                                bcn_display();
                            }

                            if (PricerrTheme_is_registration_page()) {
                                echo __(" > Sign Up", 'PricerrTheme');
                            } elseif (PricerrTheme_is_login_page()) {
                                echo __(" > Log In", 'PricerrTheme');
                            } elseif (PricerrTheme_is_user_profile_page()) {
                                echo __(" > ".PricerrTheme_get_username(), 'PricerrTheme');
                            } elseif (PricerrTheme_is_edit_job_page()) {
                                echo " > " . $post->post_title;
                            }
                            */

                            $ordinary = false;
                            $search_box = false;

                            $ordinary_value = "";
                            $search_box_value = "";

                            $title_page = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX . "title_page", true);

                            $page_title = $wp_query->post->post_title;

                            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

                            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                            $term_title = $term->name;

                            if (false !== strpos($url, 'product')) {
    //                            $shop_page = get_post(woocommerce_get_page_id('shop'));
    //                            echo apply_filters('the_title', ($shop_page_title = get_option('woocommerce_shop_page_title')) ? $shop_page_title : $shop_page->post_title);
                                $search_box = true;
                                $search_box_value = apply_filters('the_title', ($shop_page_title = get_option('woocommerce_shop_page_title')) ? $shop_page_title : $shop_page->post_title);
                            } elseif (is_month()) {
    //                            $title = __("Monthly archive", SYSTEM_THEME_SHORT);
    //                            $subtitle = __("for ", SYSTEM_THEME_SHORT) . single_month_title('', false);
    //                            if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
    //                            echo $title; ?><!-- <span>--><?php //echo $subtitle; ?><!--</span>--><?php
                                $search_box = true;
                                $search_box_value = single_month_title('', false);
                            } elseif (is_search()) {
    //                            $title = __("Search results", SYSTEM_THEME_SHORT);
    //                            $subtitle = __("for ", SYSTEM_THEME_SHORT) . $_GET["s"];
    //                            if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
    //                            echo $title; ?><!-- <span>--><?php //echo $subtitle; ?><!--</span>--><?php
                                $search_box = true;
                                $search_box_value = $_GET["s"];
                            } elseif (is_tag()) {
    //                            $title = __("Tag archive", SYSTEM_THEME_SHORT);
    //                            $subtitle = __("for ", SYSTEM_THEME_SHORT) . single_tag_title('', false);
    //                            if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
    //                            echo $title; ?><!-- <span>--><?php //echo $subtitle; ?><!--</span>--><?php
                                $search_box = true;
                                $search_box_value = single_tag_title('', false);
                            } elseif (is_category()) {
    //                            $title = __("Archive", SYSTEM_THEME_SHORT);
    //                            $subtitle = __("for ", SYSTEM_THEME_SHORT) . single_cat_title('', false);
    //                            if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
    //                            echo $title; ?><!-- <span>--><?php //echo $subtitle; ?><!--</span>--><?php
                                $search_box = true;
                                $search_box_value = single_cat_title('', false);
                            } elseif (is_home()) {
    //                            $title = get_option('blogname');
    //                            $subtitle = get_option('blogdescription');
    //                            if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
    //                            echo $title; ?><!-- <span>--><?php //echo $subtitle; ?><!--</span>--><?php
                                $search_box = true;
                                $search_box_value = "";
                            } elseif (PricerrTheme_is_registration_page()) {
                                $ordinary = true;
                                $ordinary_value =  __("Sign Up", 'PricerrTheme');
                            } elseif (PricerrTheme_is_login_page()) {
                                $ordinary = true;
                                if(PricerrTheme_is_login_page() == 99) {
                                    $ordinary_value =  __("Log In", 'PricerrTheme');
                                } else {
                                    $ordinary_value =  __("Retrieve Password", 'PricerrTheme');
                                }
                            } elseif (!empty($title_page)) {
                                $search_box = true;
                                $search_box_value = "";
                            } else if (!empty($term_title)) {
                                $search_box = true;
                                $search_box_value = sprintf(__("%s", 'PricerrTheme'), $term_title);
                            } elseif(is_archive()) {
                                if (empty($term_title)) {
                                    $search_box = true;
                                    $search_box_value = "";
                                } else {
                                    $search_box = true;
                                    $search_box_value = "";
                                }
                            } elseif (!empty($post->post_title)) {
                                if (PricerrTheme_is_myaccount_page()) {
                                    $ordinary = true;
                                    $ordinary_value = $post->post_title;
                                } else {
                                    $search_box = true;
                                    $search_box_value = $post->post_title;
                                }
                            } elseif (!empty($page_title)) {
                                $search_box = true;
                                $search_box_value = $page_title;
                            } else {
                                $search_box = true;
                                $search_box_value = ""; // miss page title
                            }


                            if ($ordinary) {
                                echo "<div class='ordinary-title'>".$ordinary_value."</div>";
                            } elseif ($search_box)  {?>
                                <!--<a href="<?php echo (is_user_logged_in() ? PricerrTheme_post_new_link() : PricerrTheme_login_url_with_redirect()); ?>">
                                    <div id="new-label" class="rounded">Post New Lesson</div>
                                </a>
                                <a class="new-post" target="_self" href="<?php echo (is_user_logged_in() ? PricerrTheme_post_new_link() : PricerrTheme_login_url_with_redirect()); ?>">
                                    <img src="<?php echo get_template_directory_uri() . '/images/newpost.png'?>" alt="new post"/>
                                </a>-->
                                <div class="search_box_main">
                                    <?php

                                    $job_category 	= $query_vars['job_category'];
                                    if(empty($job_category)) 	$job_category = "all";

                                    $job_sort 		= $query_vars['job_sort'];
                                    $job_tax 		= $query_vars['job_tax'];

                                    //----------

                                    if(empty($job_category)) 	$job_category 	= "all";
                                    if(empty($page)) 			$page 			= "1";
                                    if(empty($job_sort)) 		$job_sort 		= "auto";
                                    if(empty($job_tax)) 		$job_tax 		= "category";


                                    $term_search 	= $_GET['term1'];
                                    global $default_search;

                                    ?>

                                    <div id="suggest" >
                                        <form id="nav-searchbar" method="get" action="<?php echo get_permalink(get_option('PricerrTheme_advanced_search_id')); ?>">
                                            <div class="search_left button">
                                                <input type="image" width="32" id="big-search-submit" name="search_me" src="<?php bloginfo('template_url') ?>/images/search_icn.png" />
                                            </div>
                                            <span class="search_left category">
                                                <span id="nav-search-in-content" class="nav-search">Everywhere</span>
                                                <span class="nav-down-arrow"></span>
                                                <?php $selected = $_GET['job_cat'];
                                                echo PricerrTheme_get_categories_slug_2_top_header('job_cat', $selected, __("Everywhere",'PricerrTheme'), "searchDropdownBox") ?>
                                            </span>
                                            <div class="search_left textbox">
                                                <input type="text" onfocus="this.value=''" id="big-search" name="term1" autocomplete="off" onkeyup="suggest(this.value);" value="<?php if(!empty($term_search)) echo htmlspecialchars($term_search); elseif(!empty($search_box_value)) echo $search_box_value; else echo $default_search; ?>" />
                                                <div class="suggestionsBox" id="suggestions" style="z-index:999;display: none;">
                                                    <span class="suggestionLabel">Search Suggestions</span>
                                                    <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!--END control-size-->
                </div><!--END SECTION TITLE-->
            <?php } ?>
        </div>

        <?php $slider = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX . "slider", true); ?>
        <?php if ($slider) { ?>
            <div id="header-banner"><?php putRevSlider("$slider") ?></div>
        <?php } ?>

        <div id="wrapper" class="clear">

            <?php if (PricerrTheme_is_home()): ?>
                <?php

                $PricerrTheme_enable_how_it_works = get_option('PricerrTheme_enable_how_it_works');
                if ($PricerrTheme_enable_how_it_works != "no"):

                    $hthing = get_bloginfo('siteurl') . '/wp-login.php?action=register';

                    if (is_user_logged_in())
                        $hthing = PricerrTheme_post_new_link();

                    $Pricerr_main_how_it_works_link = get_option('Pricerr_main_how_it_works_link');
                    if (!empty($Pricerr_main_how_it_works_link)) {
                        $hthing = $Pricerr_main_how_it_works_link;
                    }

                    ?>
                    <div class="main_graphic">
                        <div class="main_graphic_inner">

                            <div class="test_line_1">
                                <?php echo stripslashes(get_option('Pricerr_main_how_it_works_line1')) ?>
                            </div>
                            <div
                                class="test_line_2">
                                <?php echo stripslashes(get_option('Pricerr_main_how_it_works_line2')) ?>
                            </div>
                            <div class="test_line_3">
                                <a href="<?php echo $hthing ?>" class="get_started_link"><?php _e('Get Started', 'PricerrTheme') ?></a>
                            </div>

                        </div>
                    </div><?php
                endif;
            endif;
            if (is_tax() or is_archive() or is_page() or $_GET['jb_action'] == 'pay_featured_credits' or $_GET['jb_action'] == 'purchase_this'
                or $_GET['pay_for_item'] == 'credits' or !empty($_GET['jb_action']) ):

                $PricerrTheme_show_main_menu = get_option('PricerrTheme_show_main_menu');
                if ($PricerrTheme_show_main_menu != 'no'):

                    $menu_name = 'primary-pricerr-main-header';

                    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
                        $menu = wp_get_nav_menu_object($locations[$menu_name]);

                        $menu_items = wp_get_nav_menu_items($menu->term_id);

                        $m = 0;
                        foreach ((array)$menu_items as $key => $menu_item) {
                            $title = $menu_item->title;
                            $url = $menu_item->url;
                            if (!empty($title))
                                $m++;
                        }
                    }
                endif;
            endif; ?>
            <div class="content-wrapper clear">