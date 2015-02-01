<?php
/*****************************************************************************
 *
 *    copyright(c) - sitemile.com - PricerrTheme
 *    More Info: http://sitemile.com/p/pricerr
 *    Coder: Saioc Dragos Andrei
 *    Email: andreisaioc@gmail.com
 *
 ******************************************************************************/

global $wp_query;
$query_vars = $wp_query->query_vars;

$job_category = $query_vars['job_category'];
$page = $query_vars['page'];
$my_page = $page;
$job_sort = $query_vars['job_sort'];
$job_tax = $query_vars['job_tax'];
$term_search = $query_vars['term_search'];

if (empty($term_search)) $term_search = $_GET['term_search'];

//----------

if (empty($job_category)) $job_category = "all";
if (empty($page)) $page = "1";
if (empty($job_sort)) $job_sort = "auto";
if (empty($job_tax)) $job_tax = "category";

if ($job_tax == "category")
    $job_tax2 = "job_cat";
else
    $job_tax2 = "job_location";

//----------

if ($job_category != "all" and $job_tax == "category") {
    $term_ct = get_term_by('slug', $job_category, 'job_cat');
    $posted_jobs = sprintf(__('All %s Groups', 'PricerrTheme'), $term_ct->name);
} elseif ($job_category != "all" and $job_tax == "location") {

    $term_ct = get_term_by('slug', $job_category, 'job_location');
    $posted_jobs = sprintf(__('All Groups in %s', 'PricerrTheme'), $term_ct->name);
} else {
    $posted_jobs = __('All Posted Groups', 'PricerrTheme');
}

if (1) //!sitemile_check_if_home())
{
    echo '<h4 class="title widget-title">' . $posted_jobs . '</h4>';
}

?>

<?php

$view = PricerrTheme_get_current_view_grid_list();
echo '<div class="switchers col-sm-2 clear pright0">';
echo '<div class="switch-view-link-container">';
if ($view != "grid") {
    echo '<a href="' . PricerrTheme_switch_link_from_home_page('grid') . '" class="grid-jobs"></a>';
    echo '<a href="' . PricerrTheme_switch_link_from_home_page('list') . '" class="list-jobs-selected"></a>';
} else {
    echo '<a href="' . PricerrTheme_switch_link_from_home_page('grid') . '" class="grid-jobs-selected"></a>';
    echo '<a href="' . PricerrTheme_switch_link_from_home_page('list') . '" class="list-jobs"></a>';
}
echo '</div>';
echo '<div class="filter_div switch-view-link">' . __('Switch View:', 'PricerrTheme') . '</div>';
echo '</div>';

function jobTheme_posts_where($where)
{

    global $wpdb, $term;
    $where .= " AND ({$wpdb->posts}.post_title LIKE '%$term%' OR {$wpdb->posts}.post_content LIKE '%$term%')";

    return $where;
}

global $term, $wpdb;
$term = $term_search;

if (!empty($term_search)) {
    $term = $term_search;
    $where_term = " AND ("; // AND (posts.post_title LIKE '%$term%' OR posts.post_content LIKE '%$term%')";

    $split_stemmed = split(" ", $term);


    while (list ($key, $val) = each($split_stemmed)) {
        if ($val != '' && strlen($val) > 0) {
            $where_term .= "( posts.post_title LIKE '%" . $val . "%' OR  posts.post_content LIKE '%" . $val . "%') OR ";
        }
    }

    $where_term .= " 0!=0 )";

}


global $wpdb;
$prefix = $wpdb->prefix;
$nrpostsPage = 10;

$PricerrTheme_show_limit_job_cnt = get_option('PricerrTheme_show_limit_job_cnt');
if (!empty($PricerrTheme_show_limit_job_cnt)) $nrpostsPage = $PricerrTheme_show_limit_job_cnt;


