<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/


if (isset($_POST['delete_variable_job_fee'])) {

    if (is_user_logged_in()) {
        if (current_user_can('manage_options')) {
            $ids = $_POST['delete_variable_job_fee'];
            global $wpdb;
            $ss = "delete from " . $wpdb->prefix . "job_var_costs where id='$ids'";
            $wpdb->query($ss);
            exit;
        }
    }
}

function PricerrTheme_theme_bullet($rn = '')
{
    global $menu_admin_PricerrTheme_theme_bull;
    $menu_admin_PricerrTheme_theme_bull = '<a href="#" class="tltp_cls" title="' . $rn . '"><img src="' . get_bloginfo('template_url') . '/images/qu_icon.png" /></a>';
    echo $menu_admin_PricerrTheme_theme_bull;

}

function PricerrTheme_disp_spcl_cst_pic($pic)
{
    return '<img src="' . get_bloginfo('template_url') . '/images/' . $pic . '" /> ';
}

function PricerrTheme_admin_menu()
{
    $icn = get_bloginfo('template_url') . "/images/pricerr.gif";
    $capability = 10;

    add_menu_page(__('Pricerr Theme'), __('Pricerr Theme', 'PricerrTheme'), $capability, "PT1_admin_mnu", 'PricerrTheme_summary_scr', $icn, 0);
    add_submenu_page("PT1_admin_mnu", __('Site Summary', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('overview_icon.png') . __('Site Summary', 'PricerrTheme'), $capability, "PT1_admin_mnu", 'PricerrTheme_summary_scr');
    add_submenu_page("PT1_admin_mnu", __('General Options', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('setup_icon.png') . __('General Options', 'PricerrTheme'), $capability, "general-options", 'PricerrTheme_general_options');
    add_submenu_page("PT1_admin_mnu", __('Layout Settings', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('layout_icon.png') . __('Layout Settings', 'PricerrTheme'), $capability, "layout-settings", 'PricerrTheme_layout_settings');
    add_submenu_page('PT1_admin_mnu', __('Category Images', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('image_icon.png') . __('Category Images', 'PricerrTheme'), '10', 'cat_images', 'PricerrTheme_category_images');
    add_submenu_page("PT1_admin_mnu", __('Email Settings', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('email_icon.png') . __('Email Settings', 'PricerrTheme'), $capability, 'email-settings', 'PricerrTheme_email_settings');
    add_submenu_page("PT1_admin_mnu", __('Pricing Settings', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('dollar_icon.png') . __('Pricing Settings', 'PricerrTheme'), $capability, 'pricing-settings', 'PricerrTheme_pricing_options');
    add_submenu_page("PT1_admin_mnu", __('Payment Gateways', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('gateway_icon.png') . __('Payment Gateways', 'PricerrTheme'), $capability, 'payment-methods', 'PricerrTheme_payment_methods');
    add_submenu_page('PT1_admin_mnu', __('Withdraw Requests', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('wallet_icon.png') . __('Withdraw Requests', 'PricerrTheme'), $capability, 'withdraw-req', 'PricerrTheme_withdrawals');
    add_submenu_page('PT1_admin_mnu', __('User Balances', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('bal_icon.png') . __('User Balances', 'PricerrTheme'), '10', 'User-Balances', 'PricerrTheme_user_balances');
    add_submenu_page('PT1_admin_mnu', __('User Badges', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('badge1.png') . __('User Badges', 'PricerrTheme'), '10', 'user_badges', 'PricerrTheme_user_badges');
    add_submenu_page('PT1_admin_mnu', __('User Levels', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('bdg1.png') . __('User Levels', 'PricerrTheme'), '10', 'user_levels', 'PricerrTheme_user_levels');
    add_submenu_page("PT1_admin_mnu", __('InSite Transactions', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('list_icon.png') . __('InSite Transactions', 'PricerrTheme'), $capability, 'trans-site', 'PricerrTheme_hist_trans');
    add_submenu_page('PT1_admin_mnu', __('Orders', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('orders_icon.png') . __('Orders', 'PricerrTheme'), $capability, 'order-stats', 'PricerrTheme_orders_m');
    add_submenu_page('PT1_admin_mnu', __('User Reviews', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('review_icon.png') . __('User Reviews', 'PricerrTheme'), $capability, 'usrrev', 'PricerrTheme_user_reviews_scr');
    add_submenu_page('PT1_admin_mnu', __('Private Messages', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('mess_icon.png') . __('Private Messages', 'PricerrTheme'), $capability, 'privmess', 'PricerrTheme_private_messages_scr');
    add_submenu_page('PT1_admin_mnu', __('Chat Messages', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('mess_icon.png') . __('Chat Messages', 'PricerrTheme'), $capability, 'chatmess', 'PricerrTheme_chat_messages_scr');
    add_submenu_page("PT1_admin_mnu", __('Tracking Tools', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('track_icon.png') . __('Tracking Tools', 'PricerrTheme'), $capability, 'track-tools', 'PricerrTheme_tracking_tools');
    add_submenu_page("PT1_admin_mnu", __('Advertising', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('adv_icon.png') . __('Advertising', 'PricerrTheme'), $capability, 'adv-tools', 'PricerrTheme_advertising_scr');
    add_submenu_page("PT1_admin_mnu", __('Info Stuff', 'PricerrTheme'), PricerrTheme_disp_spcl_cst_pic('info_icon.png') . __('Info Stuff', 'PricerrTheme'), $capability, 'info-stuff', 'PricerrTheme_information');

    do_action('PricerrTheme_new_admin_options_menu');

}

global $menu_admin_PricerrTheme_theme_bull;
$menu_admin_PricerrTheme_theme_bull = '<img src="' . get_bloginfo('template_url') . '/images/qu_icon.png" />';

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_summary_scr()
{
    $id_icon = 'icon-options-general8';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Site Summary', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

    <div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1" class="selected"><?php _e('Main Summary', 'PricerrTheme'); ?></a></li>
        <!-- <li><a href="#tabs2"><?php _e('Other Information', 'PricerrTheme'); ?></a></li> -->

    </ul>
    <div id="tabs1">
        <table width="100%" class="sitemile-table">
            <tr>
                <td width="200">Total number of jobs</td>
                <td><?php echo PricerrTheme_get_total_nr_of_listings(); ?></td>
            </tr>

            <tr>
                <td>Open jobs</td>
                <td><?php echo PricerrTheme_get_total_nr_of_open_listings(); ?></td>
            </tr>

            <tr>
                <td>Closed</td>
                <td><?php echo PricerrTheme_get_total_nr_of_closed_listings(); ?></td>
            </tr>

            <!--          
          <tr>
          <td>Disputed & Not Finished</td>
          <td>12</td>
          </tr>
  -->
            <tr>
                <td>Total Users</td>
                <td><?php
                    $result = count_users();
                    echo 'There are ', $result['total_users'], ' total users';
                    foreach ($result['avail_roles'] as $role => $count)
                        echo ', ', $count, ' are ', $role, 's';
                    echo '.';
                    ?></td>
            </tr>
        </table>
    </div>

    <div id="tabs2">

    </div>

    <?php echo '</div>';
}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_information()
{
    $id_icon = 'icon-options-general-info';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Information', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

    <div id="usual2" class="usual">
        <ul>
            <li><a href="#tabs1" class="selected"><?php _e('Main Information', 'PricerrTheme'); ?></a></li>
            <li><a href="#tabs2"><?php _e('From SiteMile Blog', 'PricerrTheme'); ?></a></li>
        </ul>
        <div id="tabs1" style="display: block; ">

            <table width="100%" class="sitemile-table">

                <tr>
                    <td width="260"><?php _e('PricerrTheme Version:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_VERSION; ?></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('PricerrTheme Latest Release:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_RELEASE; ?></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('WordPress Version:', 'PricerrTheme'); ?></td>
                    <td><?php bloginfo('version'); ?></td>
                </tr>


                <tr>
                    <td width="160"><?php _e('Go to SiteMile official page:', 'PricerrTheme'); ?></td>
                    <td><a class="festin" href="http://sitemile.com">SiteMile - Premium WordPress Themes</a></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('Go to Pricerr official page:', 'PricerrTheme'); ?></td>
                    <td><a class="festin" href="http://sitemile.com/p/pricerr">Pricerr Micro-Lesson Theme</a></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('Go to support forums:', 'PricerrTheme'); ?></td>
                    <td><a class="festin" href="http://sitemile.com/forums">SiteMile Support Forums</a></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('Contact SiteMile Team:', 'PricerrTheme'); ?></td>
                    <td><a class="festin" href="http://sitemile.com/contact-us">Contact Form</a></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('Like us on Facebook:', 'PricerrTheme'); ?></td>
                    <td><a class="festin" href="http://facebook.com/sitemile">SiteMile Facebook Fan Page</a></td>
                </tr>

                <tr>
                    <td width="160"><?php _e('Follow us on Twitter:', 'PricerrTheme'); ?></td>
                    <td><a class="festin" href="http://twitter.com/sitemile">SiteMile Twitter Page</a></td>
                </tr>

            </table>

        </div>

        <div id="tabs2" style="display: none; overflow:hidden ">

            <?php
            echo '<div style="float:left;">';
            wp_widget_rss_output(array(
                'url' => 'http://sitemile.com/feed/',
                'title' => 'Latest news from SiteMile.com Blog',
                'items' => 10,
                'show_summary' => 1,
                'show_author' => 0,
                'show_date' => 1
            ));
            echo "</div>";

            ?>

        </div>
    </div>
    <?php
}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_advertising_scr()
{

    $id_icon = 'icon-options-general-adve';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Advertising Spaces', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    if (isset($_POST['PricerrTheme_save1'])) {
        update_option('PricerrTheme_adv_code_home_above_content', trim($_POST['PricerrTheme_adv_code_home_above_content']));
        update_option('PricerrTheme_adv_code_home_below_content', trim($_POST['PricerrTheme_adv_code_home_below_content']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {
        update_option('PricerrTheme_adv_code_job_page_above_content', trim($_POST['PricerrTheme_adv_code_job_page_above_content']));
        update_option('PricerrTheme_adv_code_job_page_below_content', trim($_POST['PricerrTheme_adv_code_job_page_below_content']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save3'])) {
        update_option('PricerrTheme_adv_code_cat_page_above_content', trim($_POST['PricerrTheme_adv_code_cat_page_above_content']));
        update_option('PricerrTheme_adv_code_cat_page_below_content', trim($_POST['PricerrTheme_adv_code_cat_page_below_content']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save4'])) {
        update_option('PricerrTheme_adv_code_single_page_above_content', trim($_POST['PricerrTheme_adv_code_single_page_above_content']));
        update_option('PricerrTheme_adv_code_single_page_below_content', trim($_POST['PricerrTheme_adv_code_single_page_below_content']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('HomePage', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Lesson Page', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs3"><?php _e('Category Page', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs4"><?php _e('Single Blog/Normal Page', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=adv-tools&active_tab=tabs1">
            <table width="100%" class="sitemile-table">
                <tr>
                    <td valign="top"><?php _e('Above the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_home_above_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_home_above_content')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td valign="top"><?php _e('Below the content area:', 'PricerrTheme'); ?></td>
                    <td><textarea name="PricerrTheme_adv_code_home_below_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_home_below_content')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>
    </div>

    <div id="tabs2">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=adv-tools&active_tab=tabs2">
            <table width="100%" class="sitemile-table">
                <tr>
                    <td valign="top"><?php _e('Above the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_job_page_above_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_job_page_above_content')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign="top"><?php _e('Below the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_job_page_below_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_job_page_below_content')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>
    </div>

    <div id="tabs3">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=adv-tools&active_tab=tabs3">
            <table width="100%" class="sitemile-table">
                <tr>
                    <td valign="top"><?php _e('Above the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_cat_page_above_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_cat_page_above_content')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign="top"><?php _e('Below the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_cat_page_below_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_cat_page_below_content')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save3" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>
    </div>

    <div id="tabs4">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=adv-tools&active_tab=tabs4">
            <table width="100%" class="sitemile-table">
                <tr>
                    <td valign="top"><?php _e('Above the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_single_page_above_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_single_page_above_content')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign="top"><?php _e('Below the content area:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea name="PricerrTheme_adv_code_single_page_below_content" rows="6" cols="60"><?php echo stripslashes(get_option('PricerrTheme_adv_code_single_page_below_content')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save4" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>
    </div>

    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_get_cat_pic_attached($cat_id)
{
    $args = array(
        'order' => 'ASC',
        'post_type' => 'attachment',
        'meta_key' => 'category_image',
        'meta_value' => $cat_id,
        'numberposts' => -1,
        'post_status' => null,
    );
    $attachments = get_posts($args);
    if (count($attachments) > 0) {
        return $attachments[0]->ID;
    }

    return false;
}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_category_images()
{
    $id_icon = 'icon-options-general-img';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Category Images', 'PricerrTheme');
    global $menu_admin_PricerrTheme_theme_bull;

    //------------------------------------------------------

    $arr = array("yes" => __("Yes", 'PricerrTheme'), "no" => __("No", 'PricerrTheme'));

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<?php

if (isset($_POST['set_category_image'])) {
    $category_id = $_POST['category_id'];
    $category_image = $_POST['category_image'];

    if (!empty($_FILES['category_image']['name'])):

        $upload_overrides = array('test_form' => false);
        $uploaded_file = wp_handle_upload($_FILES['category_image'], $upload_overrides);

        $file_name_and_location = $uploaded_file['file'];
        $file_title_for_media_library = $_FILES['category_image']['name'];

        $arr_file_type = wp_check_filetype(basename($_FILES['category_image']['name']));
        $uploaded_file_type = $arr_file_type['type'];

        if ($uploaded_file_type == "image/png" or $uploaded_file_type == "image/jpg" or $uploaded_file_type == "image/jpeg" or $uploaded_file_type == "image/gif") {

            $attachment = array(
                'post_mime_type' => $uploaded_file_type,
                'post_title' => addslashes($file_title_for_media_library),
                'post_content' => '',
                'post_status' => 'inherit',
                'post_parent' => 0,

                'post_author' => $cid,
            );

            $attach_id = wp_insert_attachment($attachment, $file_name_and_location, 0);
            $attach_data = wp_generate_attachment_metadata($attach_id, $file_name_and_location);
            wp_update_attachment_metadata($attach_id, $attach_data);

            update_post_meta($attach_id, 'category_image', $category_id);

        }

        echo '<div class="saved_thing">' . __('Image attached. Done.', 'PricerrTheme') . '</div>';

    else:


        echo '<div class="saved_thing">' . __('Please select an image.', 'PricerrTheme') . '</div>';

    endif;

}

?>

    <style>

        .crme_brullet {
            padding: 2px;
            background: white;
            border: 1px solid #ccc;
        }

    </style>


    <script type="text/javascript">

        function delete_this_my_pic(id) {
            jQuery.ajax({
                method: 'get',
                url: '<?php echo get_bloginfo('siteurl');?>/index.php?_ad_delete_pid=' + id,
                dataType: 'text',
                success: function (text) {
                    window.location.reload();

                    return false;
                }
            });
            //alert("a");

            return false;

        }

    </script>


<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('Set Images', 'PricerrTheme'); ?></a></li>
    </ul>

    <div id="tabs1">
        <?php

        $categories = get_terms('job_cat', array(
            'parent' => '0',
            'hide_empty' => 0
        ));
        if (count($categories) > 0) {
            ?>

            <table class="sitemile-table" width="650">
                <tr>
                    <td><strong><?php echo __('Category Name', 'PricerrTheme') ?></strong></td>
                    <td><strong><?php echo __('Upload Picture', 'PricerrTheme') ?></strong></td>
                    <td><strong><?php echo __('Current Picture', 'PricerrTheme') ?></strong></td>
                </tr>


                <?php
                foreach ($categories as $cat) {

                    $PricerrTheme_get_cat_pic_attached = PricerrTheme_get_cat_pic_attached($cat->term_id);

                    ?>

                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $cat->term_id ?>" name="category_id"/>
                        <tr>
                            <td><?php echo $cat->name ?></td>
                            <td><?php if ($PricerrTheme_get_cat_pic_attached == false): ?>

                                    <input type="file" name="category_image" size="20"/>

                                <?php else: ?>
                                    <?php _e('Picture attached already.', 'PricerrTheme'); ?>
                                <?php endif; ?>
                            </td>
                            <td>

                                <?php if ($PricerrTheme_get_cat_pic_attached == false): ?>

                                    <input type="submit" name="set_category_image" size="20" value="<?php _e('Upload Image', 'PricerrTheme'); ?>"/>

                                <?php else: ?>

                                    <img src="<?php echo PricerrTheme_generate_thumb2($PricerrTheme_get_cat_pic_attached, 40, 40); ?>" width="40" height="40" class="crme_brullet"/>
                                    <a href="" onclick="return delete_this_my_pic('<?php echo $PricerrTheme_get_cat_pic_attached ?>')">
                                        <img src="<?php bloginfo('template_url') ?>/images/delete.gif" border="0"/>
                                    </a>
                                <?php endif; ?>

                            </td>
                        </tr>
                    </form>

                <?php } ?>

            </table>
        <?php } ?>

    </div>

    <?php

    echo '</div>';

}

function PricerrTheme_layout_settings()
{
    $id_icon = 'icon-options-general-layout';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Layout Settings', 'PricerrTheme');
    global $menu_admin_PricerrTheme_theme_bull;

    //------------------------------------------------------

    $arr = array("yes" => __("Yes", 'PricerrTheme'), "no" => __("No", 'PricerrTheme'));

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    if (isset($_POST['PricerrTheme_save4'])) {
        update_option('PricerrTheme_color_for_top_links', trim($_POST['PricerrTheme_color_for_top_links']));
        update_option('PricerrTheme_color_for_bk', trim($_POST['PricerrTheme_color_for_bk']));
        update_option('PricerrTheme_color_for_footer', trim($_POST['PricerrTheme_color_for_footer']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save1'])) {
        update_option('PricerrTheme_home_page_layout', trim($_POST['PricerrTheme_home_page_layout']));
        update_option('PricerrTheme_enable_how_it_works', trim($_POST['PricerrTheme_enable_how_it_works']));
        update_option('Pricerr_main_how_it_works', trim($_POST['Pricerr_main_how_it_works']));
        update_option('Pricerr_main_how_it_works_line1', trim($_POST['Pricerr_main_how_it_works_line1']));
        update_option('Pricerr_main_how_it_works_line2', trim($_POST['Pricerr_main_how_it_works_line2']));
        update_option('Pricerr_how_it_works_page', trim($_POST['Pricerr_how_it_works_page']));
        update_option('Pricerr_main_how_it_works_link', trim($_POST['Pricerr_main_how_it_works_link']));
        update_option('Pricerr_main_how_it_works_img_img', trim($_POST['Pricerr_main_how_it_works_img_img']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {
        update_option('PricerrTheme_logo_URL', trim($_POST['PricerrTheme_logo_URL']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save3'])) {
        update_option('PricerrTheme_left_side_footer', stripslashes(trim($_POST['PricerrTheme_left_side_footer'])));
        update_option('PricerrTheme_right_side_footer', stripslashes(trim($_POST['PricerrTheme_right_side_footer'])));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    //-----------------------------------------

    $PricerrTheme_home_page_layout = get_option('PricerrTheme_home_page_layout');
    if (empty($PricerrTheme_home_page_layout)) $PricerrTheme_home_page_layout = "1";

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('HomePage', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Header', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs3"><?php _e('Footer', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs4"><?php _e('Change Colors', 'PricerrTheme'); ?></a></li>
    </ul>

    <div id="tabs4">
        <form method="post"
              action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=layout-settings&active_tab=tabs4">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td width="200"><?php _e('Color for background:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" id="colorpickerField1" name="PricerrTheme_color_for_bk" value="<?php echo get_option('PricerrTheme_color_for_bk'); ?>"/>
                        <script>

                            jQuery('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
                                onSubmit: function (hsb, hex, rgb, el) {
                                    jQuery(el).val(hex);
                                    jQuery(el).ColorPickerHide();
                                },
                                onBeforeShow: function () {
                                    jQuery(this).ColorPickerSetColor(this.value);
                                }
                            })
                                .bind('keyup', function () {
                                    jQuery(this).ColorPickerSetColor(this.value);
                                });

                        </script>

                    </td>
                </tr>

                <tr>
                    <td width="200"><?php _e('Color for footer:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" id="colorpickerField2" name="PricerrTheme_color_for_footer" value="<?php echo get_option('PricerrTheme_color_for_footer'); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td width="200"><?php _e('Color for top links:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" id="colorpickerField3" name="PricerrTheme_color_for_top_links" value="<?php echo get_option('PricerrTheme_color_for_top_links'); ?>"/>
                    </td>
                </tr>

                <tr>

                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save4" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="tabs1">

        <form method="post"
              action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=layout-settings&active_tab=tabs1">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(__('The layout of the homepage.', 'PricerrTheme')); ?></td>
                    <td class="ttl">
                        <strong><?php _e("Choose from the home page layouts available:", "PricerrTheme"); ?></strong>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td valign=top width="22"></td>
                    <td width="350"><?php _e("Content + Right Sidebar:", "PricerrTheme"); ?> </td>
                    <td>
                        <input type="radio" name="PricerrTheme_home_page_layout" value="1" <?php if ($PricerrTheme_home_page_layout == "1") echo 'checked="checked"'; ?> />
                        <img src="<?php bloginfo('template_url'); ?>/images/layout1.jpg"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top width="22"></td>
                    <td><?php _e("Content + Left Sidebar + Right Sidebar:", "PricerrTheme"); ?> </td>
                    <td>
                        <input type="radio" name="PricerrTheme_home_page_layout" value="2" <?php if ($PricerrTheme_home_page_layout == "2") echo 'checked="checked"'; ?> />
                        <img src="<?php bloginfo('template_url'); ?>/images/layout2.jpg"/></td>
                </tr>


                <tr>
                    <td valign=top width="22"></td>
                    <td><?php _e("Left Sidebar + Content + Right Sidebar:", "PricerrTheme"); ?> </td>
                    <td>
                        <input type="radio" name="PricerrTheme_home_page_layout" value="3" <?php if ($PricerrTheme_home_page_layout == "3") echo 'checked="checked"'; ?>/>
                        <img src="<?php bloginfo('template_url'); ?>/images/layout3.jpg"/></td>
                </tr>


                <tr>
                    <td valign=top width="22"></td>
                    <td><?php _e("Left Sidebar + Content:", "PricerrTheme"); ?> </td>
                    <td>
                        <input type="radio" name="PricerrTheme_home_page_layout" value="4" <?php if ($PricerrTheme_home_page_layout == "4") echo 'checked="checked"'; ?>/>
                        <img src="<?php bloginfo('template_url'); ?>/images/layout4.jpg"/></td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td><?php _e("Content:", "PricerrTheme"); ?> </td>
                    <td>
                        <input type="radio" name="PricerrTheme_home_page_layout" value="5" <?php if ($PricerrTheme_home_page_layout == "5") echo 'checked="checked"'; ?>/>
                        <img src="<?php bloginfo('template_url'); ?>/images/layout5.jpg"/></td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet('This will enable the frontpage graphic, with the slogan abd get started link.'); ?></td>
                    <td><?php _e("HomePage enable main graphic:", "PricerrTheme"); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_how_it_works'); ?></td>
                </tr>

                <!--    <tr> <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
        <td ><?php _e("HomePage 'How it works' graphic:", "PricerrTheme"); ?></td>
        <td><input type="text" name="Pricerr_main_how_it_works" size="50" value="<?php echo get_option('Pricerr_main_how_it_works'); ?>"  /> (740x150)</td>
        </tr>
        -->

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet('First line of the slogan seen in homepage.'); ?></td>
                    <td><?php _e("HomePage main slogan (line1):", "PricerrTheme"); ?></td>
                    <td>
                        <input type="text" name="Pricerr_main_how_it_works_line1" size="50" value="<?php echo stripslashes(get_option('Pricerr_main_how_it_works_line1')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet('Second line of the slogan seen in homepage.'); ?></td>
                    <td><?php _e("HomePage main slogan (line2):", "PricerrTheme"); ?></td>
                    <td>
                        <input type="text" name="Pricerr_main_how_it_works_line2" size="50" value="<?php echo stripslashes(get_option('Pricerr_main_how_it_works_line2')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet('Leave the box empty to have default value (Post New Lesson Link)'); ?></td>
                    <td><?php _e("Getting Started Link:", "PricerrTheme"); ?></td>
                    <td><input type="text" name="Pricerr_main_how_it_works_link" size="50"
                               value="<?php echo stripslashes(get_option('Pricerr_main_how_it_works_link')); ?>"/></td>
                </tr>

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet('Leave empty to use the default one. http://your-site.com/wp-content/themes/PricerrTheme/images/img1.jpg'); ?></td>
                    <td><?php _e("Link for homepage graphic:", "PricerrTheme"); ?></td>
                    <td>
                        <input type="text" name="Pricerr_main_how_it_works_img_img" size="50" value="<?php echo stripslashes(get_option('Pricerr_main_how_it_works_img_img')); ?>"/>
                        recommended size: 2400x240
                    </td>
                </tr>

                <tr>
                    <td valign=top width="22"></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs2">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=layout-settings&active_tab=tabs2">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22">
                        <?php PricerrTheme_theme_bullet(__('Eg: http://your-site-url.com/images/logo.jpg', 'PricerrTheme')); ?>
                    </td>
                    <td><?php _e('Logo URL:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="45" name="PricerrTheme_logo_URL" value="<?php echo get_option('PricerrTheme_logo_URL'); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs3">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=layout-settings&active_tab=tabs3">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22">
                        <?php PricerrTheme_theme_bullet(__('This will appear in the left side of the footer area.', 'PricerrTheme')); ?>
                    </td>
                    <td valign="top">
                        <?php _e('Left side footer area content:', 'PricerrTheme'); ?>
                    </td>
                    <td>
                        <textarea cols="65" rows="4" name="PricerrTheme_left_side_footer">
                            <?php echo stripslashes(get_option('PricerrTheme_left_side_footer')); ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(__('This will appear in the right side of the footer area.', 'PricerrTheme')); ?></td>
                    <td valign="top"><?php _e('Right side footer area content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="65" rows="4" name="PricerrTheme_right_side_footer"><?php echo stripslashes(get_option('PricerrTheme_right_side_footer')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save3" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>


    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_tracking_tools()
{
    $id_icon = 'icon-options-general-track';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Tracking Tools', 'PricerrTheme');
    $arr = array("yes" => __("Yes", 'PricerrTheme'), "no" => __("No", 'PricerrTheme'));
    global $menu_admin_PricerrTheme_theme_bull;

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    if (isset($_POST['PricerrTheme_save1'])) {
        update_option('PricerrTheme_enable_google_analytics', trim($_POST['PricerrTheme_enable_google_analytics']));
        update_option('PricerrTheme_analytics_code', trim($_POST['PricerrTheme_analytics_code']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {
        update_option('PricerrTheme_enable_other_tracking', trim($_POST['PricerrTheme_enable_other_tracking']));
        update_option('PricerrTheme_other_tracking_code', trim($_POST['PricerrTheme_other_tracking_code']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1" class="selected"><?php _e('Google Analytics', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Other Tracking Tools', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">


        <form method="post" action="">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Enable Google Analytics:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_google_analytics'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign="top"><?php _e('Analytics Code:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea rows="6" cols="80" name="PricerrTheme_analytics_code"><?php echo stripslashes(get_option('PricerrTheme_analytics_code')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>


    </div>

    <div id="tabs2">

        <form method="post" action="">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Enable Other Tracking:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_other_tracking'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign="top"><?php _e('Other Tracking Code:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea rows="6" cols="80" name="PricerrTheme_other_tracking_code"><?php echo stripslashes(get_option('PricerrTheme_other_tracking_code')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>


    </div>


    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/
function PricerrTheme_chat_messages_scr()
{
    $id_icon = 'icon-options-general-mess';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Chat Box Messages', 'PricerrTheme');
    global $wpdb;
    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';


    if (isset($_GET['del_mess'])) {
        $del_mess = $_GET['del_mess'];
        global $wpdb;

        $s = "delete from " . $wpdb->prefix . "job_chatbox where id='$del_mess'";
        $wpdb->query($s);

        echo '<div class="saved_thing">' . __('Message was deleted', 'PricerrTheme') . '</div>';
    }


    ?>


<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All Chat Messages', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search User', 'PricerrTheme'); ?></a></li>

    </ul>
    <div id="tabs1">

        <?php

        $nrpostsPage = 10;
        $page = $_GET['pj'];
        if (empty($page)) $page = 1;
        $my_page = $page;

        $s = "select * from " . $wpdb->prefix . "job_chatbox order by id desc limit " . ($nrpostsPage * ($page - 1)) . " ,$nrpostsPage";
        $r = $wpdb->get_results($s);


        $s1 = "select id from " . $wpdb->prefix . "job_chatbox order by id desc";
        $r1 = $wpdb->get_results($s1);


        if (count($r) > 0):

            $total_nr = count($r1);

            $nrposts = $total_nr;
            $totalPages = ceil($nrposts / $nrpostsPage);
            $pagess = $totalPages;
            $batch = 10; //ceil($page / $nrpostsPage );


            $start = floor($my_page / $batch) * $batch + 1;
            $end = $start + $batch - 1;
            $end_me = $end + 1;
            $start_me = $start - 1;

            if ($end > $totalPages) $end = $totalPages;
            if ($end_me > $totalPages) $end_me = $totalPages;

            if ($start_me <= 0) $start_me = 1;

            $previous_pg = $my_page - 1;
            if ($previous_pg <= 0) $previous_pg = 1;

            $next_pg = $my_page + 1;
            if ($next_pg >= $totalPages) $next_pg = 1;




            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th><?php _e('Sender', 'PricerrTheme'); ?></th>
                    <th><?php _e('Lesson Owner', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Lesson Title', 'PricerrTheme'); ?></th>
                    <th><?php _e('Sent On', 'PricerrTheme'); ?></th>
                    <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>


                <tbody>
                <?php

                $i = 0;

                foreach ($r as $row) {


                    $PricerrTheme_get_order_row_obj = PricerrTheme_get_order_row_obj($row->oid);

                    $pst = get_post($PricerrTheme_get_order_row_obj->pid);
                    $post_author = get_userdata($pst->post_author);
                    $sender = get_userdata($row->uid);

                    //------------------------

                    if ($i % 2) $new_bg_color = '#E7E9F1';
                    else $new_bg_color = '#fff';

                    $i++;

                    echo '<tr style="background:' . $new_bg_color . '">';
                    echo '<th>' . $sender->user_login . '</th>';
                    echo '<th>' . $post_author->user_login . '</th>';
                    echo '<th><a href="' . get_permalink($PricerrTheme_get_order_row_obj->pid) . '">' . $pst->post_title . '</a></th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>';

                    echo '<a href="' . get_admin_url() . 'admin.php?page=chatmess&pj=' . $_GET['pj'] . '&del_mess=' . $row->id . '">' . __('Delete', 'PricerrTheme') . '</a>';

                    echo '</th>';
                    echo '</tr>';

                    echo '<tr style="background:' . $new_bg_color . '" id="mess_age_' . $row->id . '">';
                    echo '<th colspan="5"><strong>Message Content:</strong> ' . $row->content . '</th>';
                    echo '</tr>';
                }

                ?>
                </tbody>


            </table>
            <?php


            if ($start > 1)
                echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=chatmess&pj=' . $previous_pg . '"><< ' . __('Previous', 'PricerrTheme') . '</a> ';
            echo ' <a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=chatmess&pj=' . $start_me . '"><<</a> ';


            for ($i = $start; $i <= $end; $i++) {
                if ($i == $my_page) {
                    echo '' . $i . ' | ';
                } else {

                    echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=chatmess&pj=' . $i . '">' . $i . '</a> | ';

                }
            }

            if ($totalPages > $my_page)
                echo ' <a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=chatmess&pj=' . $end_me . '">>></a> ';
            echo ' <a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=chatmess&pj=' . $next_pg . '">' . __('Next', 'PricerrTheme') . ' >></a> ';

            ?>

        <?php else: ?>

            <div class="padd101">
                <?php _e('There are no private messages.', 'PricerrTheme'); ?>
            </div>

        <?php endif; ?>


    </div>

    <div id="tabs2">


        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="chatmess" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td><input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>
            </table>
        </form>

        <?php

        if (isset($_GET['PricerrTheme_save2'])):

            $search_user = trim($_GET['search_user']);

            $user = get_userdatabylogin($search_user);
            $uid = $user->ID;

            $s = "select * from " . $wpdb->prefix . "job_chatbox where uid='$uid' order by id desc";
            $r = $wpdb->get_results($s);

            if (count($r) > 0):

                ?>

                <table class="widefat post fixed" cellspacing="0">
                    <thead>
                    <tr>
                        <th><?php _e('Sender', 'PricerrTheme'); ?></th>
                        <th><?php _e('Lesson Owner', 'PricerrTheme'); ?></th>
                        <th width="20%"><?php _e('Lesson Title', 'PricerrTheme'); ?></th>
                        <th><?php _e('Sent On', 'PricerrTheme'); ?></th>
                        <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php

                    $i = 0;

                    foreach ($r as $row) {


                        $PricerrTheme_get_order_row_obj = PricerrTheme_get_order_row_obj($row->oid);

                        $pst = get_post($PricerrTheme_get_order_row_obj->pid);
                        $post_author = get_userdata($pst->post_author);
                        $sender = get_userdata($row->uid);

                        //------------------------

                        if ($i % 2) $new_bg_color = '#E7E9F1';
                        else $new_bg_color = '#fff';

                        $i++;

                        echo '<tr style="background:' . $new_bg_color . '">';
                        echo '<th>' . $sender->user_login . '</th>';
                        echo '<th>' . $post_author->user_login . '</th>';
                        echo '<th><a href="' . get_permalink($PricerrTheme_get_order_row_obj->pid) . '">' . $pst->post_title . '</a></th>';
                        echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                        echo '<th>';


                        echo '<a href="' . get_admin_url() . 'admin.php?page=chatmess&pj=' . $_GET['pj'] . '&del_mess=' . $row->id . '">' . __('Delete', 'PricerrTheme') . '</a>';


                        echo '</th>';
                        echo '</tr>';

                        echo '<tr style="background:' . $new_bg_color . '" id="mess_age_' . $row->id . '">';
                        echo '<th colspan="5"><strong>Message Content:</strong> ' . $row->content . '</th>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>


                </table>

            <?php else: ?>

                <div class="padd101">
                    <?php _e('There are no results for your search.', 'PricerrTheme'); ?>
                </div>

            <?php endif;


        endif;

        ?>

    </div> <?php

    echo '</div>';
}

function PricerrTheme_private_messages_scr()
{
    $id_icon = 'icon-options-general-mess';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Private Messages', 'PricerrTheme');
    global $wpdb;
    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';


    if (isset($_GET['del_mess'])) {
        $del_mess = $_GET['del_mess'];
        global $wpdb;

        $s = "update " . $wpdb->prefix . "job_pm set show_to_source='0', show_to_destination='0' where id='$del_mess'";
        $wpdb->query($s);

        echo '<div class="saved_thing">' . __('Message was deleted', 'PricerrTheme') . '</div>';
    }

    if (isset($_GET['p_del_mess'])) {
        $del_mess = $_GET['p_del_mess'];
        global $wpdb;

        $s = "delete from " . $wpdb->prefix . "job_pm  where id='$del_mess'";
        $wpdb->query($s);

        echo '<div class="saved_thing">' . __('Message was deleted', 'PricerrTheme') . '</div>';
    }


    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All Private Messages', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search User', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">

        <?php

        $nrpostsPage = 10;
        $page = $_GET['pj'];
        if (empty($page)) $page = 1;
        $my_page = $page;

        $s = "select * from " . $wpdb->prefix . "job_pm order by id desc limit " . ($nrpostsPage * ($page - 1)) . " ,$nrpostsPage";
        $r = $wpdb->get_results($s);


        $s1 = "select id from " . $wpdb->prefix . "job_pm order by id desc";
        $r1 = $wpdb->get_results($s1);


        if (count($r) > 0):

            $total_nr = count($r1);

            $nrposts = $total_nr;
            $totalPages = ceil($nrposts / $nrpostsPage);
            $pagess = $totalPages;
            $batch = 10; //ceil($page / $nrpostsPage );


            $start = floor($my_page / $batch) * $batch + 1;
            $end = $start + $batch - 1;
            $end_me = $end + 1;
            $start_me = $start - 1;

            if ($end > $totalPages) $end = $totalPages;
            if ($end_me > $totalPages) $end_me = $totalPages;

            if ($start_me <= 0) $start_me = 1;

            $previous_pg = $my_page - 1;
            if ($previous_pg <= 0) $previous_pg = 1;

            $next_pg = $my_page + 1;
            if ($next_pg >= $totalPages) $next_pg = 1;




            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th><?php _e('Sender', 'PricerrTheme'); ?></th>
                    <th><?php _e('Receiver', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Subject', 'PricerrTheme'); ?></th>
                    <th><?php _e('Sent On', 'PricerrTheme'); ?></th>
                    <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>


                <tbody>
                <?php

                $i = 0;

                foreach ($r as $row) {
                    $sender = get_userdata($row->initiator);
                    $receiver = get_userdata($row->user);

                    if ($i % 2) $new_bg_color = '#E7E9F1';
                    else $new_bg_color = '#fff';

                    $i++;

                    echo '<tr style="background:' . $new_bg_color . '">';
                    echo '<th>' . $sender->user_login . '</th>';
                    echo '<th>' . $receiver->user_login . '</th>';
                    echo '<th>' . $row->subject . '</th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>';

                    if ($row->show_to_source == 1 and $row->show_to_destination == 1) {
                        echo '<a href="' . get_admin_url() . 'admin.php?page=privmess&pj=' . $_GET['pj'] . '&del_mess=' . $row->id . '">' . __('Delete', 'PricerrTheme') . '</a>';
                    } else {

                        _e('Message Deleted', 'PricerrTheme');
                        echo '<br/>';
                        echo '<a href="' . get_admin_url() . 'admin.php?page=privmess&pj=' . $_GET['pj'] . '&p_del_mess=' . $row->id . '">' . __('Permanent Delete', 'PricerrTheme') . '</a>';

                    }

                    echo '</th>';
                    echo '</tr>';

                    echo '<tr style="background:' . $new_bg_color . '" id="mess_age_' . $row->ID . '">';
                    echo '<th colspan="5"><strong>Message Content:</strong> ' . $row->content . '</th>';
                    echo '</tr>';
                }

                ?>
                </tbody>


            </table>
            <?php


            if ($start > 1)
                echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=privmess&pj=' . $previous_pg . '"><< ' . __('Previous', 'PricerrTheme') . '</a> ';
            echo ' <a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=privmess&pj=' . $start_me . '"><<</a> ';


            for ($i = $start; $i <= $end; $i++) {
                if ($i == $my_page) {
                    echo '' . $i . ' | ';
                } else {

                    echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=privmess&pj=' . $i . '">' . $i . '</a> | ';

                }
            }


            if ($totalPages > $my_page)
                echo ' <a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=privmess&pj=' . $end_me . '">>></a> ';
            echo ' <a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=privmess&pj=' . $next_pg . '">' . __('Next', 'PricerrTheme') . ' >></a> ';


            ?>



        <?php else: ?>

            <div class="padd101">
                <?php _e('There are no private messages.', 'PricerrTheme'); ?>
            </div>

        <?php endif; ?>


    </div>

    <div id="tabs2">


        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="privmess" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td><input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>

        <?php

        if (isset($_GET['PricerrTheme_save2'])):

            $search_user = trim($_GET['search_user']);

            $user = get_userdatabylogin($search_user);
            $uid = $user->ID;

            $s = "select * from " . $wpdb->prefix . "job_pm where initiator='$uid' OR user='$uid' order by id desc";
            $r = $wpdb->get_results($s);

            if (count($r) > 0):

                ?>

                <table class="widefat post fixed" cellspacing="0">
                    <thead>
                    <tr>
                        <th><?php _e('Sender', 'PricerrTheme'); ?></th>
                        <th><?php _e('Receiver', 'PricerrTheme'); ?></th>
                        <th width="20%"><?php _e('Subject', 'PricerrTheme'); ?></th>
                        <th><?php _e('Sent On', 'PricerrTheme'); ?></th>
                        <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php



                    foreach ($r as $row) {
                        $sender = get_userdata($row->initiator);
                        $receiver = get_userdata($row->user);

                        echo '<tr>';
                        echo '<th>' . $sender->user_login . '</th>';
                        echo '<th>' . $receiver->user_login . '</th>';
                        echo '<th>' . $row->subject . '</th>';
                        echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                        echo '<th>#</th>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>


                </table>
            <?php else: ?>

                <div class="padd101">
                    <?php _e('There are no results for your search.', 'PricerrTheme'); ?>
                </div>

            <?php endif;


        endif;

        ?>

    </div>


    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_user_reviews_scr()
{
    $id_icon = 'icon-options-general-rev';
    $ttl_of_stuff = 'PricerrTheme - ' . __('User Reviews', 'PricerrTheme');
    global $wpdb;
    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All User Reviews', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search User', 'PricerrTheme'); ?></a></li>
        <!--  <li><a href="#tabs3"><?php _e('Search Lesson', 'PricerrTheme'); ?></a></li>  -->
    </ul>
    <div id="tabs1">

        <?php

        $s = "select * from " . $wpdb->prefix . "job_ratings where awarded>0 order by id desc";
        $r = $wpdb->get_results($s);

        if (count($r) > 0):

            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th><?php _e('User', 'PricerrTheme'); ?></th>
                    <th><?php _e('Lesson', 'PricerrTheme'); ?></th>
                    <th><?php _e('Price', 'PricerrTheme'); ?></th>
                    <th><?php _e('Rating Type', 'PricerrTheme'); ?></th>
                    <th><?php _e('Description', 'PricerrTheme'); ?></th>
                    <th><?php _e('Awarded On', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>


                <tbody>
                <?php



                foreach ($r as $row) {

                    $s_ql = "select * from " . $wpdb->prefix . "job_orders where id='" . $row->orderid . "'";
                    $r_ql = $wpdb->get_results($s_ql);

                    $post = get_post($r_ql[0]->pid);
                    $userdata = get_userdata($post->post_author);
                    $pid = $r_ql[0]->pid;

                    echo '<tr>';
                    echo '<th>' . $userdata->user_login . '</th>';
                    echo '<th>' . PricerrTheme_get_show_price(get_post_meta($r_ql[0]->pid, 'job_cost', true)) . '</th>';
                    echo '<th><a href="' . get_permalink($pid) . '">' . PricerrTheme_wrap_the_title($post->post_title, $pid) . '</a></th>';
                    echo '<th>' . PricerrTheme_show_stars_our_of_number($row->grade) . '</th>';
                    echo '<th>' . $row->reason . '</th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>#</th>';
                    echo '</tr>';


                }

                ?>
                </tbody>


            </table>
        <?php else: ?>

            <div class="padd101">
                <?php _e('There are no user feedback.', 'PricerrTheme'); ?>
            </div>

        <?php endif; ?>

    </div>

    <div id="tabs2">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="usrrev" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td><input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>

        <?php

        $user = trim($_GET['search_user']);
        $user = get_userdatabylogin($user);
        $uid = $user->ID;

        $s = "select ratings.orderid, ratings.datemade, ratings.reason, ratings.grade 
		    from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders, " . $wpdb->prefix . "posts posts where orders.pid=posts.ID AND posts.post_author='$uid' AND
			 orders.id=ratings.orderid AND ratings.awarded>0 order by ratings.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0):

            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th><?php _e('User', 'PricerrTheme'); ?></th>
                    <th><?php _e('Lesson', 'PricerrTheme'); ?></th>
                    <th><?php _e('Price', 'PricerrTheme'); ?></th>
                    <th><?php _e('Rating Type', 'PricerrTheme'); ?></th>
                    <th><?php _e('Description', 'PricerrTheme'); ?></th>
                    <th><?php _e('Awarded On', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>


                <tbody>
                <?php



                foreach ($r as $row) {

                    $s_ql = "select * from " . $wpdb->prefix . "job_orders where id='" . $row->orderid . "'";
                    $r_ql = $wpdb->get_results($s_ql);

                    $post = get_post($r_ql[0]->pid);
                    $userdata = get_userdata($post->post_author);
                    $pid = $r_ql[0]->pid;

                    echo '<tr>';
                    echo '<th>' . $userdata->user_login . '</th>';
                    echo '<th>' . PricerrTheme_get_show_price(get_post_meta($r_ql[0]->pid, 'job_cost', true)) . '</th>';
                    echo '<th><a href="' . get_permalink($pid) . '">' . PricerrTheme_wrap_the_title($post->post_title, $pid) . '</a></th>';
                    echo '<th>' . PricerrTheme_show_stars_our_of_number($row->grade) . '</th>';
                    echo '<th>' . $row->reason . '</th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>#</th>';
                    echo '</tr>';


                }

                ?>
                </tbody>


            </table>
        <?php else: ?>

            <div class="padd101">
                <?php _e('There are no user feedback.', 'PricerrTheme'); ?>
            </div>

        <?php endif; ?>


    </div>

    <div id="tabs3">
    </div>

    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_orders_m()
{
    global $wpdb;
    $id_icon = 'icon-options-general-orders';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Orders', 'PricerrTheme');
    $prefix = $wpdb->prefix;
    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('Active', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search Active', 'PricerrTheme'); ?></a></li>

        <li><a href="#tabs3"><?php _e('Delivered', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs4"><?php _e('Search Delivered', 'PricerrTheme'); ?></a></li>

        <li><a href="#tabs5"><?php _e('Completed', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs6"><?php _e('Search Completed', 'PricerrTheme'); ?></a></li>

        <li><a href="#tabs7"><?php _e('Closed', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs8"><?php _e('Search Closed', 'PricerrTheme'); ?></a></li>

    </ul>

    <div id="tabs1">

        <?php



        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where  posts.ID=orders.pid AND orders.done_seller='0' AND 
			 orders.done_buyer='0' AND orders.date_finished='0' AND orders.closed='0' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No open orders yet.', 'PricerrTheme') . '</div>';
        }

        ?>

    </div>

    <div id="tabs2">
        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="order-stats" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td><input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>


        <?php

        $search_user = trim($_GET['search_user']);
        $user = get_userdatabylogin($search_user);
        $uid = $user->ID;


        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where  posts.ID=orders.pid AND orders.done_seller='0' AND (orders.uid='$uid' OR posts.post_author='$uid') AND
			 orders.done_buyer='0' AND orders.date_finished='0' AND orders.closed='0' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No results for your search.', 'PricerrTheme') . '</div>';
        }

        ?>
    </div>

    <div id="tabs3">

        <?php



        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where   posts.ID=orders.pid AND orders.done_seller='1' AND 
			 orders.done_buyer='0' AND orders.closed='0' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No delivered orders yet.', 'PricerrTheme') . '</div>';
        }


        ?>

    </div>

    <div id="tabs4">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="order-stats" name="page"/>
            <input type="hidden" value="tabs4" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user4']; ?>" name="search_user4" size="20"/>
                        <input type="submit" name="PricerrTheme_save4" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>
    </div>

    <div id="tabs5">
        <?php

        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where posts.ID=orders.pid AND orders.done_seller='1' AND 
			 orders.done_buyer='1' AND orders.closed='0' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No completed orders yet.', 'PricerrTheme') . '</div>';
        } ?>

    </div>

    <div id="tabs6">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="order-stats" name="page"/>
            <input type="hidden" value="tabs6" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user6']; ?>" name="search_user6" size="20"/>
                        <input type="submit" name="PricerrTheme_save6" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>


        <?php


        $search_user = trim($_GET['search_user6']);
        $user = get_userdatabylogin($search_user);
        $uid = $user->ID;


        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where posts.ID=orders.pid AND orders.done_seller='1' AND  (orders.uid='$uid' OR posts.post_author='$uid') AND
			 orders.done_buyer='1' AND orders.closed='0' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No completed orders yet.', 'PricerrTheme') . '</div>';
        } ?>

    </div>

    <div id="tabs7">

        <?php



        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where  posts.ID=orders.pid AND orders.closed='1' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No closed orders yet.', 'PricerrTheme') . '</div>';
        }

        ?>

    </div>

    <div id="tabs8">
        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="order-stats" name="page"/>
            <input type="hidden" value="tabs8" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td>
                        <?php _e('Search User', 'PricerrTheme'); ?>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user8']; ?>" name="search_user8" size="20"/>
                        <input type="submit" name="PricerrTheme_save8" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>


        <?php

        $search_user = trim($_GET['search_user8']);
        $user = get_userdatabylogin($search_user);
        $uid = $user->ID;


        $s = "select distinct * from " . $prefix . "job_orders orders, " . $prefix . "posts posts
			 where  posts.ID=orders.pid  AND  (orders.uid='$uid' OR posts.post_author='$uid') AND orders.closed='1' order by orders.id desc";


        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            echo '<table width="100%" class="wp-list-table widefat fixed posts">';
            echo '<thead><tr>';
            echo '<th width="5%">' . __('ID', 'PricerrTheme') . '</th>';
            echo '<th width="30%">' . __('Lesson Title', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Lesson Price', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Seller', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Buyer', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Ordered on', 'PricerrTheme') . '</th>';
            echo '<th>' . __('Days to Finish', 'PricerrTheme') . '</th>';
            //echo '<th></th>';
            echo '</tr></thead><tbody>';

            foreach ($r as $row) {

                $post = get_post($row->pid);
                $price = get_post_meta($row->pid, 'job_cost', true);
                $max_days = get_post_meta($row->pid, 'max_days', true);
                $price = PricerrTheme_get_show_price($price);
                $buyer = get_userdata($row->uid);
                $seller = get_userdata($post->post_author);
                $date_made = date("d-m-Y H:i:s", $row->date_made);

                echo '<tr>';
                echo '<th>#' . $row->id . '</th>';
                echo '<th><a href="' . get_permalink($row->pid) . '">' . $post->post_title . '</a></th>';
                echo '<th>' . $price . '</th>';
                echo '<th>' . $seller->user_login . '</th>';
                echo '<th>' . $buyer->user_login . '</th>';
                echo '<th>' . $date_made . '</th>';
                echo '<th>' . $max_days . '</th>';
                //echo '<th></th>';
                echo '</tr>';


            }

            echo '</tbody></table>';
        } else {
            echo '<div style="padding:15px">' . __('No closed orders yet.', 'PricerrTheme') . '</div>';
        }

        ?>

    </div>

    <?php
    echo '</div>';
}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_hist_trans()
{
    $id_icon = 'icon-options-general-list';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Transactions', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All Transactions', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">
        <?php

        global $wpdb;

        $rows_per_page = 10;

        if (isset($_GET['pj'])) $pageno = $_GET['pj'];
        else $pageno = 1;


        $s1 = "select id from " . $wpdb->prefix . "job_payment_transactions order by id desc ";
        $s = "select *  from " . $wpdb->prefix . "job_payment_transactions order by id desc ";
        $limit = ' LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;
        $r = $wpdb->get_results($s1);
        $nr = count($r);
        $lastpage = ceil($nr / $rows_per_page);
        $r = $wpdb->get_results($s . $limit);

        if (count($r) > 0):

            ?>


            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="10%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="40%"><?php _e('Comment/Description', 'PricerrTheme'); ?></th>
                    <th><?php _e('Date Made', 'PricerrTheme'); ?></th>
                    <th><?php _e('Amount', 'PricerrTheme'); ?></th>

                </tr>
                </thead>

                <tbody>
                <?php


                foreach ($r as $row) {
                    $user = get_userdata($row->uid);

                    if ($row->tp == 0) {
                        $sign = '-';
                        $cl = 'redred';
                    } else {
                        $sign = '+';
                        $cl = 'greengreen';
                    }

                    echo '<tr>';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->reason . '</th>';
                    echo '<th>' . date_i18n('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th class="' . $cl . '">' . $sign . PricerrTheme_get_show_price($row->amount, 2) . '</th>';
                    echo '</tr>';
                }

                ?>
                </tbody>
            </table>

        <?php else: ?>

            <?php _e('There are no transactions yet.', 'PricerrTheme'); ?>

        <?php endif; ?>

    </div>

    <div id="tabs2">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="trans-site" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td>
                        <?php _e('Search User', 'PricerrTheme'); ?>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>
            </table>
        </form>

        <!-- ############## -->

        <?php

        if (isset($_GET['PricerrTheme_save2'])):

            global $wpdb;

            $rows_per_page = 10;

            if (isset($_GET['pj'])) $pageno = $_GET['pj'];
            else $pageno = 1;

            //-----
            $usrlg = trim($_GET['search_user']);
            $sql = "select ID from $wpdb->users where user_login='$usrlg'";
            $rqrq = $wpdb->get_results($sql);


            if (count($rqrq) > 0) $usrid = $rqrq[0]->ID;
            else $usrid = 0;

            //-----

            $s1 = "select id from " . $wpdb->prefix . "job_payment_transactions where uid='$usrid' order by id desc ";
            $s = "select *  from " . $wpdb->prefix . "job_payment_transactions where uid='$usrid' order by id desc ";
            $limit = ' LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;
            $r = $wpdb->get_results($s1);
            $nr = count($r);
            $lastpage = ceil($nr / $rows_per_page);
            $r = $wpdb->get_results($s . $limit);


            if (count($r) > 0):

                ?>


                <table class="widefat post fixed" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="10%"><?php _e('Username', 'PricerrTheme'); ?></th>
                        <th width="40%"><?php _e('Comment/Description', 'PricerrTheme'); ?></th>
                        <th><?php _e('Date Made', 'PricerrTheme'); ?></th>
                        <th><?php _e('Amount', 'PricerrTheme'); ?></th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php


                    foreach ($r as $row) {
                        $user = get_userdata($row->uid);

                        if ($row->tp == 0) {
                            $sign = '-';
                            $cl = 'redred';
                        } else {
                            $sign = '+';
                            $cl = 'greengreen';
                        }

                        echo '<tr>';
                        echo '<th>' . $user->user_login . '</th>';
                        echo '<th>' . $row->reason . '</th>';
                        echo '<th>' . date_i18n('d-M-Y H:i:s', $row->datemade) . '</th>';
                        echo '<th class="' . $cl . '">' . $sign . PricerrTheme_get_show_price($row->amount, 2) . '</th>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>

            <?php else: ?>

                <?php _e('There are no transactions yet.', 'PricerrTheme'); ?>

            <?php endif; endif; ?>


        <!-- ############### -->

    </div>



    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/
function PricerrTheme_user_levels()
{
    $id_icon = 'icon-options-general-lvls';
    $ttl_of_stuff = 'PricerrTheme - ' . __('User Levels', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All Users', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">

        <?php

        $rows_per_page = 10;

        if (isset($_GET['pj'])) $pageno = $_GET['pj'];
        else $pageno = 1;

        global $wpdb;

        $s1 = "select ID from " . $wpdb->users . " order by user_login asc ";
        $s = "select * from " . $wpdb->users . " order by user_login asc ";
        $limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;


        $r = $wpdb->get_results($s1);
        $nr = count($r);
        $lastpage = ceil($nr / $rows_per_page);

        $r = $wpdb->get_results($s . $limit);

        if ($nr > 0) {

            ?>


            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Email', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Date Registered', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <script>

                    jQuery(document).ready(function () {

                        jQuery('.update_btn*').click(function () {

                            var id = jQuery(this).attr('alt');

                            if (jQuery('#user_level_3_' + id).is(':checked')) var user_level_3_ = '1'; else var user_level_3_ = '0';
                            if (jQuery('#user_level_1_' + id).is(':checked')) var user_level_1_ = '1'; else var user_level_1_ = '0';
                            if (jQuery('#user_level_2_' + id).is(':checked')) var user_level_2_ = '1'; else var user_level_2_ = '0';
                            if (jQuery('#user_level_0_' + id).is(':checked')) var user_level_0_ = '1'; else var user_level_0_ = '0';


                            jQuery.ajax({
                                url: "<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin-ajax.php",
                                type: 'POST',
                                data: 'action=update_level_user&uid=' + id + '&level3=' + user_level_3_ + '&level1=' + user_level_1_ + '&level2=' + user_level_2_ + '&level0=' + user_level_0_,
                                success: function (text) {

                                    //alert(text);
                                    alert("<?php _e('User Level Updated.','PricerrTheme'); ?>");
                                    return false;

                                }
                            });


                        });


                    });


                </script>

                <tbody>


                <?php


                foreach ($r as $row) {
                    $user = get_userdata($row->ID);


                    echo '<tr style="">';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->user_email . '</th>';
                    echo '<th>' . $row->user_registered . '</th>';

                    echo '<th>';

                    $user_level = PricerrTheme_get_user_level($row->ID);

                    ?>

                    <?php _e('Level 0:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level != "1" and $user_level != "2" and $user_level != "3") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_0_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/><br/>

                    <?php _e('Level 1:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level == "1") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_1_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e(' Level 2:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level == "2") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_2_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e(' Level 3:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level == "3") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_3_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>

                    <input type="button" value="<?php _e('Update', 'PricerrTheme'); ?>" class="update_btn" alt="<?php echo $row->ID; ?>"/>


                    <?php
                    echo '</th>';

                    echo '</tr>';
                }


                ?>


                </tbody>

            </table>

            <?php

            for ($i = 1; $i <= $lastpage; $i++) {
                if ($pageno == $i) echo $i . " | ";
                else
                    echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=user_levels&pj=' . $i . '"
			>' . $i . '</a> | ';

            }

        }
        ?>


    </div>

    <div id="tabs2">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="user_levels" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

        <?php

        if (isset($_GET['PricerrTheme_save2'])) {
            global $wpdb;
            $usr = trim($_GET['search_user']);
            $rows_per_page = 10;

            if (isset($_GET['pj'])) $pageno = $_GET['pj'];
            else $pageno = 1;

            global $wpdb;

            $s1 = "select ID from " . $wpdb->users . " where user_login like '%$usr%' order by user_login asc ";
            $s = "select * from " . $wpdb->users . " where user_login like '%$usr%' order by user_login asc ";
            $limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;

            $r = $wpdb->get_results($s1);
            $nr = count($r);
            $lastpage = ceil($nr / $rows_per_page);

            $r = $wpdb->get_results($s . $limit);

            if ($nr > 0) {

                ?>

                <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Email', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Date Registered', 'PricerrTheme'); ?></th>

                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <tbody>

                <?php

                foreach ($r as $row) {
                    $user = get_userdata($row->ID);


                    echo '<tr style="">';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->user_email . '</th>';
                    echo '<th>' . $row->user_registered . '</th>';

                    $user_level = PricerrTheme_get_user_level($row->ID);
                    //if(empty($user_level)) $user_level = "0";

                    ?>
                    <?php _e('Level 0:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level != "1" and $user_level != "2" and $user_level != "3") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_0_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>

                    <?php _e('Level 1:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level == "1") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_1_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e(' Level 2:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level == "2") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_2_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e(' Level 3:', 'PricerrTheme'); ?>
                    <input <?php if ($user_level == "3") echo 'checked="checked"'; ?> type="radio" name="user_level<?php echo $row->ID; ?>" id="user_level_3_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>

                    <input type="button" value="<?php _e('Update', 'PricerrTheme'); ?>" class="update_btn" alt="<?php echo $row->ID; ?>"/>

                    <?php
                    echo '</th>';

                    echo '</tr>';
                }
            }

            ?>

            </tbody>
            </table> <?php

        }

        ?>

    </div>


    <?php
    echo '</div>';
}


function PricerrTheme_user_badges()
{
    $id_icon = 'icon-options-general-badges';
    $ttl_of_stuff = 'PricerrTheme - ' . __('User Badges', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All Users', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">

        <?php

        $rows_per_page = 10;

        if (isset($_GET['pj'])) $pageno = $_GET['pj'];
        else $pageno = 1;

        global $wpdb;

        $s1 = "select ID from " . $wpdb->users . " order by user_login asc ";
        $s = "select * from " . $wpdb->users . " order by user_login asc ";
        $limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;


        $r = $wpdb->get_results($s1);
        $nr = count($r);
        $lastpage = ceil($nr / $rows_per_page);

        $r = $wpdb->get_results($s . $limit);

        if ($nr > 0) {

            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Email', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Date Registered', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <script>

                    jQuery(document).ready(function () {

                        jQuery('.update_btn*').click(function () {

                            var id = jQuery(this).attr('alt');

                            if (jQuery('#badge_level_0_' + id).is(':checked')) var badge_level_0_ = '1'; else var badge_level_0_ = '0';
                            if (jQuery('#badge_level_1_' + id).is(':checked')) var badge_level_1_ = '1'; else var badge_level_1_ = '0';
                            if (jQuery('#badge_level_2_' + id).is(':checked')) var badge_level_2_ = '1'; else var badge_level_2_ = '0';

                            jQuery.ajax({
                                url: "<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin-ajax.php",
                                type: 'POST',
                                data: 'action=update_badge_user&uid=' + id + '&level0=' + badge_level_0_ + '&level1=' + badge_level_1_ + '&level2=' + badge_level_2_,
                                success: function (text) {

                                    alert("<?php _e('User Badge Updated.','PricerrTheme'); ?>");
                                    return false;

                                }
                            });


                        });


                    });


                </script>

                <tbody>


                <?php


                foreach ($r as $row) {
                    $user = get_userdata($row->ID);


                    echo '<tr style="">';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->user_email . '</th>';
                    echo '<th>' . $row->user_registered . '</th>';

                    echo '<th>';

                    $user_badge = get_user_meta($row->ID, 'user_badge', true);
                    if (empty($user_badge)) $user_badge = "0";

                    ?>

                    <?php _e('No Badge:', 'PricerrTheme'); ?> &nbsp; &nbsp; &nbsp; &nbsp;
                    <input <?php if ($user_badge == "0") echo 'checked="checked"'; ?> type="radio" name="badge_level<?php echo $row->ID; ?>" id="badge_level_0_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e('Badge Level 1:', 'PricerrTheme'); ?>
                    <input <?php if ($user_badge == "1") echo 'checked="checked"'; ?> type="radio" name="badge_level<?php echo $row->ID; ?>" id="badge_level_1_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e(' Badge Level 2:', 'PricerrTheme'); ?>
                    <input <?php if ($user_badge == "2") echo 'checked="checked"'; ?> type="radio" name="badge_level<?php echo $row->ID; ?>" id="badge_level_2_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>

                    <input type="button" value="<?php _e('Update', 'PricerrTheme'); ?>" class="update_btn" alt="<?php echo $row->ID; ?>"/>


                    <?php
                    echo '</th>';

                    echo '</tr>';
                }


                ?>


                </tbody>

            </table>

            <?php

            for ($i = 1; $i <= $lastpage; $i++) {
                if ($pageno == $i) echo $i . " | ";
                else
                    echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=user_badges&pj=' . $i . '"
			>' . $i . '</a> | ';

            }

        }
        ?>


    </div>

    <div id="tabs2">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="user_badges" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td><input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>

        <?php

        if (isset($_GET['PricerrTheme_save2'])) {
            global $wpdb;
            $usr = trim($_GET['search_user']);
            $rows_per_page = 10;

            if (isset($_GET['pj'])) $pageno = $_GET['pj'];
            else $pageno = 1;

            global $wpdb;

            $s1 = "select ID from " . $wpdb->users . " where user_login like '%$usr%' order by user_login asc ";
            $s = "select * from " . $wpdb->users . " where user_login like '%$usr%' order by user_login asc ";
            $limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;


            $r = $wpdb->get_results($s1);
            $nr = count($r);
            $lastpage = ceil($nr / $rows_per_page);

            $r = $wpdb->get_results($s . $limit);

            if ($nr > 0) {

                ?>


                <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Email', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Date Registered', 'PricerrTheme'); ?></th>

                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <tbody>


                <?php


                foreach ($r as $row) {
                    $user = get_userdata($row->ID);


                    echo '<tr style="">';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->user_email . '</th>';
                    echo '<th>' . $row->user_registered . '</th>';

                    $user_badge = get_user_meta($row->ID, 'user_badge', true);
                    if (empty($user_badge)) $user_badge = "0";

                    ?>

                    <?php _e('No Badge:', 'PricerrTheme'); ?> &nbsp; &nbsp; &nbsp; &nbsp;
                    <input <?php if ($user_badge == "0") echo 'checked="checked"'; ?> type="radio" name="badge_level<?php echo $row->ID; ?>" id="badge_level_0_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e('Badge Level 1:', 'PricerrTheme'); ?>
                    <input <?php if ($user_badge == "1") echo 'checked="checked"'; ?> type="radio" name="badge_level<?php echo $row->ID; ?>" id="badge_level_1_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>
                    <br/>
                    <?php _e(' Badge Level 2:', 'PricerrTheme'); ?>
                    <input <?php if ($user_badge == "2") echo 'checked="checked"'; ?> type="radio" name="badge_level<?php echo $row->ID; ?>" id="badge_level_2_<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/>

                    <input type="button" value="<?php _e('Update', 'PricerrTheme'); ?>" class="update_btn" alt="<?php echo $row->ID; ?>"/>


                    <?php
                    echo '</th>';

                    echo '</tr>';
                }
            }

            ?>

            </tbody>
            </table> <?php

        }

        ?>


    </div>


    <?php
    echo '</div>';


}


function PricerrTheme_user_balances()
{
    $id_icon = 'icon-options-general-bal';
    $ttl_of_stuff = 'PricerrTheme - ' . __('User Balances', 'PricerrTheme');

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('All Users Balances', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Search', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">

        <?php

        $rows_per_page = 10;

        if (isset($_GET['pj'])) $pageno = $_GET['pj'];
        else $pageno = 1;

        global $wpdb;

        $s1 = "select ID from " . $wpdb->users . " order by user_login asc ";
        $s = "select * from " . $wpdb->users . " order by user_login asc ";
        $limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;


        $r = $wpdb->get_results($s1);
        $nr = count($r);
        $lastpage = ceil($nr / $rows_per_page);

        $r = $wpdb->get_results($s . $limit);

        if ($nr > 0) {

            ?>


            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Email', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Date Registered', 'PricerrTheme'); ?></th>
                    <th width="13%"><?php _e('Cash Balance', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <script>

                    jQuery(document).ready(function () {

                        jQuery('.update_btn*').click(function () {

                            var id = jQuery(this).attr('alt');
                            var increase_credits = jQuery('#increase_credits' + id).val();
                            var decrease_credits = jQuery('#decrease_credits' + id).val();


                            jQuery.ajax({
                                url: "<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin-ajax.php",
                                type: 'POST',
                                data: 'action=update_users_balance&increase_credits=' + increase_credits + '&uid=' + id + '&decrease_credits=' + decrease_credits,
                                success: function (text) {

                                    alert("<?php _e('User balance updated.','PricerrTheme'); ?>");

                                    text = text.slice(0, -1);
                                    jQuery("#money" + id).html(text);
                                    jQuery('#increase_credits' + id).val("");
                                    jQuery('#decrease_credits' + id).val("");

                                    return false;
                                }
                            });


                        });


                        jQuery('.update_btn2*').click(function () {

                            var id = jQuery(this).attr('alt');
                            var increase_credits = jQuery('#increase_credits2' + id).val();
                            var decrease_credits = jQuery('#decrease_credits2' + id).val();


                            jQuery.ajax({
                                url: "<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin-ajax.php",
                                type: 'POST',
                                data: 'action=update_users_balance&increase_credits=' + increase_credits + '&uid=' + id + '&decrease_credits=' + decrease_credits,
                                success: function (text) {

                                    alert("<?php _e('User balance updated.','PricerrTheme'); ?>");

                                    text = text.slice(0, -1);
                                    jQuery("#money2" + id).html(text);
                                    jQuery('#increase_credits2' + id).val("");
                                    jQuery('#decrease_credits2' + id).val("");

                                    return false;
                                }
                            });


                        });


                    });


                </script>

                <tbody>


                <?php


                foreach ($r as $row) {
                    $user = get_userdata($row->ID);


                    echo '<tr style="">';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->user_email . '</th>';
                    echo '<th>' . $row->user_registered . '</th>';
                    echo '<th class="' . $cl . '"><span id="money' . $row->ID . '">' . $sign . PricerrTheme_get_show_price(PricerrTheme_get_credits($row->ID), 2) . '</span></th>';
                    echo '<th>';
                    ?>

                    <?php _e('Increase Cash:', 'PricerrTheme'); ?> <input type="text" size="4" id="increase_credits<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/> <?php echo PricerrTheme_get_currency(); ?>
                    <br/>
                    <?php _e(' Decrease Cash:', 'PricerrTheme'); ?> <input type="text" size="4" id="decrease_credits<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/> <?php echo PricerrTheme_get_currency(); ?>

                    <input type="button" value="<?php _e('Update', 'PricerrTheme'); ?>" class="update_btn" alt="<?php echo $row->ID; ?>"/>

                    <?php
                    echo '</th>';

                    echo '</tr>';
                }

                ?>

                </tbody>

            </table>

            <?php

            for ($i = 1; $i <= $lastpage; $i++) {
                if ($pageno == $i) echo $i . " | ";
                else
                    echo '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=User-Balances&pj=' . $i . '"
			>' . $i . '</a> | ';

            }

        }
        ?>

    </div>

    <div id="tabs2">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="User-Balances" name="page"/>
            <input type="hidden" value="tabs2" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>

        <?php

        if (isset($_GET['PricerrTheme_save2'])) {
            global $wpdb;
            $usr = trim($_GET['search_user']);
            $rows_per_page = 10;

            if (isset($_GET['pj'])) $pageno = $_GET['pj'];
            else $pageno = 1;

            global $wpdb;

            $s1 = "select ID from " . $wpdb->users . " where user_login like '%$usr%' order by user_login asc ";
            $s = "select * from " . $wpdb->users . " where user_login like '%$usr%' order by user_login asc ";
            $limit = 'LIMIT ' . ($pageno - 1) * $rows_per_page . ',' . $rows_per_page;


            $r = $wpdb->get_results($s1);
            $nr = count($r);
            $lastpage = ceil($nr / $rows_per_page);

            $r = $wpdb->get_results($s . $limit);

            if ($nr > 0) {

                ?>


                <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="15%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Email', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Date Registered', 'PricerrTheme'); ?></th>
                    <th width="13%"><?php _e('Cash Balance', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <tbody>


                <?php


                foreach ($r as $row) {
                    $user = get_userdata($row->ID);


                    echo '<tr style="">';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->user_email . '</th>';
                    echo '<th>' . $row->user_registered . '</th>';
                    echo '<th class="' . $cl . '"><span id="money2' . $row->ID . '">' . $sign . PricerrTheme_get_show_price(PricerrTheme_get_credits($row->ID), 2) . '</span></th>';
                    echo '<th>';
                    ?>

                    <?php _e('Increase Cash:'); ?> <input type="text" size="4" id="increase_credits2<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/> <?php echo PricerrTheme_get_currency(); ?>
                    <br/>
                    <?php _e('Decrease Cash:'); ?> <input type="text" size="4" id="decrease_credits2<?php echo $row->ID; ?>" rel="<?php echo $row->ID; ?>"/> <?php echo PricerrTheme_get_currency(); ?>

                    <input type="button" value="<?php _e('Update', 'PricerrTheme'); ?>" class="update_btn2" alt="<?php echo $row->ID; ?>"/>


                    <?php
                    echo '</th>';

                    echo '</tr>';
                }
            }

            ?>

            </tbody>
            </table> <?php

        }

        ?>


    </div>


    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_withdrawals()
{
    $id_icon = 'icon-options-general-withdr';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Withdrawal Requests', 'PricerrTheme');
    global $wpdb;

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';


    //----------------------------------------

    if (isset($_GET['den_id'])) {
        $tm = current_time('timestamp', 0);
        $ids = $_GET['den_id'];

        $s = "select * from " . $wpdb->prefix . "job_withdraw where id='$ids'";
        $row = $wpdb->get_results($s);
        $row = $row[0];


        if ($row->done == 0) {
            echo '<div class="saved_thing"><div class="padd10">' . __('Payment rejected!', 'PricerrTheme') . '</div></div>';
            $ss = "update " . $wpdb->prefix . "job_withdraw set done='-1', rejected_on='$tm', rejected='1', datedone='$tm' where id='$ids'";
            $wpdb->query($ss);

            $ucr = PricerrTheme_get_credits($row->uid);
            PricerrTheme_send_email_when_withdraw_rejected($row->uid, $row->methods, PricerrTheme_get_show_price($row->amount));
            PricerrTheme_update_credits($row->uid, $ucr + $row->amount);

        }
    }

//    if (isset($_GET['tid'])) {
//        $tm = current_time('timestamp', 0);
//        $ids = $_GET['tid'];
//
//        $s = "select * from " . $wpdb->prefix . "job_withdraw where id='$ids'";
//        $row = $wpdb->get_results($s);
//        $row = $row[0];
//
//        if ($row->done == 0) {
//
//            $id = $row->id;
//            $user_address = $row->payeremail;
//            $uid = $row->uid;
//            $methods = $row->methods;
//            $amount = $row->amount;
//            $datemade = $row->datemade;
//
//            $redirect_url = get_bloginfo('siteurl') . '/?withdrawal_action=paypal_withdrawal&id=' . $id .
//                '&user_address=' . $user_address . '&uid=' . $uid . '&methods=' . $methods . '&amount=' . $amount .
//                '&datemade=' . $datemade;
//
//            $redirect = get_bloginfo('siteurl');
//
//            wp_redirect($redirect);
//            exit;
//            //echo "<div style='background-color:red; height: 50px; width: 50px;'>" . $redirect_url . "</div>";
//
//            //----------------------------------------
//        }
//    }

    if(isset($_GET["withdrawal_action"])) {
        if ($_GET["withdrawal_action"] == "success") {
            echo '<div class="saved_thing"><div class="padd10">' . __('Payment completed!', 'PricerrTheme') . '</div></div>';
        }
    }

    //---------------------------------------

    ?>

    <div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('Unresolved Requests', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Resolved Requests', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_rejected"><?php _e('Rejected Requests', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs3"><?php _e('Search Unresolved', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs4"><?php _e('Search Solved', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_search_rejected"><?php _e('Search Rejected', 'PricerrTheme'); ?></a></li>
    </ul>
    <div id="tabs1">
        <?php

        $s = "select * from " . $wpdb->prefix . "job_withdraw where done='0' order by id desc";
        $r = $wpdb->get_results($s);

        if (count($r) > 0) {

            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th width="12%"><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th><?php _e('Method', 'PricerrTheme'); ?></th>
                    <th width="20%"><?php _e('Details', 'PricerrTheme'); ?></th>
                    <th><?php _e('Date Requested', 'PricerrTheme'); ?></th>
                    <th><?php _e('Amount', 'PricerrTheme'); ?></th>
                    <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php

                foreach ($r as $row) {
                    $user = get_userdata($row->uid);

                    $id = $row->id;
                    $user_address = $row->payeremail;
                    $uid = $row->uid;
                    $methods = $row->methods;
                    $amount = $row->amount;
                    $datemade = $row->datemade;

                    $redirect_url = get_bloginfo('siteurl') . '/?withdrawal_action=paypal_withdrawal&id=' . $id .
                        '&user_address=' . $user_address . '&uid=' . $uid . '&methods=' . $methods . '&amount=' . $amount .
                        '&datemade=' . $datemade;

                    echo '<tr>';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->methods . '</th>';
                    echo '<th>' . $row->payeremail . '</th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>' . PricerrTheme_get_show_price($row->amount) . '</th>';
                    echo '<th>' . ($row->done == 0 ? '<a href="' . $redirect_url . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                    //echo '<th>' . ($row->done == 0 ? '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&active_tab=tabs1&tid=' . $row->id . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                    echo '</tr>';
                }

                ?>
                </tbody>

            </table>
        <?php } else { ?>

            <div class="padd101">
                <?php _e('There are no unresolved withdrawal requests.', 'PricerrTheme'); ?>
            </div>

        <?php } ?>

    </div>

    <div id="tabs2">


        <?php

        $s = "select * from " . $wpdb->prefix . "job_withdraw where done='1' order by id desc";
        $r = $wpdb->get_results($s);

        if (count($r) > 0):

            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th><?php _e('Details', 'PricerrTheme'); ?></th>
                    <th><?php _e('Date Requested', 'PricerrTheme'); ?></th>
                    <th><?php _e('Amount', 'PricerrTheme'); ?></th>
                    <th><?php _e('Date Released', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>


                <tbody>
                <?php



                foreach ($r as $row) {
                    $user = get_userdata($row->uid);

                    echo '<tr>';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->payeremail . '</th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>' . PricerrTheme_get_show_price($row->amount) . '</th>';
                    echo '<th>' . ($row->datedone == 0 ? "Not yet" : date('d-M-Y H:i:s', $row->datedone)) . '</th>';
                    echo '<th>' . ($row->done == 0 ? '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&active_tab=tabs1&tid=' . $row->id . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                    echo '</tr>';
                }

                ?>
                </tbody>


            </table>
        <?php else: ?>

            <div class="padd101">
                <?php _e('There are no resolved withdrawal requests.', 'PricerrTheme'); ?>
            </div>

        <?php endif; ?>


    </div>

    <div id="tabs_rejected">


        <?php

        $s = "select * from " . $wpdb->prefix . "job_withdraw where rejected='1' order by id desc";
        $r = $wpdb->get_results($s);

        if (count($r) > 0):

            ?>

            <table class="widefat post fixed" cellspacing="0">
                <thead>
                <tr>
                    <th><?php _e('Username', 'PricerrTheme'); ?></th>
                    <th><?php _e('Details', 'PricerrTheme'); ?></th>
                    <th><?php _e('Date Requested', 'PricerrTheme'); ?></th>
                    <th><?php _e('Amount', 'PricerrTheme'); ?></th>
                    <th><?php _e('Date Released', 'PricerrTheme'); ?></th>
                    <th><?php _e('Options', 'PricerrTheme'); ?></th>
                </tr>
                </thead>


                <tbody>
                <?php



                foreach ($r as $row) {
                    $user = get_userdata($row->uid);

                    echo '<tr>';
                    echo '<th>' . $user->user_login . '</th>';
                    echo '<th>' . $row->payeremail . '</th>';
                    echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                    echo '<th>' . PricerrTheme_get_show_price($row->amount) . '</th>';
                    echo '<th>' . ($row->datedone == 0 ? "Not yet" : date('d-M-Y H:i:s', $row->datedone)) . '</th>';
                    echo '<th>' . ($row->done == 0 ? '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&active_tab=tabs1&tid=' . $row->id . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                    echo '</tr>';
                }

                ?>
                </tbody>


            </table>
        <?php else: ?>

            <div class="padd101">
                <?php _e('There are no rejected withdrawal requests.', 'PricerrTheme'); ?>
            </div>

        <?php endif; ?>


    </div>


    <div id="tabs3">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="withdraw-req" name="page"/>
            <input type="hidden" value="tabs3" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td><input type="text" value="<?php echo $_GET['search_user']; ?>" name="search_user" size="20"/>
                        <input type="submit" name="PricerrTheme_save3" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>

        <?php

        if (isset($_GET['PricerrTheme_save3'])):

            $search_user = trim($_GET['search_user']);

            $user = get_userdatabylogin($search_user);
            $uid = $user->ID;

            $s = "select * from " . $wpdb->prefix . "job_withdraw where done='0' AND uid='$uid' order by id desc";
            $r = $wpdb->get_results($s);

            if (count($r) > 0):

                ?>

                <table class="widefat post fixed" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="12%"><?php _e('Username', 'PricerrTheme'); ?></th>
                        <th><?php _e('Method', 'PricerrTheme'); ?></th>
                        <th width="20%"><?php _e('Details', 'PricerrTheme'); ?></th>
                        <th><?php _e('Date Requested', 'PricerrTheme'); ?></th>
                        <th><?php _e('Amount', 'PricerrTheme'); ?></th>
                        <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php



                    foreach ($r as $row) {
                        $user = get_userdata($row->uid);

                        echo '<tr>';
                        echo '<th>' . $user->user_login . '</th>';
                        echo '<th>' . $row->methods . '</th>';
                        echo '<th>' . $row->payeremail . '</th>';
                        echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                        echo '<th>' . PricerrTheme_get_show_price($row->amount) . '</th>';
                        echo '<th>' . ($row->done == 0 ? '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&active_tab=tabs1&tid=' . $row->id . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>


                </table>
            <?php else: ?>

                <div class="padd101">
                    <?php _e('There are no results for your search.', 'PricerrTheme'); ?>
                </div>

            <?php endif;


        endif;

        ?>


    </div>

    <div id="tabs4">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="withdraw-req" name="page"/>
            <input type="hidden" value="tabs4" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user4']; ?>" name="search_user4" size="20"/>
                        <input type="submit" name="PricerrTheme_save4" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>


        <?php

        if (isset($_GET['PricerrTheme_save4'])):

            $search_user = trim($_GET['search_user4']);

            $user = get_userdatabylogin($search_user);
            $uid = $user->ID;

            $s = "select * from " . $wpdb->prefix . "job_withdraw where done='1' AND uid='$uid' order by id desc";
            $r = $wpdb->get_results($s);

            if (count($r) > 0):

                ?>

                <table class="widefat post fixed" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="12%"><?php _e('Username', 'PricerrTheme'); ?></th>
                        <th><?php _e('Method', 'PricerrTheme'); ?></th>
                        <th width="20%"><?php _e('Details', 'PricerrTheme'); ?></th>
                        <th><?php _e('Date Requested', 'PricerrTheme'); ?></th>
                        <th><?php _e('Amount', 'PricerrTheme'); ?></th>
                        <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php



                    foreach ($r as $row) {
                        $user = get_userdata($row->uid);

                        echo '<tr>';
                        echo '<th>' . $user->user_login . '</th>';
                        echo '<th>' . $row->methods . '</th>';
                        echo '<th>' . $row->payeremail . '</th>';
                        echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                        echo '<th>' . PricerrTheme_get_show_price($row->amount) . '</th>';
                        echo '<th>' . ($row->done == 0 ? '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&active_tab=tabs1&tid=' . $row->id . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>


                </table>
            <?php else: ?>

                <div class="padd101">
                    <?php _e('There are no results for your search.', 'PricerrTheme'); ?>
                </div>

            <?php endif;


        endif;

        ?>

    </div>


    <div id="tabs_search_rejected">

        <form method="get" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php">
            <input type="hidden" value="withdraw-req" name="page"/>
            <input type="hidden" value="tabs_search_rejected" name="active_tab"/>
            <table width="100%" class="sitemile-table">
                <tr>
                    <td><?php _e('Search User', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" value="<?php echo $_GET['search_user5']; ?>" name="search_user5" size="20"/>
                        <input type="submit" name="PricerrTheme_save5" value="<?php _e('Search', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>


            </table>
        </form>


        <?php

        if (isset($_GET['PricerrTheme_save5'])):

            $search_user = trim($_GET['search_user5']);

            $user = get_userdatabylogin($search_user);
            $uid = $user->ID;

            $s = "select * from " . $wpdb->prefix . "job_withdraw where rejected='1' AND uid='$uid' order by id desc";
            $r = $wpdb->get_results($s);

            if (count($r) > 0):

                ?>

                <table class="widefat post fixed" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="12%"><?php _e('Username', 'PricerrTheme'); ?></th>
                        <th><?php _e('Method', 'PricerrTheme'); ?></th>
                        <th width="20%"><?php _e('Details', 'PricerrTheme'); ?></th>
                        <th><?php _e('Date Requested', 'PricerrTheme'); ?></th>
                        <th><?php _e('Amount', 'PricerrTheme'); ?></th>
                        <th width="25%"><?php _e('Options', 'PricerrTheme'); ?></th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php



                    foreach ($r as $row) {
                        $user = get_userdata($row->uid);

                        echo '<tr>';
                        echo '<th>' . $user->user_login . '</th>';
                        echo '<th>' . $row->methods . '</th>';
                        echo '<th>' . $row->payeremail . '</th>';
                        echo '<th>' . date('d-M-Y H:i:s', $row->datemade) . '</th>';
                        echo '<th>' . PricerrTheme_get_show_price($row->amount) . '</th>';
                        echo '<th>' . ($row->done == 0 ? '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&active_tab=tabs1&tid=' . $row->id . '" class="awesome">' . __('Make Complete', 'PricerrTheme') . '</a>' . ' | ' . '<a href="' . get_bloginfo('siteurl') . '/wp-admin/admin.php?page=withdraw-req&den_id=' . $row->id . '" class="awesome">' . __('Deny Request', 'PricerrTheme') . '</a>' : ($row->done == 1 ? __("Completed", 'PricerrTheme') : __("Rejected", 'PricerrTheme'))) . '</th>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>


                </table>
            <?php else: ?>

                <div class="padd101">
                    <?php _e('There are no results for your search.', 'PricerrTheme'); ?>
                </div>

            <?php endif;


        endif;

        ?>

    </div>

    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_general_options()
{
    $id_icon = 'icon-options-general2';
    $ttl_of_stuff = 'PricerrTheme - ' . __('General Settings', 'PricerrTheme');
    global $menu_admin_PricerrTheme_theme_bull;
    $arr = array("yes" => __("Yes", 'PricerrTheme'), "no" => __("No", 'PricerrTheme'));

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    if (isset($_POST['PricerrTheme_save1'])) {
        update_option('PricerrTheme_show_views', trim($_POST['PricerrTheme_show_views']));
        update_option('PricerrTheme_admin_approve_job', trim($_POST['PricerrTheme_admin_approve_job']));
        update_option('PricerrTheme_admin_approve_request', trim($_POST['PricerrTheme_admin_approve_request']));
        update_option('PricerrTheme_enable_blog', trim($_POST['PricerrTheme_enable_blog']));

        update_option('PricerrTheme_enable_extra', trim($_POST['PricerrTheme_enable_extra']));
        update_option('PricerrTheme_max_time_to_wait', trim($_POST['PricerrTheme_max_time_to_wait']));
        update_option('PricerrTheme_job_listing', trim($_POST['PricerrTheme_job_listing']));
        update_option('PricerrTheme_featured_job_listing', trim($_POST['PricerrTheme_featured_job_listing']));
        update_option('PricerrTheme_for_strg', trim($_POST['PricerrTheme_for_strg']));
        update_option('PricerrTheme_i_will_strg', trim($_POST['PricerrTheme_i_will_strg']));
        update_option('PricerrTheme_show_limit_job_cnt', trim($_POST['PricerrTheme_show_limit_job_cnt']));
        update_option('PricerrTheme_en_country_flags', trim($_POST['PricerrTheme_en_country_flags']));
        update_option('PricerrTheme_ip_key_db', trim($_POST['PricerrTheme_ip_key_db']));
        update_option('PricerrTheme_default_nr_of_pics', trim($_POST['PricerrTheme_default_nr_of_pics']));
        update_option('PricerrTheme_mandatory_pics_for_jbs', trim($_POST['PricerrTheme_mandatory_pics_for_jbs']));
        update_option('PricerrTheme_taxonomy_page_with_sdbr', trim($_POST['PricerrTheme_taxonomy_page_with_sdbr']));
        update_option('PricerrTheme_enable_second_footer', trim($_POST['PricerrTheme_enable_second_footer']));
        update_option('PricerrTheme_enable_instant_deli', trim($_POST['PricerrTheme_enable_instant_deli']));
        update_option('PricerrTheme_show_pagination_homepage', trim($_POST['PricerrTheme_show_pagination_homepage']));

        update_option('PricerrTheme_jobs_permalink', trim($_POST['PricerrTheme_jobs_permalink']));
        update_option('PricerrTheme_location_permalink', trim($_POST['PricerrTheme_location_permalink']));
        update_option('PricerrTheme_category_permalink', trim($_POST['PricerrTheme_category_permalink']));

        update_option('PricerrTheme_nrpostsPage_home_page', trim($_POST['PricerrTheme_nrpostsPage_home_page']));


        $PricerrTheme_get_total_extras = $_POST['PricerrTheme_get_total_extras'];
        if ($PricerrTheme_get_total_extras > 10 or !is_numeric($PricerrTheme_get_total_extras)) $PricerrTheme_get_total_extras = 10;

        update_option('PricerrTheme_get_total_extras', trim($PricerrTheme_get_total_extras));

        do_action('PricerrTheme_general_settings_main_details_options_save');
        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {
        update_option('PricerrTheme_filter_emails_private_messages', trim($_POST['PricerrTheme_filter_emails_private_messages']));
        update_option('PricerrTheme_filter_urls_private_messages', trim($_POST['PricerrTheme_filter_urls_private_messages']));
        update_option('PricerrTheme_filter_emails_chat_box', trim($_POST['PricerrTheme_filter_emails_chat_box']));
        update_option('PricerrTheme_filter_urls_chat_box', trim($_POST['PricerrTheme_filter_urls_chat_box']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save3'])) {
        update_option('PricerrTheme_enable_shipping', trim($_POST['PricerrTheme_enable_shipping']));
        update_option('PricerrTheme_enable_flat_shipping', trim($_POST['PricerrTheme_enable_flat_shipping']));
        update_option('PricerrTheme_enable_location_based_shipping', trim($_POST['PricerrTheme_enable_location_based_shipping']));


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save4'])) {
        update_option('PricerrTheme_enable_facebook_login', trim($_POST['PricerrTheme_enable_facebook_login']));
        update_option('PricerrTheme_facebook_app_id', trim($_POST['PricerrTheme_facebook_app_id']));
        update_option('PricerrTheme_facebook_app_secret', trim($_POST['PricerrTheme_facebook_app_secret']));


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save5'])) {
        update_option('PricerrTheme_enable_twitter_login', trim($_POST['PricerrTheme_enable_twitter_login']));
        update_option('PricerrTheme_twitter_consumer_key', trim($_POST['PricerrTheme_twitter_consumer_key']));
        update_option('PricerrTheme_twitter_consumer_secret', trim($_POST['PricerrTheme_twitter_consumer_secret']));


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save_n'])) {
        update_option('PricerrTheme_level1_extras', trim($_POST['PricerrTheme_level1_extras']));
        update_option('PricerrTheme_level2_extras', trim($_POST['PricerrTheme_level2_extras']));
        update_option('PricerrTheme_level3_extras', trim($_POST['PricerrTheme_level3_extras']));
        update_option('PricerrTheme_default_level_nr', trim($_POST['PricerrTheme_default_level_nr']));

        update_option('PricerrTheme_level1_vds', trim($_POST['PricerrTheme_level1_vds']));
        update_option('PricerrTheme_level2_vds', trim($_POST['PricerrTheme_level2_vds']));
        update_option('PricerrTheme_level3_vds', trim($_POST['PricerrTheme_level3_vds']));


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    do_action('PricerrTheme_general_options_actions');

    ?>

<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('Main Settings', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_new"><?php _e('Level Settings', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('Filters', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs3"><?php _e('Shipping', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs4"><?php _e('Facebook Connect', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs5"><?php _e('Twitter Connect', 'PricerrTheme'); ?></a></li>
        <?php do_action('PricerrTheme_general_options_tabs'); ?>
    </ul>

    <div id="tabs_new">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=general-options&active_tab=tabs_new">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 10 max.'); ?></td>
                    <td width="200"><?php _e('Default User Level:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="3" name="PricerrTheme_default_level_nr" value="<?php echo get_option('PricerrTheme_default_level_nr'); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 10 max.'); ?></td>
                    <td width="200"><?php _e('Level 1 Allowed Extras:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="5" name="PricerrTheme_level1_extras" value="<?php echo get_option('PricerrTheme_level1_extras'); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 10 max.'); ?></td>
                    <td><?php _e('Level 2 Allowed Extras:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="5" name="PricerrTheme_level2_extras"
                               value="<?php echo get_option('PricerrTheme_level2_extras'); ?>"/></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 10 max.'); ?></td>
                    <td><?php _e('Level 3 Allowed Extras:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="5" name="PricerrTheme_level3_extras" value="<?php echo get_option('PricerrTheme_level3_extras'); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td colspan="3"></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 3 max.'); ?></td>
                    <td width="200"><?php _e('Level 1 Allowed Videos:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="5" name="PricerrTheme_level1_vds" value="<?php echo get_option('PricerrTheme_level1_vds'); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 3 max.'); ?></td>
                    <td width="200"><?php _e('Level 2 Allowed Videos:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="5" name="PricerrTheme_level2_vds" value="<?php echo get_option('PricerrTheme_level2_vds'); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet('Set a value up to 3 max.'); ?></td>
                    <td width="200"><?php _e('Level 3 Allowed Videos:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="5" name="PricerrTheme_level3_vds" value="<?php echo get_option('PricerrTheme_level3_vds'); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save_n" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs1">


    <form method="post" action="">
    <table width="100%" class="sitemile-table">


    <tr>
        <td valign=top width="22"><?php PricerrTheme_theme_bullet('Show homepage pagination.'); ?></td>
        <td width="240"><?php _e('Homepage Pagination:', 'PricerrTheme'); ?></td>
        <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_show_pagination_homepage'); ?></td>
    </tr>

    <tr>
        <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
        <td><?php _e('Number of Homepage Lessons:', 'PricerrTheme'); ?></td>
        <td>
            <input type="text" size="5" name="PricerrTheme_nrpostsPage_home_page" value="<?php echo get_option('PricerrTheme_nrpostsPage_home_page'); ?>"/>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet('This enables or disables the sidebar in the category and archive pages.'); ?>
        </td>
        <td width="240">
            <?php _e('Enable instant delivery file:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_instant_deli'); ?>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Number of Extras:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="5" name="PricerrTheme_get_total_extras" value="<?php echo get_option('PricerrTheme_get_total_extras'); ?>"/>
            ( max number is 10 )
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet('This enables or disables the sidebar in the category and archive pages.'); ?>
        </td>
        <td width="240">
            <?php _e('Category Pages have sidebars?:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_taxonomy_page_with_sdbr'); ?>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet('This enables or disables the sidebar in the category and archive pages.'); ?>
        </td>
        <td width="240">
            <?php _e('Enable second footer area?:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_second_footer'); ?>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Mandatory to upload pictures for jobs:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_mandatory_pics_for_jbs'); ?>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Enable country flags:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_en_country_flags'); ?>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('IPI Info DB Key:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="22" name="PricerrTheme_ip_key_db" value="<?php echo get_option('PricerrTheme_ip_key_db'); ?>"/>
            ( register a key: http://www.ipinfodb.com/register.php )
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Max Amount of Pictures:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="5" name="PricerrTheme_default_nr_of_pics" value="<?php echo get_option('PricerrTheme_default_nr_of_pics'); ?>"/>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Show views in each job page:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_show_views'); ?>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Admin approves each job:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_admin_approve_job'); ?>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Admin approves each request:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_admin_approve_request'); ?>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Enable Blog:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_blog'); ?>
        </td>
    </tr>


    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Enable Extra Services:', 'PricerrTheme'); ?>
        </td>
        <td>
            <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_extra'); ?>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Auto-mark job as completed after:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="6" name="PricerrTheme_max_time_to_wait" value="<?php echo get_option('PricerrTheme_max_time_to_wait'); ?>"/>
            hours
        </td>
    </tr>


    <tr>
        <td valign=top width="22"><?php PricerrTheme_theme_bullet(__('After the time expires the job will be closed and your users can repost it. Leave 0 for never-expire jobs.', 'PricerrTheme')); ?>
        </td>
        <td><?php _e('Lesson listing period:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="6" name="PricerrTheme_job_listing" value="<?php echo get_option('PricerrTheme_job_listing'); ?>"/>
            days
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Featured job listing period:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="6" name="PricerrTheme_featured_job_listing" value="<?php echo get_option('PricerrTheme_featured_job_listing'); ?>"/>
            days
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Number of jobs show on homepage:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" name="PricerrTheme_show_limit_job_cnt" size="10" value="<?php echo get_option('PricerrTheme_show_limit_job_cnt'); ?>"/>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Translation for "I will provide":', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" name="PricerrTheme_i_will_strg" size="40" value="<?php echo get_option('PricerrTheme_i_will_strg'); ?>"/>
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td width="240">
            <?php _e('Translation for "for":', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" name="PricerrTheme_for_strg" size="40" value="<?php echo get_option('PricerrTheme_for_strg'); ?>"/>
        </td>
    </tr>


    <tr>
        <td colspan="3"></td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Slug for Lessons Permalink:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="30" name="PricerrTheme_jobs_permalink" value="<?php echo get_option('PricerrTheme_jobs_permalink'); ?>"/>
            *if left empty will show 'jobs'
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Slug for Location Permalink:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="30" name="PricerrTheme_location_permalink" value="<?php echo get_option('PricerrTheme_location_permalink'); ?>"/>
            *if left empty will show 'location'
        </td>
    </tr>

    <tr>
        <td valign=top width="22">
            <?php PricerrTheme_theme_bullet(); ?>
        </td>
        <td>
            <?php _e('Slug for Category Permalink:', 'PricerrTheme'); ?>
        </td>
        <td>
            <input type="text" size="30" name="PricerrTheme_category_permalink" value="<?php echo get_option('PricerrTheme_category_permalink'); ?>"/>
            *if left empty will show 'section'
        </td>
    </tr>


    <?php do_action('PricerrTheme_general_settings_main_details_options'); ?>

    <tr>
        <td></td>
        <td></td>
        <td>
            <input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
        </td>
    </tr>

    </table>
    </form>


    </div>

    <div id="tabs2">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=general-options&active_tab=tabs2">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Filter Email Addresses (private messages):', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_filter_emails_private_messages'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Filter URLs (private messages):', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_filter_urls_private_messages'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Filter Email Addresses (chat box):', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_filter_emails_chat_box'); ?></td>
                </tr>


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Filter URLs (chat box):', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_filter_urls_chat_box'); ?></td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs3">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=general-options&active_tab=tabs3">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable Shipping:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_shipping'); ?></td>
                </tr>
                <!-- 
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Enable only a flat fee:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_flat_shipping'); ?></td>
                    </tr>
                    
                    <tr>
                    <td colspan="3"><?php _e('OR', 'PricerrTheme'); ?></td>
                    </tr>
                    
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Location based:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_location_based_shipping'); ?></td>
                    </tr>
                    -->

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save3" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs4">
        For facebook connect, install this plugin: <a
            href="http://wordpress.org/extend/plugins/wordpress-social-login/">WordPress Social Login</a>
        <!--   
          	<form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=general-options&active_tab=tabs4">
            <table width="100%" class="sitemile-table">
    				
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable Facebook Login:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_facebook_login'); ?></td>
                    </tr>
                    
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Facebook App ID:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="35" name="PricerrTheme_facebook_app_id" value="<?php echo get_option('PricerrTheme_facebook_app_id'); ?>"/></td>
                    </tr>
                    
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Facebook Secret Key:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="35" name="PricerrTheme_facebook_app_secret" value="<?php echo get_option('PricerrTheme_facebook_app_secret'); ?>"/></td>
                    </tr>
  
                    <tr>
                    <td ></td>
                    <td ></td>
                    <td><input type="submit" name="PricerrTheme_save4" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                    </tr>
            
            </table>      
          	</form>
          -->
    </div>

    <div id="tabs5">
        For twitter connect, install this plugin: <a href="http://wordpress.org/extend/plugins/wordpress-social-login/">WordPress
            Social Login</a> <!--
          <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=general-options&active_tab=tabs5">
            <table width="100%" class="sitemile-table">
    				
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable Twitter Login:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_twitter_login'); ?></td>
                    </tr>
                    
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Twitter Consumer Key:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="35" name="PricerrTheme_twitter_consumer_key" value="<?php echo get_option('PricerrTheme_twitter_consumer_key'); ?>"/></td>
                    </tr>
                    
                    <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Twitter Consumer Secret:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="35" name="PricerrTheme_twitter_consumer_secret" value="<?php echo get_option('PricerrTheme_twitter_consumer_secret'); ?>"/></td>
                    </tr>
  
  
  						<tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="250"><?php _e('Callback URL:', 'PricerrTheme'); ?></td>
                    <td><?php echo get_bloginfo('template_url'); ?>/lib/social/twitter/callback.php</td>
                    </tr>
  
  				
                    <tr>
                    <td ></td>
                    <td ></td>
                    <td><input type="submit" name="PricerrTheme_save5" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                    </tr>
            
            </table>      
          	</form> -->
    </div>

<?php do_action('PricerrTheme_general_options_div_content'); ?>

    <?php
    echo '</div>';

}

/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_payment_methods()
{
    $id_icon = 'icon-options-general4';
    $ttl_of_stuff = 'PricerrTheme - Payment Methods';
    global $menu_admin_PricerrTheme_theme_bull;
    $arr = array("yes" => __("Yes", 'PricerrTheme'), "no" => __("No", 'PricerrTheme'));

    $arr1 = array("parallel" => "Parallel Payments", "chained" => "Chained Payments");
    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    //--------------------------

    do_action('PricerrTheme_payment_methods_action');
    if (isset($_POST['PricerrTheme_save1'])) {
        update_option('PricerrTheme_paypal_enable', trim($_POST['PricerrTheme_paypal_enable']));
        update_option('PricerrTheme_paypal_email', trim($_POST['PricerrTheme_paypal_email']));
        update_option('PricerrTheme_paypal_enable_sdbx', trim($_POST['PricerrTheme_paypal_enable_sdbx']));

        update_option('PricerrTheme_enable_paypal_ad', trim($_POST['PricerrTheme_enable_paypal_ad']));
        update_option('pricerr_theme_signature', trim($_POST['pricerr_theme_signature']));
        update_option('pricerr_theme_apipass', trim($_POST['pricerr_theme_apipass']));
        update_option('pricerr_theme_apiuser', trim($_POST['pricerr_theme_apiuser']));
        update_option('pricerr_theme_appid', trim($_POST['pricerr_theme_appid']));
        update_option('PricerrTheme_paypal_ad_model', trim($_POST['PricerrTheme_paypal_ad_model']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {
        update_option('PricerrTheme_alertpay_enable', trim($_POST['PricerrTheme_alertpay_enable']));
        update_option('PricerrTheme_alertpay_email', trim($_POST['PricerrTheme_alertpay_email']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save3'])) {
        update_option('PricerrTheme_moneybookers_enable', trim($_POST['PricerrTheme_moneybookers_enable']));
        update_option('PricerrTheme_moneybookers_email', trim($_POST['PricerrTheme_moneybookers_email']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save4'])) {
        update_option('PricerrTheme_ideal_enable', trim($_POST['PricerrTheme_ideal_enable']));
        update_option('PricerrTheme_ideal_email', trim($_POST['PricerrTheme_ideal_email']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save7'])) {
        update_option('PricerrTheme_bank_details', trim($_POST['PricerrTheme_bank_details']));
        update_option('PricerrTheme_bank_enable', trim($_POST['PricerrTheme_bank_enable']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    ?>


<div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1">PayPal</a></li>
        <li><a href="#tabs2">Payza/AlertPay</a></li>
        <li><a href="#tabs3">Moneybookers/Skrill</a></li>
        <li><a href="#tabs4">iDeal</a></li>

        <li><a href="#tabs_offline"><?php _e('Bank Payment(offline)', 'PricerrTheme'); ?></a></li>
        <?php do_action('PricerrTheme_payment_methods_tabs'); ?>

    </ul>
    <div id="tabs1">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=payment-methods&active_tab=tabs1">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_paypal_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('PayPal Enable Sandbox:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_paypal_enable_sdbx'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('PayPal Email Address:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="45" name="PricerrTheme_paypal_email" value="<?php echo get_option('PricerrTheme_paypal_email'); ?>"/></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable PayPal Adaptive:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_paypal_ad'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Payment Model:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr1, 'PricerrTheme_paypal_ad_model'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Signature:', 'PricerrTheme'); ?></td>
                    <td><input type="text" name="pricerr_theme_signature" value="<?php echo get_option('pricerr_theme_signature'); ?>" size="85"/></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('API Password:', 'PricerrTheme'); ?></td>
                    <td><input type="text" name="pricerr_theme_apipass" value="<?php echo get_option('pricerr_theme_apipass'); ?>" size="55"/></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('API User:', 'PricerrTheme'); ?></td>
                    <td><input type="text" name="pricerr_theme_apiuser" value="<?php echo get_option('pricerr_theme_apiuser'); ?>" size="55"/></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Application ID:', 'PricerrTheme'); ?></td>
                    <td><input type="text" name="pricerr_theme_appid" value="<?php echo get_option('pricerr_theme_appid'); ?>" size="55"/></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs2">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=payment-methods&active_tab=tabs2">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_alertpay_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Payza/Alertpay Email:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="45" name="PricerrTheme_alertpay_email" value="<?php echo get_option('PricerrTheme_alertpay_email'); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs3">
        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=payment-methods&active_tab=tabs3">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_moneybookers_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('MoneyBookers Email:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="45" name="PricerrTheme_moneybookers_email" value="<?php echo get_option('PricerrTheme_moneybookers_email'); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save3" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs4">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=payment-methods&active_tab=tabs4">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_ideal_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('iDeal Partner ID:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="45" name="PricerrTheme_ideal_email" value="<?php echo get_option('PricerrTheme_ideal_email'); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save4" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>





<?php do_action('PricerrTheme_payment_methods_content_divs'); ?>


    <div id="tabs_offline">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=payment-methods&active_tab=tabs_offline">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="200"><?php _e('Enable:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_bank_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Bank Details:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea rows="5" name="PricerrTheme_bank_details" cols="40"><?php echo get_option('PricerrTheme_bank_details'); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save7" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>



    <?php
    echo '</div>';


}


/*****************************************************************
 *
 *    Admin Function - Pricerr Theme
 *
 *****************************************************************/

function PricerrTheme_email_settings()
{

    $id_icon = 'icon-options-general-email';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Email Settings', 'PricerrTheme');
    global $menu_admin_PricerrTheme_theme_bull;
    $arr = array("yes" => 'Yes', "no" => "No");

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    if (isset($_POST['PricerrTheme_save1'])) {
        update_option('PricerrTheme_email_name_from', trim($_POST['PricerrTheme_email_name_from']));
        update_option('PricerrTheme_email_addr_from', trim($_POST['PricerrTheme_email_addr_from']));
        update_option('PricerrTheme_allow_html_emails', trim($_POST['PricerrTheme_allow_html_emails']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {
        update_option('PricerrTheme_new_user_email_subject', trim($_POST['PricerrTheme_new_user_email_subject']));
        update_option('PricerrTheme_new_user_email_message', trim($_POST['PricerrTheme_new_user_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save_new_user_email_admin'])) {
        update_option('PricerrTheme_new_user_email_admin_subject', trim($_POST['PricerrTheme_new_user_email_admin_subject']));
        update_option('PricerrTheme_new_user_email_admin_message', trim($_POST['PricerrTheme_new_user_email_admin_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save3'])) {
        update_option('PricerrTheme_new_job_email_not_approve_admin_enable', trim($_POST['PricerrTheme_new_job_email_not_approve_admin_enable']));
        update_option('PricerrTheme_new_job_email_not_approve_admin_subject', trim($_POST['PricerrTheme_new_job_email_not_approve_admin_subject']));
        update_option('PricerrTheme_new_job_email_not_approve_admin_message', trim($_POST['PricerrTheme_new_job_email_not_approve_admin_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save31'])) {
        update_option('PricerrTheme_new_job_email_approve_admin_enable', trim($_POST['PricerrTheme_new_job_email_approve_admin_enable']));
        update_option('PricerrTheme_new_job_email_approve_admin_subject', trim($_POST['PricerrTheme_new_job_email_approve_admin_subject']));
        update_option('PricerrTheme_new_job_email_approve_admin_message', trim($_POST['PricerrTheme_new_job_email_approve_admin_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save32'])) {
        update_option('PricerrTheme_new_job_email_not_approved_enable', trim($_POST['PricerrTheme_new_job_email_not_approved_enable']));
        update_option('PricerrTheme_new_job_email_not_approved_subject', trim($_POST['PricerrTheme_new_job_email_not_approved_subject']));
        update_option('PricerrTheme_new_job_email_not_approved_message', trim($_POST['PricerrTheme_new_job_email_not_approved_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save33'])) {
        update_option('PricerrTheme_new_job_email_approved_enable', trim($_POST['PricerrTheme_new_job_email_approved_enable']));
        update_option('PricerrTheme_new_job_email_approved_subject', trim($_POST['PricerrTheme_new_job_email_approved_subject']));
        update_option('PricerrTheme_new_job_email_approved_message', trim($_POST['PricerrTheme_new_job_email_approved_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save4'])) {
        update_option('PricerrTheme_seller_purchase_job_email_enable', trim($_POST['PricerrTheme_seller_purchase_job_email_enable']));
        update_option('PricerrTheme_seller_purchase_job_email_subject', trim($_POST['PricerrTheme_seller_purchase_job_email_subject']));
        update_option('PricerrTheme_seller_purchase_job_email_message', trim($_POST['PricerrTheme_seller_purchase_job_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save5'])) {
        update_option('PricerrTheme_buyer_purchase_job_email_enable', trim($_POST['PricerrTheme_buyer_purchase_job_email_enable']));
        update_option('PricerrTheme_buyer_purchase_job_email_message', trim($_POST['PricerrTheme_buyer_purchase_job_email_message']));
        update_option('PricerrTheme_buyer_purchase_job_email_subject', trim($_POST['PricerrTheme_buyer_purchase_job_email_subject']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save6'])) {
        update_option('PricerrTheme_private_message_email_enable', trim($_POST['PricerrTheme_private_message_email_enable']));
        update_option('PricerrTheme_private_message_email_subject', trim($_POST['PricerrTheme_private_message_email_subject']));
        update_option('PricerrTheme_private_message_email_message', trim($_POST['PricerrTheme_private_message_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save7'])) {
        update_option('PricerrTheme_chat_order_email_enable', trim($_POST['PricerrTheme_chat_order_email_enable']));
        update_option('PricerrTheme_chat_order_email_subject', trim($_POST['PricerrTheme_chat_order_email_subject']));
        update_option('PricerrTheme_chat_order_email_message', trim($_POST['PricerrTheme_chat_order_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save8'])) {
        update_option('PricerrTheme_job_finished_email_enabled', trim($_POST['PricerrTheme_job_finished_email_enabled']));
        update_option('PricerrTheme_job_finished_email_subject', trim($_POST['PricerrTheme_job_finished_email_subject']));
        update_option('PricerrTheme_job_finished_email_message', trim($_POST['PricerrTheme_job_finished_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save9'])) {
        update_option('PricerrTheme_job_completed_email_enable', trim($_POST['PricerrTheme_job_completed_email_enable']));
        update_option('PricerrTheme_job_completed_email_subject', trim($_POST['PricerrTheme_job_completed_email_subject']));
        update_option('PricerrTheme_job_completed_email_message', trim($_POST['PricerrTheme_job_completed_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save_ten'])) {
        update_option('PricerrTheme_feedback_received_seller_email_enable', trim($_POST['PricerrTheme_feedback_received_seller_email_enable']));
        update_option('PricerrTheme_feedback_received_seller_email_subject', trim($_POST['PricerrTheme_feedback_received_seller_email_subject']));
        update_option('PricerrTheme_feedback_received_seller_email_message', trim($_POST['PricerrTheme_feedback_received_seller_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save_elev'])) {
        update_option('PricerrTheme_withdraw_released_email_enable', trim($_POST['PricerrTheme_withdraw_released_email_enable']));
        update_option('PricerrTheme_withdraw_released_email_subject', trim($_POST['PricerrTheme_withdraw_released_email_subject']));
        update_option('PricerrTheme_withdraw_released_email_message', trim($_POST['PricerrTheme_withdraw_released_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save_tabs_not_done'])) {
        update_option('PricerrTheme_withdraw_rejected_email_enable', trim($_POST['PricerrTheme_withdraw_rejected_email_enable']));
        update_option('PricerrTheme_withdraw_rejected_email_subject', trim($_POST['PricerrTheme_withdraw_rejected_email_subject']));
        update_option('PricerrTheme_withdraw_rejected_email_message', trim($_POST['PricerrTheme_withdraw_rejected_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save_request'])) {
        update_option('PricerrTheme_withdraw_request_email_enable', trim($_POST['PricerrTheme_withdraw_request_email_enable']));
        update_option('PricerrTheme_withdraw_request_email_subject', trim($_POST['PricerrTheme_withdraw_request_email_subject']));
        update_option('PricerrTheme_withdraw_request_email_message', trim($_POST['PricerrTheme_withdraw_request_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save_twel'])) {
        update_option('PricerrTheme_order_closed_by_seller_email_enable', trim($_POST['PricerrTheme_order_closed_by_seller_email_enable']));
        update_option('PricerrTheme_order_closed_by_seller_email_subject', trim($_POST['PricerrTheme_order_closed_by_seller_email_subject']));
        update_option('PricerrTheme_order_closed_by_seller_email_message', trim($_POST['PricerrTheme_order_closed_by_seller_email_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save_tabs_mutual_seller'])) {
        update_option('PricerrTheme_emails_mutual_seller_enable', trim($_POST['PricerrTheme_emails_mutual_seller_enable']));
        update_option('PricerrTheme_emails_mutual_seller_subject', trim($_POST['PricerrTheme_emails_mutual_seller_subject']));
        update_option('PricerrTheme_emails_mutual_seller_message', trim($_POST['PricerrTheme_emails_mutual_seller_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save_tabs_mutual_buyer'])) {
        update_option('PricerrTheme_emails_mutual_buyer_enable', trim($_POST['PricerrTheme_emails_mutual_buyer_enable']));
        update_option('PricerrTheme_emails_mutual_buyer_subject', trim($_POST['PricerrTheme_emails_mutual_buyer_subject']));
        update_option('PricerrTheme_emails_mutual_buyer_message', trim($_POST['PricerrTheme_emails_mutual_buyer_message']));

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }



    ?>

    <div id="usual2" class="usual">
    <ul>
        <li><a href="#tabs1"><?php _e('Email Settings', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs2"><?php _e('New User Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_new_user_email_admin"><?php _e('New User Email (admin)', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs3"><?php _e('Post Lesson Approved Email (admin)', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_gop"><?php _e('Post Lesson Not-approved Email (admin)', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_gas"><?php _e('Post Lesson Approved Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_kli"><?php _e('Post Lesson Not Approved Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs4"><?php _e('Seller Lesson Purchase Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs5"><?php _e('Buyer Lesson Purchase Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs6"><?php _e('Private Message Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs7"><?php _e('New Chat Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs8"><?php _e('Lesson Delivered Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs9"><?php _e('Lesson Completed Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_ten"><?php _e('Feedback Left Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_request"><?php _e('Withdraw Request Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_elev"><?php _e('Withdraw Released Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_not_done"><?php _e('Withdraw Rejected Email', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_twel"><?php _e('Order Closed Email', 'PricerrTheme'); ?></a></li>

        <li><a href="#tabs_mutual_buyer"><?php _e('Mutual Cancellation: Buyer', 'PricerrTheme'); ?></a></li>
        <li><a href="#tabs_mutual_seller"><?php _e('Mutual Cancellation: Seller', 'PricerrTheme'); ?></a></li>

    </ul>


    <div id="tabs_mutual_seller">

        <div class="spntxt_bo"><?php _e('This email will be received by the buyer of the job when the seller requests a mutual cancellation.
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_mutual_seller">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_emails_mutual_seller_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_emails_mutual_seller_subject" value="<?php echo stripslashes(get_option('PricerrTheme_emails_mutual_seller_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_emails_mutual_seller_message">
                            <?php echo stripslashes(get_option('PricerrTheme_emails_mutual_seller_message')); ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e("your new username", 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##seller_message##</strong>
                            - <?php _e('message sent by the buyer', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save_tabs_mutual_seller" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>


    <div id="tabs_mutual_buyer">

        <div class="spntxt_bo"><?php _e('This email will be received by the seller of the job when the buyer requests a mutual cancellation.
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_mutual_buyer">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_emails_mutual_buyer_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_emails_mutual_buyer_subject" value="<?php echo stripslashes(get_option('PricerrTheme_emails_mutual_buyer_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td><textarea cols="92" rows="10" name="PricerrTheme_emails_mutual_buyer_message">
                            <?php echo stripslashes(get_option('PricerrTheme_emails_mutual_buyer_message')); ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e("your new username", 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##buyer_message##</strong>
                            - <?php _e('message sent by the buyer', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save_tabs_mutual_buyer" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>

            </table>
        </form>

    </div>


    <div id="tabs1">

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs1">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160">Email From Name:</td>
                    <td>
                        <input type="text" size="45" name="PricerrTheme_email_name_from" value="<?php echo stripslashes(get_option('PricerrTheme_email_name_from')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td>Email From Address:</td>
                    <td>
                        <input type="text" size="45" name="PricerrTheme_email_addr_from" value="<?php echo stripslashes(get_option('PricerrTheme_email_addr_from')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td>Allow HTML in emails:</td>
                    <td>
                        <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_allow_html_emails'); ?>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>


    </div>

    <div id="tabs2">

        <div class="spntxt_bo"><?php _e('This email will be received by all new users who register on your website. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs2">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_new_user_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_new_user_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_new_user_email_message"><?php echo stripslashes(get_option('PricerrTheme_new_user_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e("your new username", 'PricerrTheme'); ?><br/>
                            <strong>##username_email##</strong> - <?php _e("your new user's email", 'PricerrTheme'); ?>
                            <br/>
                            <strong>##user_password##</strong>
                            - <?php _e("your new user's password", 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_new_user_email_admin">

        <div class="spntxt_bo"><?php _e('This email will be received by the admin when a new user registers on the website. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_new_user_email_admin">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_new_user_email_admin_subject" value="<?php echo stripslashes(get_option('PricerrTheme_new_user_email_admin_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_new_user_email_admin_message"><?php echo stripslashes(get_option('PricerrTheme_new_user_email_admin_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e('your new username', "PricerrTheme"); ?><br/>
                            <strong>##username_email##</strong> - <?php _e("your new user's email", "PricerrTheme"); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save_new_user_email_admin" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs3">

        <div class="spntxt_bo"><?php _e('This email will be received by the admin when someone posts a job on the website website. This email will be received if the the job is automatically approved.
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs3">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td>
                        <?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_new_job_email_not_approve_admin_enable'); ?>
                    </td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_new_job_email_not_approve_admin_subject" value="<?php echo stripslashes(get_option('PricerrTheme_new_job_email_not_approve_admin_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_new_job_email_not_approve_admin_message">
                            <?php echo stripslashes(get_option('PricerrTheme_new_job_email_not_approve_admin_message')); ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save3" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_gop">

        <div class="spntxt_bo"><?php _e('This email will be received by the admin when someone posts a job on the website website when approved.
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post"
              action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_gop">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_new_job_email_approve_admin_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_new_job_email_approve_admin_subject" value="<?php echo stripslashes(get_option('PricerrTheme_new_job_email_approve_admin_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_new_job_email_approve_admin_message">
                            <?php echo stripslashes(get_option('PricerrTheme_new_job_email_approve_admin_message')); ?>
                        </textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save31" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_kli">

        <div class="spntxt_bo"><?php _e('This email will be received by your users after posting a new job on your website if the job is not automatically approved. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_kli">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_new_job_email_not_approved_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_new_job_email_not_approved_subject" value="<?php echo stripslashes(get_option('PricerrTheme_new_job_email_not_approved_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_new_job_email_not_approved_message"><?php echo stripslashes(get_option('PricerrTheme_new_job_email_not_approved_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e('job owner username', 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save32" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_gas">

        <div class="spntxt_bo"><?php _e('This email will be received by your users after posting a new job on your website if the job is automatically approved. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_gas">
            <table width="100%" class="sitemile-table">


                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_new_job_email_approved_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_new_job_email_approved_subject" value="<?php echo stripslashes(get_option('PricerrTheme_new_job_email_approved_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_new_job_email_approved_message"><?php echo stripslashes(get_option('PricerrTheme_new_job_email_approved_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e('username', 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save33" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs4">

        <div class="spntxt_bo"><?php _e('This email will be received by the <strong>seller</strong> when they sell one of their jobs. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs4">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_seller_purchase_job_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_seller_purchase_job_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_seller_purchase_job_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_seller_purchase_job_email_message"><?php echo stripslashes(get_option('PricerrTheme_seller_purchase_job_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong>
                            - <?php _e("the seller's username", 'PricerrTheme'); ?><br/>
                            <strong>##sender_username##</strong> - <?php _e("the buyer's username", "PricerrTheme"); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##conversation_page_link##</strong>
                            - <?php _e('the link for the chat private conversation', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save4" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs5">

        <div class="spntxt_bo"><?php _e('This email will be received by the <strong>buyer</strong> when they purchase a new job. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs5">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_buyer_purchase_job_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_buyer_purchase_job_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_buyer_purchase_job_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td><textarea cols="92" rows="10"
                                  name="PricerrTheme_buyer_purchase_job_email_message"><?php echo stripslashes(get_option('PricerrTheme_buyer_purchase_job_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong>
                            - <?php _e("the buyer's username", "PricerrTheme"); ?><br/>
                            <strong>##sender_username##</strong> - <?php _e("the seller's username", 'PricerrTheme'); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##conversation_page_link##</strong>
                            - <?php _e('the link for the chat private conversation', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save5" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs6">

        <div class="spntxt_bo"><?php _e('This email will be received by your users when they receive a private message in their account. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs6">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_private_message_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_private_message_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_private_message_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_private_message_email_message"><?php echo stripslashes(get_option('PricerrTheme_private_message_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong>
                            - <?php _e("the receiver username", "PricerrTheme"); ?><br/>
                            <strong>##sender_username##</strong> - <?php _e("the sender username", "PricerrTheme"); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##subject_of_message##</strong>
                            - <?php _e('the subject of the message', 'PricerrTheme'); ?><br/>
                            <strong>##message##</strong> - <?php _e('contents of message', 'PricerrTheme'); ?><br/>
                            <strong>##private_mess_page_link##</strong>
                            - <?php _e('link to private messages area in account', 'PricerrTheme'); ?><br/>


                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save6" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs7">

        <div class="spntxt_bo"><?php _e('This email will be received by your users when they receive a new message on a chat for an order. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs7">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_chat_order_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_chat_order_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_chat_order_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_chat_order_email_message"><?php echo stripslashes(get_option('PricerrTheme_chat_order_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong>
                            - <?php _e("the receiver username", "PricerrTheme"); ?><br/>
                            <strong>##sender_username##</strong> - <?php _e("the sender username", "PricerrTheme"); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##conversation_page_link##</strong>
                            - <?php _e('the link for the chat private conversation', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save7" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs8">

        <div class="spntxt_bo"><?php _e('This email will be received by the buyer when the seller marks the job as done. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs8">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_job_finished_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_job_finished_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_job_finished_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_job_finished_email_message"><?php echo stripslashes(get_option('PricerrTheme_job_finished_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong> - <?php _e('username of buyer', 'PricerrTheme'); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##conversation_page_link##</strong>
                            - <?php _e('the link for the chat private conversation', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save8" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs9">

        <div class="spntxt_bo"><?php _e('This email will be received by the seller when the buyer accepts the job as delivered. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs9">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_job_completed_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_job_completed_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_job_completed_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_job_completed_email_message"><?php echo stripslashes(get_option('PricerrTheme_job_completed_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong>
                            - <?php _e('username of the seller', 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>
                            <strong>##conversation_page_link##</strong>
                            - <?php _e('the link for the chat private conversation', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save9"
                               value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_ten">

        <div class="spntxt_bo"><?php _e('This email will be received by the seller when he received feedback from the buyer. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_ten">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_feedback_received_seller_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_feedback_received_seller_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_feedback_received_seller_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_feedback_received_seller_email_message"><?php echo stripslashes(get_option('PricerrTheme_feedback_received_seller_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong>
                            - <?php _e("the receiver username", "PricerrTheme"); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>


                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="PricerrTheme_save_ten" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/>
                    </td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_request">

        <div class="spntxt_bo"><?php _e('This email will be received by the user after he requests a withdrawal. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post"
              action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_request">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_withdraw_request_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td>
                        <input type="text" size="90" name="PricerrTheme_withdraw_request_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_withdraw_request_email_subject')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_withdraw_request_email_message"><?php echo stripslashes(get_option('PricerrTheme_withdraw_request_email_message')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e('username', 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##amount_withdrawn##</strong> - <?php _e("amount withdrawn", 'PricerrTheme'); ?>
                            <br/>
                            <strong>##withdraw_method##</strong>
                            - <?php _e("requested withdraw method", 'PricerrTheme'); ?><br/>


                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save_request" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>
            </table>
        </form>
    </div>

    <div id="tabs_elev">

        <div class="spntxt_bo"><?php _e('This email will be received by the user after his withdrawal request has been processed. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_elev">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_withdraw_released_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="90" name="PricerrTheme_withdraw_released_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_withdraw_released_email_subject')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td>
                        <textarea cols="92" rows="10" name="PricerrTheme_withdraw_released_email_message">
                            <?php echo stripslashes(get_option('PricerrTheme_withdraw_released_email_message')); ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e('username', 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##amount_withdrawn##</strong> - <?php _e("amount withdrawn", 'PricerrTheme'); ?>
                            <br/>
                            <strong>##withdraw_method##</strong>
                            - <?php _e("requested withdraw method", 'PricerrTheme'); ?><br/>


                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save_elev" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>

            </table>
        </form>
    </div>

    <div id="tabs_not_done">

        <div class="spntxt_bo"><?php _e('This email will be received by the user after his withdrawal request has been rejected. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body. ', 'PricerrTheme'); ?></div>


        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_not_done">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_withdraw_rejected_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="90" name="PricerrTheme_withdraw_rejected_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_withdraw_rejected_email_subject')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td><textarea cols="92" rows="10" name="PricerrTheme_withdraw_rejected_email_message"><?php echo stripslashes(get_option('PricerrTheme_withdraw_rejected_email_message')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##username##</strong> - <?php _e('username', 'PricerrTheme'); ?><br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##amount_withdrawn##</strong> - <?php _e("amount withdrawn", 'PricerrTheme'); ?>
                            <br/>
                            <strong>##withdraw_method##</strong>
                            - <?php _e("requested withdraw method", 'PricerrTheme'); ?><br/>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save_tabs_not_done" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>

            </table>
        </form>

    </div>

    <div id="tabs_twel">

        <div class="spntxt_bo"><?php _e('This email will be received by the seller when the buyer cancels the job. 
          Be aware, if you add html tags to this email you must have the allow HTML tags option set to yes.
          Also at the bottom you can see a list of tags you can use in the email body.', 'PricerrTheme'); ?> </div>

        <form method="post" action="<?php bloginfo('siteurl'); ?>/wp-admin/admin.php?page=email-settings&active_tab=tabs_twel">
            <table width="100%" class="sitemile-table">

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td><?php _e('Enable this email:', 'PricerrTheme'); ?></td>
                    <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_order_closed_by_seller_email_enable'); ?></td>
                </tr>

                <tr>
                    <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                    <td width="160"><?php _e('Email Subject:', 'PricerrTheme'); ?></td>
                    <td><input type="text" size="90" name="PricerrTheme_order_closed_by_seller_email_subject" value="<?php echo stripslashes(get_option('PricerrTheme_order_closed_by_seller_email_subject')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <td valign=top><?php PricerrTheme_theme_bullet(); ?></td>
                    <td valign=top><?php _e('Email Content:', 'PricerrTheme'); ?></td>
                    <td><textarea cols="92" rows="10" name="PricerrTheme_order_closed_by_seller_email_message"><?php echo stripslashes(get_option('PricerrTheme_order_closed_by_seller_email_message')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td valign=top></td>
                    <td valign=top></td>
                    <td>
                        <div class="spntxt_bo2">
                            <?php _e('Here is a list of tags you can use in this email:', 'PricerrTheme'); ?><br/><br/>

                            <strong>##receiver_username##</strong> - <?php _e("receiver's username", "PricerrTheme"); ?>
                            <br/>
                            <strong>##site_login_url##</strong>
                            - <?php _e('the link to your user login page', 'PricerrTheme'); ?><br/>
                            <strong>##your_site_name##</strong> - <?php _e("your website's name", "PricerrTheme"); ?>
                            <br/>
                            <strong>##your_site_url##</strong>
                            - <?php _e("your website's main address", 'PricerrTheme'); ?><br/>
                            <strong>##my_account_url##</strong>
                            - <?php _e("your website's my account link", 'PricerrTheme'); ?><br/>
                            <strong>##job_name##</strong> - <?php _e("new new job's title", 'PricerrTheme'); ?><br/>
                            <strong>##job_link##</strong> - <?php _e('link for the new job', 'PricerrTheme'); ?><br/>

                            <strong>##conversation_page_link##</strong>
                            - <?php _e('the link for the chat private conversation', 'PricerrTheme'); ?><br/>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="PricerrTheme_save_twel" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
                </tr>

            </table>
        </form>

    </div>
    </div>

    <?php
    echo '</div>';


}

function PricerrTheme_pricing_options()
{
    $id_icon = 'icon-options-general4';
    $ttl_of_stuff = 'PricerrTheme - ' . __('Pricing Settings', 'PricerrTheme');
    $arr = array("yes" => __("Yes", 'PricerrTheme'), "no" => __("No", 'PricerrTheme'));
    $sep = array("," => __('Comma (,)', 'PricerrTheme'), "." => __("Point (.)", 'PricerrTheme'));
    $frn = array("front" => __('In front of sum (eg: $50)', 'PricerrTheme'), "back" => __("After the sum (eg: 50$)", 'PricerrTheme'));
    global $menu_admin_PricerrTheme_theme_bull, $wpdb;

    $arr_currency = array("USD" => "US Dollars", "EUR" => "Euros", "CAD" => "Canadian Dollars", "CHF" => "Swiss Francs", "GBP" => "British Pounds",
        "AUD" => "Australian Dollars", "NZD" => "New Zealand Dollars", "BRL" => "Brazilian Real",
        "SGD" => "Singapore Dollars", "SEK" => "Swidish Kroner", "NOK" => "Norwegian Kroner", "DKK" => "Danish Kroner", 'PLN' => 'Polish zloty',
        "MXN" => "Mexican Pesos", "JPY" => "Japanese Yen", "EUR" => "Euros", "ZAR" => "South Africa Rand", 'RUB' => 'Russian Ruble', "TRY" => "Turkish Lyra", "RON" => "Romanian Lei",
        "RSD" => "Serbian Dinar", "COP" => "Colombian peso", 'INR' => 'Indian Rupee', 'MYR' => 'Malaysian Ringgit (MYR)', 'LTL' => 'Lithuania Litas', 'HKD' => 'HongKong Dollars',
        'PHP' => 'Phillipine Peso', 'TWD' => 'Taiwan Dollar', 'BTC' => 'BitCoins');

    $arr_currency = apply_filters('PricerrTheme_arr_curency', $arr_currency);

    //------------------------------------------------------

    echo '<div class="wrap">';
    echo '<div class="icon32" id="' . $id_icon . '"><br/></div>';
    echo '<h2 class="my_title_class_sitemile">' . $ttl_of_stuff . '</h2>';

    //-------------------

    if (isset($_POST['PricerrTheme_save1'])) {
        $PricerrTheme_currency = trim($_POST['PricerrTheme_currency']);
        $PricerrTheme_currency_symbol = trim($_POST['PricerrTheme_currency_symbol']);
        $PricerrTheme_currency_position = trim($_POST['PricerrTheme_currency_position']);
        $PricerrTheme_decimal_sum_separator = trim($_POST['PricerrTheme_decimal_sum_separator']);
        $PricerrTheme_thousands_sum_separator = trim($_POST['PricerrTheme_thousands_sum_separator']);

        update_option('PricerrTheme_currency', $PricerrTheme_currency);
        update_option('PricerrTheme_currency_symbol', $PricerrTheme_currency_symbol);
        update_option('PricerrTheme_currency_position', $PricerrTheme_currency_position);
        update_option('PricerrTheme_decimal_sum_separator', $PricerrTheme_decimal_sum_separator);
        update_option('PricerrTheme_thousands_sum_separator', $PricerrTheme_thousands_sum_separator);


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }

    if (isset($_POST['PricerrTheme_save2'])) {

        $PricerrTheme_new_job_listing_fee = trim($_POST['PricerrTheme_new_job_listing_fee']);
        $PricerrTheme_new_job_feat_listing_fee = trim($_POST['PricerrTheme_new_job_feat_listing_fee']);
        $PricerrTheme_withdraw_limit = trim($_POST['PricerrTheme_withdraw_limit']);
        $PricerrTheme_percent_fee_taken = trim($_POST['PricerrTheme_percent_fee_taken']);
        $PricerrTheme_solid_fee_taken = trim($_POST['PricerrTheme_solid_fee_taken']);

        update_option('PricerrTheme_solid_fee_taken', $PricerrTheme_solid_fee_taken);
        update_option('PricerrTheme_percent_fee_taken', $PricerrTheme_percent_fee_taken);
        update_option('PricerrTheme_withdraw_limit', $PricerrTheme_withdraw_limit);
        update_option('PricerrTheme_new_job_listing_fee', $PricerrTheme_new_job_listing_fee);
        update_option('PricerrTheme_new_job_feat_listing_fee', $PricerrTheme_new_job_feat_listing_fee);


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_save3'])) {

        $PricerrTheme_job_fixed_amount = trim($_POST['PricerrTheme_job_fixed_amount']);
        $PricerrTheme_enable_free_input_box = trim($_POST['PricerrTheme_enable_free_input_box']);
        $PricerrTheme_enable_dropdown_values = trim($_POST['PricerrTheme_enable_dropdown_values']);

        update_option('PricerrTheme_job_fixed_amount', $PricerrTheme_job_fixed_amount);
        update_option('PricerrTheme_enable_free_input_box', $PricerrTheme_enable_free_input_box);
        update_option('PricerrTheme_enable_dropdown_values', $PricerrTheme_enable_dropdown_values);


        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    if (isset($_POST['PricerrTheme_addnewcost'])) {
        $cost = trim($_POST['newcost']);
        $ss = "insert into " . $wpdb->prefix . "job_var_costs (cost) values('$cost')";
        $wpdb->query($ss);

        echo '<div class="saved_thing">' . __('Settings saved!', 'PricerrTheme') . '</div>';
    }


    ?>

    <div id="usual2" class="usual">
<ul>
    <li><a href="#tabs1"><?php _e('Main Details', 'PricerrTheme'); ?></a></li>
    <li><a href="#tabs2"><?php _e('Lesson Fees', 'PricerrTheme'); ?></a></li>
    <li><a href="#tabs3"><?php _e('Lesson Values', 'PricerrTheme'); ?></a></li>
    <li><a href="#tabs4"><?php _e('Dropdown Lesson Values', 'PricerrTheme'); ?></a></li>

</ul>
<div id="tabs1">

    <form method="post" action="<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin.php?page=pricing-settings&active_tab=tabs1">
        <table width="100%" class="sitemile-table">

            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('Site currency:', 'PricerrTheme'); ?></td>
                <td><?php echo PricerrTheme_get_option_drop_down($arr_currency, 'PricerrTheme_currency'); ?></td>
            </tr>


            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td width="160"><?php _e('Currency symbol:', 'PricerrTheme'); ?></td>
                <td><input type="text" size="6" name="PricerrTheme_currency_symbol" value="<?php echo get_option('PricerrTheme_currency_symbol'); ?>"/></td>
            </tr>

            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('Currency symbol position:', 'PricerrTheme'); ?></td>
                <td><?php echo PricerrTheme_get_option_drop_down($frn, 'PricerrTheme_currency_position'); ?></td>
            </tr>


            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('Decimals sum separator:', 'PricerrTheme'); ?></td>
                <td><?php echo PricerrTheme_get_option_drop_down($sep, 'PricerrTheme_decimal_sum_separator'); ?></td>
            </tr>

            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('Thousands sum separator:', 'PricerrTheme'); ?></td>
                <td><?php echo PricerrTheme_get_option_drop_down($sep, 'PricerrTheme_thousands_sum_separator'); ?></td>
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="PricerrTheme_save1" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
            </tr>

        </table>
    </form>


</div>

<div id="tabs2" style="display: none; ">

    <form method="post" action="<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin.php?page=pricing-settings&active_tab=tabs2">
        <table width="100%" class="sitemile-table">


            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td width="160"><?php _e('New job listing fee:', 'PricerrTheme'); ?></td>
                <td><input type="text" size="15" name="PricerrTheme_new_job_listing_fee" value="<?php echo get_option('PricerrTheme_new_job_listing_fee'); ?>"/> <?php echo PricerrTheme_get_currency(); ?>
                </td>
            </tr>

            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('New featured job listing fee:', 'PricerrTheme'); ?></td>
                <td><input type="text" size="15" name="PricerrTheme_new_job_feat_listing_fee" value="<?php echo get_option('PricerrTheme_new_job_feat_listing_fee'); ?>"/> <?php echo PricerrTheme_get_currency(); ?>
                </td>
            </tr>

            <tr>
                <td valign=top width="22">
                    <?php PricerrTheme_theme_bullet(); ?>
                </td>
                <td><?php _e('Withdraw Limit:', 'PricerrTheme'); ?></td>
                <td><input type="text" size="15" name="PricerrTheme_withdraw_limit" value="<?php echo get_option('PricerrTheme_withdraw_limit'); ?>"/> <?php echo PricerrTheme_get_currency(); ?>
                </td>
            </tr>


            <tr>
                <td valign=top width="22">
                    <?php PricerrTheme_theme_bullet(__('If the percent is empty then the fixed amount value will be considered.', 'PricerrTheme')); ?>
                </td>
                <td><?php _e('Fee taken from each job:', 'PricerrTheme'); ?></td>
                <td><input type="text" size="4" name="PricerrTheme_percent_fee_taken" value="<?php echo get_option('PricerrTheme_percent_fee_taken'); ?>"/>% or solid amount
                    <input type="text" size="6" name="PricerrTheme_solid_fee_taken" value="<?php echo get_option('PricerrTheme_solid_fee_taken'); ?>"/><?php echo PricerrTheme_get_currency(); ?>
                </td>
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="PricerrTheme_save2" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
            </tr>

        </table>
    </form>
</div>


<div id="tabs3">

    <form method="post" action="<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin.php?page=pricing-settings&active_tab=tabs3">
        <table width="100%" class="sitemile-table">


            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td width="160"><?php _e('Lesson fixed amount:', 'PricerrTheme'); ?></td>
                <td>
                    <input type="text" size="15" name="PricerrTheme_job_fixed_amount" value="<?php echo get_option('PricerrTheme_job_fixed_amount'); ?>"/>
                    <?php echo PricerrTheme_get_currency(); ?>
                </td>
            </tr>

            <tr>
                <td colspan="3"><?php _e('OR', 'PricerrTheme'); ?></td>
            </tr>

            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('Enable free text input:', 'PricerrTheme'); ?></td>
                <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_free_input_box'); ?></td>
            </tr>

            <tr>
                <td colspan="3">OR</td>
            </tr>


            <tr>
                <td valign=top width="22"><?php PricerrTheme_theme_bullet(); ?></td>
                <td><?php _e('Enable dropdown values:', 'PricerrTheme'); ?></td>
                <td><?php echo PricerrTheme_get_option_drop_down($arr, 'PricerrTheme_enable_dropdown_values'); ?></td>
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="PricerrTheme_save3" value="<?php _e('Save Options', 'PricerrTheme'); ?>"/></td>
            </tr>

        </table>
    </form>
</div>

<div id="tabs4">


    <form method="post" action="<?php echo get_bloginfo('siteurl'); ?>/wp-admin/admin.php?page=pricing-settings&active_tab=tabs4">
        <table width="100%" class="sitemile-table">

            <tr>
                <td width="210"><?php _e('Add new cost:', 'PricerrTheme'); ?></td>
                <td><input name="newcost" type="text" size="10"/> <?php echo PricerrTheme_get_currency(); ?></td>
            </tr>


            <tr>
                <td width="210"></td>
                <td><input type="submit" name="PricerrTheme_addnewcost" value="<?php _e('Add', 'PricerrTheme'); ?>"/>
                </td>
            </tr>

        </table>
    </form>

    <script>

        jQuery(document).ready(function () {

            jQuery('.delete_job_cost').click(function () {

                var id = jQuery(this).attr('rel');

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo get_bloginfo('siteurl'); ?>/",
                    data: "delete_variable_job_fee=" + id,
                    success: function (msg) {
                        jQuery("#job_cost_" + id).hide();

                    }
                });
            });
        });

    </script>



    <?php
    global $wpdb;

    $ss = "select * from " . $wpdb->prefix . "job_var_costs order by cost asc";
    $r = $wpdb->get_results($ss);

    if (count($r) > 0):

        echo '<table width="400">';
        echo '<tr>';
        echo '<td><strong>Cost</strong></td>';
        echo '<td><strong>Options</strong></td>';
        echo '</tr>';

        foreach ($r as $row) {
            echo '<tr id="job_cost_' . $row->id . '">';
            echo '<td width="50">' . PricerrTheme_get_show_price($row->cost, 2) . '</td>';
            echo '<td width="100"><a href="#" rel="' . $row->id . '" class="delete_job_cost">' . __('Delete', 'PricerrTheme') . '</a></td>';
            echo '</tr>';

        }

        echo '</table>';

    else:

        echo __('No values added yet.', 'PricerrTheme');

    endif;

    ?>

</div>


    <?php
    echo '</div>';

}

?>