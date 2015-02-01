<?php

//$PricerrTheme_enable_paypal_ad = get_option('PricerrTheme_enable_paypal_ad');
//if ($PricerrTheme_enable_paypal_ad == 'yes') {
//    include 'paypal_adaptive.php';
//    die();
//}

//global $wp_query;
//$pid = $wp_query->query_vars['jobid'];

$action = $_GET['action'];

//global $current_user;
//get_currentuserinfo();
//$uid = $current_user->ID;
//$post = get_post($pid);

$id = $_GET['id'];
$user_address = $_GET['user_address'];
$uid = $_GET['uid'];
$methods = $_GET['methods'];
$amount = $_GET['amount'];
$datemade = $_GET['datemade'];

$redirect_url = get_bloginfo('siteurl') . "/wp-admin/admin.php?page=withdraw-req";

//--------------------------------------------------------------------------------

$busi = get_option('PricerrTheme_paypal_email');
if (empty($busi)) {
    echo 'ERROR: please input your paypal address in backend';
    exit;
}

//--------------------------------------------------------------------------------

include 'paypal.class.php';

$p = new paypal_class; // initiate an instance of the class
$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; // testing paypal url

$sdb = get_option('PricerrTheme_paypal_enable_sdbx');

if ($sdb == "yes")
    $p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // paypal url

global $wpdb;
$this_script = get_bloginfo('siteurl') . '/?pay_for_item=paypal_withdrawal';

if (empty($action)) $action = 'process';

switch ($action) {

    case 'process': // Process and order...

        $p->add_field('business', trim($user_address));
        $p->add_field('currency_code', get_option('PricerrTheme_currency'));
        $p->add_field('return', $this_script . '&action=success');
        $p->add_field('cancel_return', $this_script . '&action=cancel');
        $p->add_field('notify_url', get_bloginfo('siteurl') . '/?payment_response=paypal_withdrawal_response');
        $p->add_field('item_name', 'withdraw money');
        $p->add_field('custom', $id . '|' . $uid . '|'. $methods . '|' . $datemade);
        $p->add_field('amount', PricerrTheme_formats_special(($amount), 2));

        $p->submit_paypal_post(); // submit the fields to paypal

        break;

    case 'success': // Order was successful...

        wp_redirect($redirect_url . "&withdrawal_action=" . $action); //('siteurl')."/my-account/shopping/");

        break;

    case 'cancel': // Order was canceled...

        wp_redirect($redirect_url . "&withdrawal_action=" . $action);

        break;
}

?>