if ($job_category != "all") {
    $tmp = "select term_id from " . $prefix . "terms where slug='$job_category'";
    $res = $wpdb->get_results($tmp);
    $term_id = $res[0]->term_id;

    $ors = ' OR 0=1 ';

    $childs = get_term_children($term_id, $job_tax2);
    foreach ($childs as $child) {
        $term_id_ms = $child;
        $tmp1 = "select term_taxonomy_id from " . $prefix . "term_taxonomy where term_id='$term_id_ms' AND taxonomy='$job_tax2'";
        $res1 = $wpdb->get_results($tmp1);
        $term_id1 = $res1[0]->term_taxonomy_id;

        $ors .= " OR tax.term_taxonomy_id='$term_id1' ";
    }

    //echo $ors;

    $tmp = "select term_taxonomy_id from " . $prefix . "term_taxonomy where term_id='$term_id' AND taxonomy='$job_tax2'";
    $res = $wpdb->get_results($tmp);
    $term_id = $res[0]->term_taxonomy_id;

    $cate_inner = " INNER JOIN " . $prefix . "term_relationships tax ON (posts.ID = tax.object_id) ";
    $cate_where = " AND (tax.term_taxonomy_id='$term_id' " . $ors . " )  ";

    //$cate = " posts.ID=tax.object_id AND tax.term_taxonomy_id='$term_id' AND ";

}


if ($job_sort == 'popularity') {
    $likes_inner = " INNER JOIN " . $prefix . "postmeta meta7 ON (posts.ID = meta7.post_id) ";
    $likes_where = " AND (meta7.meta_key = 'likes' )  ";
    $likes_sort = " meta7.meta_value+0 DESC ,  ";
}

if ($job_sort == 'views') {
    $views_inner = " INNER JOIN " . $prefix . "postmeta meta7 ON (posts.ID = meta7.post_id) ";
    $views_where = " AND (meta7.meta_key = 'views' )  ";
    $views_sort = " meta7.meta_value+0 DESC ,  ";
}

if ($job_sort == 'express') {
    $views_inner = " INNER JOIN " . $prefix . "postmeta meta7 ON (posts.ID = meta7.post_id) ";
    $views_where = " AND (meta7.meta_key = 'max_days' ) AND (meta7.meta_value = '1' )  ";
    $views_sort = " meta7.meta_value+0 DESC ,  ";
}

if ($job_sort == 'instant') {
    $views_inner = " INNER JOIN " . $prefix . "postmeta meta7 ON (posts.ID = meta7.post_id) ";
    $views_where = " AND (meta7.meta_key = 'instant' ) AND (meta7.meta_value = '1' )  ";
    $views_sort = " meta7.meta_value+0 DESC ,  ";
}

if ($job_sort == 'rating') {
    $rating_inner = " INNER JOIN " . $prefix . "postmeta meta5 ON (posts.ID = meta5.post_id) ";
    $rating_where = " AND (meta5.meta_key = 'rating' )  ";
    $rating_sort = " meta5.meta_value+0 DESC ,  ";
}

if ($job_sort == 'videos') {
    $hasvideo_inner = " INNER JOIN " . $prefix . "postmeta AS meta9 ON (posts.ID = meta9.post_id) ";
    $hasvideo_where = " AND (meta9.meta_key = 'has_video' ) AND (meta9.meta_value = '1' ) ";
}


if ($job_sort == 'pictures') {
    $haspictures_where = " AND EXISTS (select ID from " . $prefix . "posts second_posts where
        second_posts.post_parent=posts.ID AND post_type='attachment' AND post_mime_type like '%image%' LIMIT 1) ";
}

//----------------------------------------------

$closed_inner = " INNER JOIN " . $prefix . "postmeta AS meta89 ON (posts.ID = meta89.post_id) ";
$closed_where = " AND (meta89.meta_key = 'closed' ) AND (meta89.meta_value = '0' ) ";

$active_inner = " INNER JOIN " . $prefix . "postmeta AS meta88 ON (posts.ID = meta88.post_id) ";
$active_where = " AND (meta88.meta_key = 'active' ) AND (meta88.meta_value = '1' ) ";

//----------------------------------------------


$featured_sort = "";
if ($job_sort == "auto") $featured_sort = " meta1.meta_value+0 DESC, ";

//---------------------------------------------------------------

