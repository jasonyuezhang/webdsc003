<?php

add_action('init', 'PricerrTheme_close_jobs_jobs'); //wp_init - here
/* Custom start and end date fields added by Carroll Yu */
add_action('init', 'deactivate_ending_events'); //wp_init - here
add_action('init', 'send_event_reminders'); //wp_init - here

function deactivate_ending_events()
{
    global $wpdb;

    $curr = strtotime(date('Y-m-d', time()));
    $s = "select post_id from " . $wpdb->postmeta . " where meta_key = 'active' AND meta_value = '1' AND post_id IN(
		select post_id from " . $wpdb->postmeta . " where meta_key = 'end_date_str' AND meta_value <= '$curr')";
    $pids = $wpdb->get_results($s);
    foreach ($pids as $pid)
        update_post_meta($pid->post_id, 'active', 0);
}

function send_event_reminders()
{

}

function PricerrTheme_close_jobs_jobs()
{
    global $wpdb;
    $closed = array(
        'key' => 'closed',
        'value' => "0",
        'compare' => '='
    );


    $ending = array(
        'key' => 'featured_until',
        'value' => current_time('timestamp', 0),
        'type' => 'numeric',
        'compare' => '<'
    );


    $args2 = array('posts_per_page' => '-1', 'post_type' => 'job', 'post_status' => 'publish', 'meta_query' => array($closed, $ending));
    $the_query = new WP_Query($args2);


    if ($the_query->have_posts()):
        while ($the_query->have_posts()) : $the_query->the_post();

            update_post_meta(get_the_ID(), 'featured', "0");


        endwhile;
    endif;

    //------------------------------
    $PricerrTheme_max_time_to_wait = get_option('PricerrTheme_max_time_to_wait');
    if (empty($PricerrTheme_max_time_to_wait)) $PricerrTheme_max_time_to_wait = 72;

    $scm = current_time('timestamp', 0) - $PricerrTheme_max_time_to_wait * 3600;
    $s = "select * from " . $wpdb->prefix . "job_orders where done_seller='1' AND completed='0' AND date_finished<'$scm'";
    $r = $wpdb->get_results($s);

    // print_r($r);

    foreach ($r as $row) {
        PricerrTheme_mark_completed($row->id, 1);
    }


}


?>