<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

if (!function_exists('PricerrTheme_my_account_reviews_area_function')) {
    function PricerrTheme_my_account_reviews_area_function()
    {
        global $current_user;
        get_currentuserinfo();
        $uid = $current_user->ID;

        //-------------------------------------


        global $wpdb, $wp_rewrite, $wp_query;
        $third_page = $wp_query->query_vars['third_page'];

        $third_page = $_GET['pg'];
        if (empty($_GET['pg'])) $third_page = 'home'; ?>

        <div id="content-side-bar">
        <div class="my_box3">
        <div class="padd10">

        <?php

        $using_perm = PricerrTheme_using_permalinks();

        if ($using_perm) $rev_pg_lnk = get_permalink(get_option('PricerrTheme_my_account_reviews_page_id')) . "/?";
        else $rev_pg_lnk = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_reviews_page_id') . "&";


        ?>
        <div class="shopping_menu_dv clear">
            <ul id="shopping_menu">
                <li><a <?php echo($third_page == "home" ? 'class="actiove"' : ""); ?> href="<?php echo $rev_pg_lnk; ?>"><?php _e("Ratings to Award", "PricerrTheme"); ?></a></li>
                <li><a <?php echo($third_page == "waiting" ? 'class="actiove"' : ""); ?> href="<?php echo $rev_pg_lnk; ?>pg=waiting"><?php _e("Pending Ratings", "PricerrTheme"); ?></a></li>
                <li><a <?php echo($third_page == "my_rev" ? 'class="actiove"' : ""); ?> href="<?php echo $rev_pg_lnk; ?>pg=my_rev"><?php _e("My Ratings", "PricerrTheme"); ?></a></li>
            </ul>
        </div>


        <!--<div class="clear10"></div>-->

        <?php

        if ($third_page == "home"):

            ?>

            <div class="box-content clear">
                <script>
                    jQuery(document).ready(function () {
                        /*--------------------------------------------------
                         Star Rating
                         ---------------------------------------------------*/
                        $.fn.raty.defaults.path = "<?php echo get_template_directory_uri(); ?>/images/";
                        jQuery('.star-rating').raty({
                            starOff   : 'star-lg-off.png',
                            starOn    : 'star-lg-on.png',
                            target : '#rating-me-hint',
                            targetKeep : true
                        })
                        .find('img').click(function () {
                                $(this).parent().attr('value',$(this).attr('alt'));
                        });
                        jQuery('.dd-submit-rating').click(function () {
                            var id = jQuery(this).attr('rel');
                            var uprating = jQuery("#rating-me-" + id).attr('value');
                            var reason = jQuery("#reason-" + id).val();
	                        var error = false;
	                        var errormsg = "";
	                        if (!uprating) {
		                        errormsg += "Please enter a rating.\n";
		                        error = true;
	                        }
	                        if (reason.length < 10) {
		                        errormsg += "Your comment is too short.\n";
		                        error = true;
	                        }
	                        if (error) {
		                        alert(errormsg);
		                        return false;
	                        }
                            jQuery.ajax({
                                type: "POST",
                                url: "<?php echo get_bloginfo('siteurl'); ?>/",
                                data: "rate_me=1&ids=" + id + "&uprating=" + uprating + "&reason=" + reason,
                                success: function (msg) {
                                    jQuery("#post-" + id).hide('slow');
                                }
                            });
                            return false;
                        });
                    });
                </script>
                <?php

                global $wpdb;
                $query = "select distinct *, ratings.id ratid from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders where ratings.awarded='0' AND orders.id=ratings.orderid AND orders.uid='$uid'";
                $r = $wpdb->get_results($query);

                if (count($r) > 0):

                    foreach ($r as $row) {
                        $post = $row->pid;
                        $post = get_post($post);
                        $user = get_userdata($row->touser);

                        ?>

                        <div class="post" id="post-<?php echo $row->ratid; ?>">
                            <div class="padd10_only white-wrapper">
                                <div class="image_holder3">
                                    <a href="<?php the_permalink(); ?>"><img width="65" height="50" src="<?php echo PricerrTheme_get_first_post_image($row->pid, 65, 50); ?>"/></a>
                                </div>
                                <div class="title_holder3">
                                    <h2><a href="<?php echo get_permalink($row->pid); ?>"><?php echo PricerrTheme_wrap_the_title($post->post_title, $row->pid); ?></a></h2>
                                </div>
                                <div class="content_holder3">
                                    <div class="c111 star-rate">
                                        <div class="rating-me-label">How you like this lesson?</div>
                                        <div name="rating-me" id="rating-me-<?php echo $row->ratid; ?>" class="star-rating"></div>
                                        <div id="rating-me-hint"></div>
                                    </div>
                                    <div class="c111 rate-comment clear">
                                        <div class="c111 rate-comment-label">Comments:</div>
                                        <div class="c111 rate-comment-textarea">
                                            <textarea id="reason-<?php echo $row->ratid; ?>" rows="4" cols="65"></textarea>
                                        </div>
                                    </div>
                                    <div class="c111 ck999">
                                        <a href="#" rel="<?php echo $row->ratid; ?>" class="show_status dd-submit-rating"><?php _e('Submit Rating Now', 'PricerrTheme') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                else:
                    _e("There are no reviews to be awarded.", "PricerrTheme");
                endif; ?>
            </div>

        <?php elseif ($third_page == "waiting"): ?>
            <div class="box-content clear">

                <?php

                global $wpdb;
                $query = "select distinct * from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders," . $wpdb->prefix . "posts posts where posts.ID=orders.pid AND ratings.awarded='0' AND orders.id=ratings.orderid AND posts.post_author='$uid'";
                $r = $wpdb->get_results($query);

                if (count($r) > 0):


                    foreach ($r as $row) {
                        $post = $row->pid;
                        $post = get_post($post);
                        $user = get_userdata($row->uid);

                        ?>

                        <div class="post" id="post-<?php echo $row->ratid; ?>">
                            <div class="padd10_only">
                                <div class="image_holder3">
                                    <a href="<?php the_permalink(); ?>">
                                        <img width="65" height="50" src="<?php echo PricerrTheme_get_first_post_image($row->pid, 65, 50); ?>"/>
                                    </a>
                                </div>
                                <div class="title_holder3">
                                    <h2>
                                        <a href="<?php echo get_permalink($row->pid); ?>"><?php echo PricerrTheme_wrap_the_title($post->post_title, $row->pid); ?></a>
                                    </h2>
                                    <?php echo sprintf(__('Waiting from: %s', 'PricerrTheme'), $user->user_login); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                else:
                    _e("You have no pending reviews.", "PricerrTheme");
                endif;
                ?>
            </div>
        <?php
        elseif ($third_page == "my_rev"): ?>
            <div class="box-content clear">
                <?php

                global $wpdb;
                $query = "select distinct *, ratings.id ratid from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders,
					" . $wpdb->prefix . "posts posts where posts.ID=orders.pid AND
					 ratings.awarded='1' AND orders.id=ratings.orderid AND posts.post_author='$uid'";
                $r = $wpdb->get_results($query);

                if (count($r) > 0) {

                    foreach ($r as $row) {
                        $post = $row->pid;
                        $post = get_post($post);
                        $user = get_userdata($row->touser);

                        ?>

                        <div class="post" id="post-<?php echo $row->ratid; ?>">
                            <div class="padd10_only">
                                <div class="image_holder3">
                                    <a href="<?php the_permalink(); ?>">
                                        <img width="65" height="50" src="<?php echo PricerrTheme_get_first_post_image($row->pid, 65, 50); ?>"/>
                                    </a>
                                </div>
                                <div class="title_holder3">
                                    <h2>
                                        <a href="<?php echo get_permalink($row->pid); ?>"><?php echo PricerrTheme_wrap_the_title($post->post_title, $row->pid); ?></a>
                                    </h2>
                                </div>
                                <div class="c111"><strong><?php _e("Rated", "PricerrTheme"); ?>: </strong></div>

                                <div class="c111"><?php

                                    echo PricerrTheme_show_stars_our_of_number($row->grade);

                                    ?>
                                </div>
                                <div class="clear10" style="float:left"></div>
                                <div class="c111"><strong><?php _e("Description", "PricerrTheme"); ?>: </strong></div>
                                <div class="c111"><?php echo stripslashes($row->reason); ?></div>
                            </div>
                        </div>
                    <?php

                    }

                } else {
                    _e("You have no reviews.", "PricerrTheme");
                }
                ?>
            </div>
        <?php endif; ?>
        <!-- page content here -->
        </div>
        </div>
        </div>
        <?php
        PricerrTheme_get_users_links();
    }
}
?>