$sql = "SELECT SQL_CALC_FOUND_ROWS posts.* FROM " . $prefix . "posts posts
	INNER JOIN " . $prefix . "postmeta meta1 ON (posts.ID = meta1.post_id)
	INNER JOIN " . $prefix . "postmeta AS meta3 ON (posts.ID = meta3.post_id) " . $closed_inner . " " . $active_inner . " " . $cate_inner . "
	" . $hasvideo_inner . " " . $rating_inner . " " . $views_inner . " " . $likes_inner . " " . $cate_where . "
	WHERE " . $cate . " posts.post_type = 'job' AND (posts.post_status = 'publish')
	AND meta1.meta_key = 'featured' " . $where_term . " AND meta3.meta_key = 'closed' AND meta3.meta_value = '0'
	" . $hasvideo_where . " " . $closed_where . " " . $active_where . " " . $rating_where . " " . $likes_where . " " . $views_where . " " . $haspictures_where . "
	GROUP BY posts.ID  ORDER BY " . $featured_sort . " " . $rating_sort . " " . $views_sort . " " . $likes_sort . " posts.post_modified  desc ";


//----------------------------------------------------------------

$sql_temp = "SELECT SQL_CALC_FOUND_ROWS posts.ID FROM " . $prefix . "posts posts
	INNER JOIN " . $prefix . "postmeta meta1 ON (posts.ID = meta1.post_id)
	INNER JOIN " . $prefix . "postmeta AS meta3 ON (posts.ID = meta3.post_id) " . $closed_inner . " " . $active_inner . " " . $cate_inner . "
	" . $hasvideo_inner . " " . $rating_inner . " " . $views_inner . " " . $likes_inner . " " . $cate_where . "
	WHERE " . $cate . " posts.post_type = 'job' AND (posts.post_status = 'publish')
	AND meta1.meta_key = 'featured' " . $where_term . " AND meta3.meta_key = 'closed' AND meta3.meta_value = '0'
	" . $hasvideo_where . " " . $closed_where . " " . $active_where . " " . $rating_where . " " . $likes_where . " " . $views_where . " " . $haspictures_where . "
	GROUP BY posts.ID  ORDER BY " . $featured_sort . " " . $rating_sort . " " . $views_sort . " " . $likes_sort . " posts.post_modified  desc ";

//---------------------------------------------------------------
//echo $sql;
$limit = " LIMIT " . ($nrpostsPage * ($page - 1)) . ", $nrpostsPage ";
//mysql_query($sql) or die(mysql_error());

//echo $sql;

//$totalposts = $wpdb->get_results($sql_temp, OBJECT);


//$nrposts = count($totalposts);
//$totalPages = ceil($nrposts / $nrpostsPage);
//$pagess = $totalPages;


//====================================================

// The Loop

//$pageposts = $wpdb->get_results($sql.$limit, OBJECT);
//$posts_per = 5;

$nrpostsPage = 20;
$nrpostsPage_home_page = get_option('PricerrTheme_nrpostsPage_home_page');
if (!empty($nrpostsPage_home_page)) $nrpostsPage = $nrpostsPage_home_page;

//-------------------------------------


$pj = get_query_var('paged');

$meta_querya = array(array(
    'key' => 'active',
    'value' => "1",
    'compare' => '='
));

$args = array('posts_per_page' => $nrpostsPage, 'paged' => $pj, 'post_type' => 'job', 'order' => "DESC", 'meta_query' => $meta_querya, 'meta_key' => 'featured', 'orderby' => 'meta_value_num');
$the_query = new WP_Query($args);


if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();

    ?>


    <?php

    if ($view != "grid")
        PricerrTheme_get_post();
    else
        PricerrTheme_get_post_thumbs();

    ?>

<?php endwhile; ?>

    <?php

    $PricerrTheme_show_pagination_homepage = get_option('PricerrTheme_show_pagination_homepage');
    if ($PricerrTheme_show_pagination_homepage != "yes"):

        ?>

        <div class="show_all_jobs">
            <a href="<?php echo get_post_type_archive_link('job') ?>"><?php _e('Show All Groups', 'PricerrTheme'); ?></a>
        </div>

    <?php
    else:
        if (function_exists('wp_pagenavi')):
            echo '<div class="my_pagination">';
            wp_pagenavi(array('query' => $the_query));
            echo '</div>'; endif;
    endif;
    ?>

<?php else : ?> <?php $no_p = 1; ?>
    <div class="padd100"><p class="center"><?php _e("Sorry, there are no posted groups yet", 'PricerrTheme'); ?>.</p>
    </div>

<?php  endif; ?>