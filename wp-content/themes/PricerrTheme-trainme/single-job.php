<?php

/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

global $current_user, $wpdb;
get_currentuserinfo();
$uid = $current_user->ID;
$pid = get_the_ID();

//=============================

function PT_JOB_filter_ttl($title)
{
    global $post;
    return PricerrTheme_wrap_the_title($post->post_title, $post->ID) . " - " . get_bloginfo('name');
}

add_filter('wp_title', 'PT_JOB_filter_ttl', 20, 3);

get_header();

$PricerrTheme_adv_code_job_page_above_content = stripslashes(get_option('PricerrTheme_adv_code_job_page_above_content'));
if (!empty($PricerrTheme_adv_code_job_page_above_content)) {
  echo '<div class="full_width_a_div">';
  echo $PricerrTheme_adv_code_job_page_above_content;
  echo '</div>';
}

?><div class="clear10"></div>
<div id="content-side-bar">
<?php

if (function_exists('bcn_display')) {
    echo '<div class="my_box3_breadcrumb"><div class="padd10_a">';
    bcn_display();
    echo '</div></div>';
}

?>
<!--<div class="clear5"></div>-->
<?php

if (have_posts()) {
  while (have_posts()) {
    the_post();

    $active = get_post_meta($pid, 'active', true);

    echo "<div class='padd10_only white-wrapper'>";

    if ($active == 0) {
      echo '<h4>';
      _e('This lesson has been disabled.', 'PricerrTheme');
      echo '</h4>';
      echo '</div>';
    } else {

      $max_days = get_post_meta($pid, "max_days", true);
      $prc = get_post_meta($pid, "job_cost", true);
      $featured = get_post_meta($pid, "featured", true);
      $views = get_post_meta($pid, "views", true);
      $views = $views + 1;

      update_post_meta($pid, "views", $views);

      $post = get_post($pid);
      $author = $post->post_author;
      $author_data = get_userdata($author);

      $orders_in_queue = PricerrTheme_orders_in_queue($pid);
      $total_space = PricerrTheme_get_post_space_total($pid);
      ?>

      <div class="ad_page_title_purchase">
        <div class="ad_page_title">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>

      <div class="job-info-stuff">
        <div class="col-sm-6">
          <div class="info-row">
            <div class="image-and-user">
              <div class="image"><a href="<?php
                echo PricerrTheme_get_user_profile_link($author_data->user_login); ?>"><img width="25" height="25" border="0" src="<?php
                echo PricerrTheme_get_avatar($author, 50, 50);
                ?>"/></a></div>
              <div class="user"><span>by Trainer </span><a href="<?php
                echo PricerrTheme_get_user_profile_link($author_data->user_login); ?>"><?php
                echo $author_data->user_login; ?></a></div>
            </div>
          </div>
          <div class="info-row">
            <script>
              jQuery(document).ready(function () {
                /*--------------------------------------------------
                 Show Star Rating
                 ---------------------------------------------------*/
                $.fn.raty.defaults.path = "<?php echo get_template_directory_uri(); ?>/images/";
                jQuery('#star-rating-ro').raty({
                  readOnly: true,
                  halfShow: true,
                  score: <?php echo PricerrTheme_get_avg_trainer_rating($post->post_author); ?>
                });
              });
            </script>
            <div class="rating-100"><?php echo PricerrTheme_show_rating_star_user($author); ?></div>
            <?php // TODO shows the number of comments for this trainer ?>

            <?php $opt = get_option('PricerrTheme_show_views');

            if ($opt != "no") { ?>
              <div class="separator_job_rating"></div>
              <div class="job_rating"><?php _e("views", "PricerrTheme"); ?>:</div>
              <div class="deli_days"><?php echo $views; ?></div>
            <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="info-row">
            <div class="job-page-detail">
              <span><?php echo "<strong>Time: </strong>\t" . PricerrTheme_get_post_datetime($pid); ?></span>
            </div>
          </div>
          <div class="info-row">
            <div class="job-page-detail">
              <span><?php echo "<strong>Location:</strong> " . PricerrTheme_get_post_location($pid); ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="ad-page-content-stuff">
        <div class="col-sm-6">
          <div class="jb-page-image-holder">

          <?php if ($featured == "1"): ?>
            <div class="featured-two"></div>
          <?php endif; ?>

          <img class="img_class" src="<?php echo PricerrTheme_get_first_post_image($pid, 800, 600); ?>" alt="<?php the_title(); ?>"/>

          <?php
          $videoArray = PricerrTheme_get_postmeta($pid, 'youtube_link');

          if($videoArray) {
            echo '<ul class="image-gallery">';
            $hasVideo = true;
            foreach ($videoArray as $videoItem) {

              // var_dump($videoItem);
              //$video = videoItem["meta_value"];
              //var_dump($video);

              $video = $videoItem->meta_value;

              if (strstr($video, "?v=") != false) {
                $exp = explode("?v=", $video);
                $code_here = $exp[1];
                $exp = explode("%", $code_here);
                $code_here = $exp[0];
                $exp = explode("&", $code_here);
                $code_here = $exp[0];
                $done = 1;
              }

              if (strstr($video, "youtu.be/") != false) {
                $exp = explode("youtu.be/", $video);
                $code_here = $exp[1];
                $done = 1;
              }

              if (!empty($video) && $done == 1) {

                echo '<li><iframe height="57" src="http://www.youtube.com/embed/' . $code_here . '?controls=0&showinfo=0&rel=0"
               frameborder="0" allowfullscreen></iframe></li>';
                $vid = 1;
              }
            }
          }

          $arr = PricerrTheme_get_post_images($pid);

          if ($arr) {
            if(!$hasVideo) {
              echo '<ul class="image-gallery">';
            }
            foreach ($arr as $image) {
              echo '<li><a href="' .
                PricerrTheme_generate_thumb($image['url'], 800, 600) .
                '" rel="image_gal1"><img src="' .
                PricerrTheme_generate_thumb($image['url'], 76, 55) .
                '" class="img_class" /></a></li>';
            }
            echo '</ul>';
          }
          //else { echo __('No images.') ;}
          ?>
        </div>
        </div>

        <div class="col-sm-6">
          <div class="job-page-details-holder">
            <div class="job-page-details-wrapper"><?php
              $location = strtoupper(get_post_meta($pid, 'college', true));
              echo PricerrTheme_google_map(array("location" => $location, "zoom" => 15)); ?>
              <!-- Custom start and end date fields added by Carroll Yu -->
              <div class="job-page-detail">
                <span><?php echo "<strong>Space Available:</strong> " . ($total_space - $orders_in_queue) . " OUT OF " . $total_space ?></span>
              </div>
              <div class="job-page-detail"><?php PricerrTheme_avatar_list($pid); ?></div>
              <div class="job-page-detail the-tags"><?php the_tags(__('', 'PricerrTheme') . "", '  ', '  '); ?></div>
              <div class="job-page-detail add-this">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                  <!--<a class="addthis_button_preferred_1"></a>-->
                  <a class="addthis_button_preferred_2"></a>
                  <a class="addthis_button_preferred_3"></a>
                  <!--<a class="addthis_button_preferred_4"></a>-->
                  <a class="addthis_button_compact"></a>
                  <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4df68b4a2795dcd9"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      global $wpdb;
      $query = 'select distinct *, ratings.id ratid from ' . $wpdb->prefix . 'job_ratings ratings, ' . $wpdb->prefix . 'job_orders orders, ' .
        $wpdb->prefix . 'posts posts where posts.ID=orders.pid AND ratings.awarded=\'1\' AND orders.id=ratings.orderid AND posts.ID=' . $pid;
      $r = $wpdb->get_results($query);

      $total_ratings_pid = count($r);
      ?>
      <div class="clear10 divider-border"></div>
      <div class="box-title"><?php echo __("Lesson Description", 'PricerrTheme'); ?></div>
      <div class="box-content clear"><?php the_content(); ?></div>
      <div id='feedback' class="clear10 divider-border"></div>
      <div class="box-title"><?php echo __("Latest Feedback", 'PricerrTheme'); ?></div>
      <div class="box-content"><?php
        global $current_user;
        get_currentuserinfo();

        global $wpdb;
        $query = "select distinct *, ratings.id ratid from " . $wpdb->prefix . "job_ratings ratings, " . $wpdb->prefix . "job_orders orders,
  " . $wpdb->prefix . "posts posts where posts.ID=orders.pid AND posts.ID='$pid' AND
   ratings.awarded='1' AND orders.id=ratings.orderid AND posts.post_author='$author' order by ratid desc limit 12";
        $r = $wpdb->get_results($query);

        if (count($r) > 0) {

          foreach ($r as $row) {
            $post = $row->pid;
            $post = get_post($post);
            $user = get_userdata($row->uid); ?>
          <div class="post" style="border:0" id="post-<?php echo $row->ratid; ?>">
            <div class="padd10_only">
              <div class="image_holder4">
                <img width="25" height="25" border="0" src="<?php echo PricerrTheme_get_avatar($row->uid, 25, 25); ?>"/>
              </div>

              <div class="title_holder4">
                <h2>
                  <a href="<?php echo get_bloginfo('siteurl'); ?>/user-profile/<?php echo $user->user_login; ?>"><?php echo $user->user_login; ?></a>
                    <span class="rating-beeing-done"><?php
                      $xx = current_time('timestamp', 0) - $row->datemade;
                      $xx = PricerrTheme_prepare_seconds_to_words($xx);

                      echo sprintf(__("wrote %s ago", 'PricerrTheme'), $xx);
                      ?></span>
                </h2>

                <div class="c111"><?php
                  if ($row->grade == 1)
                    echo '<img style="float:left" src="' . get_bloginfo('template_url') . '/images/thup.png" border="0" /> &nbsp;';
                  if ($row->grade == 0)
                    echo '<img style="float:left" src="' . get_bloginfo('template_url') . '/images/thdown.jpg" border="0" /> &nbsp;';
                  echo stripslashes($row->reason); ?>
                </div>
              </div>
            </div>
            </div><?php
          }
        } else {
          _e("The lesson doesn't have feedback yet.", "PricerrTheme");
        }
        ?></div>
        <div class="clear10 divider-border"></div>

        <div>
          <div class="box-title"><?php echo sprintf(__("Other lessons by %s", 'PricerrTheme'), $author_data->user_login); ?></div>
          <div class="box-content clear"><?php
            $nrpostsPage = 8;
            $active = array(
              'key' => 'active',
              'value' => "1",
              //'type' => 'numeric',
              'compare' => '='
            );

            $closed = array(
              'key' => 'closed',
              'value' => "0",
              //'type' => 'numeric',
              'compare' => '='
            );

            $args = array('author' => $author, 'meta_query' => array($closed, $active), 'posts_per_page' => $nrpostsPage,
              'paged' => 1, 'post_type' => 'job', 'order' => "DESC", 'orderby' => "date", 'post__not_in' => array($pid));
            $the_query = new WP_Query($args);

            // The Loop

            if ($the_query->have_posts()):
              while ($the_query->have_posts()) : $the_query->the_post();
                $new_post_id = get_the_ID(); ?>
                <div class="post-thumbnail" style="border:0">
                  <div class="padd10_only_tp">
                    <div class="image_holder6">
                      <img width="32" class="image_small_jb" height="25" src="<?php echo PricerrTheme_get_first_post_image($new_post_id, 32, 25); ?>"/>
                    </div>
                    <div class="title_holder6">
                      <h2>
                        <a href="<?php echo get_permalink($new_post_id); ?>"><?php echo get_the_title(); ?></a>
                      </h2>
                    </div>
                  </div>
                </div>
              <?php
              endwhile;
            else:
              echo __('No other lessons posted.', "PricerrTheme");
            endif;
            // Reset Post Data
            wp_reset_postdata();
            ?></div>
        </div>
        <!-- ####################### -->
        <div class="clear10 divider-border"></div>
        <div>
          <div class="box-title"><?php _e("Related lessons", 'PricerrTheme'); ?></div>
          <div class="box-content clear">
            <?php
            $cat = wp_get_object_terms($pid, 'job_cat');
            $job_cat = array(
              'taxonomy' => 'job_cat',
              'field' => 'slug',
              'terms' => $cat[0]->slug
            );

            $active = array(
              'key' => 'active',
              'value' => "1",
              //'type' => 'numeric',
              'compare' => '='
            );

            $closed = array(
              'key' => 'closed',
              'value' => "0",
              //'type' => 'numeric',
              'compare' => '='
            );


            $args = array('post__not_in' => array($pid), 'meta_query' => array($closed, $active), 'tax_query' => array($job_cat), 'posts_per_page' => $nrpostsPage,
              'paged' => 1, 'post_type' => 'job', 'order' => "DESC", 'orderby' => "date");
            $the_query = new WP_Query($args);

            // The Loop
            if ($the_query->have_posts()):
              while ($the_query->have_posts()) : $the_query->the_post();
                $new_post_id = get_the_ID(); ?>
                <div class="post" style="border:0">
                <div class="padd10_only_tp">
                  <div class="image_holder6">
                    <img width="32" class="image_small_jb" height="25" src="<?php echo PricerrTheme_get_first_post_image($new_post_id, 32, 25); ?>"/>
                  </div>
                  <div class="title_holder6">
                    <h2>
                      <a href="<?php echo get_permalink($new_post_id); ?>"><?php echo get_the_title(); ?></a>
                    </h2>
                  </div>
                </div>
                </div><?php
              endwhile;

            else:

              echo __('No other lessons posted.', "PricerrTheme");

            endif;
            // Reset Post Data
            wp_reset_postdata();
            ?></div>
        </div>
      </div><!-- close div for white-wrapper outsite the loop -->
      <!-- ####################### -->

      </div><?php
      echo '<div id="right-sidebar" class="page-sidebar">';
      echo '<ul class="xoxo">';

      if (!PricerrTheme_post_auther_is_current_user($pid)) {

        $extra_job_add = array();
        $h = 0;

        $sts = get_option('PricerrTheme_get_total_extras');
        if (empty($sts))
          $sts = 3;

        for ($k = 1; $k <= $sts; $k++) {
          $extra_price = get_post_meta($pid, 'extra' . $k . '_price', true);
          $extra_content = get_post_meta($pid, 'extra' . $k . '_content', true);


          if (!empty($extra_price) && !empty($extra_content)) {

            $extra_job_add[$h]['content'] = $extra_content;
            $extra_job_add[$h]['price'] = $extra_price;
            $extra_job_add[$h]['extra_nr'] = $k;
            $h++;

          }
        }
        ?>
        <div class="ad_page_purchase">
        <?php
        $act = get_bloginfo('siteurl');
        ?>
        <form method="get" name="myFormPurchase" class="fltRight" action="<?php echo $act; ?>">
          <input type="hidden" value="purchase_this" name="jb_action"/>
          <input type="hidden" value="<?php the_ID(); ?>" name="jobid"/>
          <?php if (PricerrTheme_user_enrolled_check($pid, $uid) > 0) { ?>
            <a href="#" onclick="return false;" class="purchase_disable_btn"><?php _e("Your Reservation<br>Has Been Placed", "PricerrTheme"); ?></a>
          <?php } elseif ($orders_in_queue >= $total_space) { ?>
            <a href="#" onclick="return false;" class="purchase_disable_btn"><?php _e("Classroom Is Full", "PricerrTheme"); ?></a>
          <?php
          } else {
            if (count($extra_job_add) > 0): ?>
              <div class="purchase_extra">
              <div class="padd10">
                <ul class="purchase_extra_ul">
                  <li class="addt_ordr"><?php _e('Order Additional', 'PricerrTheme'); ?></li>
                  <?php
                  foreach ($extra_job_add as $extra_job_add_item):

                    echo '<li><input type="checkbox" name="extra' . $extra_job_add_item['extra_nr'] . '" value="1" />' .
                      __('I will provide', 'PricerrTheme') . ' ' . $extra_job_add_item['content'] . ' ' . __('for', 'PricerrTheme') .
                      ' ' . PricerrTheme_get_show_price($extra_job_add_item['price']) . '</li>';

                  endforeach;
                  ?></ul>
              </div>
              </div><?php
            endif;

            $shipping = get_post_meta($pid, 'shipping', true);
            if (!empty($shipping)) {
              echo '<div class="shipping_box"> ' . sprintf(__('Shipping Cost: %s', 'PricerrTheme'), PricerrTheme_get_show_price($shipping)) . '</div>';
            }
            ?><a href="#" onclick="document.myFormPurchase.submit(); return false;" class="purchase_now_btn"><?php _e("Train Me For ", "PricerrTheme"); ?><?php echo intval(substr(PricerrTheme_get_show_price($prc), 1, -1)) == 0 ? "Free" : PricerrTheme_get_show_price($prc); ?></a>
          <?php
          }

          $using_perm = PricerrTheme_using_permalinks();

          if ($using_perm) {
            $privurl_m = get_permalink(get_option('PricerrTheme_my_account_priv_mess_page_id')) . "/?";
          } else {
            $privurl_m = get_bloginfo('siteurl') . "/?page_id=" . get_option('PricerrTheme_my_account_priv_mess_page_id') . "&";
          } ?>
          <p class="contact-seller-wrap">
            <a href="<?php echo $privurl_m; ?>priv_act=send&pid=<?php the_ID(); ?>&uid=<?php echo $author_data->ID; ?>" class="contact-seller-thing"><?php _e("Contact Seller", "PricerrTheme"); ?></a>
          </p>
        </form>
        </div><?php
      }

      dynamic_sidebar('job-widget-area');
      echo '</ul>';
      echo '</div>';
    }
  }
} // end of the loop.

get_footer();

?>