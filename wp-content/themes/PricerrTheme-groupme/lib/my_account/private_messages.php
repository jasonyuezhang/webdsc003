<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

function PricerrTheme_my_account_priv_mess_area_function()
{
    global $current_user;
    get_currentuserinfo();
    $uid = $current_user->ID;
    $myuid = $current_user->ID;

    //-------------------------------------


    global $wpdb, $wp_rewrite, $wp_query;
    $third_page = $_GET['priv_act'];

    if (empty($third_page)) $third_page = 'home';


    $using_perm = PricerrTheme_using_permalinks();

    if ($using_perm) $privurl_m = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')) . "/?";
    else $privurl_m = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_priv_mess_page_id') . "&";

    ?><div id="content-side-bar">
    <div class="my_box3">
        <div class="padd10">
            <div class="padd10"><a href="<?php
                echo $privurl_m; ?>" class="green_btn"><?php
                    _e("Messaging Home", "PricerrTheme"); ?></a><a href="<?php
                echo $privurl_m; ?>priv_act=send" class="green_btn"><?php
                    _e("Send New Message", "PricerrTheme"); ?></a><a href="<?php
                echo $privurl_m; ?>priv_act=inbox" class="green_btn"><?php
                    _e("Inbox", "PricerrTheme");

                    global $current_user;
                    get_currentuserinfo();
                    $rd = PricerrTheme_get_unread_number_messages($current_user->ID);
                    if ($rd > 0) echo ' (' . $rd . ')';

                    ?></a><a href="<?php
                echo $privurl_m; ?>priv_act=sent-items" class="green_btn"><?php
                    _e("Sent Items", "PricerrTheme"); ?></a></div></div></div><div class="clear10"></div><?php

    if ($third_page == 'home') { ?>
        <div class="my_box3">
            <div class="padd10">

                <div class="box-title"><?php _e("Latest Received Messages", "PricerrTheme"); ?></div>
                <div class="box_content">
                    <?php
                    global $wpdb;
                    $s = "select * from " . $wpdb->prefix . "job_pm where user='$myuid' AND show_to_destination='1' order by id desc limit 4";
                    $r = $wpdb->get_results($s);

                    if (count($r) > 0) {
                        echo '<table width="100%">';

                        echo '<tr>';
                        echo '<td>' . __('From User', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Subject', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Date', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Options', 'PricerrTheme') . '</td>';
                        echo '</tr>';


                        foreach ($r as $row) {
                            if ($row->rd == 0) $cls = 'bold_stuff';
                            else $cls = '';

                            $user = get_userdata($row->initiator);

                            echo '<tr>';
                            echo '<td class="' . $cls . '"><a href="' . PricerrTheme_get_user_profile_link($user->user_login) . '">' . $user->user_login . '</a></td>';
                            echo '<td class="' . $cls . '">' . $row->subject . '</td>';
                            echo '<td class="' . $cls . '">' . date_i18n('d-M-Y H:i:s', $row->datemade) . '</td>';
                            echo '<td><a href="' . $privurl_m . 'priv_act=read-message&id=' . $row->id . '">' . __('Read', 'PricerrTheme') . '</a> | <a href="' . $privurl_m . 'priv_act=delete-message&id=' . $row->id . '&return=home">' . __('Delete', 'PricerrTheme') . '</a></td>';
                            echo '</tr>';

                        }


                        echo '</table>';
                    } else _e('No messages here.', 'PricerrTheme');

                    ?>

                </div>
            </div>
        </div>


        <!--#######-->

        <div class="clear10"></div>


        <div class="my_box3">
            <div class="padd10">
                <div class="box-title"><?php _e("Latest Sent Items", "PricerrTheme"); ?></div>
                <div class="box_content">
                    <?php
                    global $wpdb;
                    $s = "select * from " . $wpdb->prefix . "job_pm where initiator='$myuid'  AND show_to_source='1' order by id desc limit 4";
                    $r = $wpdb->get_results($s);

                    if (count($r) > 0) {
                        echo '<table width="100%">';

                        echo '<tr>';
                        echo '<td>' . __('To User', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Subject', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Date', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Options', 'PricerrTheme') . '</td>';
                        echo '</tr>';


                        foreach ($r as $row) {
                            //if($row->rd == 0) $cls = 'bold_stuff';
                            //else
                            $cls = '';

                            $user = get_userdata($row->user);

                            echo '<tr>';
                            echo '<td class="' . $cls . '"><a href="' . PricerrTheme_get_user_profile_link($user->user_login) . '">' . $user->user_login . '</a></td>';
                            echo '<td class="' . $cls . '">' . $row->subject . '</td>';
                            echo '<td class="' . $cls . '">' . date_i18n('d-M-Y H:i:s', $row->datemade) . '</td>';
                            echo '<td><a href="' . $privurl_m . 'priv_act=read-message&id=' . $row->id . '">' . __('Read', 'PricerrTheme') . '</a> | <a href="' . $privurl_m . 'priv_act=delete-message&id=' . $row->id . '&return=home">' . __('Delete', 'PricerrTheme') . '</a></td>';
                            echo '</tr>';

                        }


                        echo '</table>';
                    } else _e('No messages here.', 'PricerrTheme');
                    ?>

                </div>
            </div>
        </div>




        <!-- page content here -->

    <?php
    } elseif ($third_page == 'inbox') {
        ?>

        <!-- page content here -->


        <div class="my_box3">
            <div class="padd10">

                <div class="box-title"><?php _e("Inbox", "PricerrTheme"); ?></div>
                <div class="box_content">
                    <?php

                    global $wpdb;
                    $nrpostsPage = 12;
                    $page = $_GET['pj'];
                    if (empty($page)) $page = 1;

                    $querystr2 = "select id from " . $wpdb->prefix . "job_pm where user='$myuid' AND show_to_destination='1'";

                    $pageposts2 = $wpdb->get_results($querystr2, OBJECT);
                    $total_count = (count($pageposts2) == 0 ? 1 : count($pageposts2));
                    $my_page = $page;
                    $pages_curent = $page;

                    //-----------------------------------------------------------------------
                    $totalPages = ($total_count > 0 ? ceil($total_count / $nrpostsPage) : 0);
                    $pagess = $totalPages;


                    $s = "select * from " . $wpdb->prefix . "job_pm where user='$myuid' AND show_to_destination='1' order by id desc LIMIT " . ($nrpostsPage * ($page - 1)) . "," . $nrpostsPage;
                    $r = $wpdb->get_results($s);

                    if (count($r) > 0) {
                        echo '<table width="100%">';

                        echo '<tr>';
                        echo '<td>' . __('From User', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Subject', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Date', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Options', 'PricerrTheme') . '</td>';
                        echo '</tr>';


                        foreach ($r as $row) {
                            if ($row->rd == 0) $cls = 'bold_stuff';
                            else $cls = '';

                            $user = get_userdata($row->initiator);

                            echo '<tr>';
                            echo '<td class="' . $cls . '"><a href="' . PricerrTheme_get_user_profile_link($user->user_login) . '">' . $user->user_login . '</a></td>';
                            echo '<td class="' . $cls . '">' . $row->subject . '</td>';
                            echo '<td class="' . $cls . '">' . date_i18n('d-M-Y H:i:s', $row->datemade) . '</td>';
                            echo '<td><a href="' . $privurl_m . 'priv_act=read-message&id=' . $row->id . '">' . __('Read', 'PricerrTheme') . '</a> | <a href="' . $privurl_m . 'priv_act=delete-message&id=' . $row->id . '&return=inbox">' . __('Delete', 'PricerrTheme') . '</td>';
                            echo '</tr>';

                        }


                        echo '</table>';
                        ?>


                        <div class="nav">
                            <?php

                            $batch = 10; //ceil($page / $nrpostsPage );
                            $end = $batch * $nrpostsPage;


                            if ($end > $pagess) {
                                $end = $pagess;
                            }
                            $start = $end - $nrpostsPage + 1;

                            if ($start < 1) $start = 1;

                            $links = '';


                            $raport = ceil($my_page / $batch) - 1;
                            if ($raport < 0) $raport = 0;

                            $start = $raport * $batch + 1;
                            $end = $start + $batch - 1;
                            $end_me = $end + 1;
                            $start_me = $start - 1;

                            if ($end > $totalPages) $end = $totalPages;
                            if ($end_me > $totalPages) $end_me = $totalPages;

                            if ($start_me <= 0) $start_me = 1;

                            $previous_pg = $page - 1;
                            if ($previous_pg <= 0) $previous_pg = 1;

                            $next_pg = $pages_curent + 1;
                            if ($next_pg > $totalPages) $next_pg = 1;


                            //PricerrTheme_get_browse_jobs_link($job_tax, $job_category, 'new', $page)

                            if ($my_page > 1) {
                                echo '<a href="' . PricerrTheme_get_browse_pm_link($previous_pg) . '"><< ' . __('Previous', 'PricerrTheme') . '</a>';
                                echo '<a href="' . PricerrTheme_get_browse_pm_link($start_me) . '"><<</a>';
                            }
                            //------------------------
                            //echo $start." ".$end;
                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $pages_curent) {
                                    echo '<a class="activee" href="#">' . $i . '</a>';
                                } else {

                                    echo '<a href="' . PricerrTheme_get_browse_pm_link($i) . '">' . $i . '</a>';

                                }
                            }

                            //----------------------

                            if ($totalPages > $my_page)
                                echo '<a href="' . PricerrTheme_get_browse_pm_link($end_me) . '">>></a>';

                            if ($page < $totalPages)
                                echo '<a href="' . PricerrTheme_get_browse_pm_link($next_pg) . '">' . __('Next', 'PricerrTheme') . ' >></a>';

                            ?>
                        </div> <?php


                    } else _e('No messages here.', 'PricerrTheme');

                    ?>

                </div>
            </div>
        </div>


        <!-- page content here -->

    <?php
    } elseif ($third_page == 'sent-items') {

        ?>

        <!-- page content here -->


        <div class="my_box3">
            <div class="padd10">

                <div class="box-title"><?php _e("Sent Items", "PricerrTheme"); ?></div>
                <div class="box_content">
                    <?php

                    global $wpdb;
                    $nrpostsPage = 12;
                    $page = $_GET['pj'];
                    if (empty($page)) $page = 1;

                    $querystr2 = "select id from " . $wpdb->prefix . "job_pm where initiator='$myuid'  AND show_to_source='1'";

                    $pageposts2 = $wpdb->get_results($querystr2, OBJECT);
                    $total_count = (count($pageposts2) == 0 ? 1 : count($pageposts2));
                    $my_page = $page;
                    $pages_curent = $page;

                    //-----------------------------------------------------------------------
                    $totalPages = ($total_count > 0 ? ceil($total_count / $nrpostsPage) : 0);
                    $pagess = $totalPages;

                    $s = "select * from " . $wpdb->prefix . "job_pm where initiator='$myuid'  AND show_to_source='1' order by id desc LIMIT " . ($nrpostsPage * ($page - 1)) . "," . $nrpostsPage;
                    $r = $wpdb->get_results($s);

                    if (count($r) > 0) {
                        echo '<table width="100%">';

                        echo '<tr>';
                        echo '<td>' . __('To User', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Subject', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Date', 'PricerrTheme') . '</td>';
                        echo '<td>' . __('Options', 'PricerrTheme') . '</td>';
                        echo '</tr>';


                        foreach ($r as $row) {
                            //if($row->rd == 0) $cls = 'bold_stuff';
                            //else
                            $cls = '';

                            $user = get_userdata($row->user);

                            echo '<tr>';
                            echo '<td class="' . $cls . '"><a href="' . PricerrTheme_get_user_profile_link($user->user_login) . '">' . $user->user_login . '</a></td>';
                            echo '<td class="' . $cls . '">' . $row->subject . '</td>';
                            echo '<td class="' . $cls . '">' . date_i18n('d-M-Y H:i:s', $row->datemade) . '</td>';
                            echo '<td><a href="' . $privurl_m . 'priv_act=read-message&id=' . $row->id . '">' . __('Read', 'PricerrTheme') . '</a> | <a href="' . $privurl_m . 'priv_act=delete-message&id=' . $row->id . '&return=outbox">' . __('Delete', 'PricerrTheme') . '</a></td>';
                            echo '</tr>';

                        }


                        echo '</table>';
                        ?>

                        <div class="nav">
                            <?php

                            $batch = 10; //ceil($page / $nrpostsPage );
                            $end = $batch * $nrpostsPage;


                            if ($end > $pagess) {
                                $end = $pagess;
                            }
                            $start = $end - $nrpostsPage + 1;

                            if ($start < 1) $start = 1;

                            $links = '';

                            $raport = ceil($my_page / $batch) - 1;
                            if ($raport < 0) $raport = 0;

                            $start = $raport * $batch + 1;
                            $end = $start + $batch - 1;
                            $end_me = $end + 1;
                            $start_me = $start - 1;

                            if ($end > $totalPages) $end = $totalPages;
                            if ($end_me > $totalPages) $end_me = $totalPages;

                            if ($start_me <= 0) $start_me = 1;

                            $previous_pg = $page - 1;
                            if ($previous_pg <= 0) $previous_pg = 1;

                            $next_pg = $pages_curent + 1;
                            if ($next_pg > $totalPages) $next_pg = 1;


                            //PricerrTheme_get_browse_jobs_link($job_tax, $job_category, 'new', $page)

                            if ($my_page > 1) {
                                echo '<a href="' . PricerrTheme_get_browse_pm_link2($previous_pg) . '"><< ' . __('Previous', 'PricerrTheme') . '</a>';
                                echo '<a href="' . PricerrTheme_get_browse_pm_link2($start_me) . '"><<</a>';
                            }
                            //------------------------
                            //echo $start." ".$end;
                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $pages_curent) {
                                    echo '<a class="activee" href="#">' . $i . '</a>';
                                } else {
                                    echo '<a href="' . PricerrTheme_get_browse_pm_link2($i) . '">' . $i . '</a>';
                                }
                            }

                            //----------------------

                            if ($totalPages > $my_page)
                                echo '<a href="' . PricerrTheme_get_browse_pm_link2($end_me) . '">>></a>';

                            if ($page < $totalPages)
                                echo '<a href="' . PricerrTheme_get_browse_pm_link2($next_pg) . '">' . __('Next', 'PricerrTheme') . ' >></a>';

                            ?>
                        </div>

                    <?php
                    } else _e('No messages here.', 'PricerrTheme');
                    ?>

                </div>
            </div>
        </div>


        <!-- page content here -->

    <?php
    } elseif ($third_page == 'read-message') {


        $id = $_GET['id'];
        $s = "select * from " . $wpdb->prefix . "job_pm where id='$id' AND (user='$myuid' OR initiator='$myuid')";
        $r = $wpdb->get_results($s);
        $row = $r[0];

        if ($myuid == $row->initiator) $owner = true; else $owner = false;

        if (!$owner)
            $wpdb->query("update " . $wpdb->prefix . "job_pm set rd='1' where id='{$row->id}'");


        ?>

        <!-- page content here -->


        <div class="my_box3">
            <div class="padd10">

                <div class="box-title"><?php _e("Read Message: ", "PricerrTheme");
                    echo " " . $row->subject ?>
                </div>
                <div class="box_content">
                    <?php

                    $mess = $row->content;

                    $PricerrTheme_filter_urls_private_messages = get_option('PricerrTheme_filter_urls_private_messages');
                    if ($PricerrTheme_filter_urls_private_messages == "yes") {
                        $mess = PricerrTheme_url_cleaner($row->content);
                    }

                    //-----------------------

                    $PricerrTheme_filter_emails_private_messages = get_option('PricerrTheme_filter_emails_private_messages');

                    if ($PricerrTheme_filter_emails_private_messages == "yes") {
                        $pattern = "/[^@\s]*@[^@\s]*\.[^@\s]*/";
                        $replacement = "[****]";
                        preg_replace($pattern, $replacement, $mess);
                    }

                    echo $mess;

                    ?>
                    <br/>
                    <br/>

                    <?php if ($owner == false): ?>
                        <a href="<?php echo $privurl_m; ?>priv_act=send&<?php echo 'pid=' . $row->pid . '&uid=' . $row->initiator; ?>" class="nice_link"><?php _e("Reply"); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <!-- page content here -->

    <?php
    } elseif ($third_page == 'delete-message') {


        $id = $_GET['id'];
        $s = "select * from " . $wpdb->prefix . "job_pm where id='$id' AND (user='$myuid' OR initiator='$myuid')";
        $r = $wpdb->get_results($s);
        $row = $r[0];

        global $current_user;
        get_currentuserinfo();
        $myuid = $current_user->ID;


        if ($myuid == $row->initiator) $owner = true; else $owner = false;

        //if(!$owner)
        //$wpdb->query("update_i18n ".$wpdb->prefix."auction_pm set rd='1' where id='{$row->id}'");


        ?>

        <!-- page content here -->


        <div class="my_box3">
            <div class="padd10">

                <div class="box-title"><?php _e("Delete Message: ", "PricerrTheme");
                    echo " " . $row->subject ?></div>
                <div class="box_content">
                    <?php echo $row->content; ?>
                    <br/> <br/>

                    <?php if (1): //$owner == false): ?>
                        <a class="button btn-medium-large rounded grey" href="<?php echo $privurl_m; ?>priv_act=delete-message&<?php echo 'id=' . $row->id . '&return=' . $_GET['return'] . "&confirm_message_deletion=yes"; ?>" class="nice_link"><?php _e("Confirm Deletion", 'PricerrTheme'); ?></a> <?php endif; ?>
                </div>
            </div>
        </div>


        <!-- page content here -->

    <?php
    } elseif ($third_page == 'send') {
        ?>
        <?php

        $pid = $_GET['pid'];
        $uid = $_GET['uid'];

        $user = get_userdata($uid);

        if (!empty($pid)) {
            $post = get_post($pid);
            $subject = "RE: " . $post->post_title;
        }


        if (isset($_POST['send'])) {
            $subject = htmlspecialchars($_POST['subject']);
            $message = nl2br(htmlspecialchars($_POST['message']));
            $to = $_POST['to'];

            if (!empty($to)) {
                $uid = PricerrTheme_get_userid_from_username($to);
            }

            //--- parse emails out of the private messages -------

            $PricerrTheme_filter_emails_private_messages = get_option('PricerrTheme_filter_emails_private_messages');
            if ($PricerrTheme_filter_emails_private_messages == "yes") $message = PricerrTheme_parseEmails($message);

            //--- parse links out of the private messages  ---

            $PricerrTheme_filter_urls_private_messages = get_option('PricerrTheme_filter_urls_private_messages');
            if ($PricerrTheme_filter_urls_private_messages == "yes") $message = PricerrTheme_parseHyperlinks($message);

            //----------------------

            if ($uid != false):

                global $current_user;
                get_currentuserinfo();
                $myuid = $current_user->ID;
                $tm_tm = $_POST['tm_tm'];

                global $wpdb;

                $s = "select * from " . $wpdb->prefix . "job_pm where initiator='$myuid' and datemade='$tm_tm'";
                $r = $wpdb->get_results($s);

                if (count($r) == 0) {

                    $s = "insert into " . $wpdb->prefix . "job_pm (subject, content, datemade, pid, initiator, user) values('$subject','$message','$tm_tm','$pid','$myuid','$uid')";
                    $wpdb->query($s);

                    //-----------------------

                    PricerrTheme_send_email_when_new_PM($myuid, $uid, $subject, $message);

                }
                //-----------------------
                ?>

                <div class="my_box3">
                    <div class="padd10">
                        <?php _e('Your message has been sent.', 'PricerrTheme'); ?>
                    </div>
                </div>

            <?php

            else:

                echo '<div class="error">' . __('Invalid username', 'PricerrTheme') . "</div>";

            endif;
        } else {


            ?>

            <div class="my_box3">
                <div class="padd10">

                    <div class="box-title"><?php _e("Send Private Message to: ", "PricerrTheme"); ?> <?php echo $user->user_login; ?></div>
                    <div class="box_content">
                        <form method="post"><input type="hidden" value="<?php echo current_time('timestamp', 0) ?>" name="tm_tm"/>
                            <table><?php if (empty($uid)):
                                    ?><tr>
                                        <td width="50"><?php _e("Send To", "PricerrTheme"); ?>:</td>
                                        <td><input size="20" name="to" type="text" value=""/></td>
                                    </tr><?php
                                endif;
                                ?><tr>
                                    <td width="50"><?php _e("Subject", "PricerrTheme"); ?>:</td>
                                    <td><input size="37" name="subject" type="text" value="<?php echo $subject; ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="50" valign="top"><?php _e("Message", "PricerrTheme"); ?>:</td>
                                    <td><textarea name="message" rows="6" cols="38"></textarea></td>
                                </tr>

                                <tr>
                                    <td width="50">&nbsp;</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td width="50">&nbsp;</td>
                                    <td>
                                        <input class="button btn-medium-large rounded grey" name="send" type="submit" value="<?php _e("Send Message", 'PricerrTheme'); ?>"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
    } ?>

    </div>

    <?php

    PricerrTheme_get_users_links();

}

?>