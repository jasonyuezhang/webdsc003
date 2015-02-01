<?php
if (!is_user_logged_in()) {
    wp_redirect(PricerrTheme_login_url_with_redirect());
    exit;
}
//-----------

global $wp_query, $wpdb;
$orderid = $_GET['oid'];

$mc = PricerrTheme_mark_completed($orderid);
$wp_query->is_home = false;

if ($mc == 1) {
    wp_redirect(get_permalink(get_option('PricerrTheme_my_account_reviews_page_id')));
    exit;
}

echo "oops.error";

?>