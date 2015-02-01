<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

if (!function_exists('PricerrTheme_post_new_area_function')) {
    function PricerrTheme_post_new_area_function()
    {
        global $current_user, $wp_query;
        get_currentuserinfo();
        $uid = $current_user->ID;
        $PricerrTheme_post_new_page_id = get_option('PricerrTheme_post_new_page_id');

        //-*******************************************************************************

        $pid = $_GET['jobid'];
        global $post_PID, $post_new_error, $adOK;
        $post_PID = $pid;

        $post = get_post($pid);
        $job_location = trim($_POST['job_location']);
        //$location = wp_get_object_terms($pid, 'job_location');
        $cat = wp_get_object_terms($pid, 'job_cat');

        global $current_user;
        get_currentuserinfo();
        $cid = $current_user->ID;
        $post = get_post($pid);
        $wp_query->is_home = false;

        //-*********************************************************************************


        $shipping = trim($_POST['shipping']);
        $max_days = trim($_POST['max_days']);
        $start_date = trim($_POST['start_date']);
        $start_time = trim($_POST['start_time']);
        $end_date = trim($_POST['end_date']);
        $end_time = trim($_POST['end_time']);
        $space_total = trim($_POST['space_total']);
        $ttl = (empty($_SESSION['i_will']) ? $post->post_title : $_SESSION['i_will']);

        $job_tags = trim($_POST['job_tags']);

        //---------------------

        $ttl = (empty($_SESSION['i_will']) ?
        ($post->post_title == "Auto Draft" ? "" : get_post_meta($post->ID, 'title_variable', true)) : $_SESSION['i_will']); ?>

        <div id="content">
        <div class="my_box3" style="overflow:hidden">
        <div class="box_content" id="post_new_divs">
        <?php if (is_array($post_new_error))
            if ($adOK == 0) {
                echo '<div class="errrs">';

                foreach ($post_new_error as $e)
                    echo '<div class="newad_error">' . $e . '</div>';

                echo '</div>';
            }
        ?><script type="text/javascript">
            function delete_this(id) {
                $.ajax({
                    method: 'get',
                    url: '<?php echo get_bloginfo('siteurl');?>/index.php/?_ad_delete_pid=' + id,
                    dataType: 'text',
                    success: function (text) {
                        $('#image_ss' + id).remove();
                        window.location.reload();
                    }
                });
            }
        </script>
        <div class="post-new-form">
            <form id="post-new-form" method="post" enctype="multipart/form-data" action="<?php echo PricerrTheme_post_new_with_pid_stuff_thg($pid); ?>">
                <div class="post-new-group">
                    <div class="col-sm-3">
                        <div class="post-new-label">
                            <label><?php echo __('Group Name', 'PricerrTheme'); ?></label>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div>
                            <input class="do_input post-new-textbox" name="job_title" maxlength="99" size="40" value="<?php echo stripslashes($ttl); ?>">
                        </div>
                    </div>
                </div>
                <div class="input-daterange input-group date" id="datepicker">
                    <div class="post-new-group">
                        <div class="col-sm-3">
                            <div class="post-new-label">
                                <label><?php echo __('Start Time', 'PricerrTheme'); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="date-input-wrapper">
                                <span class="glyphicon glyphicon-calendar datetime-icon"></span><input id="start_date" name="start_date" class="form-control post-new-textbox-half date-input" type="text" data-provide="datepicker" value="<?php echo $start_date; ?>"/><span class="glyphicon glyphicon-time datetime-icon"></span><input id="start_time" name="start_time" type="text" class="post-new-textbox-half time-input" value="<?php echo $start_time; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="post-new-group">
                        <div class="col-sm-3">
                            <div class="post-new-label">
                                <label><?php echo __('End Time', 'PricerrTheme'); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="date-input-wrapper">
                                <span class="glyphicon glyphicon-calendar datetime-icon"></span><input id="end_date" name="end_date" class="form-control post-new-textbox-half date-input" type="text" data-provide="datepicker" value="<?php echo $end_date; ?>"/><span class="glyphicon glyphicon-time datetime-icon"></span><input id="end_time" name="end_time" type="text" class="post-new-textbox-half time-input" value="<?php echo $end_time; ?>">
                            </div>
                        </div>
                    </div>
                </div><script>
                    function display_subcat(vals) {
                        $.post("<?php bloginfo('siteurl'); ?>/?get_subcats_for_me=1", {queryString: "" + vals + ""}, function (data) {
                            if (data.length > 0) {
                                $('#sub_cats').html(data);
                            }
                        });
                    }
                </script>
                <div class="post-new-group">
                    <div class="col-sm-3">
                        <div class="post-new-label">
                            <label><?php echo __('Category', 'PricerrTheme'); ?></label>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div><?php
                            echo PricerrTheme_get_categories_click("job_cat",
                                !isset($_POST['job_cat_cat']) ? (is_array($cat) ? $cat[0]->term_id : "") : htmlspecialchars($_POST['job_cat_cat']) ,
                                __('Select Category', 'PricerrTheme'), "do_input post-new-textbox", 'onchange="display_subcat(this.value)"');
                            ?>
                        </div>
                    </div>
                </div>
                <span id="sub_cats"><?php
                        if (!empty($cat[1]->term_id)) {

                            $args2 = "orderby=name&order=ASC&hide_empty=0&parent=" . $cat[0]->term_id;
                            $sub_terms2 = get_terms('job_cat', $args2);

                            $ret = '<div class="col-sm-3"><div class="post-new-label"><label>' . __('Subcategory', 'PricerrTheme') . '</label></div></div><div class="col-sm-9"><div>';
                            $ret .= '<select class="do_input" name="subcat">';
                            $ret .= '<option value="">' . __('Select Subcategory', 'PricerrTheme') . '</option>';
                            $selected1 = $cat[1]->term_id;

                            foreach ($sub_terms2 as $sub_term2) {
                                $sub_id2 = $sub_term2->term_id;
                                $ret .= '<option ' . ($selected1 == $sub_id2 ? "selected='selected'" : " ") . ' value="' . $sub_id2 . '">' . $sub_term2->name . '</option>';
                            }
                            $ret .= "</select></div></div>";
                            echo $ret;
                        }
                    ?></span>
                <div class="post-new-group">
                    <div class="col-sm-3">
                        <div class="post-new-label">
                            <label><?php echo __('Space Available', 'PricerrTheme'); ?></label>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div>
                            <input id="space_total" class="do_input post-new-textbox" type="number" name="space_total" maxlength="5" size="5" min="0" max="999" value="<?php echo $space_total ?>" placeholder="<?php _e('For unlimited space put 0', 'PricerrTheme'); ?>">
                        </div>
                    </div>
                </div>
                <div class="post-new-group-large">
                    <div class="col-sm-3">
                        <div class="post-new-label">
                            <label><?php echo __('Description', 'PricerrTheme'); ?></label>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div>
                            <textarea rows="6" cols="40" class="do_input post-new-textarea" name="job_description" placeholder="<?php _e('Maximum 500 characters', 'PricerrTheme'); ?>"><?php echo empty($_POST['job_description']) ? trim(stripslashes($post->post_content)) : trim(stripslashes($_POST['job_description'])); ?></textarea>
                        </div>
                    </div>
                </div>

                <?php $instruction_box = get_post_meta($pid, 'instruction_box', true); ?>

                <div class="post-new-group-large">
                    <div class="col-sm-3">
                        <div class="post-new-label">
                            <label><?php echo __('Instructions to students', 'PricerrTheme'); ?></label>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div>
                            <textarea rows="6" cols="40" class="do_input post-new-textarea" name="instruction_box" placeholder="<?php _e('Maximum 500 characters', 'PricerrTheme'); ?>"><?php echo empty($_POST['instruction_box']) ? trim(stripslashes($instruction_box)) : htmlspecialchars(stripslashes($_POST['instruction_box'])); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="post-new-group">
                    <div class="col-sm-3">
                        <div class="post-new-label">
                            <label><?php echo __('Lesson Location', 'PricerrTheme'); ?></label>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div>
                            <input type="text" class="do_input post-new-textbox" name="job_location" size="34" value="<?php echo $job_location ?>"/>
                            <?php
                            // $locs = get_user_meta($uid, 'user_location', true);

                            // echo PricerrTheme_get_categories("job_location",
                            //     !isset($_POST['job_location_cat']) ? $locs : htmlspecialchars($_POST['job_location_cat'])
                            //     , __('Select Location', 'PricerrTheme'), "do_input");
                            ?>
                        </div>
                    </div>
                </div>
                <?php

                $PricerrTheme_enable_shipping = get_option('PricerrTheme_enable_shipping');
                if ($PricerrTheme_enable_shipping == "yes"):

                    ?>

                    <div class="post-new-group">
                        <div class="col-sm-3">
                            <div class="post-new-label">
                                <label><?php echo __('Requires shipping?', 'PricerrTheme'); ?></label>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div>
                                <?php if (PricerrTheme_show_price_in_front())
                                    echo PricerrTheme_get_currency(); ?>
                                <input type="text" size="5" class="do_input post-new-textbox" name="shipping" value="<?php echo(empty($shipping) ? get_post_meta($pid, 'shipping', true) : $shipping); ?>"/>
                                <?php if (!PricerrTheme_show_price_in_front())
                                    echo PricerrTheme_get_currency(); ?>
                            </div>
                        </div>
                    </div>

                    <?php do_action('PricerrTheme_after_shipping_field', $pid); ?>

                <?php endif; ?>

                <!--<li>
                    <h2><?php //echo __('Max Days to Deliver', 'PricerrTheme'); ?></h2>

                    <p><input type="text" size="10" class="do_input" name="max_days" value="<?php //echo(empty($max_days) ? get_post_meta($pid, 'max_days', true) : $max_days); ?>"/></p>
                </li>-->

                <?php

                $PricerrTheme_enable_instant_deli = get_option('PricerrTheme_enable_instant_deli');
                if ($PricerrTheme_enable_instant_deli != "no"):

                    ?>

                    <!--<div class="post-new-group">
                        <div class="col-sm-3">
                            <div class="post-new-label">
                                <label><?php echo __('Instant Delivery File', 'PricerrTheme'); ?></label>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div>
                                <?php

                                $args = array(
                                    'order' => 'ASC',
                                    'orderby' => 'post_date',
                                    'post_type' => 'attachment',
                                    'post_parent' => $pid,
                                    'post_mime_type' => 'application/zip',
                                    'numberposts' => -1,
                                );
                                $i = 0;

                                $attachments = get_posts($args);

                                if (count($attachments) == 0): ?>
                                    <input type="file" class="do_input" name="file_instant"/>
                                    (<?php _e('Only ZIP Files', 'PricerrTheme'); ?>)
                                <?php
                                else:
                                    if ($attachments) {
                                        foreach ($attachments as $attachment) {
                                            $url = wp_get_attachment_url($attachment->ID);

                                            echo '<p class="div_div2"  id="image_ss' . $attachment->ID . '">' . $attachment->post_title . '
                                                            <a href="javascript: void(0)" onclick="delete_this(\'' . $attachment->ID .
                                                '\')"><img border="0" src="' . get_bloginfo('template_url') .
                                                '/images/delete_icon.png" /></a></p>';
                                        }
                                    }
                                endif; ?>
                            </div>
                        </div>
                    </div>-->


                <?php endif; ?>


                <!--<li>
                    <h2><?php echo __('Images', 'PricerrTheme'); ?></h2>

                    <p>
                        <?php

                        $args = array(
                            'order' => 'ASC',
                            'orderby' => 'post_date',
                            'post_type' => 'attachment',
                            'post_parent' => $pid,
                            'post_mime_type' => 'image',
                            'numberposts' => -1,
                        );
                        $i = 0;

                        $attachments = get_posts($args);

                        $default_nr = get_option('PricerrTheme_default_nr_of_pics');
                        if (empty($default_nr)) $default_nr = 5;

                        $actual_nr = count($attachments);
                        $dis = $default_nr - $actual_nr;

                        for ($i = 1; $i <= $dis; $i++):
                            ?><input type="file" class="do_input" name="file_<?php echo $i; ?>"/><?php
                        endfor;
                        ?></p></li><li><div id="thumbnails" style="overflow:hidden;"><?php



                        if ($pid > 0)
                            if ($attachments) {
                                foreach ($attachments as $attachment) {
                                    $url = wp_get_attachment_url($attachment->ID);

                                    echo '<div class="div_div"  id="image_ss' . $attachment->ID . '"><img width="70" class="image_class" height="70" src="' .
                                        PricerrTheme_generate_thumb($url, 70, 70) . '" /><a href="javascript: void(0)" onclick="delete_this(\'' .
                                        $attachment->ID . '\')"><img border="0" src="' . get_bloginfo('template_url') .
                                        '/images/delete_icon.png" /></a></div>';
                                }
                            }
                        ?>

                    </div>

                </li>-->


                <?php do_action('PricerrTheme_before_youtube_links'); ?>

                <?php
                global $current_user;
                get_currentuserinfo();
                $uid = $current_user->ID;

                $user_level = PricerrTheme_get_user_level($uid);
                $sts = get_option('PricerrTheme_level' . $user_level . '_vds');

                if ($sts > 3) $sts = 3;

                for ($i = 1; $i <= $sts; $i++) {

                    ?>

                    <div class="post-new-group">
                        <div class="col-sm-3">
                            <div class="post-new-label">
                                <label><?php echo sprintf(__('Youtube Video Link #%s', 'PricerrTheme'), $i); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div>
                                <input class="do_input post-new-textbox" type="text" size="40" name="youtube_link<?php echo $i; ?>" class="do_input" value="<?php echo get_post_meta($pid, 'youtube_link' . $i, true); ?>"/>
                            </div>
                        </div>
                    </div>
                <?php

                }

                do_action('PricerrTheme_after_youtube_links'); ?>

                <?php

                $PricerrTheme_enable_extra = get_option('PricerrTheme_enable_extra');
                if ($PricerrTheme_enable_extra != "no"):

                    $sts = get_option('PricerrTheme_get_total_extras');
                    if (empty($sts))
                        $sts = 3;

                    global $current_user;
                    get_currentuserinfo();
                    $uid = $current_user->ID;

                    $user_level = PricerrTheme_get_user_level($uid);
                    $sts = get_option('PricerrTheme_level' . $user_level . '_extras');

                    if ($sts > 0):
                        for ($i = 1; $i <= $sts; $i++) { ?>
                            <div class="post-new-group">
                                <div class="col-sm-3">
                                    <div class="post-new-label">
                                        <label><?php _e('For an extra ', 'PricerrTheme'); ?></label>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div>
                                        <?php if (PricerrTheme_show_price_in_front() == true) echo PricerrTheme_get_currency(); ?>
                                        <input type="text" size="3" name="extra<?php echo $i; ?>_price" value="<?php echo stripslashes(get_post_meta($pid, 'extra' . $i . '_price', true)); ?>"/>
                                        <?php if (PricerrTheme_show_price_in_front() == false) echo PricerrTheme_get_currency(); ?>
                                        <?php _e('I will:', 'PricerrTheme'); ?>
                                        <textarea name="extra<?php echo $i; ?>_content" cols="31" rows="1"><?php echo stripslashes(get_post_meta($pid, 'extra' . $i . '_content', true)); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    endif;
                endif; ?>

                <div class="post-new-group">
                    <input class="post-new-button" type="submit" name="Pricerr_post_new_job" value="<?php _e("Post New Lesson", 'PricerrTheme'); ?>"/>
                </div>
            </form>
        </div>
        </div>
        </div>
        </div>

        <!-- ################### -->

        <div id="right-sidebar">
            <ul class="xoxo">
                <?php dynamic_sidebar('other-page-area'); ?>
            </ul>
        </div>

    <?php

    }
}

?>