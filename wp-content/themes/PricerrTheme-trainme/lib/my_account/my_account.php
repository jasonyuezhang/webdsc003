<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

if (!function_exists('PricerrTheme_my_account_area_function')) {
    function PricerrTheme_my_account_area_function()
    {
        global $current_user;
        get_currentuserinfo();
        $uid = $current_user->ID;

        update_user_meta($uid, 'ip_reg', $_SERVER['REMOTE_ADDR']);
        update_user_meta($uid, 'last_user_login', current_time('timestamp', 0));

        //-------------------------------------
        ?><div id="content-side-bar" class="directly-frame"><?php


//            global $wpdb;
//            $s = "select orders.id oid, posts.ID pid, count(chatbox.id) mess_count from " . $wpdb->prefix . "job_chatbox chatbox, " . $wpdb->prefix . "job_orders orders, $wpdb->posts posts where
//				chatbox.rd_receiver='0' AND chatbox.oid=orders.id AND chatbox.uid!='$uid' AND posts.ID=orders.pid AND (posts.post_author='$uid' OR orders.uid='$uid') group by orders.id  order by orders.id desc ";

//            $r = $wpdb->get_results($s);

            //echo '<pre>';
            //print_r($r);
            //echo '<pre>';

//            if (count($r) > 0) {
                ?><!--<div class="info_box_m"><table width="100%"><?php

                        foreach ($r as $row) {
                            $pst = get_post($row->pid);
                            $lkm = get_bloginfo('siteurl') . "/?jb_action=chat_box&oid=" . $row->oid;
                            echo '<tr>';
                            echo '<td width="32"><img src="' . get_bloginfo('template_url') . '/images/i_icon.png" border="0" /></td>';
                            echo '<td>';
                            echo sprintf(__('You have %s unread message(s) on the order for: <a href="%s">%s</a>', 'PricerrTheme'), $row->mess_count, $lkm, PricerrTheme_wrap_the_title($pst->post_title, $row->pid));
                            echo '</td></tr>';
                        }

                        ?></table></div>--><?php
//            }
    ?><div class="job_info_stuff2"><div class="padd5"><div class="font-my-account-info"><?php
                    _e("Active", "PricerrTheme"); ?> : <?php
                    echo PricerrTheme_nr_active_jobs($uid); ?></div><div class="separator_my-account"></div><div class="font-my-account-info"><?php
                    _e("Inactive", "PricerrTheme"); ?> : <?php
                    echo PricerrTheme_nr_inactive_jobs($uid); ?></div><div class="separator_my-account"></div><div class="font-my-account-info"><?php
                    _e("In Review", "PricerrTheme"); ?> : <?php
                    echo PricerrTheme_nr_in_review_jobs($uid); ?></div></div></div><div class="box-content clear"><?php
                global $wp_query;
                $query_vars = $wp_query->query_vars;
                $post_per_page = 10;

                query_posts("meta_key=closed&meta_value=0&post_status=publish,draft&post_type=job&order=DESC&orderby=id&author=" . $uid .
                    "&posts_per_page=" . $post_per_page . "&paged=" . $query_vars['paged']);

                if (have_posts()) :
                    while (have_posts()) : the_post();
                        PricerrTheme_get_post_small();
                    endwhile;

                    if (function_exists('wp_pagenavi')):
                        wp_pagenavi(); endif;

                else:

                    _e("There are no jobs yet.", 'PricerrTheme');

                endif;

                wp_reset_query();

                ?></div></div><?php

        PricerrTheme_get_users_links();

    }
}

?>