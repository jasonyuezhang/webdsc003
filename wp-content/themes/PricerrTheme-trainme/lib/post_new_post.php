<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

if (isset($_POST['Pricerr_post_new_job'])) {

  global $current_user;
  $pid = $_GET['jobid'];
  global $adOK, $post_new_error;
  get_currentuserinfo();
  $uid = $current_user->ID;

  /*************************************************************
   *
   *    Initialization
   *
   **************************************************************/

  // $max_days = 1;
  PricerrTheme_update_post_meta($pid, 'shipping', trim($_POST['shipping']));
  PricerrTheme_update_post_meta($pid, 'active', "1");
  PricerrTheme_update_post_meta($pid, 'paid', "0");
  PricerrTheme_update_post_meta($pid, "views", '0');
  PricerrTheme_update_post_meta($pid, "likes", '0');
  PricerrTheme_update_post_meta($pid, "rating", '0');
  // PricerrTheme_update_post_meta($pid, "max_days", $max_days);
  PricerrTheme_update_post_meta($pid, "closed", "0");
  PricerrTheme_update_post_meta($pid, "closed_date", "0");

  $adOK = 1;

  /*************************************************************
   *
   *    Title
   *
   **************************************************************/

  $job_title = trim(htmlspecialchars($_POST['job_title']));

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

  $PricerrTheme_variable_cost_job = get_option('PricerrTheme_variable_cost_job');
  $PricerrTheme_free_input_cost_job = get_option('PricerrTheme_free_input_cost_job');

  $PricerrTheme_enable_dropdown_values = get_option('PricerrTheme_enable_dropdown_values');
  $PricerrTheme_enable_free_input_box = get_option('PricerrTheme_enable_free_input_box');

  if ($PricerrTheme_enable_dropdown_values == "yes" || $PricerrTheme_enable_free_input_box == "yes") {
    $prc = PricerrTheme_get_show_price($job_cost);
    $prc_to_set = $job_cost;

    if ($PricerrTheme_enable_free_input_box == "yes") {
      PricerrTheme_update_post_meta($pid, "variable_cost", '1');
    } else {
      PricerrTheme_update_post_meta($pid, "input_free_cost", '1');
    }
  } else {
    $prc = PricerrTheme_get_show_price(get_option('PricerrTheme_job_fixed_amount'));
    $prc_to_set = get_option('PricerrTheme_job_fixed_amount');
    $job_cost = $prc_to_set;
  }

  PricerrTheme_update_post_meta($pid, 'job_cost', number_format($prc_to_set, 2, '.', ''));

  // unset($_SESSION['job_cost']);

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

  // do_action('PricerrTheme_post_new_submit', $pid);

  /*************************************************************
   *
   *    Location
   *
   **************************************************************/

  /*
  $user_location = $_POST['job_location_cat'];
  $term = get_term($user_location, 'job_location');

  if (!empty($user_location) && PricerrTheme_post_auther_is_current_user($pid)) {
   wp_set_object_terms($pid, array($term->slug), 'job_location');
  }
  */

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

  //$job_tags = trim(htmlspecialchars($_POST['job_tags']));

  if (PricerrTheme_post_auther_is_current_user($pid)) {

    // wp_set_post_tags($pid, $job_tags);

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

  PricerrTheme_update_post_meta($pid, "has_video", "0");

  $has_video = false;
  
  foreach ($_POST['youtube_link'] as $key => $youtube_link) {
    $youtube_link = htmlspecialchars(trim($youtube_link));
    if (!empty($youtube_link)) {  
      PricerrTheme_update_post_meta($pid, "youtube_link_" . $key, $youtube_link);
      $has_video = true;
    }
  }

  if ($has_video) { PricerrTheme_update_post_meta($pid, "has_video", "1"); }

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

  // unset($_SESSION['i_will']);

  /*************************************************************
   *
   *    Instant Acctached Files to Student
   *
   **************************************************************/

  /*
  if (!empty($_FILES['file_instant']['name'])) {

    $upload_overrides = array('test_form' => false);
    $uploaded_file = wp_handle_upload($_FILES['file_instant'], $upload_overrides);

    $file_name_and_location = $uploaded_file['file'];
    $file_title_for_media_library = $_FILES['file_instant']['name'];

    $arr_file_type = wp_check_filetype(basename($_FILES['file_instant']['name']));
    $uploaded_file_type = $arr_file_type['type'];

    if ($uploaded_file_type == "application/zip") {

      $attachment = array(
        'post_mime_type' => $uploaded_file_type,
        'post_title' => 'Uploaded ZIP ' . addslashes($file_title_for_media_library),
        'post_content' => '',
        'post_status' => 'inherit',
        'post_parent' => $pid,
        'post_author' => $uid,
      );

      $attach_id = wp_insert_attachment($attachment, $file_name_and_location, $pid);
      $attach_data = wp_generate_attachment_metadata($attach_id, $file_name_and_location);
      wp_update_attachment_metadata($attach_id, $attach_data);
      PricerrTheme_update_post_meta($pid, 'instant', "1");

    } else {
      PricerrTheme_update_post_meta($pid, 'instant', "0");
      $is_not_zip = 1;
    }

    $file_is_indeed_uploaded = 1;

  } else {
    PricerrTheme_update_post_meta($pid, 'instant', "0");
  }

  //---------------------------------------

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
  if (count($attachments) > 0) {
    PricerrTheme_update_post_meta($pid, 'instant', "1");
  }
  */

  /*************************************************************
   *
   *    Post Data Validation
   *
   **************************************************************/

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
    $post_new_error['title'] = __('You cannot leave the job title blank!', 'PricerrTheme');
  }
  if (empty($job_description)) {
    $adOK = 0;
    $post_new_error['description'] = __('You cannot leave the job description blank!', 'PricerrTheme');
  }
  if (empty($job_category)) {
    $adOK = 0;
    $post_new_error['job_category'] = __('Please select a category for your job.', 'PricerrTheme');
  }
  //--- Custom start and end date fields added by Carroll Yu
  if ($invalid_dates) {
    $adOK = 0;
    $post_new_error['invalid_dates'] = __('Please select proper dates and times for your lesson.','PricerrTheme');
  }
  if ($invalid_space) {
    $adOK = 0;
    $post_new_error['invalid_space'] = __('The space available number is invalid.','PricerrTheme');
  }
  if ($incomplete_extra_info) {
    $adOK = 0;
    $post_new_error['incomplete_extra_info'] = __('The extra option is not completed.','PricerrTheme');
  }
  if ($invalid_extra_price) {
    $adOK = 0;
    $post_new_error['invalid_extra_price'] = __('The price of extra option is not numeric.','PricerrTheme');
  }
  if (empty($job_location)) {
    $adOK = 0;
    $post_new_error['empty_location'] = __('The lesson location is empty.','PricerrTheme');
  }
  if (empty($college)) {
    $adOK = 0;
    $post_new_error['empty_college'] = __('You haven\'t choose college.','PricerrTheme');
  }

  // $inst = get_post_meta($pid, 'instant', true);
  // if ($inst != "1" and $file_is_indeed_uploaded != 1) {
  //   if (empty($max_days)) {
  //     $adOK = 0;
  //     $post_new_error['maxdays1'] = __('Please provide max days for delivery.', 'PricerrTheme');
  //   } elseif (!is_numeric($max_days) || $max_days < 0) {
  //     $adOK = 0;
  //     $post_new_error['maxdays2'] = __('Max days must be a number > 0', 'PricerrTheme');
  //   }
  // }

  /*************************************************************
   *
   *    Pass Validation
   *
   **************************************************************/

  if ($adOK == 1) //if everything ok, go to next step
  {
    $my_post = array();
    $my_post['post_status'] = 'draft';
    $my_post['ID'] = $pid;
    wp_update_post($my_post);

    PricerrTheme_update_post_meta($pid, 'trainer_score', PricerrTheme_get_avg_trainer_rating($uid));

    PricerrTheme_update_post_meta($pid, 'is_draft', '0');
    $post = get_post($pid);

    $author = get_userdata($post->post_author);
    $user_email = $author->user_email;

    $PricerrTheme_admin_approve_job = get_option('PricerrTheme_admin_approve_job');
    $PricerrTheme_new_job_listing_fee = get_option('PricerrTheme_new_job_listing_fee');

    if ($featured != "1" and $PricerrTheme_new_job_listing_fee <= 0) {
      if ($PricerrTheme_admin_approve_job != "yes") {

        PricerrTheme_update_post_meta($pid, 'under_review', "0");

        wp_publish_post($pid);
        $my_post['post_status'] = 'publish';
        $my_post['ID'] = $pid;
        wp_update_post($my_post);

      }
    }

    if ($PricerrTheme_admin_approve_job == "yes") {

      wp_publish_post($pid);
      $my_post['post_status'] = 'draft';
      $my_post['ID'] = $pid;
      wp_update_post($my_post);

    }

    //-----------------------------------------------------------------

    if ($PricerrTheme_admin_approve_job == "yes") {
      PricerrTheme_send_email_posted_job_approved_admin($pid);
    } else {
      PricerrTheme_send_email_posted_job_not_approved_admin($pid);
    }

    //-----------------------------------------------------------------

    if ($featured == "1" or $PricerrTheme_new_job_listing_fee > 0) {
      $using_permalinks = PricerrTheme_using_permalinks();

      if ($using_permalinks) $rdrlnk = get_permalink(get_option('PricerrTheme_pay_for_posting_job_page_id')) . "?jobid=" . $pid;
      else $rdrlnk = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_pay_for_posting_job_page_id') . "&jobid=" . $pid;

      wp_redirect($rdrlnk);
    } else {
      if ($PricerrTheme_admin_approve_job == "yes") {
        PricerrTheme_send_email_posted_job_not_approved($pid);
        PricerrTheme_update_post_meta($pid, 'under_review', "1");
      } else {
        PricerrTheme_update_post_meta($pid, 'under_review', "0");
        PricerrTheme_send_email_posted_job_approved($pid);
      }

      $ssk = get_permalink(get_option('PricerrTheme_my_account_page_id'));
      $ssk = apply_filters('PricerrTheme_return_redirect_url_post_new', $ssk, $pid);

      wp_redirect($ssk);
    }
    exit;
  }
}

?>