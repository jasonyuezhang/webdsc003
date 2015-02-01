<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

global $pagenow;
if (is_admin() && 'themes.php' == $pagenow && isset($_GET['activated'])) {

    global $wpdb;

    //----------------------------------------------------------------
    // insert pages

    PricerrTheme_insert_pages('PricerrTheme_blog_home_id', 'Blog Posts', '[pricerr_theme_blog_posts]');
    PricerrTheme_insert_pages('PricerrTheme_post_new_page_id', 'Post New Group', '[pricerr_theme_post_new]');
    PricerrTheme_insert_pages('PricerrTheme_my_account_page_id', 'My Account', '[pricerr_theme_my_account]');

    PricerrTheme_insert_pages('PricerrTheme_all_categories_page_id', 'All Categories', '[pricerr_theme_all_categories]');
    PricerrTheme_insert_pages('PricerrTheme_all_locations_page_id', 'All Locations', '[pricerr_theme_all_locations]');

    PricerrTheme_insert_pages('PricerrTheme_my_account_personal_info_page_id', 'Personal Information', '[pricerr_theme_my_account_personal_info]', get_option('PricerrTheme_my_account_page_id'));
    PricerrTheme_insert_pages('PricerrTheme_my_account_payments_page_id', 'Payments', '[pricerr_theme_my_account_payments]', get_option('PricerrTheme_my_account_page_id'));
    PricerrTheme_insert_pages('PricerrTheme_my_account_shopping_page_id', 'Shopping', '[pricerr_theme_my_account_shopping]', get_option('PricerrTheme_my_account_page_id'));
    PricerrTheme_insert_pages('PricerrTheme_my_account_sales_page_id', 'Sales', '[pricerr_theme_my_account_sales]', get_option('PricerrTheme_my_account_page_id'));
    PricerrTheme_insert_pages('PricerrTheme_my_account_priv_mess_page_id', 'Private Messages', '[pricerr_theme_my_account_priv_mess]', get_option('PricerrTheme_my_account_page_id'));
    PricerrTheme_insert_pages('PricerrTheme_my_account_reviews_page_id', 'Reviews/Feedback', '[pricerr_theme_my_account_reviews]', get_option('PricerrTheme_my_account_page_id'));
    PricerrTheme_insert_pages('PricerrTheme_pay_for_posting_job_page_id', 'Pay for your job', '[pricerr_theme_pay_for_job_page]');

    //==========================================================================================================================

    update_option('PricerrTheme_right_side_footer', '<a title="Jason Zhang" href="http://yuezhang.org">Micro Job Pricerr Theme</a>');
    update_option('PricerrTheme_left_side_footer', 'Copyright (c) ' . get_bloginfo('name'));

    update_option('PricerrTheme_enable_instant_deli', 'yes');

    update_option('PricerrTheme_level1_extras', '2');
    update_option('PricerrTheme_level2_extras', '3');
    update_option('PricerrTheme_level3_extras', '4');
    update_option('PricerrTheme_default_level_nr', '1');

    update_option('PricerrTheme_level1_vds', '1');
    update_option('PricerrTheme_level2_vds', '2');
    update_option('PricerrTheme_level3_vds', '3');

    //-----------------------------------------------------------------

    $opt = get_option('PricerrTheme_show_limit_job_cnt');

    if (empty($opt)):

        update_option('PricerrTheme_admin_approve_job', 'no');
        update_option('PricerrTheme_enable_extra', 'yes');
        update_option('PricerrTheme_job_listing', '0');
        update_option('PricerrTheme_featured_job_listing', '30');
        update_option('PricerrTheme_enable_shipping', 'yes');
        update_option('PricerrTheme_enable_location_based_shipping', 'no');
        update_option('PricerrTheme_currency', 'USD');

        update_option('PricerrTheme_currency_symbol', '$');
        update_option('PricerrTheme_currency_position', 'front');
        update_option('PricerrTheme_decimal_sum_separator', '.');
        update_option('PricerrTheme_thousands_sum_separator', ',');
        update_option('PricerrTheme_job_fixed_amount', '6.99');
        update_option('PricerrTheme_show_limit_job_cnt', '16');

        update_option('PricerrTheme_enable_free_input_box', 'no');
        update_option('PricerrTheme_enable_dropdown_values', 'no');
        update_option('PricerrTheme_home_page_layout', '1');

        update_option('Pricerr_main_how_it_works_line1', 'Welcome to Pricerr Theme');
        update_option('Pricerr_main_how_it_works_line2', 'World\'s best microjob marketplace<br/>theme for WordPress CMS');
        update_option('PricerrTheme_enable_how_it_works', 'yes');

        update_option('PricerrTheme_allow_html_emails', 'yes');
        update_option('PricerrTheme_paypal_enable_sdbx', 'no');
        update_option('PricerrTheme_percent_fee_taken', '10');
        update_option('PricerrTheme_default_nr_of_pics', '5');

        update_option('PricerrTheme_max_time_to_wait', '72');

    endif;

    //-----------------------------------------------------------------

    $ss = " CREATE TABLE `" . $wpdb->prefix . "job_ratings` (
					`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`orderid` BIGINT NOT NULL DEFAULT '0' ,
					`grade` TINYINT NOT NULL DEFAULT '0' ,
					`datemade` BIGINT NOT NULL DEFAULT '0' ,
					`reason` TEXT,
					`awarded` TINYINT NOT NULL DEFAULT '0'
					) ENGINE = MYISAM ";

    $wpdb->query($ss);

    //--------------------

    $ss = "CREATE TABLE `" . $wpdb->prefix . "job_pm` (
					`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`owner` INT NOT NULL DEFAULT '0' ,
					`user` INT NOT NULL DEFAULT '0' ,
					`content` TEXT ,
					`subject` TEXT ,
					`rd` TINYINT NOT NULL DEFAULT '0',
					`parent` BIGINT NOT NULL DEFAULT '0',
					`pid` INT NOT NULL  DEFAULT '0',
					`datemade` INT NOT NULL DEFAULT '0' ,
					`readdate` INT NOT NULL DEFAULT '0' ,
					`initiator` INT NOT NULL DEFAULT '0' ,
					`attached` INT NOT NULL DEFAULT '0'
					) ENGINE = MYISAM ;
					";
    $wpdb->query($ss);

    //---------------

    $ss = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "job_orders` (
						  `id` bigint(20) NOT NULL auto_increment,
						  `date_made` bigint(20) NOT NULL DEFAULT '0',
						  `date_finished` bigint(20) NOT NULL DEFAULT '0',
						  `date_closed` bigint(20) NOT NULL DEFAULT '0',
						  `pid` bigint(20) NOT NULL DEFAULT '0',
						  `uid` bigint(20) NOT NULL DEFAULT '0',
						  `done_seller` tinyint(4) NOT NULL default '0',
						  `closed` tinyint(4) NOT NULL default '0',
						  `completed` tinyint(4) NOT NULL default '0',
						  `done_buyer` tinyint(4) NOT NULL default '0',
						  `mc_gross` varchar(255) NOT NULL DEFAULT '0',
						  `admin_fee` varchar(255) NOT NULL DEFAULT '0',
						  `notes_to_seller` text ,
						  
						  PRIMARY KEY  (`id`)
						) ENGINE=MyISAM ;";

    $wpdb->query($ss);

    $ss = "CREATE TABLE `" . $wpdb->prefix . "job_chatbox` (
					`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`content` TEXT,
					`attachment` TEXT,
					`oid` INT NOT NULL DEFAULT '0',
					`uid` INT NOT NULL DEFAULT '0',
					`datemade` INT NOT NULL  DEFAULT '0'
					) ENGINE = MYISAM ;
					";
    $wpdb->query($ss);

    //---------------

    $ss = "CREATE TABLE `" . $wpdb->prefix . "job_likes` (
			`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`date_made` BIGINT NOT NULL DEFAULT '0' ,
			`pid` BIGINT NOT NULL DEFAULT '0' ,
			`uid` BIGINT NOT NULL DEFAULT '0' 
			) ENGINE = MYISAM ";

    $wpdb->query($ss);

    $ss = "CREATE TABLE `" . $wpdb->prefix . "job_var_costs` (
				`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY   ,
				`cost` VARCHAR( 20 ) NOT NULL DEFAULT '0'
				) ENGINE = MYISAM  ";

    $wpdb->query($ss);

    $ss = "ALTER TABLE `" . $wpdb->prefix . "job_var_costs` ADD UNIQUE (`cost`) ";
    $wpdb->query($ss);

    $ss = "ALTER TABLE  `" . $wpdb->prefix . "job_var_costs` CHANGE  `cost`  `cost` DOUBLE NOT NULL";
    $wpdb->query($ss);

    $ss = " CREATE TABLE `" . $wpdb->prefix . "job_transactions` (
					`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`pid` BIGINT NOT NULL DEFAULT '0',
					`datemjobe` INT NOT NULL DEFAULT '0',
					`uid` INT NOT NULL DEFAULT '0' ,
					`payment_date` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`txn_id` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`item_name` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`mc_currency` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`last_name` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`first_name` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`payer_email` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`jobdress_country` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`jobdress_state` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`jobdress_country_code` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`jobdress_zip` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`jobdress_street` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`mc_fee` VARCHAR( 255 ) NOT NULL DEFAULT '0' ,
					`mc_gross` VARCHAR( 255 ) NOT NULL DEFAULT '0'
					) ENGINE = MYISAM ";

    $wpdb->query($ss);

    //-------$wpdb->query---------------------

    $ss = " CREATE TABLE `" . $wpdb->prefix . "job_withdraw` (
					`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`datemade` INT NOT NULL DEFAULT '0',
					`done` INT NOT NULL DEFAULT '0',
					`datedone` INT NOT NULL DEFAULT '0',
					`payeremail` VARCHAR( 255 ) NOT NULL DEFAULT '0',
					`uid` INT NOT NULL DEFAULT '0',
					`amount` DOUBLE NOT NULL DEFAULT '0.00'
					) ENGINE = MYISAM ";
    $wpdb->query($ss);

    $ss = " CREATE TABLE `" . $wpdb->prefix . "job_payment_transactions` (
					`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`uid` INT NOT NULL DEFAULT '0',
					`reason` TEXT,
					`datemade` INT NOT NULL DEFAULT '0',
					`amount` DOUBLE NOT NULL DEFAULT '0',
					`tp` TINYINT NOT NULL DEFAULT '1',
					`uid2` INT NOT NULL DEFAULT '0'
					) ENGINE = MYISAM ";
    $wpdb->query($ss);

    global $wpdb;
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `date_completed` BIGINT NOT NULL ;");

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra1` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra2` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra3` TINYINT NOT NULL DEFAULT '0' ;");

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_withdraw` ADD `rejected` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_withdraw` ADD `rejected_on` BIGINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_withdraw` ADD `methods` VARCHAR( 255 ) NOT NULL ;");

    $ss = "ALTER TABLE `" . $wpdb->prefix . "job_withdraw` CHANGE  `methods`  `methods` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL";
    $wpdb->query($ss);

    //--------------------------------------

    $ss = " CREATE TABLE `" . $wpdb->prefix . "job_admin_earnings` (
					`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`orderid` BIGINT NOT NULL DEFAULT '0',
					`pid` TINYINT NOT NULL DEFAULT '0',
					`admin_fee` DOUBLE NOT NULL DEFAULT '0.00',
					`datemade` BIGINT NOT NULL DEFAULT '0'  
					) ENGINE = MYISAM ";

    $wpdb->query($ss);

}

$opt = get_option("PricerrTheme_upda_req101");

if (empty($opt)) {
    //------------------------------------------------

    $another_special_sql = "select * from " . $wpdb->prefix . "job_ratings where awarded='1'";
    $another_special_res = $wpdb->get_results($another_special_sql);


    foreach ($another_special_res as $row2):

        $id = $row2->id;
        $grade = $row2->grade;
        $oid = $row2->orderid;

        $s1s1 = "select * from " . $wpdb->prefix . "job_orders where id='$oid' ";
        $r1r1 = $wpdb->get_results($s1s1);

        $pid = $r1r1[0]->pid;
        $pstpst = get_post($pid);
        $uid = $pstpst->post_author;

        if ($grade == 0) {
            $sss = "update " . $wpdb->prefix . "job_ratings set grade='1', uid='$uid', pid='$pid' where id='$id' ";
            $wpdb->query($sss);
        }

        if ($grade == 1) {
            $sss = "update " . $wpdb->prefix . "job_ratings set grade='5', uid='$uid', pid='$pid' where id='$id' ";
            $wpdb->query($sss);
        }

    endforeach;

    update_option("PricerrTheme_upda_req101", "done");
}

//**************************************************************************

$opt2 = get_option('PricerrTheme_up_upd1_640hj');
$opt3_a = get_option('PricerrTheme_up_upd1_amk81j');

if (empty($opt3_a)) {
    update_option('PricerrTheme_up_upd1_amk81j', "DONe");
    global $wpdb;

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_ratings` ADD `uid`	BIGINT NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_ratings` ADD `pid`	BIGINT NOT NULL default '0' ;");

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_chatbox` ADD `rd_receiver` 	tinyint(20) NOT NULL default '0' ;");


    $ss = "ALTER TABLE  `" . $wpdb->prefix . "job_chatbox` CHANGE  `content`  `content` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL";
    $wpdb->query($ss);

    $ss = "ALTER TABLE  `" . $wpdb->prefix . "job_payment_transactions` CHANGE  `reason`  `reason` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL";
    $wpdb->query($ss);

    $ss = "ALTER TABLE  `" . $wpdb->prefix . "job_pm` CHANGE  `subject`  `subject` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL";
    $wpdb->query($ss);

    $ss = "ALTER TABLE  `" . $wpdb->prefix . "job_pm` CHANGE  `content`  `content` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL";
    $wpdb->query($ss);

    $ss = "ALTER TABLE  `" . $wpdb->prefix . "job_ratings` CHANGE  `reason`  `reason` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL";
    $wpdb->query($ss);

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra4` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra5` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra6` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra7` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra8` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra9` TINYINT NOT NULL DEFAULT '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `extra10` TINYINT NOT NULL DEFAULT '0' ;");

    //---------------------------------------------------

    $ss = " CREATE TABLE `" . $wpdb->prefix . "job_ipcache` (
					`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`ipnr` VARCHAR( 255 ) NOT NULL  DEFAULT '0' ,
					`country` VARCHAR( 255 ) NOT NULL DEFAULT '0'  
					) ENGINE = MYISAM ";

    $wpdb->query($ss);

    //---------------------------------------------------

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `message_to_buyer` TEXT NOT NULL ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `message_to_seller` TEXT NOT NULL ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `request_cancellation_from_buyer` 				tinyint(4) NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `request_cancellation_from_seller` 				tinyint(4) NOT NULL default '0' ;");

    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `request_cancellation` 				tinyint(4) NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `force_cancellation` 				tinyint(4) NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `accept_cancellation_request` 		tinyint(4) NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `date_request_cancellation` 		bigint(20) NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE `" . $wpdb->prefix . "job_orders` ADD `date_accept_cancellation` 		bigint(20) NOT NULL default '0' ;");
    $wpdb->query("ALTER TABLE  `" . $wpdb->prefix . "job_chatbox` CHANGE  `message_to_buyer`  `message_to_buyer` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL");

    //---------------------------------------------------

    $ss = "ALTER TABLE `" . $wpdb->prefix . "job_pm` ADD  `show_to_source` TINYINT NOT NULL DEFAULT '1';";
    $wpdb->query($ss);

    //---------------------------

    $ss = "ALTER TABLE `" . $wpdb->prefix . "job_pm` ADD  `show_to_destination` TINYINT NOT NULL DEFAULT '1';";
    $wpdb->query($ss);

    PricerrTheme_insert_pages('PricerrTheme_all_categories_page_id', 'All Categories', '[pricerr_theme_all_categories]');
    PricerrTheme_insert_pages('PricerrTheme_all_locations_page_id', 'All Locations', '[pricerr_theme_all_locations]');
    PricerrTheme_insert_pages('PricerrTheme_advanced_search_id', 'Search Groups', '[pricerr_theme_search_jobs]');
    PricerrTheme_insert_pages('PricerrTheme_my_account_mutual_cancellation', 'Answer Cancellation Request', '[pricerr_theme_my_account_answer_cancel]', get_option('PricerrTheme_my_account_page_id'));
}

if (empty($opt2)) {
    add_filter('admin_head', 'PricerrTheme_run_at_first_widgets');
    query_posts("post_type=job&order=DESC&orderby=id&posts_per_page=10000");

    if (have_posts()) :
        while (have_posts()) : the_post();

            $ttl = get_the_title();
            $newttl = get_post_meta(get_the_ID(), 'title_variable', true); //title_variable PricerrTheme_reomve_i_will($ttl, get_post_meta(get_the_ID(),'price', true));

            $npost = array();
            $npost['ID'] = get_the_ID();
            $npost['post_title'] = $newttl;
            wp_update_post($npost);

        endwhile;
    else:

    endif;

    wp_reset_query();

    //---------------------------------------------------
    update_option('PricerrTheme_up_upd1_640hj', "DONe");

}

function PricerrTheme_run_at_first_widgets()
{
    $widgets = array(

        'home-right-widget-area' => array(
            'browse-by-category-3', 'browse-by-location-4'
        )
    );
    update_option('sidebars_widgets', $widgets);

    update_option('browse-by-location', array(
        4 => array(
            'title' => 'Browse by Location',
            'loc_per_row' => '1'
        ),
        '_multiwidget' => 1
    ));

    update_option('browse-by-category', array(
        3 => array(
            'title' => 'Browse by Category',
            'loc_per_row' => '1'
        ),
        '_multiwidget' => 1
    ));


}


include 'first_run_emails.php';


?>