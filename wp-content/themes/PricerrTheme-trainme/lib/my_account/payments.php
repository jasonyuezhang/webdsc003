<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

if (!function_exists('PricerrTheme_my_account_payments_area_function')) {
    function PricerrTheme_my_account_payments_area_function() {
        global $current_user, $wpdb;
        get_currentuserinfo();
        $uid = $current_user->ID;

        $using_perm = PricerrTheme_using_permalinks();

        if ($using_perm) $pay_pg_lnk = get_permalink(get_option('PricerrTheme_my_account_payments_page_id')) . "/?";
        else $pay_pg_lnk = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_payments_page_id') . "&";

        //-------------------------------------
        ?>

        <div id="content-side-bar">
        <div class="my_box3">
        <div class="padd10">
        <ul id="shopping_menu">
            <li><a href="<?php echo $pay_pg_lnk; ?>pg=withdraw"><?php _e('Withdraw Money', 'PricerrTheme'); ?></a></li>
            <li><a href="<?php echo $pay_pg_lnk; ?>pg=home"><?php _e('Transactions', 'PricerrTheme'); ?></a>
            </li>
        </ul>
        <div class="clear10"></div>
        <div class="clear10"></div>

        <?php

        $pg = $_GET['pg'];
        if (!isset($pg)) $pg = 'home';


        global $wpdb;

        if ($_GET['pg'] == 'closewithdrawal') {
            $id = $_GET['id'];

            $s = "select * from " . $wpdb->prefix . "job_withdraw where id='$id' AND uid='$uid'";
            $r = $wpdb->get_results($s);

            if (count($r) == 1) {
                $row = $r[0];
                $amount = $row->amount;

                $cr = PricerrTheme_get_credits($uid);
                PricerrTheme_update_credits($uid, $cr + $amount);

                $s = "delete from " . $wpdb->prefix . "job_withdraw where id='$id' AND uid='$uid'";
                $wpdb->query($s);

                echo __('Request canceled!', 'PricerrTheme') . '<br/><br/>';
            }
        }

        if ($pg == 'home') {

            $bal = PricerrTheme_get_credits($uid);
            echo '<h1 class="balance">' . sprintf(__("Your Current Balance is: %s", "PricerrTheme"), PricerrTheme_get_show_price($bal)) . "</h1>";

            ?><div class="clear10"></div><div class="box_title"><?php _e('Pending Withdrawals', 'PricerrTheme'); ?></div><div class="padd10"><?php

                global $wpdb;

                //----------------

                $s = "select * from " . $wpdb->prefix . "job_withdraw where done='0' AND uid='$uid' order by id desc";
                $r = $wpdb->get_results($s);

                if (count($r) == 0) echo __('No withdrawals pending yet.', 'PricerrTheme');
                else {
                    echo '<table width="100%">';
                    foreach ($r as $row) // = mysql_fetch_object($r))
                    {
                        echo '<tr>';
                        echo '<td>' . date('d-M-Y H:i:s', $row->datemade) . '</td>';
                        echo '<td>' . PricerrTheme_get_show_price($row->amount) . ' ' . '</td>';
                        echo '<td>' . $row->payeremail . '</td>';
                        echo '<td><a href="' . $pay_pg_lnk . 'pg=closewithdrawal&id=' . $row->id . '" class="green_btn">' . __('Close Request', 'PricerrTheme') . '</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } ?>
            </div>
            <div class="clear10"></div>
            <div class="box_title"><?php _e("Pending Incoming Payments", "PricerrTheme"); ?></div>
            <div class="padd10">

                <?php

                global $current_user;
                get_currentuserinfo();
                $uid = $current_user->ID;

                global $wpdb;
                $prefix = $wpdb->prefix;

                $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
					 where posts.post_author='$uid' AND posts.ID=orders.pid AND orders.done_seller='0' AND 
					 orders.done_buyer='0' AND orders.date_finished='0' AND orders.closed='0' order by orders.id desc";

                $r = $wpdb->get_results($s);


                if (count($r) == 0) echo __('No payments pending yet.', 'PricerrTheme');
                else {
                    echo '<table width="100%">';
                    foreach ($r as $row) // = mysql_fetch_object($r))
                    {
                        $post = get_post($row->pid);
                        $from = get_userdata($row->uid);

                        echo '<tr>';
                        echo '<td>' . $from->user_login . '</td>';
                        echo '<td><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></td>';
                        echo '<td>' . date_i18n('d-M-Y H:i:s', $row->date_made) . '</td>';
                        echo '<td>' . PricerrTheme_get_show_price($row->mc_gross) . '</td>';

                        echo '</tr>';

                    }
                    echo '</table>';

                }

                ?>

            </div>

            <div class="box_title"><?php _e("Transactions", "PricerrTheme"); ?></div>

            <div class="padd10">

                <?php

                $s = "select * from " . $wpdb->prefix . "job_payment_transactions where uid='$uid' order by id desc";
                $r = $wpdb->get_results($s);

                if (count($r) == 0) echo __('No activity yet.', 'PricerrTheme');
                else {
                    $i = 0;
                    echo '<table width="100%" cellpadding="5">';
                    foreach ($r as $row) // = mysql_fetch_object($r))
                    {
                        if ($row->tp == 0) {
                            $class = "redred";
                            $sign = "-";
                        } else {
                            $class = "greengreen";
                            $sign = "+";
                        }

                        echo '<tr style="background:' . ($i % 2 ? "#f2f2f2" : "#f9f9f9") . '" >';
                        echo '<td>' . $row->reason . '</td>';
                        echo '<td width="25%">' . date('d-M-Y H:i:s', $row->datemade) . '</td>';
                        echo '<td width="20%" class="' . $class . '"><strong>' . $sign . PricerrTheme_get_show_price($row->amount) . '</strong></td>';

                        echo '</tr>';
                        $i++;
                    }
                    echo '</table>';
                } ?>
            </div>

        <?php } elseif ($pg == 'withdraw') { ?>
            <div class="box_title"><?php _e("Request Withdrawal", "PricerrTheme"); ?></div>
            <div class="padd10">
                <?php

                $bal = PricerrTheme_get_credits($uid);
                echo '<span class="balance">';
                printf(__('Your Current Balance is: %s', 'PricerrTheme'), PricerrTheme_get_show_price($bal));
                echo "</span><br/>";

                if (isset($_POST['withdraw']) or isset($_POST['withdraw2']) or isset($_POST['withdraw3']) or isset($_POST['withdraw4']) or isset($_POST['withdraw5']) or isset($_POST['withdraw6']) or isset($_POST['withdraw7'])) {
                    $amount = trim($_POST['amount']);
                    $paypal = trim($_POST['paypal']);

                    if (isset($_POST['withdraw2'])) $amount = trim($_POST['amount2']);
                    if (isset($_POST['withdraw3'])) $amount = trim($_POST['amount3']);
                    if (isset($_POST['withdraw4'])) $amount = trim($_POST['amount4']);
                    if (isset($_POST['withdraw5'])) $amount = trim($_POST['amount5']);
                    if (isset($_POST['withdraw6'])) $amount = trim($_POST['amount6']);
                    if (isset($_POST['withdraw7'])) $amount = trim($_POST['amount7']);

                    $PricerrTheme_withdraw_limit = get_option('PricerrTheme_withdraw_limit');
                    if (empty($PricerrTheme_withdraw_limit) or !is_numeric($PricerrTheme_withdraw_limit)) $PricerrTheme_withdraw_limit = 10;

                    if (!is_numeric($amount) || $amount < 0) {
                        echo '<span class="error">' . __('ERROR: Provide a well formated amount.', 'PricerrTheme') . '</span>';

                    } else if (PricerrTheme_isValidEmail($paypal) == false) {
                        echo '<span class="error">' . __('ERROR: Invalid email provided.', 'PricerrTheme') . '</span>';
                    } else if ($amount < $PricerrTheme_withdraw_limit) {
                        echo '<span class="error">' . sprintf(__('ERROR: The amount must be higher than: %s.', 'PricerrTheme'), PricerrTheme_get_show_price($PricerrTheme_withdraw_limit)) . '</span>';
                    } else {
                        $min = get_option('PricerrTheme_withdraw_limit');
                        if ($min == 0) $min = "0";
                        if (empty($min)) $min = 10;

                        if ($bal < $amount) {
                            echo '<span class="error">' . __('ERROR: Your balance is smaller than the amount requested.', 'PricerrTheme') . '</span>';
                        } else {

                            $method = "PayPal";

                            if (isset($_POST['withdraw2'])) $method = "Moneybookers";
                            if (isset($_POST['withdraw3'])) $method = "Payza";

                            $method = apply_filters('PricerrTheme_withdraw_method', $method);

                            $tm = current_time('timestamp', 0);
                            global $wpdb;
                            if (!empty($_POST['tm_tm'])) $tm = $_POST['tm_tm'];

                            $s = "select * from " . $wpdb->prefix . "job_withdraw where uid='$uid' AND datemade='$tm'";
                            $r = $wpdb->get_results($s);

                            if (count($r) == 0) {

                                $s = "insert into " . $wpdb->prefix . "job_withdraw (payeremail, methods, amount, datemade, uid)
								values('$paypal', '$method', '$amount', '$tm', '$uid')";
                                $wpdb->query($s);

                                $cr = PricerrTheme_get_credits($uid);
                                PricerrTheme_update_credits($uid, $cr - $amount);

                                //-----------------------

                                PricerrTheme_send_email_when_withdraw_requested($uid, $method, PricerrTheme_get_show_price($amount));

                                //-----------------------

                                //----- auto complete withdraw request -----

                                // $s = "SELECT LAST_INSERT_ID() as id";
                                // $row = $wpdb->get_results($s);
                                // $ids = $row[0]->id;

                                // $s = "select * from " . $wpdb->prefix . "job_withdraw where id='$ids'";
                                // $row = $wpdb->get_results($s);
                                // $row = $row[0];

                                // if ($row->done == 0) {
                                //    $ss = "update " . $wpdb->prefix . "job_withdraw set done='1', datedone='$tm' where id='$ids'";
                                //    $wpdb->query($ss); // or die(mysql_error());

                                //    PricerrTheme_send_email_when_withdraw_completed($row->uid, $row->methods, PricerrTheme_get_show_price($row->amount));

                                //    $reason = sprintf(__('Withdraw to %s - Details: %s', 'PricerrTheme'), $row->methods, $row->payeremail);
                                //    PricerrTheme_add_history_log('0', $reason, $row->amount, $row->uid);

                                //    $cr = PricerrTheme_get_credits($uid);
                                //    PricerrTheme_update_credits($uid, $cr - $amount);

                                //    echo '<span class="balance">' . __('Payment completed! Redirecting...', 'PricerrTheme') . '</span>';
                                //} else {
                                //    echo '<span class="balance">' . __('Withdraw Failed Please Contact Webmaster! Redirecting...', 'PricerrTheme') . '</span>';
                                //}
                                //-----------------------
                            }

                            echo '<span class="balance">' . __('Your request has been queued. Redirecting...', 'PricerrTheme') . '</span>';
                            $url_redir = $pay_pg_lnk;
                            echo '<meta http-equiv="refresh" content="2;url=' . $url_redir . '" />';
                        }
                    }
                }

                global $current_user;
                get_currentuserinfo();
                $uid = $current_user->ID;

                $opt = get_option('PricerrTheme_paypal_enable');
                if ($opt == "yes") { ?>
                    <br/>
                    <table>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <input type="hidden" value="<?php echo current_time('timestamp', 0) ?>" name="tm_tm"/>
                            <tr>
                                <td><?php _e('Withdraw amount:', 'PricerrTheme'); ?></td>
                                <td><input style="margin:6px;" value="<?php echo $_POST['amount']; ?>" type="text" size="10" name="amount"/><?php echo PricerrTheme_get_currency(); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('PayPal Email:', 'PricerrTheme'); ?></td>
                                <td><input style="margin:6px;" value="<?php echo get_user_meta($uid, 'paypal_email', true); ?>" type="text" size="30" name="paypal"/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input style="margin:6px;" class="button btn-medium-large rounded grey" style="width: 150px;" type="submit" name="withdraw" value="<?php _e('Withdraw', 'PricerrTheme'); ?>"/></td>
                            </tr>
                        </form>
                    </table>
                <?php }

                $opt = get_option('PricerrTheme_moneybookers_enable');
                if ($opt == "yes") { ?>

                    <br/><br/>

                    <table>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <input type="hidden" value="<?php echo current_time('timestamp', 0) ?>" name="tm_tm"/>
                            <tr>
                                <td><?php _e('Withdraw amount:', 'PricerrTheme'); ?></td>
                                <td><input value="<?php echo $_POST['amount2']; ?>" type="text"
                                           size="10" name="amount2"/> <?php echo PricerrTheme_get_currency(); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Moneybookers Email:', 'PricerrTheme'); ?></td>
                                <td><input value="" type="text" size="30" name="paypal"/></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="withdraw2" value="<?php _e('Withdraw', 'PricerrTheme'); ?>"/></td>
                            </tr>
                        </form>
                    </table>

                <?php }

                $opt = get_option('PricerrTheme_alertpay_enable');
                if ($opt == "yes") {

                    ?>
                    <br/><br/>

                    <table>
                        <form method="post" enctype="application/x-www-form-urlencoded">
                            <input type="hidden" value="<?php echo current_time('timestamp', 0) ?>" name="tm_tm"/>

                            <tr>
                                <td><?php _e('Withdraw amount:', 'PricerrTheme'); ?></td>
                                <td><input value="<?php echo $_POST['amount3']; ?>" type="text" size="10" name="amount3"/> <?php echo PricerrTheme_get_currency(); ?></td>
                            </tr>
                            <tr>
                                <td><?php _e('Payza Email:', 'PricerrTheme'); ?></td>
                                <td><input value="" type="text" size="30" name="paypal"/></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="withdraw3" value="<?php _e('Withdraw', 'PricerrTheme'); ?>"/></td>
                            </tr>
                        </form>
                    </table>

                <?php }

                do_action('PricerrTheme_payments_withdraw_options'); ?>

            </div>

        <?php } ?>

        <!-- page content here -->
        </div>
        </div>
        </div>
        <?php

        PricerrTheme_get_users_links();
    }
}


?>