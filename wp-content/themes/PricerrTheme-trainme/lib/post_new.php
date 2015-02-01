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

      $pid = $_GET['jobid'];
      global $post_PID, $post_new_error, $adOK;
      $post_PID = $pid;

      if (!is_wp_error(get_post_field('post_author', $pid)) && !PricerrTheme_post_auther_is_current_user($pid)) {
        $wp_query->is_404 = true;
        $wp_query->is_single = false;
        $wp_query->is_page = false;
        ?>
        <div id="content-side-bar">
          <div class="box-title"><?php _e('Permission Denied', 'PricerrTheme'); ?></div>
          <div class="padd10">
            <?php _e('PLease try click Post New Lesson again. If you still see this page, please contact technical service to report your problem.', 'PricerrTheme'); ?>
          </div>
        </div>

        <?php

        PricerrTheme_get_users_links();

        get_footer();
        exit();
      }

      $post = get_post($pid);
      $job_location = trim($_POST['job_location']);
      //$location = wp_get_object_terms($pid, 'job_location');


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
      $job_tags = trim($_POST['job_tags']);
      $college = trim($_POST['college']);
      $ttl = (empty($_SESSION['i_will']) ?
        (
          $post->post_title == "Auto Draft" ?
            "" : get_post_meta($post->ID, 'job_title', true)
        )
        : $_SESSION['i_will']); ?>

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
                ?>
                <form id="post-new-form" method="post" enctype="multipart/form-data" action="<?php echo PricerrTheme_post_new_with_pid_stuff_thg($pid); ?>">
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

                                  if (count($attachments) == 0) {
                                    ?>
                                      <input type="file" class="do_input" name="file_instant"/>
                                      (<?php _e('Only ZIP Files', 'PricerrTheme'); ?>)
                                  <?php
                                  } else {
                                    if ($attachments) {
                                      foreach ($attachments as $attachment) {
                                        $url = wp_get_attachment_url($attachment->ID);

                                        echo '<p class="div_div2"  id="image_ss' . $attachment->ID . '">' . $attachment->post_title .
                                          '<a href="javascript: void(0)" onclick="delete_this(\'' . $attachment->ID .
                                          '\')"><img border="0" src="' . get_bloginfo('template_url') .
                                          '/images/delete_icon.png" /></a></p>';
                                      }
                                    }
                                  } ?>
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

                  ?><div class="post-new-group post-new-group-submit">
                    <input class="post-new-button" type="submit" name="Pricerr_post_new_job" value="<?php _e("Post New Lesson", 'PricerrTheme'); ?>"/>
                  </div>
                </form>
			        </div>
		        </div>
	        </div>
        </div>
        <!-- ################### -->
        <!--<div id="right-sidebar">
            <ul class="xoxo">
                <?php dynamic_sidebar('other-page-area'); ?>
            </ul>
        </div>-->
		<?php
		//modification end
        PricerrTheme_get_users_links();
    }
}

?>