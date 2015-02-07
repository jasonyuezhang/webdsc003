<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/


function PricerrTheme_filter_ttl($title)
{
    return __("Edit job", 'PricerrTheme') . " - ";
}

add_filter('wp_title', 'PricerrTheme_filter_ttl', 10, 3);

if (!is_user_logged_in()) {
    wp_redirect(PricerrTheme_login_url_with_redirect());
    exit;
}

global $current_user, $wp_query;
get_currentuserinfo();

$pid = $_GET['jobid'];
$post = get_post($pid);

$uid = $current_user->ID;
$title = $post->post_title;
$wp_query->is_home = false;

if (!PricerrTheme_post_auther_is_current_user($pid)) { // do not allow not post author enter this page
  echo 'You are not the post author. Sorry!';
  exit;
}

if (isset($_POST['save-job'])) {

  /*************************************************************
   *
   *    Title
   *
   **************************************************************/

  $job_title = trim(strip_tags(htmlspecialchars($_POST['job_title'])));

  $out = preg_split('/\s+/', trim($job_title));
  $last_word = $out[count($out) - 1];

  if ($last_word == PricerrTheme_get_for_strg()) {
    $job_title = substr($job_title, 0, strrpos($job_title, " "));
  }

  PricerrTheme_update_post_meta($pid, 'job_title', $job_title);

  /*************************************************************
   *
   *    Datetime
   *
   **************************************************************/

  //--- Custom start and end date fields added by Carroll Yu
  $start_date = trim(htmlspecialchars($_POST['start_date']));
  $start_time = trim(htmlspecialchars($_POST['start_time']));
  $end_date = trim(htmlspecialchars($_POST['end_date']));
  $end_time = trim(htmlspecialchars($_POST['end_time']));

  $start_datetime = new DateTime($start_date.' '.date("H:i", strtotime($start_time)));
  $end_datetime = new DateTime($end_date.' '.date("H:i", strtotime($end_time)));
  $curr_datetime = new DateTime();
  if ( !empty($start_date)
    && !empty($end_date)
    && !empty($start_time)
    && !empty($end_time)
    && ($start_datetime < $end_datetime)
    && ($start_datetime > $curr_datetime) ) {

    PricerrTheme_update_post_meta($pid, 'start_date', $start_date);
    PricerrTheme_update_post_meta($pid, 'end_date',   $end_date);
    PricerrTheme_update_post_meta($pid, 'start_time', $start_time);
    PricerrTheme_update_post_meta($pid, 'end_time',   $end_time);
    PricerrTheme_update_post_meta($pid, 'start_datetime', $start_datetime);
    PricerrTheme_update_post_meta($pid, 'end_datetime', $end_datetime);
  }
  else {
    $invalid_dates = 1;
  }

  /*************************************************************
   *
   *    Price
   *
   **************************************************************/

  $job_cost = trim(htmlspecialchars($_POST['job_cost']));

  $PricerrTheme_enable_dropdown_values = get_option('PricerrTheme_enable_dropdown_values');
  $PricerrTheme_enable_free_input_box = get_option('PricerrTheme_enable_free_input_box');

  if ($PricerrTheme_enable_dropdown_values == "yes" || $PricerrTheme_enable_free_input_box == "yes") {
    $prc_to_set = $job_cost;
  } else {
    $prc_to_set = get_option('PricerrTheme_job_fixed_amount');
    $job_cost = $prc_to_set;
  }

  PricerrTheme_update_post_meta($pid, 'job_cost', number_format($prc_to_set, 2, '.', ''));

  /*************************************************************
   *
   *    Category
   *
   **************************************************************/

  // $job_category2 = $job_category;

  $job_category = htmlspecialchars($_POST['job_cat']);
  $job_subcategory = htmlspecialchars($_POST['job_subcat']);

  $term = get_term($job_category, 'job_cat');
  $job_category = $term->slug;
  $arr_cats = array();
  $arr_cats[] = $job_category;

  if (!empty($_POST['job_subcat'])) {
    $term = get_term($_POST['job_subcat'], 'job_cat');
    $project_category2 = $term->slug;
    $arr_cats[] = $project_category2;
  }

  if (PricerrTheme_post_auther_is_current_user($pid)) {
    wp_set_object_terms($pid, $arr_cats, 'job_cat');
  }

  /*************************************************************
   *
   *    Space Available
   *
   **************************************************************/

  $space_total = trim(htmlspecialchars($_POST['space_total']));

  if(!empty($space_total) && is_numeric(@$space_total) && ($space_total >= 0)) {
    PricerrTheme_update_post_meta($pid, 'space_total', $space_total);
    // TODO add space_available into post_meta
    // update_post_meta($pid, 'space_available', $space_total);
  } else {
    $invalid_space = 1;
  }

  /*************************************************************
   *
   *    Location
   *
   **************************************************************/

  $job_location = trim(htmlspecialchars($_POST['job_location']));
  if (!empty($job_location)) {
    PricerrTheme_update_post_meta($pid, "job_location", $job_location);
  }

  /*************************************************************
   *
   *    College
   *
   **************************************************************/

  $college = trim(htmlspecialchars($_POST['college']));
  if (!empty($college)) {
    PricerrTheme_update_post_meta($pid, "college", $college);
  }

  /*************************************************************
   *
   *    Description
   *
   **************************************************************/

  $job_description = substr(nl2br(strip_tags(trim(htmlspecialchars($_POST['job_description'])))), 0, 2500);

  $PricerrTheme_filter_emails_private_messages = get_option('PricerrTheme_filter_emails_private_messages');
  if ($PricerrTheme_filter_emails_private_messages == "yes") {
    $job_description = PricerrTheme_parseEmails($job_description);
  }

  //--- parse links out of the private messages  ---

  $PricerrTheme_filter_urls_private_messages = get_option('PricerrTheme_filter_urls_private_messages');
  if ($PricerrTheme_filter_urls_private_messages == "yes") {
    $job_description = PricerrTheme_parseHyperlinks($job_description);
  }

  $my_post = array();
  $my_post['post_title'] = $job_title;
  $my_post['ID'] = $pid;
  $my_post['post_content'] = $job_description;

  if (PricerrTheme_post_auther_is_current_user($pid)) {
    wp_update_post($my_post);
  }

  /*************************************************************
   *
   *    Instructions to students
   *
   **************************************************************/

  $instruction_box = substr(nl2br(strip_tags(trim(htmlspecialchars($_POST['instruction_box'])))), 0, 2500);

  PricerrTheme_update_post_meta($pid, 'instruction_box', $instruction_box);

  /*************************************************************
   *
   *    Tags
   *
   **************************************************************/

  if (PricerrTheme_post_auther_is_current_user($pid)) {
    // Pass category into tag
    wp_set_post_tags($pid, $arr_cats);
  }

  $PricerrTheme_mandatory_pics_for_jbs = get_option('PricerrTheme_mandatory_pics_for_jbs');
  if ($PricerrTheme_mandatory_pics_for_jbs == "yes") {

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
    if (count($attachments) == 0) {
      $adOK = 0;
      $post_new_error['job_img'] = __('You need to upload at least one image for your job!', 'PricerrTheme');
    }
  }

  /*************************************************************
   *
   *    Featured
   *
   **************************************************************/

  PricerrTheme_update_post_meta($pid, "paid_featured", "0");
  $featured = $_POST['featured'];

  $PricerrTheme_featured_job_listing = get_option('PricerrTheme_featured_job_listing');
  if (empty($PricerrTheme_featured_job_listing)) {
    $PricerrTheme_featured_job_listing = 30;
  }

  PricerrTheme_update_post_meta($pid, 'featured', "0");
  if (!empty($featured)) {
    PricerrTheme_update_post_meta($pid, 'featured', "1");
  }

  PricerrTheme_update_post_meta($pid, 'featured_until', (current_time('timestamp', 0) + (3600 * 24 * $PricerrTheme_featured_job_listing)));

  /*************************************************************
   *
   *    Images
   *
   **************************************************************/

  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/image.php');

  $default_nr = get_option('PricerrTheme_default_nr_of_pics');
  if (empty($default_nr)) $default_nr = 5;

  foreach ($_FILES['picfile']['name'] as $key => $imgName) {

    if (!empty($_FILES['picfile']['name'][$key])) {

      $file = array(
        'name'     => $_FILES['picfile']['name'][$key],
        'type'     => $_FILES['picfile']['type'][$key],
        'tmp_name' => $_FILES['picfile']['tmp_name'][$key],
        'error'    => $_FILES['picfile']['error'][$key],
        'size'     => $_FILES['picfile']['size'][$key]
      );

      $upload_overrides = array('test_form' => false);
      $uploaded_file = wp_handle_upload($file, $upload_overrides);

      $file_name_and_location = $uploaded_file['file'];

      $file_title_for_media_library = $_FILES['picfile']['name'][$key];

      $arr_file_type = wp_check_filetype(basename($_FILES['picfile']['name'][$key]));
      $uploaded_file_type = $arr_file_type['type'];

      if ( $uploaded_file_type == "image/png"
        || $uploaded_file_type == "image/jpg"
        || $uploaded_file_type == "image/jpeg"
        || $uploaded_file_type == "image/gif"
      ) {
        $attachment = array (
          'post_mime_type' => $uploaded_file_type,
          'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
          'post_content' => '',
          'post_status' => 'inherit',
          'post_parent' => $pid,
          'post_author' => $uid,
        );

        $attach_id = wp_insert_attachment($attachment, $file_name_and_location, $pid);
        $attach_data = wp_generate_attachment_metadata($attach_id, $file_name_and_location);
        wp_update_attachment_metadata($attach_id, $attach_data);
      }
    }
  }

  /*************************************************************
   *
   *    Youtube Video Link
   *
   **************************************************************/

  $has_video = false;

  foreach ($_POST['youtube_link'] as $key => $youtube_link) {
    $youtube_link = htmlspecialchars(trim($youtube_link));
    if (!empty($youtube_link)) {
      PricerrTheme_update_post_meta($pid, "youtube_link_" . $key, $youtube_link);
      $has_video = true;
    }
  }

  /*************************************************************
   *
   *    Lesson Additional Services
   *
   **************************************************************/

  $user_level = PricerrTheme_get_user_level($uid);
  $sts = get_option('PricerrTheme_level' . $user_level . '_extras');

  $incomplete_extra_info = 0;
  $invalid_extra_price = 0;

  //if (empty($sts)) $sts = 3;

  foreach($_POST['extra_price'] as $key=>$price) {
    $price = htmlspecialchars(trim($price));
    $content = htmlspecialchars(trim($_POST['extra_content'][$key]));

    if (empty($price) xor empty($content)) {
      $incomplete_extra_info = 1;
    } elseif (!empty($price) && !is_numeric($price)) {
      $invalid_extra_price = 1;
    } elseif (!empty($price) && !empty($content)) {
      PricerrTheme_update_post_meta($pid, 'extra_price_' . $key, $price);
      PricerrTheme_update_post_meta($pid, 'extra_content_' . $key, $content);
    }
  }

  $job_saved = 1;
  $paid = get_post_meta($pid, 'paid', true);
  $PricerrTheme_new_job_listing_fee = get_option('PricerrTheme_new_job_listing_fee');

  $post_new_error = array();
  $adOK = 1;

  if (!PricerrTheme_post_auther_is_current_user($pid)) {
    $adOK = 0;
    $post_new_error['no_permission'] = __('You don\'t have permission to post under current jobid.', 'PricerrTheme');
  }
  if ($is_not_zip == 1) {
    $adOK = 0;
    $post_new_error['job_zip'] = __('Please only upload zip files as instant delivery!', 'PricerrTheme');
  }
  if (!isset($job_cost)) {
    $adOK = 0;
    $post_new_error['job_cost_empty'] = __('You cannot leave the job price blank!', 'PricerrTheme');
  } elseif (!is_numeric($job_cost)) {
    $adOK = 0;
    $post_new_error['job_cost1'] = __('The job price must be a number', 'PricerrTheme');
  }
  if ($job_cost < 0) {
    $adOK = 0;
    $post_new_error['job_cost_nag'] = __('The job price must be higher than 0!', 'PricerrTheme');
  }
  if (empty($job_title)) {
      $adOK = 0;
      $post_new_error['title'] = __('You cannot leave the group title blank!', 'PricerrTheme');
  }
  if (empty($job_description)) {
      $adOK = 0;
      $post_new_error['description'] = __('You cannot leave the group description blank!', 'PricerrTheme');
  }
  if (empty($job_category)) {
      $adOK = 0;
      $post_new_error['job_category'] = __('Please select a category for your group.', 'PricerrTheme');
  }
  //--- Custom start and end date fields added by Carroll Yu
  if($invalid_dates) {
      $adOK = 0;
      $post_new_error['invalid_dates'] = __('Please select proper dates and times your group.','PricerrTheme');
  }
  if($invalid_space) {
      $adOK = 0;
      $post_new_error['invalid_space'] = __('The space available number is invalid.','PricerrTheme');
  }
	if ($incomplete_extra_info) {
		$adOK = 0;
		$post_new_error['$incomplete_extra_info'] = __('The extra option is not completed.','PricerrTheme');
	}
	if ($invalid_extra_price) {
		$adOK = 0;
		$post_new_error['$invalid_extra_price'] = __('The price of extra option is not numeric.','PricerrTheme');
	}
	if ($empty_location) {
		$adOK = 0;
		$post_new_error['$empty_location'] = __('The lesson location is empty.','PricerrTheme');
	}
	if ($empty_college) {
		$adOK = 0;
		$post_new_error['$empty_college'] = __('You haven\'t choose which you are at.','PricerrTheme');
	}

  if ((isset($_POST['featured']) or $PricerrTheme_new_job_listing_fee > 0) and $error_not_zip != 1 and $adOK == 1) {
    if ($paid != "1") {
      $my_post = array();
      $my_post['post_status'] = 'draft';
      $my_post['ID'] = $pid;
      wp_update_post($my_post);

      if (isset($_POST['featured'])) {
          update_post_meta($pid, 'featured', "1");
      }

      $using_permalinks = PricerrTheme_using_permalinks();

      if ($using_permalinks) $rdrlnk = get_permalink(get_option('PricerrTheme_pay_for_posting_job_page_id')) . "?jobid=" . $pid;
      else $rdrlnk = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_pay_for_posting_job_page_id') . "&jobid=" . $pid;

      wp_redirect($rdrlnk);
    } else {
      if (isset($_POST['featured'])) {
          update_post_meta($pid, 'featured', "1");
      }
    }
  }
}

