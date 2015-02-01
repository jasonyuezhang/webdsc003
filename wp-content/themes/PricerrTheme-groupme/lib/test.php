<h3>RUNNING CRONJOB</h3>

<?php
global $wpdb;

$curr = strtotime(date('Y-m-d', time()));
$s = "select post_id from " . $wpdb->postmeta . " where meta_key = 'active' AND meta_value = '1' AND post_id IN(
		select post_id from " . $wpdb->postmeta . " where meta_key = 'end_date_str' AND meta_value <= '$curr')";
$pids = $wpdb->get_results($s);
echo $curr;
var_dump($pids);
foreach ($pids as $pid)
    update_post_meta($pid->post_id, 'active', 0);
?>