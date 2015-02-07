<?php

/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

if (!function_exists('PricerrTheme_my_account_cancel_reqq_area_function')) {
    function PricerrTheme_my_account_cancel_reqq_area_function()
    {
        $oid = $_GET['oid'];
        global $wpdb, $current_user;
        get_currentuserinfo();
        $uid = $current_user->ID;

        $s = "select * from " . $wpdb->prefix . "job_orders where id='$oid'";
        $r = $wpdb->get_results($s);
        $row = $r[0];
        $post_au = get_post($row->pid);
        $dt = current_time('timestamp', 0);

        //-----------------------

        if ($row->request_cancellation_from_seller == 1) {
            if ($post_au->post_author != $uid) {
                //i am the buyer here
                $s_message = __('The seller of this job has requested a mutual cancellation for this order. Please accept or deny it using the controls below:', 'PricerrTheme');
                $return_me = get_permalink(get_option('PricerrTheme_my_account_shopping_page_id'));
                if ($_GET['accept'] == "yes") {

                    $s1 = "update " . $wpdb->prefix . "job_orders set accept_cancellation_request='1', closed='1', date_accept_cancellation='$dt' where id='{$row->id}'";
                    $wpdb->query($s1);

                    $current_cash = PricerrTheme_get_credits($row->uid);
                    PricerrTheme_update_credits($row->uid, $current_cash + $row->mc_gross);

                    $reason = sprintf(__('Payment refunded for job: <a href="%s">%s</a>', 'PricerrTheme'), get_permalink($post_au->ID), $post_au->post_title);
                    PricerrTheme_add_history_log('1', $reason, $row->mc_gross, $row->uid);
                }
                if ($_GET['accept'] == "no") {
                    $s1 = "update " . $wpdb->prefix . "job_orders set accept_cancellation_request='-1' where id='{$row->id}'";
                    $wpdb->query($s1);
                }
            } else {
                echo 'oups #3211!';
                exit;
            }
        }


        if ($row->request_cancellation_from_buyer == 1) {
            if ($post_au->post_author == $uid) {
                // i am the seller here
                $s_message = __('The buyer of this job has requested a mutual cancellation for this order. Please accept or deny it using the controls below:', 'PricerrTheme');
                $return_me = get_permalink(get_option('PricerrTheme_my_account_sales_page_id'));

                if ($_GET['accept'] == "yes") {
                    $s1 = "update " . $wpdb->prefix . "job_orders set accept_cancellation_request='1', closed='1', date_accept_cancellation='$dt' where id='{$row->id}'";
                    $wpdb->query($s1);

                    $current_cash = PricerrTheme_get_credits($row->uid);
                    PricerrTheme_update_credits($row->uid, $current_cash + $row->mc_gross);

                    $reason = sprintf(__('Payment refunded for job: <a href="%s">%s</a>', 'PricerrTheme'), get_permalink($post_au->ID), $post_au->post_title);
                    PricerrTheme_add_history_log('1', $reason, $row->mc_gross, $row->uid);
                }
                if ($_GET['accept'] == "no") {
                    $s1 = "update " . $wpdb->prefix . "job_orders set accept_cancellation_request='-1' where id='{$row->id}'";
                    $wpdb->query($s1);
                }
            } else {
                echo 'oups #3219!';
                exit;
            }
        }

        //-----------------------

        ?>

        <div id="content-side-bar">
            <!-- page content here -->
            <div class="my_box3">
                <div class="padd10">

                    <div class="box_title3"><?php printf(__("Answer Cancellation Request: #%s", 'PricerrTheme'), $oid); ?></div>
                    <div style="overflow:hidden; width:100%; float:left">
                        <div class="clear10"></div>

                        <?php

                        if (isset($_GET['accept'])) {
                            if ($_GET['accept'] == "yes") {

                                printf(__('You have accepted the cancellation request. You can <strong><a href="%s">go back</a></strong> now', 'PricerrTheme'), $return_me);

                            } else {
                                printf(__('You have not accepted the cancellation request. You can <strong><a href="%s">go back</a></strong> now', 'PricerrTheme'), $return_me);
                            }
                        } else {
                            ?><div class="job_content_page_title"><?php

                                echo '<span class="font_big_it">' . sprintf(__('Lesson Title: %s', 'PricerrTheme'), $post_au->post_title) . '</span>';
                                echo $s_message;

                                $using_perm = PricerrTheme_using_permalinks();
                                if ($using_perm) $lnk7 = get_permalink(get_option('PricerrTheme_my_account_mutual_cancellation')) . "?oid=" . $row->id;
                                else $lnk7 = get_permalink(get_option('PricerrTheme_my_account_mutual_cancellation')) . "&oid=" . $row->id;

                                ?></div>

                            <div class="job_content_page_title">
                                <a href="<?php echo $lnk7 ?>&accept=yes" class="deactivate_job"><?php _e('Accept Cancellation', 'PricerrTheme') ?></a> &nbsp; <a href="<?php echo $lnk7 ?>&accept=no" class="del_job"><?php _e('Deny Cancellation', 'PricerrTheme') ?></a>
                            </div><?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        PricerrTheme_get_users_links();

    }
}

?>