get_header();

if (function_exists('bcn_display')) {
  echo '<div class="my_box3_breadcrumb"><div class="padd10_a">';
  bcn_display();
  echo '</div></div>';
}

?>
<div id="content-side-bar">
  <div class="my_box3">
    <div class="box-content clear" id="post-edit-divs"><!--<script type="text/javascript">
          function delete_this(id) {
              jQuery.ajax({
                  method: 'get',
                  url: '<?php // echo get_bloginfo('siteurl');?>/index.php/?_ad_delete_pid=' + id,
                  dataType: 'text',
                  success: function (text) {
                      jQuery('#image_ss' + id).remove();
                      window.location.reload();
                  }
              });
          }
      </script>--><div class="post-new-form white-wrapper">
          <?php
          if (is_array($post_new_error)) {
              if ($adOK == 0) {
                  echo '<div class="errrs-wrapper clear">'
                    . '<div class="col-sm-3"></div>'
                    . '<div class="col-sm-9">'
                    . '<div class="errrs">'
                    . '<ul>';

                  foreach ($post_new_error as $e) {
                    echo '<li class="newad_error">' . $e . '</li>';
                  }
                  echo '</ul></div></div></div>';
              }
          }

          if($adOK == 1) {
            if($job_saved == 1 and $error_not_zip != 1):
              /* Custom start and end date fields added by Carroll Yu */
              echo '<div class="edit-job-ok-wrapper clear">'
                . '<div class="col-sm-3"></div>'
                . '<div class="col-sm-9">'
                . '<div class="edit-job-ok">'
                . '<div class="padd10">'
                . __('Your job has been saved.','PricerrTheme');
              if(!PricerrTheme_check_post_active($pid)) {
                echo " Your post is inactive, would you like to activate it? ";
                  ?><a href="<?php bloginfo('siteurl');
                  ?>/?jb_action=activate_job&jobid=<?php echo $pid;
                  ?>" class="deactivate_job"><?php
                  _e('Activate Lesson','PricerrTheme'); ?></a><?php
              }
              echo "</div></div></div></div>";
            endif;
          }

          if($error_not_zip == 1) {

              echo '<div class="error"><div class="padd10">'.__('ERROR: You can only attach ZIP files.','PricerrTheme').'</div></div>';

          } ?>
          <form id="post-new-form" method="post" enctype="multipart/form-data" action="<?php bloginfo('siteurl'); ?>/?jb_action=edit_job&jobid=<?php echo $pid; ?>">
            <div class="post-new-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('Lesson Name', 'PricerrTheme'); ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div>
                  <input class="do_input post-new-textbox" name="job_title" maxlength="99" size="40" value="<?php echo PricerrTheme_get_post_data($pid, 'job_title'); ?>">
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
                    <span class="glyphicon glyphicon-calendar datetime-icon"></span><input id="start_date" name="start_date" class="form-control post-new-textbox-half date-input" type="text" data-provide="datepicker" value="<?php echo PricerrTheme_get_post_data($pid, 'start_date'); ?>"/><span class="glyphicon glyphicon-time datetime-icon"></span><input id="start_time" name="start_time" type="text" class="post-new-textbox-half time-input" value="<?php echo PricerrTheme_get_post_data($pid, 'start_time'); ?>">
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
                    <span class="glyphicon glyphicon-calendar datetime-icon"></span><input id="end_date" name="end_date" class="form-control post-new-textbox-half date-input" type="text" data-provide="datepicker" value="<?php echo PricerrTheme_get_post_data($pid, 'end_date'); ?>"/><span class="glyphicon glyphicon-time datetime-icon"></span><input id="end_time" name="end_time" type="text" class="post-new-textbox-half time-input" value="<?php echo PricerrTheme_get_post_data($pid, 'end_time'); ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="post-new-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('Lesson Price', 'PricerrTheme'); ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div>
                  <div class="do_input post-new-textbox"><?php

                    $PricerrTheme_enable_dropdown_values = get_option('PricerrTheme_enable_dropdown_values');
                    $PricerrTheme_enable_free_input_box = get_option('PricerrTheme_enable_free_input_box');
                    $job_cost = PricerrTheme_get_post_data($pid, 'job_cost');
                    // (isset($_POST['job_cost']) ? $_POST['job_cost'] : PricerrTheme_get_post_data($pid, 'job_cost'));

                    if ($PricerrTheme_enable_free_input_box == "yes") {

                      if (PricerrTheme_show_price_in_front() == true) {
                        echo '<span class="currency-icon">' . PricerrTheme_get_currency() . '</span>';
                      }

                      echo '<input type="number" name="job_cost" class="post-new-textbox-price" value="' . PricerrTheme_get_post_data($pid, 'job_cost') . '" min="0" max="9999" step="any"/>';

                      if (PricerrTheme_show_price_in_front() == false) {
                        echo PricerrTheme_get_currency();
                      }

                    } elseif ($PricerrTheme_enable_dropdown_values == "yes")
                      echo PricerrTheme_get_variale_cost_dropdown('do_input', $job_cost);
                    else
                      echo PricerrTheme_get_show_price(get_option('PricerrTheme_job_fixed_amount'));
                    ?><span>per hour</span>
                  </div>
                </div>
              </div>
            </div><script>
              function display_subcat(vals) {
                jQuery.post("<?php bloginfo('siteurl'); ?>/?get_subcats_for_me=1", {queryString: "" + vals + ""}, function (data) {
                    jQuery('#sub_cats').html(data);
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
                  $cat = array();
                  if (PricerrTheme_post_auther_is_current_user($pid)) {
                    $cat = wp_get_object_terms($pid, 'job_cat');
                  }

                  $selected = "";
                  if (is_array($cat)) {
                    $selected = end($cat)->term_id;
                  }
                  if (isset($_POST['job_cat'])) {
                    $selected = htmlspecialchars($_POST['job_cat']);
                  }
                  if (!PricerrTheme_post_auther_is_current_user($pid)) {
                    $selected = "";
                  }
                  echo PricerrTheme_get_categories_click(
                    0,
                    'job_cat',
                    $selected,
                    'Select Category',
                    array( 'do_input', 'post-new-textbox' ),
                    'onchange="display_subcat(this.value)"'
                  );
                ?></div>
              </div>
            </div>
            <div class="post-new-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('Subcategory', 'PricerrTheme') ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div id="sub_cats"><?php
                  if (!empty($cat)) {
                    $selected = "";
                    if (is_array($cat)) {
                      $selected = $cat[0]->term_id;
                    }
                    if (isset($_POST['job_subcat'])) {
                      $selected = htmlspecialchars($_POST['job_subcat']);
                    }
                    if (!PricerrTheme_post_auther_is_current_user($pid)) {
                      $selected = "";
                    }
                    echo PricerrTheme_get_categories_click(
                      end($cat)->term_id
                     ,'job_subcat'
                     ,$selected
                     ,'Select Subcategory'
                     ,array( 'do_input', 'post-new-textbox' )
                    );
                    //  echo PricerrTheme_get_subcategories($cat[1]->term_id
                    //    ,!isset($_POST['job_subcat']) ? (is_array($cat) ? $cat[0]->term_id : "") : htmlspecialchars($_POST['job_subcat'])
                    //    ,__('Select Subcategory', 'PricerrTheme'));
                  } else {
                    ?><select class="do_input post-new-textbox">
                      <option><?php echo __('Select Subcategory', 'PricerrTheme'); ?></option>
                    </select><?php
                  }
                ?></div>
              </div>
            </div>
            <div class="post-new-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('Space Available', 'PricerrTheme'); ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div>
                  <input id="space_total" class="do_input post-new-textbox" type="number" name="space_total" maxlength="5" size="5" min="0" max="999" value="<?php echo PricerrTheme_get_post_data($pid, 'space_total'); ?>" placeholder="<?php _e('For unlimited space put 0', 'PricerrTheme'); ?>">
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
                  <input type="text" class="do_input post-new-textbox" name="job_location" size="34" value="<?php echo PricerrTheme_get_post_data($pid, 'job_location'); ?>"/>
                  <?php
                  // $locs = get_user_meta($uid, 'user_location', true);

                  // echo PricerrTheme_get_categories("job_location",
                  //     !isset($_POST['job_location_cat']) ? $locs : htmlspecialchars($_POST['job_location_cat'])
                  //     , __('Select Location', 'PricerrTheme'), "do_input");
                  ?>
                </div>
              </div>
            </div>
            <div class="post-new-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('College', 'PricerrTheme'); ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div>
                  <select name="college" class="do_input post-new-textbox">
                            <?php $college = PricerrTheme_get_post_data($pid, 'college'); ?>
                    <option value="" <?php echo ($college == "")? "selected":"" ?>>Choose College</option>
                    <option value="ucsd" <?php echo ($college == "ucsd")? "selected":"" ?>>UCSD</option>
                    <option value="sdsu" <?php echo ($college == "sdsu")? "selected":"" ?>>SDSU</option>
                  </select>
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
                  <textarea rows="6" cols="40" class="do_input post-new-textarea" name="job_description" placeholder="<?php _e('Maximum 500 characters', 'PricerrTheme'); ?>"><?php echo empty($_POST['job_description']) ? strip_tags(trim(stripslashes($post->post_content))) : trim(stripslashes($_POST['job_description'])); ?></textarea>
                </div>
              </div>
            </div>
            <div class="post-new-group-large">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('Instructions to students', 'PricerrTheme'); ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div>
                  <textarea rows="6" cols="40" class="do_input post-new-textarea" name="instruction_box" placeholder="<?php _e('Shows after student enrolled. Maximum 500 characters', 'PricerrTheme'); ?>"><?php echo PricerrTheme_get_post_data($pid, 'instruction_box'); ?></textarea>
                </div>
              </div>
            </div>

            <?php

            $PricerrTheme_enable_shipping = get_option('PricerrTheme_enable_shipping');
            if ($PricerrTheme_enable_shipping == "yes") {
              ?><div class="post-new-group">
                <div class="col-sm-3">
                  <div class="post-new-label">
                    <label><?php echo __('Requires shipping?', 'PricerrTheme'); ?></label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div>
                    <?php if (PricerrTheme_show_price_in_front())
                      echo PricerrTheme_get_currency(); ?>
                    <input type="text" size="5" class="do_input post-new-textbox" name="shipping" value="<?php echo PricerrTheme_get_post_data($pid, 'shipping'); ?>"/>
                    <?php if (!PricerrTheme_show_price_in_front())
                      echo PricerrTheme_get_currency(); ?>
                  </div>
                </div>
              </div>

              <?php do_action('PricerrTheme_after_shipping_field', $pid); ?>

            <?php } ?>

            <!--<li>
              <h2><?php // echo __('Max Days to Deliver', 'PricerrTheme'); ?></h2>

              <p><input type="text" size="10" class="do_input" name="max_days" value="<?php // echo PricerrTheme_get_post_data($pid, 'max_days'); ?>"/></p>
            </li>-->

            <?php

            $PricerrTheme_enable_instant_deli = get_option('PricerrTheme_enable_instant_deli');
            if ($PricerrTheme_enable_instant_deli != "no") {

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

                      echo '<p class="div_div2"  id="image_ss' . $attachment->ID . '">' . $attachment->post_title .
                         '<a href="javascript: void(0)" onclick="delete_this(\'' . $attachment->ID .
                         '\')"><img border="0" src="' . get_bloginfo('template_url') .
                         '/images/delete_icon.png" /></a></p>';
                    }
                  }
                endif; ?>
                    </div>
                </div>
            </div>-->

            <?php } ?>
            <div class="post-extendable-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label><?php echo __('Images', 'PricerrTheme'); ?></label>
                </div>
              </div>
              <div class="col-sm-9">
                <div id="img-input-list"><?php
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
                  ?><input id="img-upload-btn" type="button" class="img-input-btn post-new-upload" value="Add Lesson Pictures">
                </div>
                <div id="img-uploaded-list" class="uploaded-list"><?php
                  $imgArray = PricerrTheme_get_post_images($pid);
                  foreach($imgArray as $img) { ?>
                    <div id="img-uploaded-<?php echo $img["id"] ?>" class="img-uploaded-data" img-id="<?php echo $img["id"] ?>" img-url="<?php echo $img["url"] ?>"></div><?php
                  } ?></div>
                <div id="img-preview-list" class="preview-list"></div>
              </div>
            </div><?php

            global $current_user;
            get_currentuserinfo();
            $uid = $current_user->ID;

            $user_level = PricerrTheme_get_user_level($uid);
            $sts = get_option('PricerrTheme_level' . $user_level . '_vds');

            // if ($sts > 3) $sts = 3;
            // Qinwen modified here for youtube video list
            // for ($i = 1; $i <= $sts; $i++) {

            ?><div class="post-extendable-group">
              <div class="col-sm-3">
                <div class="post-new-label">
                  <label>Youtube Video Link</label>
                </div>
              </div>
              <div class="col-sm-9">
                <div class="post-extendable-textbox-wrapper">
                  <input id="video-upload-url" class="do_input post-new-textbox url-textbox" type="text" size="40" name="youtube_link[0]" value="<?php echo PricerrTheme_get_post_data($pid, 'youtube_link' . $i); ?>" placeholder="Add one youtube video url here"/>
                </div>
                <div class="post-extendable-extrabtn-wrapper">
                  <input id="video-upload-btn" type="button" class="url-button" value="&#65291;"/>
                </div>
                <div id="video-uploaded-list" class="uploaded-list"><?php
                  $videoArray = PricerrTheme_get_postmeta($pid, 'youtube_link');
                  foreach($videoArray as $video) {
                    $pieces = explode("_", $video->meta_key);
                    $id = end($pieces);
                    ?><div id="video-uploaded-<?php echo $id ?>" class="video-uploaded-data" video-id="<?php echo $id ?>" video-url="<?php echo $video->meta_value; ?>"></div><?php
                  } ?></div>
                <div id="video-preview-list" class="preview-list"></div>
              </div>
            </div><?php

            $PricerrTheme_enable_extra = get_option('PricerrTheme_enable_extra');

            if ($PricerrTheme_enable_extra != "no") {

              global $current_user;
              get_currentuserinfo();
              $uid = $current_user->ID;

              $user_level = PricerrTheme_get_user_level($uid);
              // $sts = get_option('PricerrTheme_level' . $user_level . '_extras');

              ?><div class="post-extendable-group">
                  <div class="col-sm-3">
                    <div class="post-new-label">
                      <label><?php _e('For an extra ', 'PricerrTheme'); ?></label>
                    </div>
                  </div>
                  <div id="iwill-list" class="col-sm-9"><?php

                    $priceArray = PricerrTheme_get_postmeta($pid, 'extra_price_');  // get saved extra_price array
                    if(empty($priceArray)) {
                      $priceArray = array(
                        array(
                          'post_id'=>$pid,
                          'meta_key'=>"extra_price_0",
                          'meta_value'=>""
                        )
                      );
                    }

                    $firstLoop = true;
                    foreach($priceArray as $price) {

                      $pieces = explode("_", $price->meta_key);
                      $id = end($pieces);

                      $content = get_post_meta($pid, 'extra_content_' . $id, true); // get related saved extra_content

                      if(is_null($content)) {
                        $content = array(
                          'post_id'=>$pid,
                          'meta_key'=>"extra_content_0",
                          'meta_value'=>""
                        );
                      }

                      ?><div id="iwill-<?php echo $id ?>" class="i-will-container">
                        <div class="post-extendable-textbox-wrapper">
                          <div class="do_input post-new-textbox url-textbox"><span class="currency-icon-extra"><?php
                            if (PricerrTheme_show_price_in_front() == true) {
                              echo PricerrTheme_get_currency();
                            }
                          ?></span><input id="extra-price-<?php echo $id; ?>" class="extra_price post-new-textbox-extra-1" name="extra_price[<?php echo $id; ?>]" value="<?php
                            echo $price->meta_value;
                          ?>" placeholder="5"/><?php
                            if (PricerrTheme_show_price_in_front() == false) {
                              echo PricerrTheme_get_currency();
                            }
                          ?><span class="i-will"><?php
                            _e('I will provide', 'PricerrTheme');
                          ?></span><input id="extra-content-<?php echo $id; ?>" class="extra-content post-new-textbox-extra-2" name="extra_content[<?php echo $id; ?>]" placeholder="training device..." value="<?php
                            echo $content;
                          ?>"></div>
                        </div>
                          <div class="post-extendable-extrabtn-wrapper"><?php
                              if($firstLoop) {
                                $firstLoop = false;
                                $btn_id = "iwill-more-btn";
                                $btn_value = '&#65291;';
                              } else {
                                $btn_id = "iwill-delete-btn";
                                $btn_value = '&#10005;';
                              }
                            ?><input id="<?php echo $btn_id; ?>" type="button" class="url-button" value="<?php echo $btn_value; ?>"/>
                          </div>
                        </div><?php

                      }

                    ?></div>
                  </div><?php

                }

            ?><div class="post-new-group">
              <input class="post-new-button" type="submit" name="save-job" value="<?php _e("Save Lesson", 'PricerrTheme'); ?>"/>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<?php PricerrTheme_get_users_links(); ?>

<?php get_footer(); ?>