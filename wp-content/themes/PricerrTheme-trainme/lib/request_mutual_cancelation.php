<?php

if (!is_user_logged_in()) {
    wp_redirect(PricerrTheme_login_url_with_redirect());
    exit;
}

//-----------------

global $wpdb, $wp_rewrite, $wp_query, $current_user;
get_currentuserinfo();
$uid = $current_user->ID;
$wp_query->is_home = false;


function sitemile_filter_ttl($title)
{
    return __("Cancel Order", 'PricerrTheme') . " - ";
}

add_filter('wp_title', 'sitemile_filter_ttl', 10, 3);


$orderid = $_GET['orderid'];
$message_to_buyer = addslashes($_POST['message_to_buyer']);

//-------------------------------

$s = "select * from " . $wpdb->prefix . "job_orders where id='$orderid'";
$r = $wpdb->get_results($s);
$row = $r[0];
$pid = $row->pid;
$post = get_post($pid);

//-------------

if ($post->post_author == $uid) $seller_is_logged_in = 1;
else {
    $buyer_is_logged_in = 1;
}

//-------------

if (isset($_POST['confirm_cancellation_from_seller'])) {
    $tm = current_time('timestamp', 0);
    $s = "update " . $wpdb->prefix . "job_orders set message_to_buyer='$message_to_buyer', request_cancellation_from_seller='1', date_request_cancellation='$tm' where id='$orderid'";
    $wpdb->query($s);

    //-------------------

    $g1 = "insert into " . $wpdb->prefix . "job_chatbox (datemade, uid, oid, content) values('$tm','-8','$orderid','$ccc')"; // -8 means the seller requested cancellation
    $wpdb->query($g1);

    PricerrTheme_send_email_when_seller_requests_cancellation($pid, $row->uid, $message_to_buyer);

    /*$refund_uid = $row->uid;

        $current_cash = PricerrTheme_get_credits($refund_uid);
        PricerrTheme_update_credits($refund_uid, $current_cash + $row->mc_gross);

        $reason = sprintf(__('Payment refunded for job: <a href="%s">%s</a>','PricerrTheme'), get_permalink($post->ID), $post->post_title);
        PricerrTheme_add_history_log('1', $reason, $row->mc_gross, $refund_uid);
    */
    //--------------------

    wp_redirect(get_permalink(get_option('PricerrTheme_my_account_sales_page_id')));
    exit;
}


if (isset($_POST['confirm_cancellation_from_buyer'])) {
    $tm = current_time('timestamp', 0);
    $s = "update " . $wpdb->prefix . "job_orders set message_to_seller='$message_to_buyer', request_cancellation_from_buyer='1', date_request_cancellation='$tm' where id='$orderid'";
    $wpdb->query($s);

    //-------------------

    $g1 = "insert into " . $wpdb->prefix . "job_chatbox (datemade, uid, oid, content) values('$tm','-9','$orderid','$ccc')"; // -9 means the buyer requested cancellation
    $wpdb->query($g1);

    PricerrTheme_send_email_when_buyer_requests_cancellation($pid, $post->post_author, $message);

    /*$refund_uid = $row->uid;

        $current_cash = PricerrTheme_get_credits($refund_uid);
        PricerrTheme_update_credits($refund_uid, $current_cash + $row->mc_gross);

        $reason = sprintf(__('Payment refunded for job: <a href="%s">%s</a>','PricerrTheme'), get_permalink($post->ID), $post->post_title);
        PricerrTheme_add_history_log('1', $reason, $row->mc_gross, $refund_uid);

        //PricerrTheme_send_email_when_buyer_closes_the_job($orderid, $post->ID, $post->post_author, $refund_uid);
        PricerrTheme_send_email_when_buyer_closes_the_job($orderid, $post->ID, $refund_uid, $post->post_author);
    */
    //--------------------

    wp_redirect(get_permalink(get_option('PricerrTheme_my_account_shopping_page_id')));
    exit;
}


//=====================================================


$post = get_post($pid);


get_header();
?>
<div id="content-side-bar">
    <div class="my_box3">
        <div class="padd10">

            <div class="box_title"><?php echo sprintf(__("Request Order Cancellation #%s - %s", 'PricerrTheme'), $orderid, PricerrTheme_wrap_the_title($post->post_title, $pid)); ?></div>
            <div class="box_content clear">
                <!-- ####### -->
                <?php


                if ($seller_is_logged_in == 1) //peace cancellation
                {
                    echo '<form method="post">';
                    _e('You are about to request cancellation for this job. By using this option you are asking the buyer to mutually cancel the order.
						If he agrees, and cancels the order, the money gets refunded into his account and you will not get a bad review over it.', 'PricerrTheme');

                    echo '<br/><br/>';
                    _e('Your message to the buyer: ', 'PricerrTheme');
                    echo '<br/>';
                    echo '<textarea rows="4" name="message_to_buyer" cols="40">' . $_POST['message_to_buyer'] . '</textarea>';


                    echo '<br/><br/>';

                    _e('Click yes to confirm or your back browser button.', 'PricerrTheme');
                    echo '<br/><br/>';


                    echo '<input class="button btn-medium-large rounded grey" type="submit" value="' . __('Yes, Confirm Cancellation', 'PricerrTheme') . '" name="confirm_cancellation_from_seller" />';
                    echo '<input class="button btn-medium-large rounded grey" type="hidden" value="' . $orderid . '" name="orderid" />';
                    echo '<input class="button btn-medium-large rounded grey" type="hidden" value="' . $message_to_buyer . '" name="message_to_buyer" />';

                    echo '</form>';

                } elseif ($buyer_is_logged_in == 1) {
                    echo '<form method="post">';
                    _e('You are about to request cancellation for this job. By using this option you are asking the seller to mutually cancel the order.
						If he agrees, and cancels the order, the money gets refunded into your account and you will not get a bad review over it.', 'PricerrTheme');

                    echo '<br/><br/>';
                    _e('Your message to the seller: ', 'PricerrTheme');
                    echo '<br/>';
                    echo '<textarea rows="4" name="message_to_buyer" cols="40">' . $_POST['message_to_buyer'] . '</textarea>';

                    echo '<br/><br/>';

                    _e('Click yes to confirm or your back browser button.', 'PricerrTheme');
                    echo '<br/><br/>';

                    echo '<input class="button btn-medium-large rounded grey" type="submit" value="' . __('Yes, Confirm Cancellation', 'PricerrTheme') . '" name="confirm_cancellation_from_buyer" />';
                    echo '<input class="button btn-medium-large rounded grey" type="hidden" value="' . $orderid . '" name="orderid" />';

                    echo '</form>';
                } ?><!-- ####### -->
            </div>
        </div>
    </div>
</div>

<?php

PricerrTheme_get_users_links();


get_footer();

?>
