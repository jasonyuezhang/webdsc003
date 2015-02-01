<?php

parse_str(file_get_contents("php://input"), $_POST);

if (isset($_POST['custom'])) {

    $cust = $_POST['custom'];
    $cust = explode("|", $cust);


    $id = $cust[0];
    $uid = $cust[1];
    $methods = $cust[2];
    $datemade = $cust[3];

    $amount = $_POST['mc_gross'];

    $user_address = $_POST['receiver_email'];

    $payment_status = $_POST['payment_status'];

    //---------------------------------------------------

    if (1): //$payment_status == "Completed"):

        global $wpdb;
        $pref = $wpdb->prefix;

        $s1 = "select * from " . $pref . "job_withdraws where id='$id' AND uid='$uid' AND datemade='$datemade' AND methods='$methods'";
        $r1 = $wpdb->get_results($s1);

        if (count($r1) == 0) {

            $tm = time();

            $ss = "update " . $wpdb->prefix . "job_withdraw set done='1', datedone='$tm' where id='$id'";
            $wpdb->query($ss); // or die(mysql_error());

            PricerrTheme_send_email_when_withdraw_completed($uid, $methods . " amount:" . $amount, PricerrTheme_get_show_price($amount));

            $reason = sprintf(__('Withdraw to %s - Details: %s', 'PricerrTheme'), $methods, $user_address);
            PricerrTheme_add_history_log('0', $reason, $amount, $uid);
        }

    endif;
}
?>